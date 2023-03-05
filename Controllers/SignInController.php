<?php

namespace App\Controllers;

use App\Controllers\Controller;

class SignInController extends Controller
{
    public function index()
    {
        $this->render('sign-in/sign-in', [
            "title" => "Le Quai Antique - Se connecter"
        ]);
    }

    public function form()
    {
        require_once ROOT . '/Controllers/functions/process_sign_in_form.php';
        process_sign_in_form();
    }
}
