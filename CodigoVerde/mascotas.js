// ===================================================
// LETRAS VERDES - MASCOTAS EDUCATIVAS
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