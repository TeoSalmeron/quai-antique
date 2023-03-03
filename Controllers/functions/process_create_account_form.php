<?php

function process_create_account_form()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST" & !empty($_POST)) {
        $last_name = htmlspecialchars(strip_tags(trim($_POST["last_name"])));
        $first_name = htmlspecialchars(strip_tags(trim($_POST["first_name"])));
        $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
        $phone = htmlspecialchars(strip_tags(trim($_POST["phone"])));
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        // Check user names
        if (!preg_match('/^[\p{L}\s]+$/u', $last_name) || !preg_match('/^[\p{L}\s]+$/u', $first_name)) {
            $_SESSION["create_account_error"] = "Le prénom et le nom de famille ne peuvent contenir que des lettres";
            header('Location: /sign-up');
            die();
        } else {
            // Check e-mail
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION["create_account_error"] = "L'email est incorrect";
                header('Location: /sign-up');
                die();
            } else {
                $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
                if (!preg_match($password_regex, $password) || !preg_match($password_regex, $confirm_password)) {
                    $_SESSION["create_account_error"] = "Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre et un caractère spécial";
                    header('Location: /sign-up');
                    die();
                } else {
                    if ($password !== $confirm_password) {
                        $_SESSION["create_account_error"] = "Les mots de passes doivent être identiques";
                        header('Location: /sign-up');
                        die();
                    }
                }
                // Check passwords
            }
        }
    } else {
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }
}
