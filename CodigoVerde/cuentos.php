<?php
require_once 'cuentos_db.php';

$proyecto = "Letras Verdes";
$titulo_seccion = "Biblioteca de Cuentos";
$descripcion_seccion = "Explora 80 cuentos interactivos de Español y Matemáticas diseñados para 1º y 2º grado.";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($titulo_seccion); ?> - <?php echo htmlspecialchars($proyecto); ?></title>
    
    <link rel="shortcut icon" href="img/hero_1.jpg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="cuentos.css?v=<?php echo time(); ?>">
</head>
<body>

    <div class="scroll-progress" id="progress"></div>

    <header id="header">
        <a href="index.php" class="logo-link">
            <img src="img/hero_1.jpg?v=<?php echo time(); ?>" alt="<?php echo htmlspecialchars($proyecto); ?>" class="header-logo">
        </a>
        <button class="menu-toggle" id="menuToggle" aria-label="Abrir menú">☰</button>
        <nav id="navMenu">
            <ul>
                <li><a href="index.php#inicio">Inicio</a></li>
                <li><a href="index.php#features">Características</a></li>
                <li><a href="index.php#materias">Materias</a></li>
                <li><a href="cuentos.php" class="cuentos-nav-link active">📚 Cuentos</a></li>
                <li><a href="index.php#proyecto">Proyecto</a></li>
                <li><a href="index.php#equipo">Equipo</a></li>
                <li><a href="index.php#contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <section class="cuentos-hero">
        <div class="hero-content">
            <h1><?php echo htmlspecialchars($titulo_seccion); ?></h1>
            <p><?php echo htmlspecialchars($descripcion_seccion); ?></p>
        </div>
    </section>

    <!-- Barra de Búsqueda y Filtros -->
    <div class="filtro-materia-container">
        <div class="buscador-box">
            <input type="text" id="inputBuscador" placeholder="🔍 Buscar cuento por nombre o personaje..." onkeyup="filtrarCuentos()">
        </div>
        <div class="filtro-materia">
            <button class="btn-filtro activo" onclick="filtrarMateria('todos', this)">🌟 Todos</button>
            <button class="btn-filtro" onclick="filtrarMateria('espanol', this)">📚 Español</button>
            <button class="btn-filtro" onclick="filtrarMateria('matematicas', this)">🔢 Matemáticas</button>
        </div>
    </div>

    <!-- Primer Grado -->
    <section class="grados-seccion">
        <div class="contenedor-grado">
            <h2>Primer Grado (40 Cuentos)</h2>
            <div class="grid-cuentos" id="grid-grado-1">
                <?php foreach ($TODOS_LOS_CUENTOS as $c): ?>
                    <?php if ($c['grado'] === 1): ?>
                        <div class="cuento-card" data-materia="<?php echo $c['materia']; ?>" data-titulo="<?php echo strtolower($c['titulo']); ?>">
                            <span class="badge <?php echo $c['materia']; ?>"><?php echo strtoupper($c['materia']); ?></span>
                            <div class="emoji-header"><?php echo $c['emoji']; ?></div>
                            <h3><?php echo $c['titulo']; ?></h3>
                            <p><?php echo $c['resumen']; ?></p>
                            <button class="cuento-btn" onclick="abrirModalCuento('<?php echo $c['id']; ?>')">📖 Leer Ficha</button>

                            <template id="data-<?php echo $c['id']; ?>">
                                <div class="cuento-ilutracion-header"><?php echo $c['emoji']; ?></div>
                                <h2 id="modalTitulo"><?php echo $c['titulo']; ?></h2>
                                <div id="modalTexto">
                                    <?php echo $c['texto']; ?>
                                    <div class="caja-moraleja">
                                        <strong>💡 Aprendizaje / Moraleja:</strong>
                                        <?php echo $c['moraleja']; ?>
                                    </div>
                                </div>
                            </template>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Segundo Grado -->
    <section class="grados-seccion alt-bg">
        <div class="contenedor-grado">
            <h2>Segundo Grado (40 Cuentos)</h2>
            <div class="grid-cuentos" id="grid-grado-2">
                <?php foreach ($TODOS_LOS_CUENTOS as $c): ?>
                    <?php if ($c['grado'] === 2): ?>
                        <div class="cuento-card" data-materia="<?php echo $c['materia']; ?>" data-titulo="<?php echo strtolower($c['titulo']); ?>">
                            <span class="badge <?php echo $c['materia']; ?>"><?php echo strtoupper($c['materia']); ?></span>
                            <div class="emoji-header"><?php echo $c['emoji']; ?></div>
                            <h3><?php echo $c['titulo']; ?></h3>
                            <p><?php echo $c['resumen']; ?></p>
                            <button class="cuento-btn" onclick="abrirModalCuento('<?php echo $c['id']; ?>')">📖 Leer Ficha</button>

                            <template id="data-<?php echo $c['id']; ?>">
                                <div class="cuento-ilutracion-header"><?php echo $c['emoji']; ?></div>
                                <h2 id="modalTitulo"><?php echo $c['titulo']; ?></h2>
                                <div id="modalTexto">
                                    <?php echo $c['texto']; ?>
                                    <div class="caja-moraleja">
                                        <strong>💡 Aprendizaje / Moraleja:</strong>
                                        <?php echo $c['moraleja']; ?>
                                    </div>
                                </div>
                            </template>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Modal Ficha Ilustrada -->
    <div id="modalCuento" class="modal">
        <div class="modal-contenido ficha-educativa">
            <span class="cerrar-modal" id="btnCerrarModal">&times;</span>
            <div id="modalFichaBody"></div>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($proyecto); ?>. Todos los derechos reservados.</p>
    </footer>

    <script src="script.js"></script>
    <script src="cuentos.js"></script>
</body>
</html>