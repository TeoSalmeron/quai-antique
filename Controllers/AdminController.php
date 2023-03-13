<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\DishModel;
use App\Models\ImageModel;
use App\Models\MenuModel;
use App\Models\RestaurantModel;

require_once ROOT . '/Controllers/functions/check_rights.php';
require_once ROOT . '/Controllers/functions/define_day_close.php';

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
        $this->render("admin-panel/admin-panel", [
            "title" => "Le Quai Antique - Panneau d'administation",
            "restaurant" => $restaurant,
            "day_close" => define_day_close($restaurant["day_close"]),
            "images" => $images,
            "dishes" => $dishes,
            "menus" => $menus,
            "admin" => $_SESSION["admin"]
        ], ["admin-panel"]);
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
        check_rights();
        require_once ROOT . '/Controllers/functions/process_register_admin_form.php';
        process_register_admin_form();
    }

    public function process_edit_restaurant_info_form()
    {
        check_rights();
        require_once ROOT . '/Controllers/functions/process_edit_restaurant_info_form.php';
        $restaurant_model = new RestaurantModel;
        process_edit_restaurant_info_form($restaurant_model);
    }

    public function process_add_image_form()
    {
        check_rights();
        $image_model = new ImageModel;
        require_once ROOT . '/Controllers/functions/process_add_image_form.php';
        process_add_image_form("image", $image_model);
    }

    public function process_delete_image_form()
    {
        check_rights();
        $image_model = new ImageModel;
        require_once ROOT . '/Controllers/functions/process_delete_image_form.php';
        process_delete_image_form($image_model);
    }

    public function process_edit_image_form()
    {
        check_rights();
        $image_model = new ImageModel;
        require_once ROOT . '/Controllers/functions/process_edit_image_form.php';
        process_edit_image_form($image_model);
    }

    public function process_add_menu_form() {
        check_rights();
        $menu_model = new MenuModel;
        require_once ROOT . '/Controllers/functions/process_add_menu_form.php';
        process_add_menu_form($menu_model);
    }
}
