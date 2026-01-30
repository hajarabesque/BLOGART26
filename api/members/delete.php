<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/ctrlSaisies.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numMemb = ctrlSaisies($_POST['numMemb']);

    // 1. On supprime d'abord les COMMENTAIRES du membre pour lever la contrainte
    // On suppose que ta table s'appelle COMMENT ou COMMENTAIRE
    sql_delete("COMMENT", "numMemb = $numMemb");

    // (Optionnel) Si le membre a aussi des LIKE, il faut les supprimer aussi
    // sql_delete("LIKE", "numMemb = $numMemb");

    // 2. Maintenant on peut supprimer le membre
    sql_delete("MEMBRE", "numMemb = $numMemb");

    header('Location: /views/backend/members/list.php');
    exit();
}