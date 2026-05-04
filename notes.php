<?php

// FONCTION 1 : Calculer la moyenne
function calculerMoyenne($notes) {
    if (empty($notes)) return 0;
    return round(array_sum($notes) / count($notes), 2);
}

// FONCTION 2 : Déterminer la mention
function determinerMention($moyenne) {
    if ($moyenne >= 16) return "Très Bien";
    if ($moyenne >= 14) return "Bien";
    if ($moyenne >= 12) return "Assez Bien";
    if ($moyenne >= 10) return "Passable";
    return "Insuffisant";
}


























