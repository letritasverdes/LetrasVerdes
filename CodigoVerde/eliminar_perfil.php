<?php
session_start();
require_once "conexion.php";

// Verificar que el usuario tenga una sesión activa
if (!isset($_SESSION['usuario_email'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_SESSION['usuario_email'];

    // Eliminar el usuario de la base de datos
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        // Destruir la sesión
        session_unset();
        session_destroy();
        
        // Redirigir al registro/login
        header("Location: login.php?mensaje=cuenta_eliminada");
        exit();
    } else {
        echo "Error al eliminar la cuenta. Inténtalo de nuevo.";
    }
} else {
    // Si intentan entrar directamente por la URL, redirigir a cuentos
    header("Location: cuentos.php");
    exit();
}
?>