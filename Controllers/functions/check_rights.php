<?php

function check_rights()
{
    if ($_SESSION["can_access"] !== true) {
        http_response_code(404);
        echo "Vous n'avez pas le droit d'accéder à cette page";
        die();
    }
}
