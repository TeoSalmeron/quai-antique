<?php

// Navbar
require_once ROOT . '/Views/templates/nav.php';

?>

<header id="homeHeader">
    <h1 id="homeMainTitle">
        <?= $restaurant["name"] ?>
    </h1>
    <p id="homeP1">
        Le chef Arnaud Michant et toute son équipe vous accueille dans son restaurant à <strong>Chambéry</strong> afin de vous faire découvrir les saveurs traditionnelles de la Savoie. Venez en famille ou entre amis partager une fondue Savoyarde ou délectez vous d'un bon vin local autour d'une planche de fromage.
    </p>
    <a href="/reservation" id="homeLink1">
        Faire une réservation
    </a>
</header>