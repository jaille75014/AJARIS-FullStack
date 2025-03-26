<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode(['message' => 'Données de l\'API PHP']);
}


error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('public/api.php');

?>