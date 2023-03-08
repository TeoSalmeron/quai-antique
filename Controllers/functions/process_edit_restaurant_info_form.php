<?php

use App\Models\RestaurantModel;

function process_edit_restaurant_info_form(RestaurantModel $restaurant_model)
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        http_response_code(404);
        echo "Accès refusé";
        die();
    } else {
        // If form is empty
        if (empty($_POST)) {
            $_SESSION["error"] = "Rien à modifier";
            header('Location: /admin');
            die();
        } else {
            // Noon service start
            if (isset($_POST["noon_service_start"]) && !empty($_POST["noon_service_start"])) {
                $time = htmlspecialchars(strip_tags(trim($_POST["noon_service_start"])));
                $time .= ":00";
                // Check if format is correct
                if (!preg_match("/^[0-9]{2}\:[0-9]{2}+\:[0-9]{2}+$/", $time)) {
                    $_SESSION["noon_service_start_error"] = "Format incorrect";
                    header('Location: /admin');
                    die();
                } else {
                    $restaurant_model->setNoon_service_start($time);
                    if (!$restaurant_model->update(1)) {
                        $_SESSION["error"] = "Impossible de mettre à jour les données";
                        header('Location: /admin');
                        die();
                    } else {
                        header('Location: /admin');
                        die();
                    }
                }
            }

            // Noon service end
            if (isset($_POST["noon_service_end"]) && !empty($_POST["noon_service_end"])) {
                $time = htmlspecialchars(strip_tags(trim($_POST["noon_service_end"])));
                $time .= ":00";
                // Check if format is correct
                if (!preg_match("/^[0-9]{2}\:[0-9]{2}+\:[0-9]{2}+$/", $time)) {
                    $_SESSION["noon_service_end_error"] = "Format incorrect";
                    header('Location: /admin');
                    die();
                } else {
                    $restaurant_model->setNoon_service_end($time);
                    if (!$restaurant_model->update(1)) {
                        $_SESSION["error"] = "Impossible de mettre à jour les données";
                        header('Location: /admin');
                        die();
                    } else {
                        header('Location: /admin');
                        die();
                    }
                }
            }

            // Evening service start
            if (isset($_POST["evening_service_start"]) && !empty($_POST["evening_service_start"])) {
                $time = htmlspecialchars(strip_tags(trim($_POST["evening_service_start"])));
                $time .= ":00";
                // Check if format is correct
                if (!preg_match("/^[0-9]{2}\:[0-9]{2}+\:[0-9]{2}+$/", $time)) {
                    $_SESSION["evening_service_start_error"] = "Format incorrect";
                    header('Location: /admin');
                    die();
                } else {
                    $restaurant_model->setEvening_service_start($time);
                    if (!$restaurant_model->update(1)) {
                        $_SESSION["error"] = "Impossible de mettre à jour les données";
                        header('Location: /admin');
                        die();
                    } else {
                        header('Location: /admin');
                        die();
                    }
                }
            }

            // Evening service end
            if (isset($_POST["evening_service_end"]) && !empty($_POST["evening_service_end"])) {
                $time = htmlspecialchars(strip_tags(trim($_POST["evening_service_end"])));
                $time .= ":00";
                // Check if format is correct
                if (!preg_match("/^[0-9]{2}\:[0-9]{2}+\:[0-9]{2}+$/", $time)) {
                    $_SESSION["evening_service_end_error"] = "Format incorrect";
                    header('Location: /admin');
                    die();
                } else {
                    $restaurant_model->setEvening_service_end($time);
                    if (!$restaurant_model->update(1)) {
                        $_SESSION["error"] = "Impossible de mettre à jour les données";
                        header('Location: /admin');
                        die();
                    } else {
                        header('Location: /admin');
                        die();
                    }
                }
            }

            // Max capacity
            if (isset($_POST["max_capacity"]) && !empty($_POST["max_capacity"])) {
                $max_capacity = htmlspecialchars(strip_tags(trim($_POST["max_capacity"])));
                if (!preg_match("/^\d{0,3}+$/", $max_capacity)) {
                    $_SESSION["max_capacity_error"] = "Format incorrect";
                    header('Location: /admin');
                    die();
                } else {
                    $restaurant_model->setMax_capacity($max_capacity);
                    if (!$restaurant_model->update(1)) {
                        $_SESSION["error"] = "Impossible de mettre à jour les données";
                        header('Location: /admin');
                        die();
                    } else {
                        header('Location: /admin');
                        die();
                    }
                }
            }

            // Day close
            if (isset($_POST["day_close"]) && $_POST["day_close"] > 0 && $_POST["day_close"] < 8) {
                $day_close = htmlspecialchars(strip_tags(trim($_POST["day_close"])));
                if (!preg_match("/^[0-9]{1}+$/", $day_close)) {
                    $_SESSION["day_close_error"] = "Format incorrect";
                    header('Location: /admin');
                    die();
                } else {
                    $restaurant_model->setDay_close($day_close);
                    if (!$restaurant_model->update(1)) {
                        $_SESSION["error"] = "Impossible de mettre à jour les données";
                        header('Location: /admin');
                        die();
                    } else {
                        header('Location: /admin');
                        die();
                    }
                }
            }

            header('Location: /admin');
            die();
        }
    }
}
