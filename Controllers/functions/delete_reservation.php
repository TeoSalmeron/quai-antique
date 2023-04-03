<?php

use App\Models\ReservationModel;

function delete_reservation()
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        http_response_code(404);
        die();
    } else {
        $reservation_id = (int)htmlspecialchars(strip_tags(trim($_POST["reservation_id"])));
        if (empty($reservation_id) || !is_int($reservation_id)) {
            http_response_code(404);
            die();
        } else {
            $reservation_model = new ReservationModel;
            $reservation_model->delete($reservation_id);
            header('Location: /profile');
            die();
        }
    }
}
