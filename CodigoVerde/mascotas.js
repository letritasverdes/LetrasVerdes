// Configuración base de la mascota
const MASCOTAS = {
    leto: { nombre: "Leto el ajolote lector" },
    lia: { nombre: "Lía la tortuga lectora" },
    letrabee: { nombre: "Letrabee la abeja lectora" },
    lilo: { nombre: "Lilo el conejito lector" },
    letrin: { nombre: "Letrín el arbolito lector" },
    lumi: { nombre: "Lumi la mariposita lectora" }
};

// Cargar o inicializar progreso
let miMascota = localStorage.getItem('mascotaSeleccionada') || 'leto';
let cuentosLeidos = JSON.parse(localStorage.getItem('cuentosLeidos')) || [];

// Calcular Nivel (De 1 a 20)
function obtenerNivel() {
    const total = cuentosLeidos.length;
    const nivel = Math.floor(total * 0.25) + 1;
    return Math.min(nivel, 20); // Tope en nivel 20
}

// Calcular la fase del aspecto (1, 2, 3 o 4)
function obtenerFaseAspecto(nivel) {
    if (nivel <= 5) return 1;
    if (nivel <= 10) return 2;
    if (nivel <= 15) return 3;
    return 4;
}

// Actualizar la interfaz visual del acompañante
function actualizarWidgetMascota() {
    const nivelActual = obtenerNivel();
    const fase = obtenerFaseAspecto(nivelActual);
    const porcentajeProgreso = ((cuentosLeidos.length % 4) / 4) * 100;

    const imgElement = document.getElementById('mascota-img');
    const nivelElement = document.getElementById('mascota-nivel');
    const progressBar = document.getElementById('mascota-barra-fill');

    if (imgElement) {
        imgElement.src = `img/mascotas/${miMascota}/e${fase}.png`;
    }
    if (nivelElement) {
        nivelElement.innerText = `Nivel ${nivelActual}`;
    }
    if (progressBar) {
        progressBar.style.width = `${porcentajeProgreso}%`;
    }
}

// Marcar un cuento como leído
function registrarCuentoLeido(cuentoId) {
    if (!cuentosLeidos.includes(cuentoId)) {
        cuentosLeidos.push(cuentoId);
        localStorage.setItem('cuentosLeidos', JSON.stringify(cuentosLeidos));
        actualizarWidgetMascota();
        alert('¡Felicidades! Tu mascota ha ganado experiencia 🌟');
    }
}

// Seleccionar nueva mascota
function seleccionarMascota(idMascota) {
    if (MASCOTAS[idMascota]) {
        miMascota = idMascota;
        localStorage.setItem('mascotaSeleccionada', idMascota);
        actualizarWidgetMascota();
    }
}

// Inicializar al cargar la página
document.addEventListener('DOMContentLoaded', actualizarWidgetMascota);