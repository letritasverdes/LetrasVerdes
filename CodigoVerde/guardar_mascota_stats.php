<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION['usuario_email'])) {
    exit();
}

$datos = json_decode(file_get_contents('php://input'), true);

if ($datos) {
    $hambre = intval($datos['hambre'] ?? 100);
    $felicidad = intval($datos['felicidad'] ?? 100);
    $energia = intval($datos['energia'] ?? 100);
    $higiene = intval($datos['higiene'] ?? 100);
    $monedas = intval($datos['monedas'] ?? 50);

    $stmt = $conn->prepare("UPDATE usuarios SET hambre = ?, felicidad = ?, energia = ?, higiene = ?, monedas = ? WHERE email = ?");
    $stmt->bind_param("iiiiis", $hambre, $felicidad, $energia, $higiene, $monedas, $_SESSION['usuario_email']);
    $stmt->execute();
}
?>