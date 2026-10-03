let materiaActual = 'todos';

document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("modalCuento");
    const btnCerrar = document.getElementById("btnCerrarModal");

    if (btnCerrar) btnCerrar.addEventListener("click", cerrarModal);

    window.addEventListener("click", (e) => {
        if (e.target === modal) cerrarModal();
    });
});

function abrirModalCuento(id) {
    const template = document.getElementById(`data-${id}`);
    const modal = document.getElementById("modalCuento");
    const modalBody = document.getElementById("modalFichaBody");

    if (template && modal && modalBody) {
        modalBody.innerHTML = template.innerHTML;
        modal.style.display = "block";
        document.body.style.overflow = "hidden";
    }
}

function cerrarModal() {
    const modal = document.getElementById("modalCuento");
    if (modal) {
        modal.style.display = "none";
        document.body.style.overflow = "auto";
    }
}

function filtrarMateria(materia, botonPresionado) {
    materiaActual = materia;
    const botones = document.querySelectorAll('.btn-filtro');
    botones.forEach(btn => btn.classList.remove('activo'));
    if (botonPresionado) botonPresionado.classList.add('activo');

    filtrarCuentos();
}

function filtrarCuentos() {
    const textoBuscado = document.getElementById('inputBuscador').value.toLowerCase().trim();
    const cards = document.querySelectorAll('.cuento-card');

    cards.forEach(card => {
        const coincideMateria = (materiaActual === 'todos' || card.getAttribute('data-materia') === materiaActual);
        const coincideTexto = card.getAttribute('data-titulo').includes(textoBuscado);

        if (coincideMateria && coincideTexto) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}