// ===================================================
// 1. BASE DE DATOS DE CUENTOS (AQUÍ VAN TUS 80 CUENTOS)
// ===================================================
const TODOS_LOS_CUENTOS = [
    // Agrega aquí todos tus cuentos existentes con su formato:
    {
        id: "1",
        materia: "espanol",
        grado: 1,
        emoji: "🦎📖",
        titulo: "Leto y el libro sagrado del agua",
        resumen: "Acompaña a Leto el ajolote a cuidar los ríos limpios.",
        texto: "<p>Había una vez en Xochimilco un ajolote curioso llamado Leto...</p>"
    },
    {
        id: "2",
        materia: "matematicas",
        grado: 1,
        emoji: "🐢🔢",
        titulo: "Las hojas contadas de Lía",
        resumen: "Lía la tortuga nos enseña a sumar mientras junta hojitas.",
        texto: "<p>Lía camina despacio junta 5 hojas verdes y 3 amarillas...</p>"
    }
    /* ... CONTINUA AQUÍ CON TUS 80 CUENTOS ... */
];

// ===================================================
// 2. DATOS Y LÓGICA DE LAS MASCOTAS DE LETRAS VERDES
// ===================================================
const MASCOTAS = {
    leto: {
        nombre: "Leto el ajolote 🦎",
        emoji: "🦎",
        frases: [
            "Pequeñas lecturas, grandes cambios 💚",
            "¡Soy curioso e inteligente! ¿Qué cuento leeremos hoy?",
            "Cuidemos el agua y los ríos aprendiendo juntos 🌱"
        ]
    },
    lia: {
        nombre: "Lía la tortuga 🐢",
        emoji: "🐢",
        frases: [
            "Avanzamos juntos hacia un mundo mejor 💚",
            "Paso a paso y con paciencia se aprende mejor 📖",
            "¡Ser paciente y ecológica es mi superpoder!"
        ]
    },
    letrabee: {
        nombre: "Letrabee la abeja 🐝",
        emoji: "🐝",
        frases: [
            "Cada letra también florece en un mundo mejor 🐝",
            "¡Trabajar en equipo hace la lectura más dulce!",
            "¡Cada historia ayuda a crear un gran jardín!"
        ]
    },
    lilo: {
        nombre: "Lilo el conejito 🐰",
        emoji: "🐰",
        frases: [
            "La naturaleza también se lee 🍃",
            "¡Soy un soñador entusiasmado por aprender!",
            "¡Demos un salto hacia la siguiente historia!"
        ]
    },
    letrin: {
        nombre: "Letrín el arbolito 🌳",
        emoji: "🌳",
        frases: [
            "Leer también hace crecer el planeta 🌳",
            "Cada libro es una semillita de conocimiento 🌱",
            "¡Echemos raíces fuertes en la lectura!"
        ]
    },
    lumi: {
        nombre: "Lumi la mariposita 🦋",
        emoji: "🦋",
        frases: [
            "Las mejores historias también cuidan el planeta 🦋",
            "¡Vuela alto con tu imaginación libre!",
            "¡Las palabras nos dan alas para soñar!"
        ]
    }
};

let mascotaActual = 'leto';

function cambiarMascota(clave) {
    if (!MASCOTAS[clave]) return;
    mascotaActual = clave;
    
    const info = MASCOTAS[clave];
    const nombreElem = document.getElementById("nombreMascota");
    const avatarElem = document.getElementById("avatarMascota");
    const textoElem = document.getElementById("textoMascota");

    if (nombreElem) nombreElem.textContent = info.nombre;
    if (avatarElem) avatarElem.textContent = info.emoji;
    if (textoElem) textoElem.textContent = `"${info.frases[0]}"`;
}

function hablarMascota() {
    const info = MASCOTAS[mascotaActual];
    const textoElemento = document.getElementById("textoMascota");
    
    if (info && textoElemento) {
        const fraseAleatoria = info.frases[Math.floor(Math.random() * info.frases.length)];
        textoElemento.textContent = `"${fraseAleatoria}"`;
    }
}

// ===================================================
// 3. FUNCIONES PARA RENDERIZAR Y FILTRAR LOS CUENTOS
// ===================================================
function cargarCuentos(filtro = 'todos') {
    const contenedor = document.getElementById("contenedorCuentos");
    if (!contenedor) return;
    
    contenedor.innerHTML = "";

    const lista = (typeof CUENTOS_DATA !== 'undefined') ? CUENTOS_DATA : TODOS_LOS_CUENTOS;

    const filtrados = filtro === 'todos' 
        ? lista 
        : lista.filter(c => c.materia === filtro);

    if (filtrados.length === 0) {
        contenedor.innerHTML = "<p class='sin-resultados'>No se encontraron cuentos en esta categoría.</p>";
        return;
    }

    filtrados.forEach(cuento => {
        const tarjeta = document.createElement("div");
        tarjeta.className = "tarjeta-cuento";
        tarjeta.onclick = () => abrirModal(cuento);
        tarjeta.innerHTML = `
            <div class="tarjeta-emoji">${cuento.emoji || '📚'}</div>
            <h3 class="tarjeta-titulo">${cuento.titulo}</h3>
            <p class="tarjeta-resumen">${cuento.resumen}</p>
        `;
        contenedor.appendChild(tarjeta);
    });
}

function filtrarMateria(materia, boton) {
    document.querySelectorAll(".btn-filtro").forEach(btn => btn.classList.remove("activo"));
    if (boton) boton.classList.add("activo");
    cargarCuentos(materia);
}

function abrirModal(cuento) {
    const modal = document.getElementById("modalCuento");
    const detalle = document.getElementById("detalleCuento");
    
    if (modal && detalle) {
        detalle.innerHTML = `
            <h2>${cuento.emoji || '📚'} ${cuento.titulo}</h2>
            <hr style="border: 1px solid #a3e635; margin: 15px 0;">
            <div style="line-height: 1.6; font-size: 1.05rem;">${cuento.texto}</div>
        `;
        modal.style.display = "flex";
    }
}

function cerrarModal() {
    const modal = document.getElementById("modalCuento");
    if (modal) modal.style.display = "none";
}

// Inicialización
document.addEventListener("DOMContentLoaded", () => {
    cargarCuentos();
});