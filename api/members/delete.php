<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/ctrlSaisies.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numMemb = ctrlSaisies($_POST['numMemb']);

    // 1. On supprime les LIKES du membre (table likeart)
    // On suppose que cette table contient bien numMemb
    sql_delete("LIKEART", "numMemb = $numMemb");

    // 2. On supprime les COMMENTAIRES du membre (table comment)
    // On suppose que cette table contient bien numMemb
    sql_delete("COMMENT", "numMemb = $numMemb");

    // 3. Enfin, on supprime le MEMBRE
    // Ici, plus de risque d'erreur sur ARTICLE puisqu'ils ne sont pas liés
    sql_delete("MEMBRE", "numMemb = $numMemb");

    // Redirection vers la liste
    header('Location: /views/backend/members/list.php');
    exit();
}