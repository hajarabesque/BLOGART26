<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/ctrlSaisies.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenomMemb = ctrlSaisies($_POST['prenomMemb']);
    $nomMemb    = ctrlSaisies($_POST['nomMemb']);
    $pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
    $passMemb   = $_POST['passMemb']; // Idéalement à hasher
    $eMailMemb  = ctrlSaisies($_POST['eMailMemb']);
    $numStat    = ctrlSaisies($_POST['numStat']);
    $accordMemb = isset($_POST['accordMemb']) ? 1 : 0;
    $dtCreaMemb = date('Y-m-d H:i:s');

    sql_insert("MEMBRE", 
        "prenomMemb, nomMemb, pseudoMemb, passMemb, eMailMemb, dtCreaMemb, accordMemb, numStat", 
        "'$prenomMemb', '$nomMemb', '$pseudoMemb', '$passMemb', '$eMailMemb', '$dtCreaMemb', $accordMemb, $numStat"
    );

    header('Location: /views/backend/members/list.php');
    exit();
}