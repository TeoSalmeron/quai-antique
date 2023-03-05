<?php

use App\Models\UsersModel;

function process_sign_in_form()
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST)) {
        $_SESSION["sign_in_error"] = "Impossible d'accéder à cette page";
        header('Location: /sign-in');
        die();
    } else {
        $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
        // Check if e-mail is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["sign_in_error"] = "E-mail incorrect";
            header('Location: /sign-in');
            die();
        } else {
            // Check if user exists
            $users_model = new UsersModel;
            $user = $users_model->findBy(["email" => $email]);
            if (empty($user)) {
                $_SESSION["sign_in_error"] = "Cet e-mail n'est pas enregistré chez nous";
                header('Location: /sign-in');
                die();
            } else {
            }
        }
    }
}
