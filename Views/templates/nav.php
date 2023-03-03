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
            <a href="/menu">
                notre carte
            </a>
        </li>
        <li class="mainNavListItem">
            <a href="/book-table">
                réserver une table
            </a>
        </li>
        <?php
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