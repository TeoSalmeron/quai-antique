<?php

namespace App\Controllers;

use App\Models\RestaurantModel;

class DefaultController extends Controller
{
    public function index()
    {

        $model = new RestaurantModel;

        $restaurant = $model->find(1);

        $this->render('home/home', [
            "title" => "Le Quai Antique",
            "restaurant" => $restaurant
        ]);
    }
}
