<?php
$host = "localhost";
$user = "root";
$password = ""; // Si tu MySQL tiene contraseña, colócala aquí
$database = "letras_verdes";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Configurar conjunto de caracteres UTF-8
$conn->set_charset("utf8mb4");
?>