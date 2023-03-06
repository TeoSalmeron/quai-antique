<?php

require_once ROOT . '/Views/templates/nav.php';

?>

<header id="homeHeader">
    <h1 id="homeMainTitle" class="sequenced">
        <?= $restaurant["name"] ?>
    </h1>
    <p id="homeP1" class="sequenced">
        Le chef Arnaud Michant et toute son équipe vous accueille dans son restaurant à <strong>Chambéry</strong> afin de vous faire découvrir les saveurs traditionnelles de la Savoie. Venez en famille ou entre amis partager une fondue Savoyarde ou délectez vous d'un bon vin local autour d'une planche de fromage.
    </p>
    <a href="/reservation" id="homeLink1" class="sequenced">
        Faire une réservation
    </a>
</header>

<main id="homeMain">
    <div id="homeMainBox1">
        <h2>Du producteur au consommateur</h2>
        <br>
        <p>Notre but, vous faire passer un moment mémorable. Et pour cela, nous mettons un point d'honneur sur la qualité de nos produits. En collaboration directe avec nos producteurs locaux, ayez la garantie d'avoir des produits frais et savoureux dans votre assiette.</p>
    </div>
    <div id="homeMainBox2">
        <a href="/notre-carte">Menu</a>
    </div>
    <div id="homeMainImages">
        <h2>Nos créations...</h2>
        <?php
        foreach ($images as $i) {
        ?>
            <div class="image_box">
                <p><?= $i["title"] ?></p>
                <img src="<?= $i["path"] ?>" alt="<?= $i["title"] ?>">
            </div>
        <?php
        }
        ?>
    </div>
</main>