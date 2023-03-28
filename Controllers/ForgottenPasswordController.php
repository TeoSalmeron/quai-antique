<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\RestaurantModel;

class ForgottenPasswordController extends Controller
{
    public function index()
    {
        // Define footer schedule
        require_once ROOT . '/Controllers/functions/define_schedule.php';
        $restaurant_model = new RestaurantModel;
        $restaurant = $restaurant_model->find(1);
        $restaurant_model->setNoon_service_start($restaurant["noon_service_start"])
            ->setNoon_service_end($restaurant["noon_service_end"])
            ->setEvening_service_start($restaurant["evening_service_start"])
            ->setEvening_service_end($restaurant["evening_service_end"])
            ->setDay_close($restaurant["day_close"]);
        $schedule = define_schedule($restaurant_model);

        // Render page
        $this->render("forgotten-pw/forgotten-pw", [
            "schedule" => $schedule,
            "title" => "Le Quai Antique - Mot de passe oublié"
        ], ["nav", "scrollreveal"]);
    }

    public function process_forgotten_password()
    {
        require_once ROOT . '/Controllers/functions/process_forgotten_password.php';
        process_forgotten_password();
    }

    public function reset_password($params)
    {
        // Define footer schedule
        require_once ROOT . '/Controllers/functions/define_schedule.php';
        $restaurant_model = new RestaurantModel;
        $restaurant = $restaurant_model->find(1);
        $restaurant_model->setNoon_service_start($restaurant["noon_service_start"])
            ->setNoon_service_end($restaurant["noon_service_end"])
            ->setEvening_service_start($restaurant["evening_service_start"])
            ->setEvening_service_end($restaurant["evening_service_end"])
            ->setDay_close($restaurant["day_close"]);
        $schedule = define_schedule($restaurant_model);

        // Render page
        $this->render("reset-password/reset-password", [
            "title" => "Le Quai Antique - Réinitialisation du mot de passe",
            "schedule" => $schedule
        ], ["nav", "scrollreveal", "reset-pw"]);
    }

    public function check_token()
    {
        require_once ROOT . '/Controllers/functions/check_token.php';
        $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
        $token = htmlspecialchars(strip_tags(trim($_POST["token"])));
        echo json_encode(check_token($email, $token));
    }

    public function change_password()
    {
        require_once ROOT . '/Controllers/functions/change_password.php';
        $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
        $password = $_POST["password"];
        $token = htmlspecialchars(strip_tags(trim($_POST["token"])));
        echo json_encode(change_password($email, $password, $token));
    }
}
