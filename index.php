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

echo "<pre>";

foreach ($etudiants as $etudiant) {
    echo genererReleve($etudiant, $matieres, $seuil_admission);
    echo "\n";
}

$stats = calculerStatistiquesPromotion($etudiants, $seuil_admission);
$ligne = str_repeat("*", 42);

echo "$ligne\n";
echo "RAPPORT DE SYNTHESE DE LA PROMOTION\n";
echo "$ligne\n";
echo str_pad("Moyenne promo",     20) . ": " . $stats["moyenne_promo"]  . "/20\n";
echo str_pad("Meilleur",          20) . ": " . $stats["meilleur"]        . "\n";
echo str_pad("Moins bon",         20) . ": " . $stats["moins_bon"]       . "\n";
echo str_pad("Admis",             20) . ": " . $stats["nb_admis"]        . "\n";
echo str_pad("Ajournés",          20) . ": " . $stats["nb_ajournes"]     . "\n";
echo str_pad("Taux de réussite",  20) . ": " . $stats["taux_reussite"]   . "%\n";
echo "$ligne\n";
echo "</pre>";