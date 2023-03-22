<?php

use App\Models\ReservationModel;

function process_book_table($restaurant, ReservationModel $reservation_model, $noon_service_start, $noon_service_end, $evening_service_start, $evening_service_end)
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST)) {
        http_response_code(404);
        echo "Accès refusé";
        die();
    } else {
        // Check if first name is defined
        if (!isset($_POST["first_name"]) || $_POST["first_name"] == null || !preg_match('/^[\p{L}\s]+-?[\p{L}\s]*$/u', $_POST["first_name"])) {
            $_SESSION["reservation_error"] = "Le prénom n'a pas été défini ou est au mauvais format";
            header('Location: /book-table');
            die();
        } else {
            // Check if last name is defined
            if (!isset($_POST["last_name"]) || $_POST["last_name"] == null || !preg_match('/^[\p{L}\s]+-?[\p{L}\s]*$/u', $_POST["last_name"])) {
                $_SESSION["reservation_error"] = "Le nom de famille n'a pas été défini ou est au mauvais format";
                header('Location: /book-table');
                die();
            } else {
                // Check if email is defined
                if (!isset($_POST["email"]) || $_POST["email"] == null || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $_SESSION["reservation_error"] = "L'email n'a pas été défini ou est au mauvais format";
                    header('Location: /book-table');
                    die();
                } else {
                    // Check if phone number is defined
                    if (!isset($_POST["phone"]) || $_POST["phone"] == null || !preg_match("/\d{10}+/", $_POST["phone"])) {
                        $_SESSION["reservation_error"] = "Le numéro de téléphone n'a pas été défini ou est au mauvais format";
                        header('Location: /book-table');
                        die();
                    } else {
                        // Check number of guests
                        if (!isset($_POST["nb_guest"]) || $_POST["nb_guest"] == null || !is_int((int)$_POST["nb_guest"])) {
                            $_SESSION["reservation_error"] = "Le nombres de couverts n'a pas été défini ou est au mauvais format";
                            header('Location: /book-table');
                            die();
                        } else {
                            // Check reservation date
                            $today = date_create("now");
                            $today = date_format($today, "Y/m/d");
                            $reservation_date = htmlspecialchars(strip_tags(trim($_POST["reservation_date"])));
                            $reservation_date = str_replace("-", "/", $reservation_date);
                            if ($reservation_date < $today) {
                                $_SESSION["reservation_error"] = "La date de réservation ne peut être inférieure à aujourd'hui";
                                header('Location: /book-table');
                                die();
                            } else {
                                // Check reservation time
                                if (!isset($_POST["prompt_service"]) || $_POST["prompt_service"] == null) {
                                    $_SESSION["reservation_error"] = "Veuillez choisir une horaire de réservation";
                                    header('Location: /book-table');
                                    die();
                                } else {
                                    $slot = $_POST["prompt_service"];
                                    // Check allergies
                                    if (!isset($_POST["prompt_allergies"]) || $_POST["prompt_allergies"] == null) {
                                        $_SESSION["reservation_error"] = "Veuillez renseigner si vous avez oui ou non des allergies";
                                        header('Location: /book-table');
                                        die();
                                    } else {
                                        $has_allergies = $_POST["prompt_allergies"];
                                        if ($has_allergies == 1) {
                                            $allergies = $_POST["allergies"];
                                        }
                                        // Check if user is connected
                                        if (!isset($_SESSION["auth"]) || $_SESSION["auth"] == false) {
                                            // User is not connected
                                            // ----->
                                        } else {
                                            // If user is connected, check if user has already booked a table at this slot
                                            if ($slot === "evening") {
                                                $has_user_booked = $reservation_model->has_user_booked($_SESSION["customer_id"], $reservation_date, $evening_service_start, $evening_service_end);
                                                if ($has_user_booked !== false) {
                                                    $_SESSION["reservation_error"] = "Vous avez déjà réservé une table à ce créneau";
                                                    header('Location: /book-table');
                                                    die();
                                                } else {
                                                    // Check if there are still seats available
                                                    $is_service_full = $reservation_model->is_service_full($restaurant["max_capacity"], $_POST["nb_guest"], $reservation_date, $evening_service_start, $evening_service_end);
                                                    if ($is_service_full) {
                                                        // If service is full
                                                        $_SESSION["reservation_error"] = "Le service est déjà complet pour ce créneau";
                                                        header('Location: /book-table');
                                                        die();
                                                    } else {
                                                        $reservation_model->setRes_date($reservation_date)
                                                            ->setRes_time($_POST["evening_time"])
                                                            ->setTotal_guest($_POST["nb_guest"])
                                                            ->setBooked_by($_SESSION["customer_id"]);
                                                        $reservation_model->create();
                                                        $_SESSION["reservation_success"] = "Réservation réussie !";
                                                        header('Location: /book-table');
                                                        die();
                                                    }
                                                }
                                            } else {
                                                $has_user_booked = $reservation_model->has_user_booked($_SESSION["customer_id"], $reservation_date, $noon_service_start, $noon_service_end);
                                                if ($has_user_booked !== false) {
                                                    $_SESSION["reservation_error"] = "Vous avez déjà réservé une table à ce créneau";
                                                    header('Location: /book-table');
                                                    die();
                                                } else {
                                                    // Check if there are still seats available
                                                    $is_service_full = $reservation_model->is_service_full($restaurant["max_capacity"], $_POST["nb_guest"], $reservation_date, $noon_service_start, $noon_service_end);
                                                    if ($is_service_full) {
                                                        // If service is full
                                                        $_SESSION["reservation_error"] = "Le service est déjà complet pour ce créneau";
                                                        header('Location: /book-table');
                                                        die();
                                                    } else {
                                                        $reservation_model->setRes_date($reservation_date)
                                                            ->setRes_time($_POST["evening_time"])
                                                            ->setTotal_guest($_POST["nb_guest"])
                                                            ->setBooked_by($_SESSION["customer_id"]);
                                                        $reservation_model->create();
                                                        $_SESSION["reservation_success"] = "Réservation réussie !";
                                                        header('Location: /book-table');
                                                        die();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
