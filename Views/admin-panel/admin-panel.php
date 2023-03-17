<nav id="adminNav">
    <button id="toggleAdminNav">
        <img src="img/menu.png" alt="Ouvrir menu" id="toggleAdminNavImg">
    </button>
    <h1>Administration</h1>
    <ul id="adminNavList">
        <li id="adminNavItem1" class="admin_nav_item">
            <button id="toggleRestaurantInfo">Gérer les informations</button>
        </li>
        <li id="adminNavItem2" class="admin_nav_item">
            <button id="toggleManageDish">Gérer les plats</button>
        </li>
        <li id="adminNavItem3" class="admin_nav_item">
            <button id="toggleManageMenu">Gérer les menus</button>
        </li>
        <li id="adminNavItem4" class="admin_nav_item">
            <button id="toggleManageImage">Gérer les images</button>
        </li>
        <li id="adminNavItem5" class="admin_nav_item">
            <a href="/">Retour à l'accueil</a>
        </li>
        <li id="adminNavItem6" class="admin_nav_item">
            <a href="/sign-out">Déconnexion</a>
        </li>
    </ul>
</nav>

<section id="restaurantInfo">
    <h2>Informations du restaurant</h2>
    <p>Dans cette section, vous pouvez modifier les horaires d'ouvertures et de service du restaurant, sa capacité d'accueil et son jour de fermeture.</p>
    <fieldset>
        <?php
        if (isset($_SESSION["edit_info_success"]) && !empty($_SESSION["edit_info_success"])) {
        ?>
            <p id="editInfoSuccess">
                <?= $_SESSION["edit_info_success"] ?>
            </p>
        <?php
        }
        unset($_SESSION["edit_info_success"]);
        if (isset($_SESSION["edit_info_error"]) && !empty($_SESSION["edit_info_error"])) {
        ?>
            <p id="editInfoError">
                <?= $_SESSION["edit_info_error"] ?>
            </p>
        <?php
        }
        unset($_SESSION["edit_info_error"]);
        ?>
        <form class="form_item" method="post" action="admin/process_edit_restaurant_info_form">
            <h3>Heure de début du service du midi</h3>
            <?php
            if (isset($_SESSION["noon_service_start_error"])) {
            ?>
                <small> <?= $_SESSION["noon_service_start_error"] ?></small>
            <?php
                unset($_SESSION["noon_service_start_error"]);
            }
            ?>
            <p><?= $restaurant["noon_service_start"] ?></p>
            <button class="edit_restaurant_info" id="edit1">Modifier</button>
            <div class="edit_box" id="editBox1">
                <input type="time" name="noon_service_start" id="noon_service_start">
                <div class="btn_box">
                    <button class="edit_box_btn success">Valider</button>
                    <button type="reset" class="edit_box_btn cancel">Annuler</button>
                </div>
            </div>
        </form>
        <form class="form_item" method="post" action="admin/process_edit_restaurant_info_form">
            <h3>Heure de fin du service du midi</h3>
            <?php
            if (isset($_SESSION["noon_service_end_error"])) {
            ?>
                <small> <?= $_SESSION["noon_service_end_error"] ?></small>
            <?php
                unset($_SESSION["noon_service_end_error"]);
            }
            ?>
            <p><?= $restaurant["noon_service_end"] ?></p>
            <button class="edit_restaurant_info" id="edit2">Modifier</button>
            <div class="edit_box" id="editBox2">
                <input type="time" name="noon_service_end" id="noon_service_end">
                <div class="btn_box">
                    <button class="edit_box_btn success">Valider</button>
                    <button type="reset" class="edit_box_btn cancel">Annuler</button>
                </div>
            </div>
        </form>
        <form class="form_item" method="post" action="admin/process_edit_restaurant_info_form">
            <h3>Heure de début du service du soir</h3>
            <?php
            if (isset($_SESSION["evening_service_start_error"])) {
            ?>
                <small> <?= $_SESSION["evening_service_start_error"] ?></small>
            <?php
                unset($_SESSION["evening_service_start_error"]);
            }
            ?>
            <p><?= $restaurant["evening_service_start"] ?></p>
            <button class="edit_restaurant_info" id="edit3">Modifier</button>
            <div class="edit_box" id="editBox3">
                <input type="time" name="evening_service_start" id="evening_service_start">
                <div class="btn_box">
                    <button class="edit_box_btn success">Valider</button>
                    <button type="reset" class="edit_box_btn cancel">Annuler</button>
                </div>
            </div>
        </form>
        <form class="form_item" method="post" action="admin/process_edit_restaurant_info_form">
            <h3>Heure de fin du service du soir</h3>
            <?php
            if (isset($_SESSION["evening_service_end_error"])) {
            ?>
                <small> <?= $_SESSION["evening_service_end_error"] ?></small>
            <?php
                unset($_SESSION["evening_service_end_error"]);
            }
            ?>
            <p><?= $restaurant["evening_service_end"] ?></p>
            <button class="edit_restaurant_info" id="edit4">Modifier</button>
            <div class="edit_box" id="editBox4">
                <input type="time" name="evening_service_end" id="evening_service_end">
                <div class="btn_box">
                    <button class="edit_box_btn success">Valider</button>
                    <button type="reset" class="edit_box_btn cancel">Annuler</button>
                </div>
            </div>
        </form>
        <form class="form_item" method="post" action="admin/process_edit_restaurant_info_form">
            <h3>Capacité maximale</h3>
            <?php
            if (isset($_SESSION["max_capacity_error"])) {
            ?>
                <small> <?= $_SESSION["max_capacity_error"] ?></small>
            <?php
                unset($_SESSION["max_capacity_error"]);
            }
            ?>
            <p><?= $restaurant["max_capacity"] ?> couverts</p>
            <button class="edit_restaurant_info" id="edit5">Modifier</button>
            <div class="edit_box" id="editBox5">
                <input type="number" name="max_capacity" id="max_capacity" min="1">
                <div class="btn_box">
                    <button class="edit_box_btn success">Valider</button>
                    <button type="reset" class="edit_box_btn cancel">Annuler</button>
                </div>
            </div>
        </form>
        <form class="form_item form_item_borderless" method="post" action="admin/process_edit_restaurant_info_form">
            <h3>Jour de fermeture</h3>
            <p><?= ucfirst($day_close) ?></p>
            <button class="edit_restaurant_info" id="edit6">Modifier</button>
            <div class="edit_box" id="editBox6">
                <select name="day_close" id="day_close">
                    <option value="" selected disabled>Choisir un jour de la semaine</option>
                    <option value="7">Dimanche</option>
                    <option value="1">Lundi</option>
                    <option value="2">Mardi</option>
                    <option value="3">Mercredi</option>
                    <option value="4">Jeudi</option>
                    <option value="5">Vendredi</option>
                    <option value="6">Samedi</option>
                </select>
                <div class="btn_box">
                    <button class="edit_box_btn success">Valider</button>
                    <button type="reset" class="edit_box_btn cancel">Annuler</button>
                </div>
            </div>
        </form>
    </fieldset>
