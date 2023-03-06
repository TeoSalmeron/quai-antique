<?php

use App\Models\AdministratorModel;

function process_register_admin_form()
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST)) {
        http_response_code(404);
        echo "Accès refusé";
        die();
    } else {
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        // Check if passwords respect rules
        $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
        if (!preg_match($password_regex, $password) || !preg_match($password_regex, $confirm_password)) {
            $_SESSION["admin_verification_error"] = "Le mot de passe ne respecte pas les règles";
            header('Location: /admin/verification');
            die();
        } else {
            // Check if passwords match
            if ($password !== $confirm_password) {
                $_SESSION["admin_verification_error"] = "Les mots de passes ne correspondent pas";
                header('Location: /admin/verification');
                die();
            } else {
                // Success
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $administrator_model = new AdministratorModel;
                $admin = $administrator_model->findBy(["email" => $_SESSION["admin_email"]])[0];
                $administrator_model->setPassword($hashed_password)->setConfirmed(true);
                $administrator_model->update($admin["id"]);
                header('Location: /sign-in');
                die();
            }
        }
    }
}
