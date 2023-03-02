<?php

namespace App\Controllers;

abstract class Controller
{
    /**
     * Display a view
     * 
     * @param string $file
     * @param array $data
     */
    public function render(string $file, array $data = [])
    {
        // Get datas and extract them into variables
        extract($data);

        // Start output buffer
        ob_start();

        require_once ROOT . '/Views/' . $file . '.php';

        $content = ob_get_clean();

        // End output buffer

        // Generate template
        require_once ROOT . '/Views/default.php';
    }
}
