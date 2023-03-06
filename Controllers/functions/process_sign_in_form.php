<?php

use App\Models\AdministratorModel;
use App\Models\CustomerModel;
use App\Models\UsersModel;

function process_sign_in_form()
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST)) {
        $_SESSION["sign_in_error"] = "Impossible d'accéder à cette page";
        header('Location: /sign-in');
        die();
    } else {
        $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
        $password = $_POST["password"];
        // Check if e-mail is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["sign_in_error"] = "L'e-mail est au mauvais format";
            header('Location: /sign-in');
            die();
        } else {
            $users_model = new UsersModel;
            // Check if user is Administrator
            $administrator_model = new AdministratorModel;
            $administrator = $administrator_model->findBy(["email" => $email])[0];
            // If is not admin
            if (is_null($administrator)) {
                $user = $users_model->findBy(["email" => $email])[0];
                // Check if user exists
                if (is_null($user)) {
                    $_SESSION["sign_in_error"] = "Utilisateur inexistant, créez un compte ou réessayez";
                    header('Location: /sign-in');
                    die();
                } else {
                    // User exists, check if login is correct
                    $users_model->setId($user["id"]);
                    $customer_model = new CustomerModel;
                    $customer = $customer_model->findBy(["id" => $users_model->getId()])[0];
                    // Check password
                    if (!password_verify($password, $customer["password"])) {
                        // Password doesn't match
                        $_SESSION["sign_in_error"] = "Mot de passe invalide";
                        header('Location: /sign-in');
                        die();
                    } else {
                        // Success
                        $_SESSION["customer_id"] = $customer["id"];
                        $_SESSION["auth"] = true;
                        header('Location: /profile');
                        die();
                    }
                }
            } else {
                // If admin is not confirmed
                if ($administrator["confirmed"] == 0) {
                    // Check if password is correct
                    if ($password !== $administrator["password"]) {
                        // Password is not correct
                        $_SESSION["sign_in_error"] = "Mot de passe invalide";
                        header('Location: /sign-in');
                        die();
                    } else {
                        // Password is correct
                        $_SESSION["admin_email"] = $email;
                        $_SESSION["can_access"] = true;
                        $_SESSION["auth"] = true;
                        header('Location: /admin/verification');
                        die();
                    }
                } else {
                    $_SESSION["admin"] = $administrator;
                    $_SESSION["auth"] = true;
                    $_SESSION["is_admin"] = true;
                    $_SESSION["can_access"] = true;
                    header('Location: /admin');
                    die();
                }
            }
        }
    }
}
