<?php

use App\Models\UsersModel;
use App\Models\VisitorModel;
use App\Models\CustomerModel;
use App\Models\ReservationModel;
use App\Models\UsersAllergenModel;
use App\Models\RestaurantModel;

function process_book_table($restaurant, ReservationModel $reservation_model)
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
                        if (!isset($_POST["nb_guest"]) || $_POST["nb_guest"] == null || !is_int((int)$_POST["nb_guest"]) || $_POST["nb_guest"] == 0 || $_POST["nb_guest"] < 0 || $_POST["nb_guest"] > 15) {
                            $_SESSION["reservation_error"] = "Le nombres de couverts n'a pas été défini ou est incorrect";
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
                                // Check if user has not selected closing day
                                $day_of_week = (int)date("w", strtotime($reservation_date));
                                $day_close = (int)$restaurant["day_close"];
                                if($day_close == 7) {
                                    $day_close = 0;
                                }
                                if($day_close === $day_of_week) {
                                    $_SESSION["reservation_error"] = "Le restaurant est fermé ce jour-là";
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
    
                                            $first_name = htmlspecialchars(strip_tags(trim($_POST["first_name"])));
                                            $last_name = htmlspecialchars(strip_tags(trim($_POST["last_name"])));
                                            $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
                                            $phone = htmlspecialchars(strip_tags(trim($_POST["phone"])));
                                            $nb_guest = htmlspecialchars(strip_tags(trim($_POST["nb_guest"])));
                                            // Check if user exists
                                            $users_model = new UsersModel;
                                            $user = $users_model->findBy(["email" => $email]);
                                            if (!$user) {
                                                // If user doesn't exist, create new User
                                                $users_model->setId(uniqid("", true))
                                                    ->setEmail($email)
                                                    ->setFirst_name($first_name)
                                                    ->setLast_name($last_name)
                                                    ->setPhone($phone)
                                                    ->setId_restaurant(1);
                                            } else {
                                                $user = $user[0];
                                            }
    
                                            // Define booking slot
                                            $reservation_model = new ReservationModel;
                                            $restaurant_model = new RestaurantModel;
                                            $restaurant = $restaurant_model->find(1);
                                            if ($slot === "noon") {
                                                $service_start = $restaurant["noon_service_start"];
                                                $service_end = $restaurant["noon_service_end"];
                                                $reservation_time = htmlspecialchars(strip_tags(trim($_POST["noon_time"])));
                                            } else {
                                                $service_start = $restaurant["evening_service_start"];
                                                $service_end = $restaurant["evening_service_end"];
                                                $reservation_time = htmlspecialchars(strip_tags(trim($_POST["evening_time"])));
                                            }
    
                                            if (!empty($user)) {
                                                $id = $user["id"];
                                                $user_exists = true;
                                            } else {
                                                $id = $users_model->getId();
                                                $user_exists = false;
                                            }
    
                                            // Check if user has already booked
                                            if (!$reservation_model->has_user_booked($id, $reservation_date, $service_start, $service_end)) {
                                                $service_nb_guest = $reservation_model->service_total_guest($reservation_date, $service_start, $service_end);
                                                if (($service_nb_guest + $nb_guest) < $restaurant["max_capacity"]) {
                                                    $users_allergen_model = new UsersAllergenModel;
                                                    // Create visitor if user doesn't exist in DB and add allergies
                                                    if (!$user_exists) {
                                                        $users_model->create();
                                                        $visitor_model = new VisitorModel;
                                                        $visitor_model->setId($id);
                                                        $visitor_model->create();
                                                        // If visitor has allergies
                                                        if ($has_allergies == 1) {
                                                            foreach ($_POST["allergies"] as $a) {
                                                                $users_allergen_model->setAllergen_id($a)
                                                                    ->setUser_id($id);
                                                                $users_allergen_model->create();
                                                            }
                                                        }
                                                    } else {
                                                        // Check if subscribed user has added allergies since last time
                                                        $users_allergen = $users_allergen_model->findBy(["user_id"]);
                                                        $allergens = [];
                                                        foreach ($users_allergen as $k) {
                                                            $allergens[] = $k["allergen_id"];
                                                        }
                                                        foreach ($_POST["allergies"] as $a) {
                                                            if (!in_array($a, $allergens)) {
                                                                $users_allergen_model->setAllergen_id($a)
                                                                    ->setUser_id($id);
                                                                $users_allergen_model->create();
                                                            }
                                                        }
                                                    }
    
                                                    // Book reservation
                                                    $reservation_model->setRes_date($reservation_date)
                                                        ->setRes_time($reservation_time)
                                                        ->setTotal_guest($nb_guest)
                                                        ->setBooked_by($id);
                                                    $reservation_model->create();
                                                    $_SESSION["reservation_success"] = "Votre réservation a bien été effectuée";
                                                    header('Location: /book-table');
                                                    die();
                                                } else {
                                                    // If service is full => error
                                                    $_SESSION["reservation_error"] = "Le service est complet";
                                                    header('Location: /book-table');
                                                    die();
                                                }
                                            } else {
                                                // If user has already booked => error
                                                $_SESSION["reservation_error"] = "Vous avez déjà réservé une table à ce créneau";
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
