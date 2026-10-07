<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION['usuario_email'])) {
    http_response_code(403);
    echo json_encode(['error' => 'No hay sesión activa']);
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);

if ($input) {
    $mascota = $input['mascota'] ?? null;
    $xp = $input['xp'] ?? 0;
    $cuentos = json_encode($input['cuentos'] ?? []);
    $email = $_SESSION['usuario_email'];

    $stmt = $conn->prepare("UPDATE usuarios SET mascota_clave = ?, xp = ?, cuentos_leidos = ? WHERE email = ?");
    $stmt->bind_param("sdss", $mascota, $xp, $cuentos, $email);
    
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
?>