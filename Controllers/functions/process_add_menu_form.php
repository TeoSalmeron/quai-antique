<?php

use App\Models\MenuModel;

function process_add_menu_form(MenuModel $menu_model)
{
    if($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST)) {
        http_response_code(404);
        echo "Accès refusé";
        die();
    } else {
        // Check if data is missing
        if($_POST["name"] == "" || $_POST["schedule"] == "" || $_POST["description"] == "" || $_POST["price"] == null) {
            $_SESSION["add_menu_error"] = "Informations manquantes pour ajouter le menu";
            header('Location: /admin?display=menu');
            die();
        } else {
            // Format data
            $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
            $schedule = htmlspecialchars(strip_tags(trim($_POST["schedule"])));
            $description = htmlspecialchars(strip_tags(trim($_POST["description"])));
            $price = $_POST["price"];
            if(strlen($price) === 4) {
                $price .= "0";
            }
            (float)$price;
            $menu = $menu_model->setName($name)->setSchedule($schedule)->setDescription($description)->setPrice($price)->setId_restaurant(1);
            if(!$menu_model->create($menu)){
                $_SESSION["add_menu_error"] = "Impossible de créer le nouveau menu";
                header('Location: /admin?display=menu');
                die();
            } else {
                $_SESSION["add_menu_success"] = "Nouveau menu créé !";
                header('Location: /admin?display=menu');
                die();
            }
        }
        
        
    }
}