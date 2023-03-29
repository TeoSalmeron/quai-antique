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
        $schedule = define_schedule();

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
