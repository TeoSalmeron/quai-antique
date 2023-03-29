<?php

namespace App\Controllers;

use App\Models\AllergenModel;
use App\Controllers\Controller;
use App\Models\RestaurantModel;


class SignUpController extends Controller
{
    public function index()
    {
        require_once ROOT . '/Controllers/functions/define_schedule.php';
        $schedule = define_schedule();
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
