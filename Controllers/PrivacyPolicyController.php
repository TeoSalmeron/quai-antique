<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\RestaurantModel;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        require_once ROOT . '/Controllers/functions/define_schedule.php';
        $schedule = define_schedule();
        $this->render(
            "privacy-policy/privacy-policy",
            [
                "title" => "Le Quai Antique - Politique de confidentialité",
                "schedule" => $schedule
            ],
            [
                "nav",
                "scrollreveal"
            ]
        );
    }
}
