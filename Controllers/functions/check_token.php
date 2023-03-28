<?php

use App\Models\UsersModel;
use App\Models\CustomerModel;

function check_token(string $email, string $token)
{
    $users_model = new UsersModel;
    $user = $users_model->findBy(["email" => $email])[0];
    if (!$user || empty($user)) {
        $response = [
            "error" => 1,
            "msg" => "Utilisateur introuvable"
        ];
        return $response;
    } else {
        $customer_model = new CustomerModel;
        $customer = $customer_model->findBy(["id" => $user["id"]])[0];
        if (!$customer) {
            $response = [
                "error" => 1,
                "msg" => "Utilisateur introuvable"
            ];
            return $response;
        } else {
            if ($customer["pw_token"] === $token) {
                $response = [
                    "error" => 0
                ];
                return $response;
            } else {
                $response = [
                    "error" => 1,
                    "msg" => "Impossible de réinitialiser le mot de passe"
                ];
                return $response;
            }
        }
    }
}
