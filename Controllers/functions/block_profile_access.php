<?php
 
function block_profile_access()
{
    if (!isset($_SESSION["auth"]) || $_SESSION["customer_id"] == "") {
        header('Location: /');
        die();
    }
}