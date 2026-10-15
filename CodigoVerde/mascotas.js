const MASCOTAS = {
    leto: { nombre: "Leto el ajolote 🦎", emoji: "🦎", rareza: "Común", frases: ["Pequeñas lecturas, grandes cambios 💚", "¡Curioso e inteligente!", "Cuidemos el agua 🌱"] },
    lia: { nombre: "Lía la tortuga 🐢", emoji: "🐢", rareza: "Común", frases: ["Paso a paso se aprende mejor 📖", "¡Ser paciente es mi superpoder!"] },
    letrabee: { nombre: "Letrabee la abeja 🐝", emoji: "🐝", rareza: "Rara", frases: ["¡Trabajar en equipo es dulce!", "Cada historia ayuda a florecer 🌸"] },
    lilo: { nombre: "Lilo el conejito 🐰", emoji: "🐰", rareza: "Rara", frases: ["La naturaleza también se lee 🍃", "¡Demos un salto hacia la historia!"] },
    letrin: { nombre: "Letrín el arbolito 🌳", emoji: "🌳", rareza: "Épica", frases: ["Leer hace crecer el planeta 🌳", "Cada libro es una semillita 🌱"] },
    lumi: { nombre: "Lumi la mariposita 🦋", emoji: "🦋", rareza: "Legendaria", frases: ["Vuela alto con tu imaginación 🦋", "¡Las palabras nos dan alas!"] }
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