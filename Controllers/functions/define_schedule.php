<?php

use App\Models\RestaurantModel;

function define_schedule(RestaurantModel $restaurant_model) {

    $days = [
        "lundi" => 1,
        "mardi" => 2,
        "mercredi" => 3,
        "jeudi" => 4,
        "vendredi" => 5,
        "samedi" => 6,
        "dimanche" => 7
    ];
    $schedule = "";
    foreach($days as $key => $value) {
        if($value === $restaurant_model->getDay_close()) {
            $schedule .= '<li>' . ucfirst($key) . ' : fermé </li><br>'; 
        } else {
            $schedule .= '<li>' . ucfirst($key) . ' : ' . substr($restaurant_model->getNoon_service_start(), 0, 5) . ' - ' . substr($restaurant_model->getNoon_service_end(),0,5) . ' | ' . substr($restaurant_model->getEvening_service_start(),0,5) . ' - ' . substr($restaurant_model->getEvening_service_end(),0,5) . '</li><br>';
        }
    }
    return $schedule;
}