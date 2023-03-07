<?php

function define_day_close($item) {
    switch($item) {
        case 0:
            return "dimanche";
            break;
        case 1:
            return "lundi";
            break;
        case 2:
            return "mardi";
            break;
        case 3:
            return "mercredi";
            break;
        case 4: 
            return "jeudi";
            break;
        case 5: 
            return "vendredi";
            break;
        case 6: 
            return "samedi";
            break;
        default:
            break;
    }
}