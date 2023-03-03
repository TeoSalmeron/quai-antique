<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\AllergenModel;

class CreerUnCompteController extends Controller
{
    public function index()
    {
        $model = new AllergenModel();
        $allergens = $model->findAll();

        $this->render('create-account/create-account', [
            "title" => "Le Quai Antique - Créer un compte",
            "allergens" => $allergens
        ]);
    }
}
