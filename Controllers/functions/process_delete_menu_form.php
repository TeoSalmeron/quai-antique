<?php

use App\Models\MenuModel;

function process_delete_menu_form(MenuModel $menu_model)
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        http_response_code(404);
        echo "Accès refusé";
        die();
    } else {
        if ($_POST["id"] == null || empty($_POST["id"])) {
            $_SESSION["delete_menu_error"] = "Impossible de supprimer le menu";
            header('Location: /admin?display=menu');
            die();
        } else {
            if (!$menu_model->delete($_POST["id"])) {
                $_SESSION["delete_menu_error"] = "Impossible de supprimer le menu";
                header('Location: /admin?display=menu');
                die();
            } else {
                $_SESSION["delete_menu_success"] = "Menu supprimé !";
                header('Location: /admin?display=menu');
                die();
            }
        }
    }
}
