<?php

require_once ROOT . '/Views/templates/nav.php';

?>

<header id="sign-in-header">
    <h1 class="sequenced">Se connecter</h1>
    <p class="sequenced">Connectez-vous à votre compte</p>
    <img src="img/arrow-down.png" alt="Arrow Down" class="slide-top sequenced">
</header>
<main id="sign-in-main" class="sequenced main-title">
    <h2>Se connecter</h2>
    <?php
    if (isset($_SESSION["sign_in_error"]) && !empty($_SESSION["sign_in_error"])) {
    ?>
        <p id="signInError"> <?= $_SESSION["sign_in_error"] ?></p>
        <?php
        unset($_SESSION["sign_in_error"]);
    } elseif(isset($_SESSION["sign_in_success"]) && !empty($_SESSION["sign_in_success"])) {
        ?>
        <p id="signInSuccess"><?= $_SESSION["sign_in_success"] ?></p>
        <?php
        unset($_SESSION["sign_in_success"]);
    }
    ?>
    <form action="/sign-in/form" method="POST">
        <input type="email" placeholder="E-mail" name="email" id="email">
        <input type="password" name="password" id="password" placeholder="Mot de passe" required>
        <button type="submit">Valider</button>
        <a href="/sign-up">Créer un compte</a>
        <a href="/forgotten-password">Mot de passe oublié ?</a>
    </form>
</main>