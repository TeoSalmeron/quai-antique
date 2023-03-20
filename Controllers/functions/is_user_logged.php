<?php

function is_user_logged()
{
    if (isset($_SESSION["auth"]) && $_SESSION["auth"] == true) {
        header('Location: /');
        die();
    }
}
