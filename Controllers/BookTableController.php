<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\AllergenModel;
use App\Models\RestaurantModel;

class BookTableController extends Controller
{
    public function index()
    {
        require_once ROOT . '/Controllers/functions/define_schedule.php';
        $restaurant_model = new RestaurantModel;
        $allergen_model = new AllergenModel;
        $allergens = $allergen_model->findAll();
        $restaurant = $restaurant_model->find(1);
        $restaurant_model->setNoon_service_start($restaurant["noon_service_start"])
            ->setNoon_service_end($restaurant["noon_service_end"])
            ->setEvening_service_start($restaurant["evening_service_start"])
            ->setEvening_service_end($restaurant["evening_service_end"])
            ->setDay_close($restaurant["day_close"]);
        $schedule = define_schedule($restaurant_model);
        $noon_service_end_form = date("H:i:s", strtotime($restaurant["noon_service_end"] . '-1 hour'));
        $evening_service_end_form = date("H:i:s", strtotime($restaurant["evening_service_end"] . '-1 hour'));
        $this->render(
            "reservation/reservation",
            [
                "restaurant" => $restaurant,
                "noon_service_end_form" => $noon_service_end_form,
                "evening_service_end_form" => $evening_service_end_form,
                "allergens" => $allergens,
                "schedule" => $schedule,
                "title" => "Le Quai Antique - Réserver une table"
            ],
            ["nav", "scrollreveal", "reservation"]
        );
    }

    public function reservation_user_exists()
    {
        require_once ROOT . '/Controllers/functions/user_exists.php';
        user_exists();
    }

    public function process_book_table()
    {
        var_dump($_POST);
    }
}
