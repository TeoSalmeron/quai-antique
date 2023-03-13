<?php

require_once ROOT . '/Views/templates/nav.php';

?>

<header id="menuHeader">
    <h1 class="sequenced">Notre carte</h1>
    <p class="sequenced">Retrouvez ici nos formules ainsi que tous nos plats, cuisinés avec amour et passion.</p>
</header>
<section id="menus" class="menuSections">
    <h2 class="sequenced">Nos menus</h2>
    <?php
    foreach ($menus as $m) {
    ?>
        <div class="menu_item">
            <h3 class="name sequenced"><?= $m["name"] ?></h3>
            <p class="schedule sequenced"><?= $m["schedule"] ?></p>
            <p class="description sequenced"><?= $m["description"] ?></p>
            <p class="price sequenced"><?= $m["price"] . " €" ?></p>
        </div>
    <?php
    }
    ?>
</section>
<section id="dishes" class="menuSections">
    <section id="starters">
        <h2 class="sequenced">Nos entrées</h2>
        <?php
        foreach ($starters as $s) {
        ?>
            <div class="menu_item">
                <h3 class="name sequenced"><?= $s["name"] ?></h3>
                <p class="description sequenced"><?= $s["description"] ?></p>
                <p class="price sequenced"><?= $s["price"] . " €" ?></p>
            </div>
        <?php
        }
        ?>
    </section>
</section>