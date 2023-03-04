<?php

function process_sign_up_form()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST" & !empty($_POST)) {
        $last_name = htmlspecialchars(strip_tags(trim($_POST["last_name"])));
        $first_name = htmlspecialchars(strip_tags(trim($_POST["first_name"])));
        $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
        $phone = htmlspecialchars(strip_tags(trim($_POST["phone"])));
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
        $default_nb_guest = (int)$_POST["default_nb_guest"];
        // Check user names
        if (!preg_match('/^[\p{L}\s]+$/u', $last_name) || !preg_match('/^[\p{L}\s]+$/u', $first_name)) {
            $_SESSION["sign_up_error"] = "Le prénom et le nom de famille ne peuvent contenir que des lettres";
            header('Location: /sign-up');
            die();
        } else {
            // Check e-mail
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION["sign_up_error"] = "L'email est incorrect";
                header('Location: /sign-up');
                die();
            } else {
                // Check if password has at least 1 uppercase letter, 1 lower case letter, 1 number and 1 special characters
                if (!preg_match($password_regex, $password) || !preg_match($password_regex, $confirm_password)) {
                    $_SESSION["sign_up_error"] = "Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre et un caractère spécial";
                    header('Location: /sign-up');
                    die();
                } else {
                    // Check if passwords are the same
                    if ($password !== $confirm_password) {
                        $_SESSION["sign_up_error"] = "Les mots de passes doivent être identiques";
                        header('Location: /sign-up');
                        die();
                    } else {
                        // Check if phone number is correct
                        if (!preg_match("/\d{10}+/", $phone)) {
                            $_SESSION["sign_up_error"] = "Le format du téléphone est incorrect";
                            header('Location: /sign-up');
                            die();
                        } else {
                            // Check if default nb guest is an int
                            if ($default_nb_guest === 0) {
                                $_SESSION["sign_up_error"] = "Le nombre de couverts par défaut est incorrect";
                                header('Location: /sign-up');
                                die();
                            } else {
                                // Check allergies
                                if ($_POST["prompt_allergy"] != 0) {
                                    var_dump($_POST["allergies"]);
                                } else {
                                    var_dump($_POST);
                                }
                            }
                        }
                    }
                }
            }
        }
    } else {
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }
}
