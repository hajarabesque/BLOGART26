<?php
require_once '../../header.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numStat = $_POST['numStat'];
    $libStat = $_POST['libStat'];


    sql_update("STATUT", "libStat = '$libStat'", "numStat = $numStat");

    header('Location: ../../views/backend/statuts/list.php');
    exit();
}