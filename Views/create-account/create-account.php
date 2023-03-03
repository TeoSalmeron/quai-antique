<?php

require_once ROOT . '/Views/templates/nav.php';

?>

<header id="create-account-header">
    <h1 class="sequenced">
        Pourquoi se créer un compte chez nous ?
    </h1>
    <p class="sequenced">Afin de faciliter vos futures réservations, vous pouvez vous créer un compte sur notre plateforme. Nous enregistrerons vos informations et les remplirons automatique lors de votre prochaine réservation.</p>
    <img src="img/arrow-down.png" alt="Arrow Down" class="slide-top sequenced">
</header>

<main id="create-account-main">
    <h2 class="sequenced">S'inscrire</h2>
    <form action="" method="post" id="createAccountForm" class="sequenced">
        <input type="text" name="last_name" id="userLastName" placeholder="Nom de famille" required>
        <input type="text" name="first_name" id="userFirstName" placeholder="Prénom" required>
        <input type="text" name="email" id="userEmail" placeholder="E-mail" required>
        <input type="text" name="phone" id="userPhone" placeholder="Numéro de téléphone" required>
        <small>Format : 00.00.00.00.00</small>
        <select name="default_nb_guest" id="userDefaultNbGuest" required placeholder="Nombres de couverts par défaut">
            <option value="" disabled selected>Nombres de couverts par défaut</option>
            <?php
            for ($i = 1; $i < 15; $i++) {
            ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php
            }
            ?>
        </select>
        <div class="form_box">
            <label for="prompt_allergy">Avez-vous des allergies à signaler ?</label>
            <br>
            <input type="radio" name="prompt_allergy" id="confirmAllergy" value="1">
            <label for="confirmAllergy" class="no_border">Oui</label>
            <input type="radio" name="prompt_allergy" id="noAllergy" value="0" checked>
            <label for="noAllergy" class="no_border">Non</label>
        </div>
        <div id="form_allergies">
            <?php
            foreach ($allergens as $a) {
            ?>
                <div class="form_allergies_box">
                    <input type="checkbox" name="allergies" id="<?= "allergy_" . $a["id"] ?>" value="<?= $a["id"] ?>">
                    <label for="<?= "allergy_" . $a["id"] ?>"><?= ucfirst($a["name"]) ?></label>
                </div>
            <?php
            }
            ?>
        </div>
    </form>
</main>