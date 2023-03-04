<?php

namespace App\Controllers;

use App\Models\AllergenModel;
use App\Controllers\Controller;

class SignUpController extends Controller
{
    public function index()
    {
        $model = new AllergenModel();
        $allergens = $model->findAll();

        $this->render('sign-up/sign-up', [
            "title" => "Le Quai Antique - Créer un compte",
            "allergens" => $allergens
        ]);
    }

    public function form()
    {
        require_once ROOT . '/Controllers/functions/process_sign_up_form.php';
        process_sign_up_form();
    }
}
