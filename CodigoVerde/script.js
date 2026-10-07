// =====================
// Botón Demo (Hero)
// =====================
const boton = document.getElementById("infoBtn");
const mensaje = document.getElementById("mensaje");

if (boton) {
    boton.addEventListener("click", () => {
        mensaje.textContent = "Muy pronto podrás probar la primera demo 🚀";
        mensaje.style.opacity = "1";
    });
}

// =====================
// Menú Hamburguesa Móvil
// =====================
const menuToggle = document.getElementById("menuToggle");
const navMenu = document.getElementById("navMenu");

if (menuToggle && navMenu) {
    menuToggle.addEventListener("click", () => {
        navMenu.classList.toggle("active");
    });

    // Cerrar menú al hacer clic en un enlace
    navMenu.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", () => navMenu.classList.remove("active"));
    });
}

// =====================
// Formulario de Contacto
// =====================
const formulario = document.getElementById("contactForm");

if (formulario) {
    formulario.addEventListener("submit", async (e) => {
        e.preventDefault();

        const btnEnviar = document.getElementById("btnEnviar");
        btnEnviar.disabled = true;
        btnEnviar.textContent = "Enviando...";

        try {
            const data = new FormData(formulario);
            const response = await fetch(formulario.action, {
                method: formulario.method,
                body: data,
                headers: { 'Accept': 'application/json' }
            });

            if (response.ok) {
                alert("¡Gracias por apoyar el proyecto 🎮! Tu mensaje ha sido enviado.");
                formulario.reset();
            } else {
                alert("Hubo un problema al enviar el mensaje. Por favor, intenta de nuevo.");
            }
        } catch (error) {
            alert("Error de conexión al enviar el formulario.");
        } finally {
            btnEnviar.disabled = false;
            btnEnviar.textContent = "Enviar Mensaje";
        }
    });
}

// =====================
// Animaciones al hacer Scroll
// =====================
const elementos = document.querySelectorAll(".card, section h2");

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add("show");
        }
    });
}, { threshold: 0.15 });

elementos.forEach(elemento => observer.observe(elemento));

// =====================
// Barra de Progreso Superior
// =====================
const progress = document.querySelector(".scroll-progress");

window.addEventListener("scroll", () => {
    const total = document.documentElement.scrollHeight - window.innerHeight;
    const porcentaje = (window.scrollY / total) * 100;
    if (progress) progress.style.width = porcentaje + "%";
});

// =====================
// Sombras en Header al Scroll
// =====================
const header = document.querySelector("header");

window.addEventListener("scroll", () => {
    if (!header) return;
    if (window.scrollY > 50) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
});