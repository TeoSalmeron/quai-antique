<?php

function process_edit_image_form()
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST)) {
        http_response_code(404);
        echo "Accès refusé";
        die();
    } else {
        $new_title = htmlspecialchars(strip_tags(trim($_POST["title"])));
        if (!preg_match("/[A-Za-z]+/", $new_title)) {
            $_SESSION["edit_image_error"] = "Titre incorrect";
            header('Location: /admin?display=image');
            die();
        }
    }
}
