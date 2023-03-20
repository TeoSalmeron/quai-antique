<?php

namespace App\Controllers;

use App\Models\ImageModel;
use App\Models\RestaurantModel;

require_once ROOT . '/Controllers/functions/define_schedule.php';

class DefaultController extends Controller
{
    public function index()
    {
        // Restaurant informations

        $restaurant_model = new RestaurantModel;
        $restaurant = $restaurant_model->find(1);
        $restaurant_model->setNoon_service_start($restaurant["noon_service_start"])
            ->setNoon_service_end($restaurant["noon_service_end"])
            ->setEvening_service_start($restaurant["evening_service_start"])
            ->setEvening_service_end($restaurant["evening_service_end"])
            ->setDay_close($restaurant["day_close"]);
        $schedule = define_schedule($restaurant_model);

        // Images
        $image_model = new ImageModel;
        $images = $image_model->findAll();

        $this->render('home/home', [
            "title" => "Le Quai Antique",
            "restaurant" => $restaurant,
            "images" => $images,
            "schedule" => $schedule
        ], ["scrollreveal", "nav"]);
    }
}
