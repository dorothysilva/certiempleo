<?php
require_once "../utils/conexion.php";
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET["certificado"])) {
        obtenerPaises($_GET["pais"]);
    } else
        obtenerPaises();
} 
 else {
    http_response_code(404);
    exit();
}

function obtenerPaises($pais = null)
{
    global $conn;
    if ($pais == null) {
        $result = $conn->query("SELECT * FROM country ORDER BY Name;");
        echo json_encode($result->fetch_all(MYSQLI_ASSOC));
    } else {
        $result = $conn->query("SELECT * FROM country WHERE Name = '$pais';");
        echo json_encode($result->fetch_all(MYSQLI_ASSOC));
    }
}