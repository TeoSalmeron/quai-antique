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
        <legend>Informations du restaurant</legend>
        <form class="form_item" method="post" action="">
            <h3>Heure de début du service du midi</h3>
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
        <form class="form_item" method="post" action="">
            <h3>Heure de fin du service du midi</h3>
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
        <form class="form_item" method="post" action="">
            <h3>Heure de début du service du soir</h3>
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
        <form class="form_item" method="post" action="">
            <h3>Heure de fin du service du soir</h3>
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
        <form class="form_item" method="post" action="">
            <h3>Capacité maximale</h3>
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
        <form class="form_item form_item_borderless" method="post" action="">
            <h3>Jour de fermeture</h3>
            <p><?= ucfirst($day_close) ?></p>
            <button class="edit_restaurant_info" id="edit6">Modifier</button>
            <div class="edit_box" id="editBox6">
                <select name="day_close" id="day_close">
                    <option value="0">Dimanche</option>
                    <option value="1">Luni</option>
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
    Section manage dish
</section>

<section id="manageMenu">
    Section manage menu
</section>

<section id="manageImage">
    Section manage image
</section>