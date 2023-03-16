<?php

use App\Models\DishModel;

function process_delete_dish_form(DishModel $dish_model)
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST)) {
        http_response_code(404);
        echo "Accès refusé";
        die();
    } else {
        if (empty($_POST["delete_dish"]) || $_POST["delete_dish"] <= 0) {
            $_SESSION["delete_dish_error"] = "Impossible de récupérer le plat à supprimer";
            header('Location: /admin?display=dish');
            die();
        } else {
            $id = (int)$_POST["delete_dish"];
            if (!$dish_model->delete($id)) {
                $_SESSION["delete_dish_error"] = "Impossible de supprimer le plat";
                header('Location: /admin?display=dish');
                die();
            } else {
                $_SESSION["delete_dish_success"] = "Plat supprimé !";
                header('Location: /admin?display=dish');
                die();
            }
        }
    }
}
