<?php

require_once ROOT . '/Views/templates/nav.php';

?>

<main id="resetPwMain">
    <h1>Réinitialiser votre mot de passe</h1>
    <p>Indiquez votre e-mail afin de réinitialiser votre mot de passe</p>
    <p id="error" class="sequenced"></p>
    <form action="" method="post" id="getEmailForm">
        <input type="email" name="email" id="email" class="form_input" placeholder="E-mail">
        <div class="form_buttons">
            <button type="submit">Valider</button>
        </div>
    </form>
</main>

<section id="resetPwConfirm">
    <h2>Réinitialiser votre mot de passe</h2>
    <p>Veuillez insérer le nouveau mot de passe, il doit contenir au moins une minuscule, une majuscule, un chiffre, un caractère spécial et contenir au moins 8 caractères</p>
    <p id="pwError" class="sequenced"></p>
    <form action="" method="POST" id="resetPwForm">
        <input type="password" class="form_input" name="password" id="password" required placeholder="Mot de passe">
        <input type="password" class="form_input" name="confirm_password" id="confirmPassword" required placeholder="Confirmer mot de passe">
        <div class="form_buttons">
            <button type="submit">Valider</button>
        </div>
    </form>
</section>

<?php
require_once ROOT . '/Views/templates/footer.php';
