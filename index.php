<?php
require_once 'notes.php';

$etudiants = [
    ["prenom" => "Yassine", "nom" => "Elbouari",  "notes" => [14, 12,  9, 15, 11]],
    ["prenom" => "Salma",   "nom" => "Chraibi",   "notes" => [ 8,  6,  5,  7,  9]],
    ["prenom" => "Mehdi",   "nom" => "Tazi",      "notes" => [17, 18, 15, 16, 19]],
    ["prenom" => "Nour",    "nom" => "Idrissi",   "notes" => [10, 10, 10, 10, 10]],
    ["prenom" => "Hamza",   "nom" => "Benkiran",  "notes" => [12,  9, 14,  8, 11]],
    ["prenom" => "Lina",    "nom" => "Fassi",     "notes" => [ 6,  4,  7,  3,  5]],
    ["prenom" => "Omar",    "nom" => "Sekkat",    "notes" => [13, 15, 12, 14, 16]],
];

$matieres        = ["Maths", "Physique", "Informatique", "Anglais", "Francais"];
$seuil_admission = 10;

// TEST fonction 4
echo formaterNomComplet("Yassine", "Elbouari"); 
