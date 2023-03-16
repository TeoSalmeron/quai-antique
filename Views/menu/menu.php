<?php

require_once ROOT . '/Views/templates/nav.php';

?>

<header id="menuHeader">
    <h1 class="sequenced">Notre carte</h1>
    <p class="sequenced">Retrouvez ici nos formules ainsi que tous nos plats, cuisinés avec amour et passion.</p>
</header>
<main id="menuMain">
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
        <section id="mains">
            <h2 class="sequenced">Nos plats</h2>
            <?php
            foreach ($main_meals as $m) {
            ?>
                <div class="menu_item">
                    <h3 class="name sequenced"><?= $m["name"] ?></h3>
                    <p class="description sequenced"><?= $m["description"] ?></p>
                    <p class="price sequenced"><?= $m["price"] . " €" ?></p>
                </div>
            <?php
            }
            ?>
        </section>
        <section id="desserts">
            <h2 class="sequenced">Nos desserts</h2>
            <?php
            foreach ($desserts as $d) {
            ?>
                <div class="menu_item">
                    <h3 class="name sequenced"><?= $d["name"] ?></h3>
                    <p class="description sequenced"><?= $d["description"] ?></p>
                    <p class="price sequenced"><?= $d["price"] . " €" ?></p>
                </div>
            <?php
            }
            ?>
        </section>
    </section>

</main>

<?php

require_once ROOT . '/Views/templates/footer.php';
