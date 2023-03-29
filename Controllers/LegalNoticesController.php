<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\RestaurantModel;

class LegalNoticesController extends Controller
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
        $this->render('legal-notices/legal-notices', 
        [
            "title" => "Le Quai Antique - Mentions légales",
            "schedule" => $schedule
        ], 
        [
            "nav",
            "scrollreveal"
        ]);
    }
}