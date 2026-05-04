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

// FONCTION 3 : Est admis ?
function estAdmis($moyenne, $seuil) {
    return $moyenne >= $seuil;
}

// FONCTION 4 : Formater le nom complet
function formaterNomComplet($prenom, $nom) {
    return ucfirst(strtolower($prenom)) . " " . strtoupper($nom);
}

// FONCTION 5 : Générer le relevé d'un étudiant
function genererReleve($etudiant, $matieres, $seuil) {
    $moyenne = calculerMoyenne($etudiant["notes"]);
    $mention = determinerMention($moyenne);
    $admis   = estAdmis($moyenne, $seuil) ? "ADMIS" : "AJOURNÉ";
    $nom     = formaterNomComplet($etudiant["prenom"], $etudiant["nom"]);

    $ligne = str_repeat("=", 42);
    $tiret = str_repeat("-", 42);

    $releve  = "$ligne\n";
    $releve .= "Releve de notes -- $nom\n";
    $releve .= "$ligne\n";

    foreach ($matieres as $i => $matiere) {
        $note    = $etudiant["notes"][$i] ?? 0;
        $releve .= str_pad($matiere, 14) . ": " 
                 . str_pad($note, 2, " ", STR_PAD_LEFT) . "/20\n";
    }

    $releve .= "$tiret\n";
    $releve .= str_pad("Moyenne",  14) . ": $moyenne/20\n";
    $releve .= str_pad("Mention",  14) . ": $mention\n";
    $releve .= str_pad("Resultat", 14) . ": $admis\n";
    $releve .= "$ligne\n";

    return $releve;
}

// FONCTION 6 : Statistiques de la promotion
function calculerStatistiquesPromotion($etudiants, $seuil) {
    $moyennes    = [];
    $nb_admis    = 0;
    $nb_ajournes = 0;

    foreach ($etudiants as $e) {
        $m = calculerMoyenne($e["notes"]);
        $moyennes[] = $m;
        if (estAdmis($m, $seuil)) $nb_admis++;
        else $nb_ajournes++;
    }

    $idx_max = array_keys($moyennes, max($moyennes))[0];
    $idx_min = array_keys($moyennes, min($moyennes))[0];

    return [
        "moyenne_promo"   => round(array_sum($moyennes) / count($moyennes), 2),
        "meilleur"        => formaterNomComplet(
                                $etudiants[$idx_max]["prenom"],
                                $etudiants[$idx_max]["nom"]),
        "moins_bon"       => formaterNomComplet(
                                $etudiants[$idx_min]["prenom"],
                                $etudiants[$idx_min]["nom"]),
        "nb_admis"        => $nb_admis,
        "nb_ajournes"     => $nb_ajournes,
        "taux_reussite"   => round($nb_admis / count($etudiants) * 100, 1),
    ];
}


























