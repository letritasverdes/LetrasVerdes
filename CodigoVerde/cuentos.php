<?php
session_start();
require_once "conexion.php";

// 1. Validar sesión activa
if (!isset($_SESSION['usuario_email'])) {
    header("Location: login.php");
    exit();
}

// 2. Obtener datos del usuario desde MySQL
$stmt =$conn->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $_SESSION['usuario_email']);$stmt->execute();
$resultado =$stmt->get_result();

if ($resultado->num_rows === 0) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$usuario =$resultado->fetch_assoc();

// 3. Cargar catálogo de cuentos
if (file_exists("cuentos_db.php")) {
    include_once "cuentos_db.php";
} else {
    $TODOS_LOS_CUENTOS = [];
}

$materia_filtro = isset($_GET['materia']) ? strtolower($_GET['materia']) : 'todos';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letras Verdes - Cuentos y Lecturas</title>
    <style>
        :root {
            --verde-primario: #2e7d32;
            --verde-claro: #a3e635;
            --verde-fondo: #f0fdf4;
            --texto-oscuro: #1b4332;
            --blanco: #ffffff;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--verde-fondo);
            color: var(--texto-oscuro);
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            position: relative;
        }

        .user-info {
            position: absolute;
            right: 0;
            top: 0;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 12px;
            background: #ffffff;
            padding: 6px 14px;
            border-radius: 20px;
            border: 1px solid #cbd5e1;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .btn-cuidar-mascota {
            background: #fef08a;
            border: 1px solid #eab308;
            color: #854d0e;
            padding: 5px 12px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.85rem;
            transition: all 0.2s ease;
        }

        .btn-cuidar-mascota:hover {
            background: #fde047;
            transform: scale(1.03);
        }

        .btn-eliminar {
            background: none;
            border: none;
            color: #e11d48;
            font-weight: bold;
            font-size: 0.85rem;
            cursor: pointer;
            padding: 0;
            transition: color 0.2s;
        }

        .btn-eliminar:hover {
            color: #9f1239;
            text-decoration: underline;
        }

        .btn-logout {
            color: #d32f2f;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-logout:hover {
            text-decoration: underline;
        }

        .btn-volver-inicio {
            position: absolute;
            left: 0;
            top: 0;
            background-color: var(--blanco);
            border: 2px solid var(--verde-primario);
            color: var(--verde-primario);
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .btn-volver-inicio:hover {
            background-color: var(--verde-primario);
            color: var(--blanco);
        }

        .header h1 {
            color: var(--verde-primario);
            margin: 0;
            font-size: 2.2rem;
        }

        .slogan { color: #4a5568; margin-top: 5px; }

        .filtro-materia {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .btn-filtro {
            background-color: var(--blanco);
            border: 2px solid var(--verde-claro);
            color: var(--texto-oscuro);
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-filtro:hover, .btn-filtro.activo {
            background-color: var(--verde-primario);
            color: var(--blanco);
            border-color: var(--verde-primario);
        }

        .contenedor-cuentos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .tarjeta-cuento {
            background: var(--blanco);
            border-radius: 16px;
            padding: 20px;
            border: 2px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.2s ease;
            cursor: pointer;
            position: relative;
        }

        .tarjeta-cuento:hover { transform: translateY(-5px); border-color: var(--verde-claro); }
        .tarjeta-cuento.leido { border-color: var(--verde-claro); background: #f4fbf7; }

        .tarjeta-cuento.leido::after {
            content: "✓ Leído";
            position: absolute;
            top: 10px;
            right: 12px;
            background: var(--verde-primario);
            color: white;
            font-size: 10px;
            font-weight: bold;
            padding: 2px 8px;
            border-radius: 10px;
        }

        .tarjeta-emoji { font-size: 2.5rem; text-align: center; margin-bottom: 10px; }
        .tarjeta-titulo { font-size: 1.15rem; color: var(--verde-primario); margin: 0 0 8px 0; text-align: center; }
        .tarjeta-resumen { font-size: 0.9rem; color: #4a5568; text-align: center; margin: 0; }

        /* Modales */
        .modal-overlay {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(4px);
            z-index: 9999999; display: flex; align-items: center; justify-content: center;
        }

        .modal-contenido {
            background: var(--blanco); padding: 30px; border-radius: 24px;
            max-width: 500px; width: 90%; text-align: center;
            border: 3px solid var(--verde-claro);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .grid-seleccion-mascotas { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-top: 20px; }

        .card-mascota-modal {
            background: var(--verde-fondo); border: 2px solid #cbd5e1;
            border-radius: 16px; padding: 12px; cursor: pointer; text-align: center;
            transition: all 0.2s ease;
        }

        .card-mascota-modal:hover { border-color: var(--verde-primario); background: #e8f5e9; transform: scale(1.05); }
        .card-mascota-modal img { width: 50px; height: 50px; object-fit: contain; }
        .card-mascota-modal div { font-weight: bold; font-size: 0.9rem; margin-top: 5px; color: var(--verde-primario); }

        /* Widget Flotante de Mascota */
        .mascota-widget-container {
            position: fixed; bottom: 20px; right: 20px; z-index: 999999;
        }

        .burbuja-dialogo {
            background: #ffffff; border: 2px solid var(--verde-primario);
            padding: 10px 14px; border-radius: 15px; text-align: center; margin-bottom: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1); max-width: 210px;
        }

        .badge-nivel {
            background: var(--verde-primario); color: #fff; font-size: 10px;
            padding: 2px 6px; border-radius: 10px; font-weight: bold; display: inline-block; margin-left: 4px;
        }

        .badge-aspectos {
            background: #0284c7; color: #fff; font-size: 10px;
            padding: 2px 6px; border-radius: 10px; font-weight: bold; display: inline-block; margin-top: 4px;
        }

        .barra-progreso-bg {
            width: 100%; height: 6px; background: #e2e8f0; border-radius: 3px; margin: 6px 0; overflow: hidden;
        }

        .barra-progreso-fill { height: 100%; background: var(--verde-claro); width: 0%; transition: width 0.3s; }

        .avatar-mascota {
            background: #ffffff; border: 3px solid var(--verde-claro);
            border-radius: 50%; width: 65px; height: 65px; display: flex;
            align-items: center; justify-content: center; margin-left: auto;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15); transition: transform 0.2s ease;
        }

        .avatar-mascota:hover { transform: scale(1.1); }
        .avatar-mascota img { width: 85%; height: 85%; object-fit: contain; }

        .btn-modal-entendido {
            background-color: var(--verde-primario);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 15px;
            transition: background 0.2s;
        }

        .btn-modal-entendido:hover { background-color: #1b4332; }
    </style>
</head>
<body>

    <!-- Modal para elegir mascota si no tiene una guardada -->
    <div id="modalBienvenida" class="modal-overlay" style="display: <?php echo empty($usuario['mascota_clave']) ? 'flex' : 'none'; ?>;">
        <div class="modal-contenido">
            <h2>🌿 ¡Bienvenido a Letras Verdes!</h2>
            <p>Selecciona tu compañero de lectura para la cuenta:<br><strong><?php echo htmlspecialchars($usuario['email']); ?></strong></p>
            <div class="grid-seleccion-mascotas">
                <div class="card-mascota-modal" onclick="guardarMascotaBD('leto')">
                    <img src="imgM/leto/e1.png" alt="Leto" onerror="this.src='https://via.placeholder.com/50?text=Leto'">
                    <div>Leto</div>
                </div>
                <div class="card-mascota-modal" onclick="guardarMascotaBD('lia')">
                    <img src="imgM/lia/e1.png" alt="Lía" onerror="this.src='https://via.placeholder.com/50?text=L%C3%ADa'">
                    <div>Lía</div>
                </div>
                <div class="card-mascota-modal" onclick="guardarMascotaBD('letrabee')">
                    <img src="imgM/letrabee/e1.png" alt="Letrabee" onerror="this.src='https://via.placeholder.com/50?text=Letrabee'">
                    <div>Letrabee</div>
                </div>
                <div class="card-mascota-modal" onclick="guardarMascotaBD('lilo')">
                    <img src="imgM/lilo/e1.png" alt="Lilo" onerror="this.src='https://via.placeholder.com/50?text=Lilo'">
                    <div>Lilo</div>
                </div>
                <div class="card-mascota-modal" onclick="guardarMascotaBD('letrin')">
                    <img src="imgM/letrin/e1.png" alt="Letrín" onerror="this.src='https://via.placeholder.com/50?text=Letr%C3%ADn'">
                    <div>Letrín</div>
                </div>
                <div class="card-mascota-modal" onclick="guardarMascotaBD('lubi')">
                    <img src="imgM/lubi/e1.png" alt="Lubi" onerror="this.src='https://via.placeholder.com/50?text=Lubi'">
                    <div>Lubi</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Desbloqueo de Aspecto -->
    <div id="modalDesbloqueo" class="modal-overlay" style="display: none;">
        <div class="modal-contenido">
            <h2>🎉 ¡Nuevo Aspecto Desbloqueado!</h2>
            <div style="margin: 15px 0;">
                <img id="imgNuevodiseno" src="" alt="Nuevo aspecto" style="width: 90px; height: 90px; object-fit: contain;">
            </div>
            <p id="textoDesbloqueo" style="font-size: 1rem; color: #334155; margin-bottom: 10px;"></p>
            <div style="background: #f0fdf4; padding: 12px; border-radius: 12px; border: 1px solid #a3e635; font-size: 0.9rem;">
                💡 <strong>¿Cómo cambiarlo?</strong><br>
                Haz clic en el círculo de tu mascota abajo a la derecha para rotar y elegir tu nuevo diseño.
            </div>
            <button onclick="cerrarModalDesbloqueo()" class="btn-modal-entendido">¡Genial!</button>
        </div>
    </div>

    <header class="header">
        <a href="index.php" class="btn-volver-inicio">🏠 Inicio</a>
        <div class="user-info">
            <span>👤 <?php echo htmlspecialchars($usuario['email']); ?></span>
            
            <a href="mascota.php" class="btn-cuidar-mascota">🐾 Cuidar Mascota</a>

            <form id="formEliminarPerfil" action="eliminar_perfil.php" method="POST" style="display:inline;">
                <button type="button" onclick="confirmarEliminacion()" class="btn-eliminar">🗑️ Reiniciar Perfil</button>
            </form>
            
            <a href="logout.php" class="btn-logout">Cerrar Sesión</a>
        </div>
        <h1>🌿 Letras Verdes</h1>
        <p class="slogan">Libros que siembran un mejor futuro 💚</p>
    </header>

    <nav class="filtro-materia">
        <a href="cuentos.php?materia=todos" class="btn-filtro <?php echo ($materia_filtro == 'todos') ? 'activo' : ''; ?>">☀️ Todos</a>
        <a href="cuentos.php?materia=espanol" class="btn-filtro <?php echo ($materia_filtro == 'espanol') ? 'activo' : ''; ?>">📚 Español</a>
        <a href="cuentos.php?materia=matematicas" class="btn-filtro <?php echo ($materia_filtro == 'matematicas') ? 'activo' : ''; ?>">🔢 Matemáticas</a>
    </nav>

    <main class="contenedor-cuentos">
        <?php 
        if (!empty($TODOS_LOS_CUENTOS) && is_array($TODOS_LOS_CUENTOS)) {
            foreach ($TODOS_LOS_CUENTOS as$index => $cuento) {$materia_cuento = isset($cuento['materia']) ? strtolower($cuento['materia']) : '';
                if ($materia_filtro !== 'todos' && $materia_cuento !==$materia_filtro) continue;

                $idCuento = isset($cuento['id']) ? $cuento['id'] : (string)$index;
                ?>
                <div class="tarjeta-cuento" id="cuento-<?php echo $idCuento; ?>" onclick="leerCuento('<?php echo $idCuento; ?>')">
                    <div class="tarjeta-emoji"><?php echo $cuento['emoji'] ?? '📖'; ?></div>
                    <h3 class="tarjeta-titulo"><?php echo htmlspecialchars($cuento['titulo'] ?? ''); ?></h3>
                    <p class="tarjeta-resumen"><?php echo htmlspecialchars($cuento['resumen'] ?? ''); ?></p>
                </div>
                <?php
            }
        } else {
            echo "<p style='text-align:center; width:100%; color:#64748b;'>No hay cuentos disponibles en este momento.</p>";
        }
        ?>
    </main>

    <!-- Widget flotante inferior con la mascota -->
    <div class="mascota-widget-container">
        <div onclick="hablarMascota()" style="cursor:pointer;">
            <div class="burbuja-dialogo">
                <strong id="nombreMascota">Mascota</strong>
                <span class="badge-nivel" id="badgeNivel">Nivel 1</span>
                <div class="barra-progreso-bg">
                    <div class="barra-progreso-fill" id="barraProgreso"></div>
                </div>
                <span class="badge-aspectos" id="badgeAspectos">🎭 1/4 Aspectos</span>
                <p id="textoMascota" style="font-size: 0.8rem; margin: 4px 0 0 0; color: #334155;">"Pequeñas lecturas, grandes cambios 💚"</p>
            </div>
            <div class="avatar-mascota">
                <img id="imgAvatarMascota" src="" alt="Mascota" onerror="this.src='https://via.placeholder.com/50?text=🐾'">
            </div>
        </div>
    </div>

    <script>
    const MAX_XP = 1000;
    const MAX_NIVEL = 50;

    const MASCOTAS = {
        leto: { nombre: "Leto el ajolote", carpeta: "leto", frases: ["Pequeñas lecturas, grandes cambios 💚", "¡Soy muy curioso!", "¡Sigue leyendo!"] },
        lia: { nombre: "Lía la tortuga", carpeta: "lia", frases: ["Paso a paso se aprende mejor 📖", "¡La paciencia da frutos!", "¡Excelente avance!"] },
        letrabee: { nombre: "Letrabee la abeja", carpeta: "letrabee", frases: ["Cada letra florece 🐝", "¡Un trabajo dulce y genial!", "¡A seguir aprendiendo!"] },
        lilo: { nombre: "Lilo el conejito", carpeta: "lilo", frases: ["La naturaleza se lee 🍃", "¡Demos un salto al siguiente libro!", "¡Me encanta leer!"] },
        letrin: { nombre: "Letrín el arbolito", carpeta: "letrin", frases: ["Cada libro es una semilla 🌱", "¡Tus conocimientos crecen!", "¡Sigue dando frutos!"] },
        lubi: { nombre: "Lubi la mariposita", carpeta: "lubi", frases: ["Las palabras dan alas 💫", "¡Vuela con tu imaginación!", "¡Grandes historias!"] }
    };

    let mascotaActual = "<?php echo $usuario['mascota_clave'] ?? ''; ?>";
    let xpActual = <?php echo floatval($usuario['xp'] ?? 0); ?>;
    let cuentosLeidosIds = <?php echo !empty($usuario['cuentos_leidos']) ?$usuario['cuentos_leidos'] : '[]'; ?>;
    let disenoActual = 1;

    window.onload = function() {
        if (mascotaActual) {
            actualizarInterfaz();
            marcarCuentosLeidosUI();
        }
    };

    function guardarMascotaBD(clave) {
        mascotaActual = clave;
        guardarEnServidor();
        document.getElementById("modalBienvenida").style.display = "none";
        actualizarInterfaz();
    }

    function leerCuento(idCuento) {
        if (!mascotaActual) return;

        if (!cuentosLeidosIds.includes(String(idCuento))) {
            const nivelAntes = obtenerNivelPorXp(xpActual);
            const aspectosAntes = obtenerAspectosDesbloqueados(nivelAntes);

            cuentosLeidosIds.push(String(idCuento));
            
            let xpGanada = cuentosLeidosIds.length <= 10 ? 35 : 15;
            xpActual = Math.min(xpActual + xpGanada, MAX_XP);

            const nivelNuevo = obtenerNivelPorXp(xpActual);
            const aspectosNuevos = obtenerAspectosDesbloqueados(nivelNuevo);

            // Si desbloqueó un nuevo aspecto
            if (aspectosNuevos > aspectosAntes) {
                mostrarNotificacionDesbloqueo(aspectosNuevos);
            }

            actualizarInterfaz();
            marcarCuentosLeidosUI();
            guardarEnServidor(10); // Otorga +10 monedas por cuento leído
        }
    }

    function guardarEnServidor(monedasGanadas = 0) {
        fetch('guardar_progreso.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                mascota: mascotaActual,
                xp: xpActual,
                cuentos: cuentosLeidosIds,
                monedas_extra: monedasGanadas
            })
        });
    }

    function marcarCuentosLeidosUI() {
        cuentosLeidosIds.forEach(id => {
            const el = document.getElementById(`cuento-${id}`);
            if (el) el.classList.add('leido');
        });
    }

    function obtenerNivelPorXp(xp) {
        if (xp >= MAX_XP) return MAX_NIVEL;
        return Math.floor(1 + (xp / MAX_XP) * (MAX_NIVEL - 1));
    }

    function obtenerAspectosDesbloqueados(nivel) {
        if (nivel >= 37.5) return 4;
        if (nivel >= 25.0) return 3;
        if (nivel >= 12.5) return 2;
        return 1;
    }

    function mostrarNotificacionDesbloqueo(numeroAspecto) {
        const info = MASCOTAS[mascotaActual];
        if (!info) return;

        document.getElementById("imgNuevodiseno").src = `imgM/${info.carpeta}/e${numeroAspecto}.png`;
        document.getElementById("textoDesbloqueo").innerHTML = `¡Tu mascota <strong>${info.nombre}</strong> ha desbloqueado el <strong>Aspecto #${numeroAspecto}</strong>!`;
        document.getElementById("modalDesbloqueo").style.display = "flex";
    }

    function cerrarModalDesbloqueo() {
        document.getElementById("modalDesbloqueo").style.display = "none";
    }

    function actualizarInterfaz() {
        if (!mascotaActual || !MASCOTAS[mascotaActual]) return;

        const info = MASCOTAS[mascotaActual];
        const nivelActual = obtenerNivelPorXp(xpActual);
        const porcentaje = Math.min((xpActual / MAX_XP) * 100, 100);
        const aspectosDesbloqueados = obtenerAspectosDesbloqueados(nivelActual);

        if (disenoActual > aspectosDesbloqueados) {
            disenoActual = 1;
        }

        document.getElementById("nombreMascota").textContent = info.nombre;
        document.getElementById("imgAvatarMascota").src = `imgM/${info.carpeta}/e${disenoActual}.png`;
        document.getElementById("badgeNivel").textContent = `Nivel ${nivelActual}`;
        document.getElementById("barraProgreso").style.width = `${porcentaje}%`;
        document.getElementById("badgeAspectos").textContent = `🎭 ${aspectosDesbloqueados}/4 Aspectos`;
    }

    function hablarMascota() {
        if (!mascotaActual || !MASCOTAS[mascotaActual]) return;

        const info = MASCOTAS[mascotaActual];
        const nivelActual = obtenerNivelPorXp(xpActual);
        const aspectosDesbloqueados = obtenerAspectosDesbloqueados(nivelActual);

        disenoActual = (disenoActual % aspectosDesbloqueados) + 1;
        
        document.getElementById("imgAvatarMascota").src = `imgM/${info.carpeta}/e${disenoActual}.png`;
        const fraseAleatoria = info.frases[Math.floor(Math.random() * info.frases.length)];
        document.getElementById("textoMascota").textContent = `"${fraseAleatoria}"`;
    }

    function confirmarEliminacion() {
        const confirmacion = confirm(
            "⚠️ ¿Estás seguro de que deseas reiniciar tu perfil?\n\nSe borrará todo tu progreso, cuentos leídos y mascota actual para que puedas volver a elegir desde cero."
        );

        if (confirmacion) {
            document.getElementById('formEliminarPerfil').submit();
        }
    }
    </script>
</body>
</html>