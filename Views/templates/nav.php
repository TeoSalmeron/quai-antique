<nav id="mainNav">
    <div id="toggleNav">
        <button id="openMainNav">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </button>
    </div>
    <ul id="mainNavList">
        <button id="closeMainNav">
            <span class="line line1"></span>
            <span class="line line2"></span>
        </button>
        <hr>
        <li class="mainNavListItem">
            <a href="/">
                accueil
            </a>
        </li>
        <li class="mainNavListItem">
            <a href="/notre-carte">
                notre carte
            </a>
        </li>
        <li class="mainNavListItem">
            <a href="/book-table">
                réserver une table
            </a>
        </li>
        <?php
        // If user is administrator, add "administration" link
        if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] == true) {
        ?>
            <li class="mainNavListItem">
                <a href="/admin">administration</a>
            </li>
        <?php
        }
        // If user is not logged, add "connect" and "create account" link
        if (!isset($_SESSION['auth'])) {
        ?>
            <li class="mainNavListItem">
                <a href="/sign-in">se connecter</a>
            </li>
            <li class="mainNavListItem">
                <a href="/sign-up">créer un compte</a>
            </li>
        <?php
        } else {
        ?>
            <li class="mainNavListItem">
                <a href="/sign-out">se déconnecter</a>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>