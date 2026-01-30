<?php
require_once '../../header.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numThem = $_POST['numThem'];
    $libThem = $_POST['libThem'];


    sql_update("THEMATIQUE", "libThem = '$libThem'", "numThem = $numThem");

    header('Location: ../../views/backend/thematiques/list.php');
    exit();
}