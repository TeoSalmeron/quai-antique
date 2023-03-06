<main id="admin-pannel">
    <h1>Bienvenue sur le panneau d'administration</h1>
    <label for="action">Sélectionnez l'action que vous souhaitez effectuer</label>
    <select name="action" id="action">
        <option value="manage_restaurant" selected>Gérer les informations du restaurant</option>
        <option value="manage_menu">Gérer le menu</option>
        <option value="manage_image">Gérer les images</option>
    </select>
    <div id="manageRestaurant">
        Restaurant
    </div>
    <div id="manageImage">
        <form action="/admin/update_image" method="POST">
            <?php
            foreach ($images as $i) {
            ?>
                <h2><?= $i["title"] ?></h2>
                <img src="<?= $i["path"] ?>" alt="<?= $i["title"] ?>">
            <?php
            }
            ?>
        </form>
    </div>
    <div id="manageMenu">
        Menu
    </div>
</main>

<script>
    const action = document.getElementById("action")
    const manageRestaurant = document.getElementById("manageRestaurant")
    const manageImage = document.getElementById('manageImage')
    const manageMenu = document.getElementById("manageMenu")
    let actionValue = action.value

    action.addEventListener('input', () => {
        switch (action.value) {
            case "manage_restaurant":
                manageRestaurant.style.display = "flex"
                manageImage.style.display = "none"
                manageMenu.style.display = "none"
                break
            case "manage_menu":
                manageMenu.style.display = "flex"
                manageImage.style.display = "none"
                manageRestaurant.style.display = "none"
                break
            case "manage_image":
                manageImage.style.display = "flex"
                manageMenu.style.display = "none"
                manageRestaurant.style.display = "none"
            default:
                break
        }
    })
</script>