<?php

use App\Models\UsersModel;
use App\Models\CustomerModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ROOT . '/Core/phpmailer/src/Exception.php';
require ROOT . '/Core/phpmailer/src/PHPMailer.php';
require ROOT . '/Core/phpmailer/src/SMTP.php';

function process_forgotten_password()
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST)) {
        http_response_code(404);
        echo "Accès refusé";
    } else {
        // Check email
        if (!isset($_POST["email"]) || empty($_POST["email"]) || $_POST["email"] == "") {
            $_SESSION["forgotten_pw_error"] = "Veuillez renseigner un e-mail";
            header('Location: /forgotten-password');
            die();
        } else {
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $_SESSION["forgotten_pw_error"] = "Format de l'e-mail incorrect";
                header('Location: /forgotten-password');
                die();
            } else {
                // Check if user exists
                $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
                $users_model = new UsersModel;
                $user = $users_model->findBy(["email" => $email])[0];
                // User doesn't exist
                if (!$user) {
                    $_SESSION["forgotten_pw_error"] = "Nous n'avons pas trouvé d'utilisateur correspondant à cet e-mail";
                    header('Location: /forgotten-password');
                    die();
                } else {
                    // Check if user has signed up
                    $customer_model = new CustomerModel;
                    $customer = $customer_model->findBy(["id" => $user["id"]]);
                    // Customer doesn't exist
                    if (!$customer) {
                        $_SESSION["forgotten_pw_error"] = "Nous n'avons pas trouvé d'utilisateur correspondant à cet e-mail";
                        header('Location: /forgotten-password');
                        die();
                    } else {
                        // Customer exists, set password token
                        $customer_model->setPw_token(uniqid());
                        $customer_model->update($user["id"]);
                        if ($_SERVER["HTTP_HOST"] === "quai-antique.local") {
                            $url = "quai-antique.local/forgotten-password/reset_password/" . $customer_model->getPw_token();
                        } else {
                            $url = "https://ecf-quai-antique.fr/forgotten-password/reset_password/" . $customer_model->getPw_token();
                        }
                        $mail = new PHPMailer(true);

                        $mail->isSMTP();
                        $mail->Host = "smtp.gmail.com";
                        $mail->SMTPAuth = true;
                        $mail->Username = "quai.antique.app@gmail.com";
                        $mail->Password = "cqgcxxkygtxlxccu";
                        $mail->SMTPSecure = "ssl";
                        $mail->Port = 465;

                        $mail->setFrom("quai.antique.app@gmail.com");
                        $mail->addAddress($user["email"]);
                        $mail->isHTML(true);
                        $mail->CharSet = "UTF-8";
                        $mail->Subject = "Le Quai Antique - Réinitialisation du mot de passe";
                        $mail->Body = '
                        <html>
                        <head>
                            <title>Réinitialisation du mot de passe</title>
                        </head>
                        <body>
                            <h1>Le Quai Antique - Réinitialisez votre mot de passe</h1>
                            <p>Afin de réinitialiser votre mot de passe, veuillez cliquer sur le lien suivant : <a href="' . $url . '">cliquez ici</a></p>
                            <p>Supprimez bien cet e-mail après réinitialisation du mot de passe</p>
                        </body>
                        </html>';
                        if (!$mail->send()) {
                            $_SESSION["forgotten_pw_error"] = "Impossible d'envoyer l'e-mail de récupération";
                            header('Location: /forgotten-password');
                            die();
                        } else {
                            $_SESSION["forgotten_pw_success"] = "Un e-mail de réinitialisation vous a été envoyé !";
                            header('Location: /forgotten-password');
                            die();
                        }
                    }
                }
            }
        }
    }
}
