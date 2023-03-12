<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\RestaurantModel;

require_once ROOT . '/Controllers/functions/define_schedule.php';

class SignInController extends Controller
{
    public function index()
    {
        require_once ROOT . '/Controllers/functions/is_user_logged.php';
        is_user_logged();
        $restaurant_model = new RestaurantModel;
        $restaurant = $restaurant_model->find(1);
        $restaurant_model->setNoon_service_start($restaurant["noon_service_start"])
            ->setNoon_service_end($restaurant["noon_service_end"])
            ->setEvening_service_start($restaurant["evening_service_start"])
            ->setEvening_service_end($restaurant["evening_service_end"])
            ->setDay_close($restaurant["day_close"]);
        $schedule = define_schedule($restaurant_model);
        $this->render('sign-in/sign-in', [
            "title" => "Le Quai Antique - Se connecter",
            "schedule" => $schedule
        ], ["scrollreveal", "nav"]);
    }

    public function form()
    {
        require_once ROOT . '/Controllers/functions/process_sign_in_form.php';
        process_sign_in_form();
    }
}
