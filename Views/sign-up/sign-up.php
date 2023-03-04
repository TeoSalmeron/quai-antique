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
    <p id="passwordRules">Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial</p>
    <?php
    if (isset($_SESSION["sign_up_error"]) && !empty($_SESSION["sign_up_error"])) {
    ?>
        <p id="createAccountError" class="sequenced">
            /!\ <?= $_SESSION["sign_up_error"] ?> /!\

        </p>
    <?php
        unset($_SESSION["sign_up_error"]);
    }
    ?>
    <form action="/sign-up/form" method="post" id="createAccountForm" class="sequenced">
        <div class="form_box">
            <input type="text" name="last_name" id="userLastName" placeholder="Nom de famille" required>
        </div>
        <div class="form_box">
            <input type="text" name="first_name" id="userFirstName" placeholder="Prénom" required>
        </div>
        <div class="form_box">
            <input type="text" name="email" id="userEmail" placeholder="E-mail" required>
        </div>
        <div class="form_box">
            <input type="password" name="password" id="userPassword" placeholder="Mot de passe" required>
        </div>
        <div class="form_box">
            <input type="password" name="confirm_password" id="userConfirmPassword" placeholder="Confirmation du mot de passe" required>
        </div>
        <div class="form_box">
            <input type="phone" name="phone" id="userPhone" placeholder="Numéro de téléphone" required>
            <br>
            <small>Format : 0102030405</small>
        </div>
        <div class="form_box">
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
        </div>
        <div class="form_box form_box_allergies">
            <label for="prompt_allergy">Avez-vous des allergies à signaler ?</label>
            <div class="item">
                <input type="radio" name="prompt_allergy" id="confirmAllergy" value="1">
                <label for="confirmAllergy" class="no_border">Oui</label>
                <input type="radio" name="prompt_allergy" id="noAllergy" value="0" checked>
                <label for="noAllergy" class="no_border">Non</label>
            </div>
        </div>
        <div id="form_allergies">
            <p>Veuillez sélectionner toutes vos allergies</p>
            <?php
            foreach ($allergens as $a) {
            ?>
                <div class="form_allergies_item">
                    <input type="checkbox" name="allergies" id="<?= $a["id"] ?>" value="<?= $a["id"] ?>">
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