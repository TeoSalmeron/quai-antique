<?php

require_once ROOT . '/Views/templates/nav.php';

?>

<main id="forgottenPwMain">
    <h1 class="sequenced">Mot de passe oublié</h1>
    <p class="sequenced">Si vous avez oublié votre mot de passe, renseignez votre e-mail dans le formulaire ci-dessous et nous vous enverrons un lien de réinitialisation.</p>
    <?php
    if (isset($_SESSION["forgotten_pw_error"]) && !empty($_SESSION["forgotten_pw_error"])) {
    ?>
        <p id="forgottenPwError">
            <?= $_SESSION["forgotten_pw_error"] ?>
        </p>
    <?php
        unset($_SESSION["forgotten_pw_error"]);
    } elseif (isset($_SESSION["forgotten_pw_success"]) && !empty($_SESSION["forgotten_pw_success"])) {
    ?>
        <p id="forgottenPwSuccess">
            <?= $_SESSION["forgotten_pw_success"] ?>
        </p>
    <?php
        unset($_SESSION["forgotten_pw_success"]);
    }
    ?>
    <form action="/forgotten-password/process_forgotten_password" method="post">
        <input type="email" name="email" id="email" required placeholder="E-mail" class="form_input sequenced">
        <div class="form_buttons">
            <button type="submit" class="sequenced">Valider</button>
        </div>
    </form>
</main>

<?php
require_once ROOT . '/Views/templates/footer.php';
