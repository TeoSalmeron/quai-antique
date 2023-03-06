<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\AllergenModel;

class SignUpController extends Controller
{
    public function index()
    {
        $model = new AllergenModel();
        $allergens = $model->findAll();

        $this->render('sign-up/sign-up', [
            "title" => "Le Quai Antique - Créer un compte",
            "allergens" => $allergens
        ], ["scrollreveal", "nav", "sign-up"]);
    }

    public function form()
    {
        require_once ROOT . '/Controllers/functions/process_sign_up_form.php';
        process_sign_up_form();
    }
}