</section>

<section id="manageDish">
    <h2>Gestion des plats</h2>
    <p>Dans cette section, vous pourrez ajouter de nouveaux plats ou en supprimer.</p>
    <fieldset id="addDish">
        <?php
        if (isset($_SESSION["add_dish_success"]) && !empty($_SESSION["add_dish_success"])) {
        ?>
            <p id="addDishSuccess">
                <?= $_SESSION["add_dish_success"] ?>
            </p>
        <?php
        }
        unset($_SESSION["add_dish_success"]);
        if (isset($_SESSION["add_dish_error"]) && !empty($_SESSION["add_dish_error"])) {
        ?>
            <p id="addDishError">
                <?= $_SESSION["add_dish_error"] ?>
            </p>
        <?php
        }
        unset($_SESSION["add_dish_error"]);
        ?>
        <legend>Ajouter un plat</legend>
        <form action="/admin/process_add_dish_form" method="POST">
            <label for="name">Nom du plat</label>
            <input type="text" name="name" id="name" required placeholder="Nom du plat">
            <label for="description">Description du plat</label>
            <textarea name="description" id="description" cols="30" rows="10" required placeholder="Description du plat"></textarea>
            <label for="category">Catégorie</label>
            <select name="category" id="category" required>
                <option value="0" selected disabled>Choisir une catégorie</option>
                <option value="1">Entrées</option>
                <option value="2">Plats principaux</option>
                <option value="3">Desserts</option>
            </select>
            <label for="price">Prix du plat</label>
            <small>Format : 11.00</small>
            <input type="number" name="price" id="price" step=".01" min="0">
            <button type="submit">Valider</button>
        </form>
    </fieldset>
    <fieldset id="deleteDish">
        <legend>Supprimer un plat</legend>
        <?php
        if (isset($_SESSION["delete_dish_success"]) && !empty($_SESSION["delete_dish_success"])) {
        ?>
            <p id="deleteDishSuccess">
                <?= $_SESSION["delete_dish_success"] ?>
            </p>
        <?php
        }
        unset($_SESSION["delete_dish_success"]);
        if (isset($_SESSION["delete_dish_error"]) && !empty($_SESSION["delete_dish_error"])) {
        ?>
            <p id="deleteDishError">
                <?= $_SESSION["delete_dish_error"] ?>
            </p>
        <?php
        }
        unset($_SESSION["delete_dish_error"]);
        ?>
        <!-- Starters -->
        <h3>Entrées</h3>
        <hr>
        <form action="/admin/process_delete_dish_form" method="post">
            <?php
            foreach ($starters as $s) {
            ?>
                <div class="form_item">
                    <label for="<?= $s["id"] ?>"><?= $s["name"] ?></label>
                    <input type="checkbox" name="delete_dish" id="<?= $s["id"] ?>" value="<?= $s["id"] ?>" checked style="display:none">
                    <button type="submit">Supprimer</button>
                </div>
            <?php
            }
            ?>
        </form>
        <!-- Main meals -->
        <h3>Plats principaux</h3>
        <hr>
        <form action="/admin/process_delete_dish_form" method="post">
            <?php
            foreach ($main_meals as $m) {
            ?>
                <div class="form_item">
                    <label for="<?= $m["id"] ?>"><?= $m["name"] ?></label>
                    <input type="checkbox" name="delete_dish" id="<?= $m["id"] ?>" value="<?= $m["id"] ?>" checked style="display:none">
                    <button type="submit">Supprimer</button>
                </div>
            <?php
            }
            ?>
        </form>
        <!-- Desserts -->
        <h3>Desserts</h3>
        <hr>
        <form action="/admin/process_delete_dish_form" method="post">
            <?php
            foreach ($desserts as $d) {
            ?>
                <div class="form_item">
                    <label for="<?= $d["id"] ?>"><?= $d["name"] ?></label>
                    <input type="checkbox" name="delete_dish" id="<?= $d["id"] ?>" value="<?= $d["id"] ?>" checked style="display:none">
                    <button type="submit">Supprimer</button>
                </div>
            <?php
            }
            ?>
        </form>
    </fieldset>
