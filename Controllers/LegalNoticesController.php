<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\RestaurantModel;

class LegalNoticesController extends Controller
{
    public function index()
    {
        require_once ROOT . '/Controllers/functions/define_schedule.php';
        $schedule = define_schedule();
        $this->render(
            'legal-notices/legal-notices',
            [
                "title" => "Le Quai Antique - Mentions légales",
                "schedule" => $schedule
            ],
            [
                "nav",
                "scrollreveal"
            ]
        );
    }
}
