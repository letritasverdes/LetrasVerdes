<?php
// Datos dinámicos
$proyecto = "Letras Verdes";
$tagline = "Aprende Jugando";
$descripcion = "Una plataforma educativa donde los niños de educación básica aprenden Español y Matemáticas de forma divertida, interactiva y dinámica.";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($descripcion); ?>">
    <title><?php echo htmlspecialchars($proyecto); ?> - <?php echo htmlspecialchars($tagline); ?></title>
    
    <link rel="shortcut icon" href="img/hero_1.jpg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
</head>
<body>

    <!-- Barra de progreso -->
    <div class="scroll-progress" id="progress"></div>

    <!-- Header -->
    <header id="header">
        <a href="#inicio" class="logo-link">
            <img src="img/hero_1.jpg?v=<?php echo time(); ?>" alt="<?php echo htmlspecialchars($proyecto); ?>" class="header-logo">
        </a>
        
        <button class="menu-toggle" id="menuToggle" aria-label="Abrir menú">☰</button>

        <nav id="navMenu">
            <ul>
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#features">Características</a></li>
                <li><a href="#materias">Materias</a></li>
                <li><a href="cuentos.php" class="cuentos-nav-link"> Cuentos</a></li>
                <li><a href="#proyecto">Proyecto</a></li>
                <li><a href="#equipo">Equipo</a></li>
                <li><a href="#redes">Redes</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero -->
    <section class="hero" id="inicio">
        <div class="hero-content">
            <img src="img/hero_1.jpg?v=<?php echo time(); ?>" alt="<?php echo htmlspecialchars($proyecto); ?> Logo" class="hero-logo">
            
            <h1><?php echo htmlspecialchars($proyecto); ?></h1>
            <div class="hero-tagline"><?php echo htmlspecialchars($tagline); ?></div>
            
            <p><?php echo htmlspecialchars($descripcion); ?></p>
            
            <div class="hero-buttons">
                <button id="infoBtn">Probar Demo</button>
                <a href="descargar.php" class="download-btn">Descargar App / Juego</a>
            </div>

            <p id="mensaje"></p>
        </div>
    </section>

    <!-- Features -->
    <section class="features" id="features">
        <h2>Videojuego de Refuerzo</h2>
        <div class="cards">
            <div class="card">
                <h3>Repaso Interactivo</h3>
                <p>Mini-juegos y retos basados en las lecciones del libro para consolidar los conocimientos de Matemáticas y Español.</p>
            </div>
            <div class="card">
                <h3>Evaluación Divertida</h3>
                <p>Misiones y trivias que permiten a los niños poner a prueba lo aprendido de forma dinámica y motivadora.</p>
            </div>
            <div class="card">
                <h3>Herramienta Docente</h3>
                <p>Un canal de apoyo para que los profesores refuercen los temas vistos en el aula mediante actividades digitales.</p>
            </div>
        </div>
    </section>

    <!-- Materias -->
    <section class="materias" id="materias">
        <h2>Materias Principales</h2>
        <div class="cards">
            <div class="card">
                <h3>Español</h3>
                <p>Lectura, comprensión lectora, ortografía y gramática adaptadas a la educación básica.</p>
            </div>
            <div class="card">
                <h3>Matemáticas</h3>
                <p>Operaciones básicas, problemas de razonamiento, geometría y ejercicios interactivos.</p>
            </div>
        </div>
    </section>

    <!-- Proyecto -->
    <section class="proyecto" id="proyecto">
        <div class="contenedor">
            <h2>Sobre el Proyecto</h2>
            <p><strong>Letras Verdes</strong> nace con la visión de transformar la educación tradicional combinando el aprendizaje con el juego interactivo.</p>
            <p>Buscamos fomentar el interés en materias clave como Español y Matemáticas mediante experiencias digitales accesibles y entretenidas.</p>
        </div>
    </section>

    <!-- Equipo -->
    <section class="equipo" id="equipo">
        <h2>Equipo Creador</h2>
        <div class="cards">
            <div class="card">
                <h3>Robledo Gaeta Montserrat</h3>
                <p>Investigación del proyecto y análisis de los Objetivos de Desarrollo Sostenible (ODS).</p>
            </div>
            <div class="card">
                <h3>Martínez García Edgar Uriel</h3>
                <p>Creación del videojuego/app, diseño de la experiencia interactiva y elaboración de recursos visuales.</p>
            </div>
            <div class="card">
                <h3>Peralta Navarrete Sebastián</h3>
                <p>Desarrollo de la página web, diseño, programación e integración tecnológica del servidor.</p>
            </div>
        </div>
    </section>

    <!-- Redes Sociales -->
    <section class="redes-sociales" id="redes">
        <h2>Síguenos en Redes Sociales</h2>
        <div class="redes-contenedor">
            <a href="https://www.instagram.com/letrasverdees/" target="_blank" rel="noopener noreferrer" class="red-card instagram">
                <svg viewBox="0 0 24 24" class="red-icon"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                <span>Instagram</span>
            </a>
            <a href="https://www.tiktok.com/@letras.verdes0" target="_blank" rel="noopener noreferrer" class="red-card tiktok">
                <svg viewBox="0 0 24 24" class="red-icon"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.67 2.58-4.86 1.49-1.2 3.48-1.74 5.4-1.5v4.21c-.87-.13-1.77.06-2.5.55-.78.51-1.28 1.38-1.37 2.31-.12 1.18.35 2.37 1.25 3.12.87.75 2.07.97 3.18.61 1.09-.34 1.95-1.26 2.22-2.37.14-.6.18-1.22.18-1.84V.02z"/></svg>
                <span>TikTok</span>
            </a>
            <a href="https://www.facebook.com/profile.php?id=61594960490216" target="_blank" rel="noopener noreferrer" class="red-card facebook">
                <svg viewBox="0 0 24 24" class="red-icon"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                <span>Facebook</span>
            </a>
        </div>
    </section>

    <!-- Contacto -->
    <section class="contacto" id="contacto">
        <h2>Contacto</h2>
        <form id="contactForm" action="https://formspree.io/f/xppwnobv" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>

            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" placeholder="tu@email.com" required>

            <label for="mensaje-form">Mensaje</label>
            <textarea id="mensaje-form" name="mensaje" placeholder="Escribe tu mensaje aquí..." required></textarea>

            <button type="submit" id="btnEnviar">Enviar Mensaje</button>
        </form>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($proyecto); ?>. Todos los derechos reservados.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>