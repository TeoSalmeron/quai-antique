<?php

namespace App\Controllers;

use App\Models\AllergenModel;
use App\Controllers\Controller;
use App\Models\RestaurantModel;

require_once ROOT . '/Controllers/functions/define_schedule.php';

class SignUpController extends Controller
{
    public function index()
    {
        $restaurant_model = new RestaurantModel;
        $restaurant = $restaurant_model->find(1);
        $restaurant_model->setNoon_service_start($restaurant["noon_service_start"])
            ->setNoon_service_end($restaurant["noon_service_end"])
            ->setEvening_service_start($restaurant["evening_service_start"])
            ->setEvening_service_end($restaurant["evening_service_end"])
            ->setDay_close($restaurant["day_close"]);
        $schedule = define_schedule($restaurant_model);
        $model = new AllergenModel();
        $allergens = $model->findAll();

        $this->render('sign-up/sign-up', [
            "title" => "Le Quai Antique - Créer un compte",
            "allergens" => $allergens,
            "schedule" => $schedule
        ], ["scrollreveal", "nav", "sign-up"]);
    }

    public function form()
    {
        require_once ROOT . '/Controllers/functions/process_sign_up_form.php';
        process_sign_up_form();
    }
}
