<?php

require_once ROOT . '/Views/templates/nav.php';

?>

<main id="sign-in-main" class="main-title">
    <h1 class="sequenced">Se connecter</h2>
        <?php
        if (isset($_SESSION["sign_in_error"]) && !empty($_SESSION["sign_in_error"])) {
        ?>
            <p id="signInError" class="sequenced"> <?= $_SESSION["sign_in_error"] ?></p>
        <?php
            unset($_SESSION["sign_in_error"]);
        } elseif (isset($_SESSION["sign_in_success"]) && !empty($_SESSION["sign_in_success"])) {
        ?>
            <p id="signInSuccess" class="sequenced"><?= $_SESSION["sign_in_success"] ?></p>
        <?php
            unset($_SESSION["sign_in_success"]);
        }
        ?>
        <form action="/sign-in/form" method="POST">
            <div class="form_box sequenced">
                <input class="form_input" type="email" placeholder="E-mail" name="email" id="email">
            </div>
            <div class="form_box sequenced">
                <input class="form_input" type="password" name="password" id="password" placeholder="Mot de passe" required>
            </div>
            <div class="form_buttons sequenced">
                <button type="submit">Valider</button>
            </div>
            <a href="/sign-up" class="sequenced">Créer un compte</a>
            <a href="/forgotten-password" class="sequenced">Mot de passe oublié ?</a>
        </form>
</main>


<?php

require_once ROOT . '/Views/templates/footer.php';
