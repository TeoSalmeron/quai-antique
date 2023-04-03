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
    <?php
    if (!empty($reservations)) {
    ?>
        <div class="reservations">
            <h2>Mes réservations : </h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Nombres de couverts</th>
                    <th>Action</th>
                </tr>
                <?php
                foreach ($reservations as $r) {
                ?>
                    <tr>
                        <td><?= $r["res_date"] ?></td>
                        <td><?= $r["res_time"] ?></td>
                        <td><?= $r["total_guest"] ?></td>
                        <td>
                            <form action="/profile/delete_reservation" method="post">
                                <input type="checkbox" name="reservation_id" checked value="<?= $r["id"] ?>" style="display: none">
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    <?php
    }
    ?>
    <button id="deleteUser">Supprimer mon profil</button>

</main>

<?php

require_once ROOT . '/Views/templates/footer.php';
