<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\RestaurantModel;

require_once ROOT . '/Controllers/functions/define_schedule.php';

class SignInController extends Controller
{
    public function index()
    {
        require_once ROOT . '/Controllers/functions/redirect_to_home.php';
        redirect_to_home();
        $schedule = define_schedule();
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
