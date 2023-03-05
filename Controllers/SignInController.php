<?php

namespace App\Controllers;

use App\Controllers\Controller;

class SignInController extends Controller {
    public function index() {
        $this->render('sign-in/sign-in', [
            "title" => "Le Quai Antique - Se connecter"
        ]);
    }

    public function form() {
        echo "Hey";
    }
}