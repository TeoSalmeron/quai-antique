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
            var_dump($administrator);
            die();
            if(empty($administrator)) {
                $user = $users_model->findBy(["email" => $email])[0];
                // Check if login is correct
                $users_model->setId($user["id"]);
                $customer_model = new CustomerModel;
                $customer = $customer_model->findBy(["id" => $users_model->getId()])[0];
                // Check password
                if(!password_verify($password, $customer["password"])) {
                    $_SESSION["sign_in_error"] = "Mot de passe invalide";
                    header('Location: /sign-in');
                    die();
                } else {
                    header('Location: /?success=1');
                    die();
                }
            } else {
                // If is admin
                if($administrator["confirmed"] == 0) {
                    echo "Administrateur à vérifier";
                } else {
                    echo "Administrateur vérifié";
                }
            }
            if (empty($user)) {
                $_SESSION["sign_in_error"] = "Cet e-mail n'est pas enregistré chez nous";
                header('Location: /sign-in');
                die();
            } else {

            }
        }
    }
}