</section>

<section id="manageMenu">
    <h2>Gestion des menus</h2>
    <p>Dans cette section, vous pourrez ajouter de nouvelles formules, en supprimer ou les modifier.</p>
    <fieldset id="addMenu">
        <?php
        if (isset($_SESSION["add_menu_success"]) && !empty($_SESSION["add_menu_success"])) {
        ?>
            <p id="addMenuSuccess">
                <?= $_SESSION["add_menu_success"] ?>
            </p>
        <?php
        }
        unset($_SESSION["add_menu_success"]);
        if (isset($_SESSION["add_menu_error"]) && !empty($_SESSION["add_menu_error"])) {
        ?>
            <p id="addMenuError">
                <?= $_SESSION["add_menu_error"] ?>
            </p>
        <?php
        }
        unset($_SESSION["add_menu_error"]);
        ?>
        <legend>Ajouter une formule</legend>
        <form method="POST" action="/admin/process_add_menu_form">
            <label for="name">Nom du menu</label>
            <br>
            <input type="text" name="name" id="name" required placeholder="Nom du menu">
            <br>
            <label for="schedule">Horaires</label>
            <br>
            <input type="text" name="schedule" id="schedule" required placeholder="Horaires du menu">
            <br>
            <small>Exemple : Du lundi au vendredi le midi</small>
            <br>
            <label for="description">Description</label>
            <br>
            <textarea name="description" id="description" cols="30" rows="10" required placeholder="Description du menu"></textarea>
            <br>
            <label for="price">Prix</label>
            <br>
            <input type="number" name="price" id="price" required min="0" step=".01">
            <br>
            <small>Format : 11.00 ou 15.90</small>
            <br>
            <button type="submit">Valider</button>
        </form>
    </fieldset>
    <fieldset id="deleteMenu">
        <legend>Supprimer une formule</legend>
        <?php
        if (isset($_SESSION["delete_menu_error"]) && !empty($_SESSION["delete_menu_error"])) {
        ?>
            <p id="deleteMenuError"><?= $_SESSION["delete_menu_error"] ?></p>
        <?php
        }
        unset($_SESSION["delete_menu_error"]);
        if (isset($_SESSION["delete_menu_success"]) && !empty($_SESSION["delete_menu_success"])) {
        ?>
            <p id="deleteMenuSuccess"><?= $_SESSION["delete_menu_success"] ?></p>
        <?php
        }
        unset($_SESSION["delete_menu_success"]);
        ?>
        <?php
        foreach ($menus as $m) {
        ?>
            <form action="/admin/process_delete_menu_form" method="post" class="form_item">
                <label for="<?= $m["id"] ?>"><?= $m["name"] ?></label>
                <input type="checkbox" name="id" id="<?= $m["id"] ?>" value="<?= $m["id"] ?>" checked style="display:none">
                <button type="submit">Supprimer</button>
            </form>
        <?php
        }
        ?>
    </fieldset>
