<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\DishModel;
use App\Models\ImageModel;
use App\Models\MenuModel;
use App\Models\RestaurantModel;

require_once ROOT . '/Controllers/functions/check_rights.php';

class AdminController extends Controller
{

    public function index()
    {
        check_rights();
        $restaurant_model = new RestaurantModel;
        $restaurant = $restaurant_model->find(1);
        $image_model = new ImageModel;
        $images = $image_model->findAll();
        $dish_model = new DishModel;
        $dishes = $dish_model->findAll();
        $menu_model = new MenuModel;
        $menus = $menu_model->findAll();
        $this->render("admin/admin", [
            "title" => "Le Quai Antique - Panneau d'administation",
            "restaurant" => $restaurant,
            "images" => $images,
            "dishes" => $dishes,
            "menus" => $menus
        ]);
    }

    public function verification()
    {
        check_rights();
        $this->render(
            "admin-verification/admin-verification",
            [
                "title" => "Le Quai Antique - Paramétrer votre compte"
            ]
        );
    }

    public function register_admin()
    {
        require_once ROOT . '/Controllers/functions/process_register_admin_form.php';
        process_register_admin_form();
    }
}
