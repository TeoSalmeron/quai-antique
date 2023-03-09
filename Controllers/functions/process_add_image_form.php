<?php

use App\Models\ImageModel;

function process_add_image_form(string $file, ImageModel $image_model)
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        http_response_code(404);
        echo "Accès refusé";
    } else {
        // If no file has been sent
        if (!isset($_FILES[$file]) || empty($_FILES[$file])) {
        } else {
            // If image title is not set
            if (!isset($_POST["title"]) || empty($_POST["title"]) || $_POST["title"] === "") {
                $_SESSION["image_error"] = "Le titre de l'image n'a pas été défini";
                header('Location: /admin');
                die();
            } else {
                // Define image datas
                $tmpName = $_FILES[$file]['tmp_name'];
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $error = $_FILES[$file]['error'];
                $title = htmlspecialchars(strip_tags(trim($_POST["title"])));

                $tabExtension = explode(".", $name);
                $extension = strtolower(end($tabExtension));
                $extensions = ["jpg", "jpeg", "png"];

                $maxSize = 6000000;
                // Check if image exists
                $imageExists = $image_model->findBy(["name" => $name])[0];
                if (!is_null($imageExists)) {
                    $_SESSION["image_error"] = "Cette image existe déjà";
                    header('Location: /admin');
                    die();
                } else {
                    // Check extensions
                    if (!in_array($extension, $extensions)) {
                        $_SESSION["image_error"] = "Ce type ne fichier n'est pas autorisé";
                        header('Location: /admin');
                        die();
                    } else {
                        // Check file size
                        if ($maxSize <= $size) {
                            $_SESSION["image_error"] = "Le fichier est trop lourd";
                            header('Location: /admin');
                            die();
                        } else {
                            // Check if error while upload
                            if ($error !== 0) {
                                $_SESSION["image_error"] = "Le fichier est trop lourd";
                                header('Location: /admin');
                                die();
                            } else {
                                // Insert image into DB
                                $image_model->setId_restaurant(1)
                                    ->setTitle($title)
                                    ->setName($name);
                                $image_model->create();
                                move_uploaded_file($tmpName, ROOT . '/www/img/' . $name);
                                $_SESSION["image_success"] = "Image bien envoyée !";
                                header('Location: /admin');
                                die();
                            }
                        }
                    }
                }
            }
        }
    }
}
