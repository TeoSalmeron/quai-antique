<?php

namespace App\Controllers;

use App\Models\ImageModel;
use App\Models\RestaurantModel;

class DefaultController extends Controller
{
    public function index()
    {

        $restaurant_model = new RestaurantModel;
        $restaurant = $restaurant_model->find(1);

        $image_model = new ImageModel;
        $images = $image_model->findAll();

        $this->render('home/home', [
            "title" => "Le Quai Antique",
            "restaurant" => $restaurant,
            "images" => $images
        ], ["scrollreveal", "nav"]);
    }
}
