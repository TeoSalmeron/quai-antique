<?php

namespace App\Controllers;

use App\Controllers\Controller;

class AdministrationController extends Controller {

    public function validate_admin() {
       $this->render("administrator-verification/administrator-verification",
    [
        "title" => "Le Quai Antique - Administration"
    ]);
    }

}