<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\AllergenModel;
use App\Models\ReservationModel;
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
        $schedule = define_schedule();

        // Define opening and closing hours
        $noon_service_start_form = strtotime($restaurant["noon_service_start"]);
        $noon_service_end_form = strtotime(date("H:i:s", strtotime($restaurant["noon_service_end"] . '-1 hour')));
        $noon_times = [];
        for ($i = $noon_service_start_form; $i <= $noon_service_end_form; $i = $i + 15 * 60) {
            $time = date("H:i", $i);
            $noon_times[] = $time;
        }
        $evening_service_start_form = strtotime($restaurant["evening_service_start"]);
        $evening_service_end_form = strtotime(date("H:i:s", strtotime($restaurant["evening_service_end"] . '-1 hour')));
        $evening_times = [];
        for ($i = $evening_service_start_form; $i <= $evening_service_end_form; $i = $i + 15 * 60) {
            $time = date("H:i", $i);
            $evening_times[] = $time;
        }

        // Get today's date
        $today = date("Y-m-d");
        $this->render(
            "reservation/reservation",
            [
                "restaurant" => $restaurant,
                "noon_times" => $noon_times,
                "evening_times" => $evening_times,
                "today" => $today,
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
        $restaurant_model = new RestaurantModel;
        $restaurant = $restaurant_model->find(1);
        $reservation_model = new ReservationModel;
        require_once ROOT . '/Controllers/functions/process_book_table.php';
        process_book_table($restaurant, $reservation_model);
    }

    public function check_day_close()
    {
        $restaurant_model = new RestaurantModel;
        $restaurant = $restaurant_model->find(1);
        echo json_encode($restaurant["day_close"]);
    }
}
