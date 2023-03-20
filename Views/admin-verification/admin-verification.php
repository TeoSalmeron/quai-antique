<header id="admin-verification">
    <h1>Le Quai Antique</h1>
    <h2>Confirmez votre compte !</h2>
    <p>C'est la première fois que vous vous connectez, nous vous invitons donc à changer votre mot de passe pour vous approprier le compte administrateur. Une fois le changement effectué, vous serez redirigé sur la page de connexion. Notez bien votre nouveau mot de passe !</p>
    <form action="/admin/register_admin" method="POST">
        <small>Le mot de passe doit contenir au moins 8 caractères, une minuscule, une majuscule, un chiffre et un caractère spécial</small>
        <?php
        if (isset($_SESSION["admin_verification_error"]) && !empty($_SESSION["admin_verification_error"])) {
        ?>
            <p><?= $_SESSION["admin_verification_error"] ?></p>
        <?php
            unset($_SESSION["admin_verification_error"]);
        }
        ?>
        <div class="form_box">
            <input class="form_input" type="password" name="password" id="password" required placeholder="Nouveau mot de passe">
        </div>
        <div class="form_box">
            <input class="form_input" type="password" name="confirm_password" id="confirm_password" required placeholder="Confirmer mot de passe">
        </div>
        <div class="form_buttons">
            <button type="submit">Valider</button>
        </div>
    </form>
</header>