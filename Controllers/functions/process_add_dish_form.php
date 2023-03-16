<?php

use App\Models\DishModel;

function process_add_dish_form(DishModel $dish_model)
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST)) {
        http_response_code(404);
        echo "Accès refusé";
        die();
    } else {
        // Check if dish name has been set
        if (empty($_POST["name"]) || $_POST["name"] == null) {
            $_SESSION["add_dish_error"] = "Nom du plat manquant";
            header('Location: /admin?display=dish');
            die();
        } else {
            // Check if dish description has been set
            if (empty($_POST["description"]) || $_POST["description"] == null) {
                $_SESSION["add_dish_error"] = "Description du plat manquant";
                header('Location: /admin?display=dish');
                die();
            } else {
                // Check if category has been set 
                if (empty($_POST["category"]) || $_POST["category"] == 0) {
                    $_SESSION["add_dish_error"] = "Catégorie du plat manquant";
                    header('Location: /admin?display=dish');
                    die();
                } else {
                    // Check if price has been set
                    if (empty($_POST["price"]) || $_POST["price"] == 0) {
                        $_SESSION["add_dish_error"] = "Prix du plat manquant";
                        header('Location: /admin?display=dish');
                        die();
                    } else {
                        $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
                        $description = htmlspecialchars(strip_tags(trim($_POST["description"])));
                        $category = (int)htmlspecialchars(strip_tags(trim($_POST["category"])));
                        $price = (float)htmlspecialchars(strip_tags(trim($_POST["price"])));
                        // Check if price is correct
                        if ($price <= 0) {
                            $_SESSION["add_dish_error"] = "Prix du plat incorrect";
                            header('Location: /admin?display=dish');
                            die();
                        } else {
                            $dish = $dish_model->setName($name)
                                ->setDescription($description)
                                ->setId_category($category)
                                ->setPrice($price)
                                ->setId_restaurant(1);
                            if (!$dish_model->create($dish)) {
                                $_SESSION["add_dish_error"] = "Impossible de créer le nouveau plat";
                                header('Location: /admin?display=dish');
                                die();
                            } else {
                                $_SESSION["add_dish_success"] = "Nouveau plat créé !";
                                header('Location: /admin?display=dish');
                                die();
                            }
                        }
                    }
                }
            }
        }
    }
}
