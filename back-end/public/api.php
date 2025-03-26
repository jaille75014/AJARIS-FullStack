<?php
header('Content-Type: application/json');

$serverName = "ajaris-sqlserv.database.windows.net";
$connectionOptions = array(
    "Database" => "AJARIS-db",
    "Uid" => "user",
    "PWD" => "password"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);
if (!$conn) {
    echo json_encode(array('success' => false, 'message' => 'Connexion impossible à la BDD'));
    exit;
}

$query = "SELECT TOP 1 message FROM messages";
$stmt = sqlsrv_query($conn, $query);

if ($stmt === false) {
    echo json_encode(array('success' => false, 'message' => 'Erreur lors de la requête'));
    exit;
}

$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
if ($row) {
    echo json_encode(array('success' => true, 'message' => $row['message']));
} else {
    echo json_encode(array('success' => false, 'message' => 'Aucune donnée trouvée'));
}

sqlsrv_close($conn);
?>