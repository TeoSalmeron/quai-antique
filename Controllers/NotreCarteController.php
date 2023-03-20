<?php

namespace App\Controllers;

use App\Models\DishModel;
use App\Models\MenuModel;
use App\Controllers\Controller;
use App\Models\RestaurantModel;

class NotreCarteController extends Controller
{
    public function index()
    {
        require_once ROOT . '/Controllers/functions/define_schedule.php';
        $restaurant_model = new RestaurantModel;
        $restaurant = $restaurant_model->find(1);
        $restaurant_model->setNoon_service_start($restaurant["noon_service_start"])
            ->setNoon_service_end($restaurant["noon_service_end"])
            ->setEvening_service_start($restaurant["evening_service_start"])
            ->setEvening_service_end($restaurant["evening_service_end"])
            ->setDay_close($restaurant["day_close"]);
        $schedule = define_schedule($restaurant_model);
        $menu_model = new MenuModel;
        $menus = $menu_model->findAll();
        $dish_model = new DishModel;
        $starters = $dish_model->findBy(["id_category" => 1]);
        $main_meals = $dish_model->findBy(["id_category" => 2]);
        $desserts = $dish_model->findBy(["id_category" => 3]);
        $this->render(
            "menu/menu",
            [
                "title" => "Le Quai Antique - Notre carte",
                "restaurant" => $restaurant,
                "menus" => $menus,
                "starters" => $starters,
                "main_meals" => $main_meals,
                "desserts" => $desserts,
                "schedule" => $schedule
            ],
            ["nav", "scrollreveal"]
        );
    }
}
