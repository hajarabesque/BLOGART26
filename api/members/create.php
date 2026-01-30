<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/ctrlSaisies.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Récupération et nettoyage des données
    $prenomMemb = ctrlSaisies($_POST['prenomMemb']);
    $nomMemb    = ctrlSaisies($_POST['nomMemb']);
    $pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
    $passMemb   = ctrlSaisies($_POST['passMemb']); // Mot de passe
    $eMailMemb  = ctrlSaisies($_POST['eMailMemb']);
    $numStat    = ctrlSaisies($_POST['numStat']);
    $accordMemb = isset($_POST['accordMemb']) ? 1 : 0; // 1 si coché, 0 sinon

    // 2. Préparation des données (sécurisation des apostrophes)
    $prenomMemb = addslashes($prenomMemb);
    $nomMemb    = addslashes($nomMemb);
    $pseudoMemb = addslashes($pseudoMemb);
    
    // Génération de la date actuelle pour dtCreaMemb
    $dtCreaMemb = date('Y-m-d H:i:s');

    // 3. Insertion dans la table MEMBRE
    // Liste des colonnes
    $colonnes = "prenomMemb, nomMemb, pseudoMemb, passMemb, eMailMemb, dtCreaMemb, accordMemb, numStat";
    
    // Liste des valeurs
    $valeurs = "'$prenomMemb', '$nomMemb', '$pseudoMemb', '$passMemb', '$eMailMemb', '$dtCreaMemb', $accordMemb, $numStat";

    sql_insert("MEMBRE", $colonnes, $valeurs);

    // 4. Redirection vers la liste
    header('Location: /views/backend/members/list.php');
    exit();
}