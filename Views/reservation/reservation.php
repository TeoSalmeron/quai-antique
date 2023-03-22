<?php

require_once ROOT . '/Views/templates/nav.php';

?>

<main id="reservationMain">
    <?php
    ?>
    <h1>Réserver une table</h1>
    <p>Pour réserver une table, remplissez ce formulaire</p>
    <p id="reservationError">
        <?php
        if (isset($_SESSION["reservation_error"]) && !empty($_SESSION["reservation_error"])) {
            echo $_SESSION["reservation_error"];
        }
        unset($_SESSION["reservation_error"]);
        ?>
    </p>
    <p id="reservationSuccess">
        <?php
        if (isset($_SESSION["reservation_success"]) && !empty($_SESSION["reservation_success"])) {
            echo $_SESSION["reservation_success"];
        }
        unset($_SESSION["reservation_success"]);
        ?>
    </p>
    <form action="/book-table/process_book_table" method="post" id="reservationForm">
        <input type="text" name="first_name" id="first_name" placeholder="Prénom">
        <input type="text" name="last_name" id="last_name" placeholder="Nom de famille">
        <input type="email" name="email" id="email" placeholder="E-mail">
        <input type="tel" name="phone" id="phone" placeholder="Numéro de téléphone">
        <small>Format : 0102030405</small>
        <input type="number" name="nb_guest" id="nb_guest" placeholder="Nombres de convives">
        <input type="date" name="reservation_date" id="reservationDate" value="<?= $today ?>">
        <p>Souhaitez-vous réserver pour le midi ou le soir ?</p>
        <div class="prompt_box">
            <input type="radio" name="prompt_service" id="prompt_service_noon" value="noon">
            <label for="prompt_service_noon">Midi</label>
        </div>
        <div class="prompt_box">
            <input type="radio" name="prompt_service" id="prompt_service_evening" value="evening">
            <label for="prompt_service_evening">Soir</label>
        </div>
        <div id="service_time_noon">
            <small>Vous pouvez réserver de <?= substr($restaurant["noon_service_start"], 0, 5) ?> à <?= end($noon_times) ?> </small>
            <br>
            <select name="noon_time" id="noon_time">
                <?php
                foreach ($noon_times as $n) {
                ?>
                    <option value="<?= $n ?>"><?= $n ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div id="service_time_evening">
            <small>Vous pouvez réserver de <?= substr($restaurant["evening_service_start"], 0, 5) ?> à <?= end($evening_times) ?> </small>
            <br>
            <select name="evening_time" id="evening_time">
                <?php
                foreach ($evening_times as $e) {
                ?>
                    <option value="<?= $e ?>"><?= $e ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <p>Avez-vous des allergies ?</p>
        <div class="prompt_box">
            <input type="radio" name="prompt_allergies" id="prompt_allergies_yes" value="1">
            <label for="prompt_allergies_yes">Oui</label>
        </div>
        <div class="prompt_box">
            <input type="radio" name="prompt_allergies" id="prompt_allergies_no" value="0">
            <label for="prompt_allergies_no">Non</label>
        </div>
        <div class="form_allergies_box" id="form_allergies_box">
            <?php
            // For each allergens, display input
            foreach ($allergens as $a) {
            ?>
                <div class="form_allergies_item">
                    <input type="checkbox" name="allergies[]" id="<?= $a["id"] ?>" value="<?= $a["id"] ?>" class="allergies">
                    <label for="<?= $a["id"] ?>"><?= ucfirst($a["name"]) ?></label>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="form_buttons">
            <button type="submit">Soumettre</button>
        </div>
    </form>
</main>

<?php

require_once ROOT . '/Views/templates/footer.php';
