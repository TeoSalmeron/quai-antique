<?php

// Navbar
require_once ROOT . '/Views/templates/nav.php';

?>

<header id="homeHeader">
    <h1>
        <?= $restaurant["name"] ?>
    </h1>
    <p>
        Le chef Arnaud Michant et toute son équipe vous accueille dans son restaurant à <strong>Chambéry</strong> afin de vous faire découvrir les saveurs traditionnelles de la Savoie. Venez en famille ou entre amis partager une fondue Savoyarde ou délectez vous d'un bon vin local autour d'une planche de fromage.
    </p>
    <a href="/reservation">
        Faire une réservation
    </a>
</header>