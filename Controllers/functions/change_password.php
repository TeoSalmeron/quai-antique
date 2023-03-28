<?php

use App\Models\UsersModel;
use App\Models\CustomerModel;

require_once ROOT . '/Controllers/functions/check_token.php';

function change_password(string $email, string $password, string $token)
{
    // Check token again
    if (!check_token($email, $token)) {
        $response = [
            "error" => 1,
            "msg" => "Impossible de modifier le mot de passe"
        ];
        return $response;
    } else {
        // Check e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response = [
                "error" => 1,
                "msg" => "L'e-mail est au mauvais format"
            ];
            return $response;
        } else {
            // Check if password respect rules
            $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
            if (!preg_match($password_regex, $password)) {
                $response = [
                    "error" => 1,
                    "msg" => "Le mot de passe ne respecte pas le format demandé"
                ];
                return $response;
            } else {
                // Check if user exists
                $users_model = new UsersModel;
                $user = $users_model->findBy(["email" => $email])[0];
                if (!$user) {
                    // If user doesn't exist = error
                    $response = [
                        "error" => 1,
                        "msg" => "Impossible de trouver l'utilisateur pour mettre à jour le mot de passe"
                    ];
                    return $response;
                } else {
                    // Update password
                    $customer_model = new CustomerModel;
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                    $customer_model->setPassword($hashed_password);
                    $customer_model->setPw_token("NULL");
                    if (!$customer_model->update($user["id"])) {
                        $response = [
                            "error" => 1,
                            "msg" => "Impossible de mettre à jour le mot de passe"
                        ];
                        return $response;
                    } else {
                        $response = [
                            "error" => 0,
                            "msg" => "Mot de passe modifié ! Connectez-vous à votre compte"
                        ];
                        return $response;
                    }
                }
            }
        }
    }
}
