<?php
     
require_once ROOT . '/Views/templates/nav.php';

?>

<main id="profile">
    <h1>
        Profil de <?= $user["last_name"] . ' ' . $user["first_name"] ?>
    </h1>
    <p>
        E-mail : <?= $user["email"] ?>
    </p>
    <p>
        Numéro de téléphone : <?= $user["phone"] ?>
    </p>
    <button id="deleteUser">Supprimer mon profil</button>
</main>

<?php

require_once ROOT . '/Views/templates/footer.php';
