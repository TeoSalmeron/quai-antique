<?php

function redirect_to_home()
{
    if (isset($_SESSION["auth"]) && $_SESSION["auth"] == true) {
        header('Location: /');
        die();
    }
}
