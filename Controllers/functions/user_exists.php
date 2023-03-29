<?php

use App\Models\CustomerModel;
use App\Models\UsersAllergenModel;
use App\Models\UsersModel;

function user_exists()
{
    if (isset($_SESSION["auth"]) && !empty($_SESSION["auth"])) {
        // Check if user is admin
        if (isset($_SESSION["is_admin"]) && !empty($_SESSION["is_admin"])) {
            die();
        } else {
            $customer_model = new CustomerModel;
            $user_model = new UsersModel;
            $customer = $customer_model->findBy(["id" => $_SESSION["customer_id"]])[0];
            $user = $user_model->findBy(["id" => $_SESSION["customer_id"]])[0];
            $users_allergen_model = new UsersAllergenModel;
            $allergies = $users_allergen_model->findBy(["user_id" => $_SESSION["customer_id"]]);
            $formated_user = [
                "firstName" => $user["first_name"],
                "lastName" => $user["last_name"],
                "email" => $user["email"],
                "phone" => $user["phone"],
                "nbGuest" => $customer["default_nb_guest"],
                "allergies" => $allergies
            ];
            echo json_encode($formated_user);
        }
    } else {
        return false;
    }
}
