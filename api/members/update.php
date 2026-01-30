<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/ctrlSaisies.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et nettoyage des données
    $numMemb    = ctrlSaisies($_POST['numMemb']);
    $prenomMemb = ctrlSaisies($_POST['prenomMemb']);
    $nomMemb    = ctrlSaisies($_POST['nomMemb']);
    $eMailMemb  = ctrlSaisies($_POST['eMailMemb']);
    $numStat    = ctrlSaisies($_POST['numStat']);
    $accordMemb = ctrlSaisies($_POST['accordMemb']);

    // Sécurisation des apostrophes pour les noms/prénoms
    $prenomMemb = addslashes($prenomMemb);
    $nomMemb    = addslashes($nomMemb);

    // Préparation de la requête de mise à jour
    $colonnes_valeurs = "prenomMemb = '$prenomMemb', 
                         nomMemb = '$nomMemb', 
                         eMailMemb = '$eMailMemb', 
                         numStat = $numStat, 
                         accordMemb = $accordMemb";

    // Exécution de l'UPDATE
    sql_update("MEMBRE", $colonnes_valeurs, "numMemb = $numMemb");

    // Redirection vers la liste des membres
    header('Location: /views/backend/members/list.php');
    exit();
}