</section>

<section id="manageImage">
    <h2>Gestion des images</h2>
    <p>Ici, vous pourrez gérer les images de présentation sur la page d'accueil. Vous pouvez ajouter des images, en supprimer et modifier leur titre.</p>
    <fieldset id="addImageFieldset">
        <legend>Ajouter une image</legend>
        <p>Si votre est image est trop lourde, tentez de la compresser en allant sur ce <a href="https://www.iloveimg.com/fr/compresser-image" target="_blank">lien</a> et suivez les instructions à l'écran.</p>
        <?php
        if (isset($_SESSION["image_error"]) && !empty($_SESSION["image_error"])) {
        ?>
            <p id="imageError"> <?= $_SESSION["image_error"] ?> </p>
        <?php
        } elseif (isset($_SESSION["image_success"]) && !empty($_SESSION["image_success"])) {
        ?>
            <p id="imageSuccess"> <?= $_SESSION["image_success"] ?> </p>
        <?php
        }
        unset($_SESSION["image_success"]);
        unset($_SESSION["image_error"]);
        ?>
        <form action="/admin/process_add_image_form" method="POST" id="addImageForm" enctype="multipart/form-data">
            <label for="title">Titre de l'image :</label>
            <input type="text" name="title" id="title">
            <br>
            <br>
            <label for="file">Fichier :</label>
            <input type="file" name="image" id="image">
            <br>
            <small>Le fichier doit être au format jpeg, jpg ou png</small>
            <br>
            <small>Poids limite de 4 MO</small>
            <br>
            <small>Le format paysage est priviligié</small>
            <div class="form_buttons">
                <button type="submit">Valider</button>
                <button type="reset">Réinitialiser</button>
            </div>
        </form>
    </fieldset>
    <fieldset id="deleteImageBox">
        <legend>Supprimer une image ou modifier le titre d'une image</legend>
        <?php
        foreach ($images as $image) {
        ?>
            <form class="image_box" action="/admin/process_delete_image_form" method="POST">
                <h4><?= $image["title"] ?></h4>
                <img src="<?= "img/" . $image["name"] ?>" alt="<?= $image["title"] ?>">
                <input type="checkbox" name="delete_image[]" value="<?= $image["id"] ?>" checked>
                <input type="checkbox" name="delete_image[]" value="<?= $image["name"] ?>" checked>
                <button type="submit">Supprimer</button>
            </form>
        <?php
        }

        foreach ($images as $image) {
        ?>
            <form action="/admin/process_edit_image_form" method="post" class="edit_image">
                <?php
                if (isset($_SESSION["edit_image_error"]) && !empty($_SESSION["edit_image_error"])) {
                ?>
                    <p id="editImageError"><?= $_SESSION["edit_image_error"] ?></p>
                <?php
                }
                unset($_SESSION["edit_image_error"]);
                ?>
                <div class="form_item">
                    <label for="<?= $image["id"] ?>"><?= $image["title"] ?></label>
                    <input type="text" name="title" id="<?= $image["id"] ?>" placeholder="Modifier le titre">
                    <input type="checkbox" name="id" checked value="<?= $image["id"] ?>" style="display:none">
                    <button type="submit">Valider</button>
                </div>
            </form>
            <br>
        <?php
        }
        ?>

    </fieldset>
</section>