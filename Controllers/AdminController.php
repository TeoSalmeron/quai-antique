<?php

namespace App\Controllers;

use App\Controllers\Controller;

require_once ROOT . '/Controllers/functions/check_rights.php';

class AdminController extends Controller
{

    public function index()
    {
        check_rights();
        echo "<h1>Page en construction</h1>";
    }

    public function verification()
    {
        check_rights();
        $this->render(
            "admin-verification/admin-verification",
            [
                "title" => "Le Quai Antique - Paramétrer votre compte"
            ]
        );
    }

    public function register_admin()
    {
        require_once ROOT . '/Controllers/functions/process_register_admin_form.php';
        process_register_admin_form();
    }
}
