<?php
session_start();
require_once "conexion.php";

if (isset($_SESSION['usuario_email'])) {
    header("Location: cuentos.php");
    exit();
}

$error_login = "";
$error_registro = "";
$modo_activo = "login";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'] ?? 'login';
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password'] ?? '');

    if (!$email || empty($password)) {
        if ($accion === 'login') {
            $error_login = "Ingresa un correo y contraseña válidos.";
        } else {
            $error_registro = "Ingresa un correo y contraseña válidos.";
            $modo_activo = "registro";
        }
    } else {
        if ($accion === 'login') {
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                $usuario = $resultado->fetch_assoc();
                // Verificar si tiene contraseña encriptada o la verifica
                if (!empty($usuario['password']) && password_verify($password, $usuario['password'])) {
                    $_SESSION['usuario_id'] = $usuario['id'];
                    $_SESSION['usuario_email'] = $usuario['email'];
                    header("Location: cuentos.php");
                    exit();
                } else {
                    $error_login = "Contraseña incorrecta. Inténtalo de nuevo.";
                }
            } else {
                $error_login = "Este correo no está registrado.";
            }
        } elseif ($accion === 'registro') {
            $modo_activo = "registro";
            
            $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            if ($stmt->get_result()->num_rows > 0) {
                $error_registro = "Este correo ya está registrado. Haz clic en 'Iniciar Sesión'.";
            } else {
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $stmt_ins = $conn->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
                $stmt_ins->bind_param("ss", $email, $hash);
                
                if ($stmt_ins->execute()) {
                    $_SESSION['usuario_id'] = $stmt_ins->insert_id;
                    $_SESSION['usuario_email'] = $email;
                    header("Location: cuentos.php");
                    exit();
                } else {
                    $error_registro = "Error al crear la cuenta. Inténtalo más tarde.";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso - Letras Verdes</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f0fdf4; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .login-card { background: #ffffff; padding: 30px; border-radius: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border: 2px solid #a3e635; text-align: center; width: 90%; max-width: 360px; }
        .login-card h2 { color: #2e7d32; margin-bottom: 15px; }
        .tabs { display: flex; margin-bottom: 20px; border-bottom: 2px solid #e2e8f0; }
        .tab-btn { flex: 1; padding: 10px; border: none; background: none; font-weight: bold; color: #64748b; cursor: pointer; font-size: 0.95rem; }
        .tab-btn.activo { color: #2e7d32; border-bottom: 3px solid #2e7d32; }
        .form-group { display: none; }
        .form-group.activo { display: block; }
        input[type="email"], input[type="password"] { width: 100%; padding: 12px; margin: 8px 0 14px 0; border: 2px solid #cbd5e1; border-radius: 10px; font-size: 0.95rem; outline: none; box-sizing: border-box; }
        input:focus { border-color: #2e7d32; }
        .btn-ingresar { background-color: #2e7d32; color: white; border: none; padding: 12px 24px; border-radius: 25px; font-weight: bold; font-size: 1rem; cursor: pointer; width: 100%; margin-top: 10px; }
        .btn-ingresar:hover { background-color: #1b4332; }
        .error { color: #d32f2f; font-size: 0.85rem; margin-bottom: 10px; text-align: left; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>🌿 Letras Verdes</h2>
        
        <div class="tabs">
            <button class="tab-btn <?php echo ($modo_activo === 'login') ? 'activo' : ''; ?>" onclick="cambiarTab('login')">Iniciar Sesión</button>
            <button class="tab-btn <?php echo ($modo_activo === 'registro') ? 'activo' : ''; ?>" onclick="cambiarTab('registro')">Registrarse</button>
        </div>

        <div id="form-login" class="form-group <?php echo ($modo_activo === 'login') ? 'activo' : ''; ?>">
            <?php if (!empty($error_login)): ?><p class="error">⚠️ <?php echo htmlspecialchars($error_login); ?></p><?php endif; ?>
            <form method="POST" action="">
                <input type="hidden" name="accion" value="login">
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit" class="btn-ingresar">Entrar</button>
            </form>
        </div>

        <div id="form-registro" class="form-group <?php echo ($modo_activo === 'registro') ? 'activo' : ''; ?>">
            <?php if (!empty($error_registro)): ?><p class="error">⚠️ <?php echo htmlspecialchars($error_registro); ?></p><?php endif; ?>
            <form method="POST" action="">
                <input type="hidden" name="accion" value="registro">
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Crea una contraseña" required>
                <button type="submit" class="btn-ingresar">Crear Cuenta</button>
            </form>
        </div>
    </div>

    <script>
    function cambiarTab(tab) {
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('activo'));
        document.querySelectorAll('.form-group').forEach(form => form.classList.remove('activo'));
        if (tab === 'login') {
            document.querySelectorAll('.tab-btn')[0].classList.add('activo');
            document.getElementById('form-login').classList.add('activo');
        } else {
            document.querySelectorAll('.tab-btn')[1].classList.add('activo');
            document.getElementById('form-registro').classList.add('activo');
        }
    }
    </script>
</body>
</html>