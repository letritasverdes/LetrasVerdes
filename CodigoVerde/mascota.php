<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION['usuario_email'])) {
    header("Location: login.php");
    exit();
}

$stmt =$conn->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $_SESSION['usuario_email']);$stmt->execute();
$usuario =$stmt->get_result()->fetch_assoc();

$mascota =$usuario['mascota_clave'] ?? 'leto';
$hambre =$usuario['hambre'] ?? 100;
$felicidad =$usuario['felicidad'] ?? 100;
$energia =$usuario['energia'] ?? 100;
$higiene =$usuario['higiene'] ?? 100;
$monedas =$usuario['monedas'] ?? 250;
$nivel =$usuario['nivel'] ?? 1;
$inventario_raw = !empty($usuario['inventario']) ?$usuario['inventario'] : '{}';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Pou Completo - Letras Verdes</title>
    <style>
        * { user-select: none; box-sizing: border-box; touch-action: none; font-family: sans-serif; }
        body { background: #0f172a; margin: 0; padding: 10px; display: flex; flex-direction: column; align-items: center; color: #fff; }
        .pou-topbar { width: 100%; max-width: 450px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; }
        .btn-salir { background: #fff; color: #166534; padding: 6px 14px; border-radius: 20px; font-weight: bold; text-decoration: none; }
        .monedas-box { background: #fef08a; border: 2px solid #eab308; color: #854d0e; padding: 6px 14px; border-radius: 20px; font-weight: bold; }
        
        .pou-screen { width: 100%; max-width: 450px; height: 530px; background: #fed7aa; border: 6px solid #334155; border-radius: 24px; position: relative; display: flex; flex-direction: column; justify-content: space-between; padding: 10px; overflow: hidden; }
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 4px; background: rgba(255,255,255,0.9); padding: 6px; border-radius: 12px; }
        .stat-card { text-align: center; font-size: 0.65rem; color: #1e293b; font-weight: bold; }
        .bar-outer { width: 100%; height: 6px; background: #cbd5e1; border-radius: 4px; overflow: hidden; margin-top: 2px; }
        .bar-inner { height: 100%; width: 100%; transition: width 0.3s; }
        .b-hambre { background: #f97316; } .b-felicidad { background: #eab308; } .b-energia { background: #3b82f6; } .b-higiene { background: #06b6d4; }

        .stage { position: relative; width: 100%; height: 320px; display: flex; justify-content: center; align-items: center; }
        .pou-body-container { position: relative; width: 170px; height: 170px; transition: transform 0.3s; }
        .pou-sprite { width: 100%; height: 100%; object-fit: contain; }
        .dirt-layer, .soap-layer { position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; }
        .dirt-spot { position: absolute; width: 22px; height: 22px; background: #78350f; border-radius: 50%; opacity: 0.85; }
        .soap-bubble { position: absolute; width: 26px; height: 26px; background: rgba(255,255,255,0.9); border: 2px solid #38bdf8; border-radius: 50%; }

        .drag-item { width: 60px; height: 60px; position: absolute; z-index: 1000; cursor: grab; display: flex; align-items: center; justify-content: center; font-size: 2.8rem; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3)); }
        .shelf { display: flex; justify-content: flex-start; gap: 8px; background: rgba(255,255,255,0.3); padding: 8px; border-radius: 16px; min-height: 65px; overflow-x: auto; }
        .shelf-slot { min-width: 50px; height: 50px; background: rgba(255,255,255,0.9); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; cursor: pointer; position: relative; flex-shrink: 0; }
        .badge-count { position: absolute; top: -4px; right: -4px; background: #ef4444; color: #fff; border-radius: 10px; padding: 1px 5px; font-size: 0.6rem; font-weight: bold; }

        .room-nav { display: grid; grid-template-columns: repeat(6, 1fr); gap: 3px; width: 100%; max-width: 450px; margin-top: 8px; }
        .room-btn { background: #334155; color: #fff; border: none; padding: 8px 0; border-radius: 8px; font-size: 0.7rem; font-weight: bold; cursor: pointer; text-align: center; }
        .room-btn.active { background: #22c55e; }

        .overlay-panel { display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: #0f172a; z-index: 2000; border-radius: 18px; padding: 12px; flex-direction: column; }
        .subnav-tabs { display: flex; gap: 6px; overflow-x: auto; margin-bottom: 10px; padding-bottom: 4px; }
        .tab-btn { background: #334155; color: #fff; border: none; padding: 6px 12px; border-radius: 8px; font-size: 0.75rem; cursor: pointer; white-space: nowrap; }
        .tab-btn.active { background: #ec4899; }
    </style>
</head>
<body>

    <div class="pou-topbar">
        <a href="cuentos.php" class="btn-salir">🏠 Salir</a>
        <div>Nivel <span id="lblNivel"><?php echo $nivel; ?></span></div>
        <div class="monedas-box">🪙 <span id="lblMonedas"><?php echo $monedas; ?></span></div>
    </div>

    <div class="pou-screen" id="screen">
        <!-- Overlay Minijuegos -->
        <div id="gameOverlay" class="overlay-panel">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                <h3 style="margin:0; font-size:1rem;">🎮 Selecciona un Minijuego</h3>
                <button onclick="cerrarOverlay()" style="background:#ef4444; color:white; border:none; padding:4px 8px; border-radius:6px;">❌</button>
            </div>
            <div class="subnav-tabs">
                <button class="tab-btn" onclick="juegoEngine.iniciarFoodDrop()">🍕 Food Drop</button>
                <button class="tab-btn" onclick="juegoEngine.iniciarSkyJump()">☁️ Sky Jump</button>
                <button class="tab-btn" onclick="juegoEngine.iniciarFreeFall()">🪂 Free Fall</button>
                <button class="tab-btn" onclick="juegoEngine.iniciarGoal()">⚽ Goal</button>
                <button class="tab-btn" onclick="juegoEngine.iniciarConnect()">🧩 Connect</button>
                <button class="tab-btn" onclick="juegoEngine.iniciarColorMatch()">🎨 Match</button>
                <button class="tab-btn" onclick="juegoEngine.iniciarMemory()">🎴 Memory</button>
                <button class="tab-btn" onclick="juegoEngine.iniciarSadTap()">😢 Sad Tap</button>
                <button class="tab-btn" onclick="juegoEngine.iniciarTicTacPou()">❌ Tic Tac</button>
            </div>
            <canvas id="minijuegoCanvas" width="400" height="380" style="background:#0284c7; border-radius:10px;"></canvas>
        </div>

        <!-- Overlay Tienda Completa -->
        <div id="shopOverlay" class="overlay-panel" style="overflow-y:auto;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                <h3 style="margin:0; font-size:1rem;">🛒 Tienda de Pou</h3>
                <button onclick="cerrarOverlay()" style="background:#ef4444; color:white; border:none; padding:4px 8px; border-radius:6px;">❌</button>
            </div>
            <div class="subnav-tabs" id="shopTabs"></div>
            <div id="shopContent" style="display:grid; grid-template-columns: 1fr 1fr; gap:8px;"></div>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">🍕 <span id="valHambre"><?php echo $hambre; ?></span>%<div class="bar-outer"><div id="barHambre" class="bar-inner b-hambre"></div></div></div>
            <div class="stat-card">⚽ <span id="valFelicidad"><?php echo $felicidad; ?></span>%<div class="bar-outer"><div id="barFelicidad" class="bar-inner b-felicidad"></div></div></div>
            <div class="stat-card">⚡ <span id="valEnergia"><?php echo $energia; ?></span>%<div class="bar-outer"><div id="barEnergia" class="bar-inner b-energia"></div></div></div>
            <div class="stat-card">🧼 <span id="valHigiene"><?php echo $higiene; ?></span>%<div class="bar-outer"><div id="barHigiene" class="bar-inner b-higiene"></div></div></div>
        </div>

        <!-- Stage -->
        <div class="stage" id="stage">
            <div class="pou-body-container" id="pouContainer">
                <img id="pouSprite" class="pou-sprite" src="imgM/<?php echo $mascota; ?>/e1.png" alt="Pou">
                <div class="dirt-layer" id="dirtLayer"></div>
                <div class="soap-layer" id="soapLayer"></div>
            </div>
        </div>

        <div class="shelf" id="shelf"></div>
    </div>

    <!-- Navegación por Salas -->
    <div class="room-nav">
        <button class="room-btn active" onclick="irASala('cocina', event)">🍕 Cocina</button>
        <button class="room-btn" onclick="irASala('bano', event)">🧼 Baño</button>
        <button class="room-btn" onclick="irASala('dormitorio', event)">🌙 Cuarto</button>
        <button class="room-btn" onclick="irASala('lab', event)">🧪 Lab</button>
        <button class="room-btn" onclick="irASala('juegos', event)">🎮 Juegos</button>
        <button class="room-btn" onclick="irASala('tienda', event)">🛒 Tienda</button>
    </div>

    <script src="tienda_datos.js"></script>
    <script src="minijuegos.js"></script>
    <script>
    let state = {
        hambre: <?php echo $hambre; ?>,
        felicidad: <?php echo $felicidad; ?>,
        energia: <?php echo $energia; ?>,
        higiene: <?php echo $higiene; ?>,
        monedas: <?php echo $monedas; ?>,
        nivel: <?php echo $nivel; ?>,
        inventario: <?php echo $inventario_raw; ?>
    };

    const mascotaClave = "<?php echo $mascota; ?>";
    let juegoEngine = null;
    let esNoche = false;

    window.onload = () => {
        const canvas = document.getElementById('minijuegoCanvas');
        const ctx = canvas.getContext('2d');
        juegoEngine = new MotoresMinijuegos(canvas, ctx, (monedasGanadas) => {
            state.monedas += monedasGanadas;
            actualizarBarras();
        });

        actualizarBarras();
        irASala('cocina');
    };

    function actualizarBarras() {
        document.getElementById('barHambre').style.width = state.hambre + '%';
        document.getElementById('barFelicidad').style.width = state.felicidad + '%';
        document.getElementById('barEnergia').style.width = state.energia + '%';
        document.getElementById('barHigiene').style.width = state.higiene + '%';

        document.getElementById('valHambre').textContent = state.hambre;
        document.getElementById('valFelicidad').textContent = state.felicidad;
        document.getElementById('valEnergia').textContent = state.energia;
        document.getElementById('valHigiene').textContent = state.higiene;
        document.getElementById('lblMonedas').textContent = state.monedas;
        document.getElementById('lblNivel').textContent = state.nivel;

        guardarServidor();
    }

    function irASala(sala, e) {
        if (e) {
            document.querySelectorAll('.room-btn').forEach(b => b.classList.remove('active'));
            e.target.classList.add('active');
        }

        const shelf = document.getElementById('shelf');
        shelf.innerHTML = '';

        if (sala === 'cocina') {
            for (let cat in state.inventario.comida || {}) {
                for (let itemKey in state.inventario.comida[cat]) {
                    let cant = state.inventario.comida[cat][itemKey];
                    if (cant > 0) {
                        let meta = buscarMetaItem('comida', cat, itemKey);
                        shelf.innerHTML += `<div class="shelf-slot" onclick="crearArrastrable('${meta.icon}', 'comida', '${cat}', '${itemKey}')">${meta.icon}<span class="badge-count">${cant}</span></div>`;
                    }
                }
            }
        } else if (sala === 'bano') {
            shelf.innerHTML = `
                <div class="shelf-slot" onclick="crearArrastrable('🧼', 'jabon')">🧼</div>
                <div class="shelf-slot" onclick="crearArrastrable('🚿', 'ducha')">🚿</div>
            `;
        } else if (sala === 'dormitorio') {
            shelf.innerHTML = `<button style="background:#475569; color:white; border:none; padding:10px 20px; border-radius:12px; font-weight:bold; cursor:pointer;" onclick="toggleLuz()">${esNoche ? '☀️ Encender Luz' : '🌙 Apagar Luz'}</button>`;
        } else if (sala === 'lab') {
            for (let itemKey in state.inventario.pociones || {}) {
                let cant = state.inventario.pociones[itemKey];
                if (cant > 0) {
                    let meta = TIENDA_CATALOGO.pociones.find(p => p.id === itemKey);
                    if (meta) {
                        shelf.innerHTML += `<div class="shelf-slot" onclick="crearArrastrable('${meta.icon}', 'pocion', null, '${itemKey}')">${meta.icon}<span class="badge-count">${cant}</span></div>`;
                    }
                }
            }
        } else if (sala === 'juegos') {
            shelf.innerHTML = `<button style="background:#f59e0b; color:white; border:none; padding:10px 20px; border-radius:12px; font-weight:bold; cursor:pointer;" onclick="abrirMinijuegos()">🎮 Abrir Galería de Minijuegos</button>`;
        } else if (sala === 'tienda') {
            shelf.innerHTML = `<button style="background:#ec4899; color:white; border:none; padding:10px 20px; border-radius:12px; font-weight:bold; cursor:pointer;" onclick="abrirTienda('comida')">🛒 Entrar a la Tienda</button>`;
        }
    }

    function buscarMetaItem(tipo, cat, id) {
        if (tipo === 'comida') {
            return TIENDA_CATALOGO.comida[cat].find(i => i.id === id);
        }
        return TIENDA_CATALOGO.pociones.find(i => i.id === id);
    }

    function crearArrastrable(emoji, tipo, cat = null, idItem = null) {
        const antiguo = document.querySelector('.drag-item');
        if (antiguo) antiguo.remove();

        const item = document.createElement('div');
        item.className = 'drag-item';
        item.textContent = emoji;

        const stage = document.getElementById('stage');
        stage.appendChild(item);
        item.style.left = '42%'; item.style.top = '55%';

        let dragging = false, bites = 0;

        item.onpointerdown = (e) => { dragging = true; item.setPointerCapture(e.pointerId); };
        item.onpointermove = (e) => {
            if (!dragging) return;
            const rect = stage.getBoundingClientRect();
            item.style.left = (e.clientX - rect.left - 30) + 'px';
            item.style.top = (e.clientY - rect.top - 30) + 'px';

            const pouRect = document.getElementById('pouContainer').getBoundingClientRect();
            const iRect = item.getBoundingClientRect();

            if (!(iRect.right < pouRect.left || iRect.left > pouRect.right || iRect.bottom < pouRect.top || iRect.top > pouRect.bottom)) {
                if (tipo === 'comida') {
                    bites++;
                    if (bites % 8 === 0) {
                        let meta = buscarMetaItem('comida', cat, idItem);
                        state.hambre = Math.min(100, state.hambre + meta.restaura);
                        document.getElementById('pouSprite').src = `imgM/${mascotaClave}/e2.png`;

                        if (bites >= 24) {
                            state.inventario.comida[cat][idItem]--;
                            item.remove();
                            document.getElementById('pouSprite').src = `imgM/${mascotaClave}/e1.png`;
                            actualizarBarras();
                            irASala('cocina');
                        }
                    }
                } else if (tipo === 'jabon') {
                    if (Math.random() < 0.25) {
                        const bubble = document.createElement('div');
                        bubble.className = 'soap-bubble';
                        bubble.style.left = Math.random() * 120 + 'px';
                        bubble.style.top = Math.random() * 120 + 'px';
                        document.getElementById('soapLayer').appendChild(bubble);
                    }
                } else if (tipo === 'ducha') {
                    document.getElementById('soapLayer').innerHTML = '';
                    document.getElementById('dirtLayer').innerHTML = '';
                    state.higiene = Math.min(100, state.higiene + 4);
                    actualizarBarras();
                } else if (tipo === 'pocion') {
                    aplicarEfectoPocion(idItem);
                    state.inventario.pociones[idItem]--;
                    item.remove();
                    actualizarBarras();
                    irASala('lab');
                }
            }
        };
        item.onpointerup = () => { dragging = false; if (tipo === 'jabon' || tipo === 'ducha') item.remove(); };
    }

    function aplicarEfectoPocion(id) {
        if (id === 'small_health') state.hambre = Math.min(100, state.hambre + 25);
        if (id === 'health') { state.hambre = 100; state.higiene = 100; }
        if (id === 'energizer') state.energia = 100;
        if (id === 'hunger') state.hambre = 0;
        if (id === 'max_todo') { state.hambre = 100; state.felicidad = 100; state.energia = 100; state.higiene = 100; }
        if (id === 'crecer') document.getElementById('pouContainer').style.transform = "scale(1.2)";
        if (id === 'encoger') document.getElementById('pouContainer').style.transform = "scale(0.8)";
    }

    function toggleLuz() {
        esNoche = !esNoche;
        if (esNoche) state.energia = 100;
        document.getElementById('screen').style.background = esNoche ? '#0f172a' : '#cbd5e1';
        actualizarBarras();
        irASala('dormitorio');
    }

    function abrirMinijuegos() {
        document.getElementById('gameOverlay').style.display = 'flex';
        juegoEngine.iniciarFoodDrop();
    }

    function abrirTienda(seccion = 'comida') {
        const overlay = document.getElementById('shopOverlay');
        const tabs = document.getElementById('shopTabs');
        const content = document.getElementById('shopContent');
        overlay.style.display = 'flex';
        tabs.innerHTML = ''; content.innerHTML = '';

        if (seccion === 'comida') {
            for (let cat in TIENDA_CATALOGO.comida) {
                tabs.innerHTML += `<button class="tab-btn" onclick="renderProductosComida('${cat}')">${cat.toUpperCase()}</button>`;
            }
            tabs.innerHTML += `<button class="tab-btn" onclick="abrirTienda('pociones')">🧪 POCIONES</button>`;
            renderProductosComida('comida_rapida');
        } else {
            tabs.innerHTML = `<button class="tab-btn" onclick="abrirTienda('comida')">🍕 COMIDA</button>`;
            TIENDA_CATALOGO.pociones.forEach(p => {
                content.innerHTML += `
                    <div style="background:#1e293b; padding:8px; border-radius:8px; text-align:center;">
                        <div style="font-size:2rem;">${p.icon}</div>
                        <div style="font-size:0.75rem; font-weight:bold;">${p.nombre}</div>
                        <button onclick="comprarPocion('${p.id}', ${p.precio})" style="background:#22c55e; color:white; border:none; padding:4px 8px; border-radius:6px; margin-top:4px; cursor:pointer;">${p.precio} 🪙</button>
                    </div>`;
            });
        }
    }

    function renderProductosComida(cat) {
        const content = document.getElementById('shopContent');
        content.innerHTML = '';
        TIENDA_CATALOGO.comida[cat].forEach(p => {
            content.innerHTML += `
                <div style="background:#1e293b; padding:8px; border-radius:8px; text-align:center;">
                    <div style="font-size:2rem;">${p.icon}</div>
                    <div style="font-size:0.75rem; font-weight:bold;">${p.nombre}</div>
                    <button onclick="comprarComida('${cat}', '${p.id}', ${p.precio})" style="background:#22c55e; color:white; border:none; padding:4px 8px; border-radius:6px; margin-top:4px; cursor:pointer;">${p.precio} 🪙</button>
                </div>`;
        });
    }

    function comprarComida(cat, id, precio) {
        if (state.monedas >= precio) {
            state.monedas -= precio;
            state.inventario.comida = state.inventario.comida || {};
            state.inventario.comida[cat] = state.inventario.comida[cat] || {};
            state.inventario.comida[cat][id] = (state.inventario.comida[cat][id] || 0) + 1;
            actualizarBarras();
            alert("✅ Comprado correctamente");
        } else alert("⚠️ Monedas insuficientes");
    }

    function comprarPocion(id, precio) {
        if (state.monedas >= precio) {
            state.monedas -= precio;
            state.inventario.pociones = state.inventario.pociones || {};
            state.inventario.pociones[id] = (state.inventario.pociones[id] || 0) + 1;
            actualizarBarras();
            alert("✅ Poción comprada");
        } else alert("⚠️ Monedas insuficientes");
    }

    function cerrarOverlay() {
        document.getElementById('gameOverlay').style.display = 'none';
        document.getElementById('shopOverlay').style.display = 'none';
        if (juegoEngine) juegoEngine.detener();
    }

    function guardarServidor() {
        fetch('guardar_estado_pou.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(state)
        });
    }
    </script>
</body>
</html>