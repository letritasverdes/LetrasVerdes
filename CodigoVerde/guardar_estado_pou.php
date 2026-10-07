<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION['usuario_email'])) {
    http_response_code(401);
    echo json_encode(["status" => "error", "message" => "No autorizado"]);
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);

if ($input) {
    $stmt = $conn->prepare("UPDATE usuarios SET hambre = ?, felicidad = ?, energia = ?, higiene = ?, monedas = ?, nivel = ?, ropa_color = ?, sombrero_id = ?, inventario = ? WHERE email = ?");
    
    $inventario_str = json_encode($input['inventario'] ?? []);
    
    $stmt->bind_param(
        "iiiiiissss",
        $input['hambre'],
        $input['felicidad'],
        $input['energia'],
        $input['higiene'],
        $input['monedas'],
        $input['nivel'],
        $input['ropa_color'],
        $input['sombrero_id'],
        $inventario_str,
        $_SESSION['usuario_email']
    );

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error"]);
    }
}