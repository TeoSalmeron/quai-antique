<?php

use App\Models\ImageModel;

function process_delete_image_form(ImageModel $image_model)
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST)) {
        http_response_code(404);
        echo "Accès refusé";
    } else {
        $id = (int)$_POST["delete_image"][0];
        $name = htmlspecialchars(strip_tags(addslashes(trim($_POST["delete_image"][1]))));
        unlink(ROOT . '/www/img/' . $name);
        $image_model->delete($id);
        header('Location: /admin?display=image');
        die();
    }
}
