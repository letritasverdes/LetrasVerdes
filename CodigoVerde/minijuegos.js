Aquí tienes el archivo **`minijuegos.js`** completo, corregido y limpio de cualquier mención a "Pou", listo para copiar y pegar:

```javascript
class MotoresMinijuegos {
    constructor(canvas, ctx, alGanarMonedas) {
        this.canvas = canvas;
        this.ctx = ctx;
        this.alGanarMonedas = alGanarMonedas;
        this.animFrame = null;
        this.activo = false;
        this.vidas = 3;
        this.invulnerable = 0;
    }

    detener() {
        this.activo = false;
        if (this.animFrame) cancelAnimationFrame(this.animFrame);
    }

    dibujarHUD(titulo, puntos, vidas = null) {
        this.ctx.fillStyle = "rgba(15, 23, 42, 0.85)";
        this.ctx.fillRect(0, 0, this.canvas.width, 42);
        
        this.ctx.fillStyle = "#ffffff";
        this.ctx.font = "bold 15px sans-serif";
        this.ctx.textAlign = "left";
        this.ctx.fillText(titulo, 12, 26);

        this.ctx.textAlign = "right";
        let textoHud = "Puntos: " + puntos;
        if (vidas !== null) {
            let corazones = "❤️".repeat(Math.max(0, vidas));
            textoHud = corazones + " | " + textoHud;
        }
        this.ctx.fillText(textoHud, this.canvas.width - 12, 26);
        this.ctx.textAlign = "left";
    }

    mostrarManual(titulo, emoji, instrucciones, alConfirmar) {
        this.detener();
        this.ctx.fillStyle = "rgba(15, 23, 42, 0.95)";
        this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);

        this.ctx.textAlign = "center";
        this.ctx.font = "40px sans-serif";
        this.ctx.fillText(emoji, this.canvas.width / 2, 80);

        this.ctx.fillStyle = "#a3e635";
        this.ctx.font = "bold 22px sans-serif";
        this.ctx.fillText("📖 Manual: " + titulo, this.canvas.width / 2, 125);

        this.ctx.fillStyle = "#ffffff";
        this.ctx.font = "14px sans-serif";
        
        let y = 165;
        instrucciones.forEach(linea => {
            this.ctx.fillText(linea, this.canvas.width / 2, y);
            y += 24;
        });

        // Botón Entendido / Jugar
        this.ctx.fillStyle = "#22c55e";
        this.ctx.beginPath();
        this.ctx.roundRect(this.canvas.width / 2 - 70, this.canvas.height - 80, 140, 45, 12);
        this.ctx.fill();

        this.ctx.fillStyle = "#ffffff";
        this.ctx.font = "bold 16px sans-serif";
        this.ctx.fillText("¡JUGAR! ▶", this.canvas.width / 2, this.canvas.height - 52);

        const handleClick = (e) => {
            const rect = this.canvas.getBoundingClientRect();
            let x = (e.touches ? e.touches[0].clientX : e.clientX) - rect.left;
            let yBtn = (e.touches ? e.touches[0].clientY : e.clientY) - rect.top;

            if (x >= this.canvas.width / 2 - 70 && x <= this.canvas.width / 2 + 70 && yBtn >= this.canvas.height - 80 && yBtn <= this.canvas.height - 35) {
                this.canvas.removeEventListener("click", handleClick);
                this.canvas.removeEventListener("touchstart", handleClick);
                alConfirmar();
            }
        };

        this.canvas.addEventListener("click", handleClick);
        this.canvas.addEventListener("touchstart", handleClick);
    }

    mostrarPantallaResultado(titulo, score, monedas, esVictoria) {
        this.detener();
        this.ctx.fillStyle = "rgba(15, 23, 42, 0.95)";
        this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);

        this.ctx.textAlign = "center";
        this.ctx.fillStyle = esVictoria ? "#a3e635" : "#ef4444";
        this.ctx.font = "bold 26px sans-serif";
        this.ctx.fillText(esVictoria ? "¡VICTORIA! 🎉" : "GAME OVER 💥", this.canvas.width / 2, 110);

        this.ctx.fillStyle = "#ffffff";
        this.ctx.font = "16px sans-serif";
        this.ctx.fillText(titulo, this.canvas.width / 2, 145);
        this.ctx.fillText("Puntaje Final: " + score, this.canvas.width / 2, 175);

        this.ctx.fillStyle = "#fef08a";
        this.ctx.font = "bold 18px sans-serif";
        this.ctx.fillText("🪙 Monedas: +" + monedas + " | 🌟 XP: +" + monedas, this.canvas.width / 2, 210);

        let mascotaDesbloqueada = null;

        // Probabilidad del 15% al Ganar de Obtener Mascota Coleccionable
        if (esVictoria && typeof window.intentarDesbloquearMascota === "function") {
            mascotaDesbloqueada = window.intentarDesbloquearMascota();
        }

        if (mascotaDesbloqueada) {
            this.ctx.fillStyle = "rgba(234, 179, 8, 0.2)";
            this.ctx.strokeStyle = "#eab308";
            this.ctx.lineWidth = 2;
            this.ctx.beginPath();
            this.ctx.roundRect(this.canvas.width / 2 - 130, 235, 260, 110, 12);
            this.ctx.fill();
            this.ctx.stroke();

            this.ctx.fillStyle = "#fef08a";
            this.ctx.font = "bold 15px sans-serif";
            this.ctx.fillText("✨ ¡NUEVO PERSONAJE OBTENIDO! ✨", this.canvas.width / 2, 260);

            this.ctx.font = "34px sans-serif";
            this.ctx.fillText(MASCOTAS[mascotaDesbloqueada].emoji, this.canvas.width / 2, 300);

            this.ctx.fillStyle = "#ffffff";
            this.ctx.font = "bold 14px sans-serif";
            this.ctx.fillText(MASCOTAS[mascotaDesbloqueada].nombre, this.canvas.width / 2, 330);
        }

        if (monedas > 0) {
            this.alGanarMonedas(monedas);
        }
    }

    // 1. Food Drop
    iniciarFoodDrop() {
        this.mostrarManual("Food Drop", "🍕", [
            "• Mueve el dedo o ratón de izquierda a derecha.",
            "• Atrapa la comida que cae del cielo.",
            "• Tienes 3 Vidas (❤️).",
            "• Si dejas caer comida, perderás una vida."
        ], () => this.ejecutarFoodDrop());
    }

    ejecutarFoodDrop() {
        this.detener();
        this.activo = true;
        this.vidas = 3;
        let pX = this.canvas.width / 2 - 35, items = [], score = 0, velocidad = 3;

        const mover = (e) => {
            const rect = this.canvas.getBoundingClientRect();
            let clientX = e.touches ? e.touches[0].clientX : e.clientX;
            pX = clientX - rect.left - 35;
            pX = Math.max(0, Math.min(this.canvas.width - 70, pX));
        };

        this.canvas.onpointermove = mover;
        this.canvas.ontouchmove = mover;

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            if (Math.random() < 0.04) {
                items.push({
                    x: Math.random() * (this.canvas.width - 40) + 10,
                    y: 0,
                    icon: ["🍕", "🍔", "🍩", "🍎", "🍟"][Math.floor(Math.random() * 5)]
                });
            }

            this.ctx.fillStyle = "#22c55e";
            this.ctx.beginPath();
            this.ctx.roundRect(pX, this.canvas.height - 35, 70, 18, 10);
            this.ctx.fill();

            for (let i = items.length - 1; i >= 0; i--) {
                let it = items[i];
                it.y += velocidad;
                this.ctx.font = "28px sans-serif";
                this.ctx.fillText(it.icon, it.x, it.y);

                if (it.y >= this.canvas.height - 45 && it.y <= this.canvas.height - 15 && it.x >= pX - 20 && it.x <= pX + 65) {
                    score += 10;
                    if (score % 50 === 0) velocidad += 0.5;
                    items.splice(i, 1);
                } else if (it.y > this.canvas.height) {
                    items.splice(i, 1);
                    this.vidas--;
                    if (this.vidas <= 0) {
                        let monedas = Math.floor(score / 5);
                        this.mostrarPantallaResultado("Food Drop", score, monedas, false);
                        return;
                    }
                }
            }

            if (score >= 150) {
                let monedas = Math.floor(score / 4) + 10;
                this.mostrarPantallaResultado("Food Drop", score, monedas, true);
                return;
            }

            this.dibujarHUD("Food Drop", score, this.vidas);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 2. Sky Jump
    iniciarSkyJump() {
        this.mostrarManual("Sky Jump", "☁️", [
            "• Desliza tu dedo o ratón a los lados.",
            "• Rebota sobre las plataformas verdes.",
            "• Sube lo más alto posible para ganar puntos.",
            "• ¡Cuidado con no caer al vacío!"
        ], () => this.ejecutarSkyJump());
    }

    ejecutarSkyJump() {
        this.detener();
        this.activo = true;
        this.vidas = 3;
        let px = this.canvas.width / 2, py = 300, vy = -8, score = 0;
        let plataformas = Array.from({ length: 6 }, (_, i) => ({ x: Math.random() * (this.canvas.width - 70), y: i * 70 + 40 }));

        const mover = (e) => {
            const rect = this.canvas.getBoundingClientRect();
            let clientX = e.touches ? e.touches[0].clientX : e.clientX;
            px = clientX - rect.left;
        };

        this.canvas.onpointermove = mover;
        this.canvas.ontouchmove = mover;

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            vy += 0.35;
            py += vy;

            plataformas.forEach(p => {
                this.ctx.fillStyle = "#a3e635";
                this.ctx.fillRect(p.x, p.y, 70, 12);

                if (vy > 0 && px >= p.x - 18 && px <= p.x + 78 && py >= p.y - 22 && py <= p.y + 8) {
                    vy = -9.5;
                    score += 10;
                }

                if (py < 200) {
                    p.y += 4;
                    if (p.y > this.canvas.height) {
                        p.y = 0;
                        p.x = Math.random() * (this.canvas.width - 70);
                    }
                }
            });

            this.ctx.font = "28px sans-serif";
            this.ctx.fillText("🐾", px - 14, py);

            if (py > this.canvas.height) {
                this.vidas--;
                if (this.vidas <= 0) {
                    let monedas = Math.floor(score / 5);
                    this.mostrarPantallaResultado("Sky Jump", score, monedas, false);
                    return;
                } else {
                    py = 200;
                    vy = -8;
                }
            }

            if (score >= 200) {
                let monedas = Math.floor(score / 4) + 15;
                this.mostrarPantallaResultado("Sky Jump", score, monedas, true);
                return;
            }

            this.dibujarHUD("Sky Jump", score, this.vidas);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 3. Free Fall
    iniciarFreeFall() {
        this.mostrarManual("Free Fall", "🪂", [
            "• Muévete a la izquierda o derecha.",
            "• Pasa por los huecos entre las vigas rojas.",
            "• Tienes 3 Vidas (❤️).",
            "• Cada barrera cruzada te da puntos."
        ], () => this.ejecutarFreeFall());
    }

    ejecutarFreeFall() {
        this.detener();
        this.activo = true;
        this.vidas = 3;
        this.invulnerable = 0;
        let px = this.canvas.width / 2, py = 100, score = 0;
        let obstaculos = [];
        let ultimoGap = this.canvas.width / 2 - 45;

        const mover = (e) => {
            const rect = this.canvas.getBoundingClientRect();
            let clientX = e.touches ? e.touches[0].clientX : e.clientX;
            px = clientX - rect.left;
        };

        this.canvas.onpointermove = mover;
        this.canvas.ontouchmove = mover;

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            if (this.invulnerable > 0) this.invulnerable--;

            if (Math.random() < 0.045 && (obstaculos.length === 0 || obstaculos[obstaculos.length - 1].y < this.canvas.height - 130)) {
                let variacion = (Math.random() - 0.5) * 160;
                let nuevoGap = Math.max(20, Math.min(this.canvas.width - 110, ultimoGap + variacion));
                ultimoGap = nuevoGap;
                obstaculos.push({ y: this.canvas.height, gap: nuevoGap, anchoGap: 90 });
            }

            for (let i = obstaculos.length - 1; i >= 0; i--) {
                let obs = obstaculos[i];
                obs.y -= 2.8;

                this.ctx.fillStyle = "#ef4444";
                this.ctx.fillRect(0, obs.y, obs.gap, 16);
                this.ctx.fillRect(obs.gap + obs.anchoGap, obs.y, this.canvas.width - (obs.gap + obs.anchoGap), 16);

                if (this.invulnerable === 0 && Math.abs(py - obs.y) < 16 && (px < obs.gap + 10 || px > obs.gap + obs.anchoGap - 10)) {
                    this.vidas--;
                    this.invulnerable = 40;
                    if (this.vidas <= 0) {
                        let monedas = Math.floor(score / 3);
                        this.mostrarPantallaResultado("Free Fall", score, monedas, false);
                        return;
                    }
                }

                if (obs.y < 0) {
                    score += 5;
                    obstaculos.splice(i, 1);
                }
            }

            if (this.invulnerable % 6 < 3) {
                this.ctx.font = "28px sans-serif";
                this.ctx.fillText("🪂", px - 14, py);
            }

            if (score >= 120) {
                let monedas = Math.floor(score / 3) + 15;
                this.mostrarPantallaResultado("Free Fall", score, monedas, true);
                return;
            }

            this.dibujarHUD("Free Fall", score, this.vidas);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 4. Goal
    iniciarGoal() {
        this.mostrarManual("Goal", "⚽", [
            "• Haz clic o toca la pantalla para patear.",
            "• Apunta a la portería sin que el portero ataje.",
            "• Tienes 5 tiros por tanda.",
            "• ¡Anota goles para ganar monedas!"
        ], () => this.ejecutarGoal());
    }

    ejecutarGoal() {
        this.detener();
        this.activo = true;
        let bx = this.canvas.width / 2, by = this.canvas.height - 50, bvy = 0;
        let porteroX = this.canvas.width / 2, porteroDir = 2.5, score = 0, intentos = 5;

        const disparar = () => { if (bvy === 0 && intentos > 0) bvy = -8.5; };
        this.canvas.onclick = disparar;

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            this.ctx.strokeStyle = "#ffffff";
            this.ctx.lineWidth = 5;
            this.ctx.strokeRect(40, 40, this.canvas.width - 80, 80);

            porteroX += porteroDir;
            if (porteroX < 50 || porteroX > this.canvas.width - 100) porteroDir *= -1;
            this.ctx.fillStyle = "#ef4444";
            this.ctx.fillRect(porteroX, 90, 50, 22);

            if (bvy !== 0) {
                by += bvy;
                if (by <= 100) {
                    intentos--;
                    if (bx >= porteroX - 10 && bx <= porteroX + 60) {
                        // Atajado
                    } else if (bx >= 40 && bx <= this.canvas.width - 40) {
                        score += 20;
                    }
                    by = this.canvas.height - 50;
                    bvy = 0;

                    if (intentos <= 0) {
                        let esVictoria = score >= 40;
                        let monedas = Math.floor(score / 2);
                        this.mostrarPantallaResultado("Goal", score, monedas, esVictoria);
                        return;
                    }
                }
            }

            this.ctx.font = "28px sans-serif";
            this.ctx.fillText("⚽", bx - 14, by);

            this.dibujarHUD(`Goal (Tiros restantes: ${intentos})`, score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 5. Connect
    iniciarConnect() {
        this.mostrarManual("Connect", "🧩", [
            "• Toca dos emojis idénticos para unirlos.",
            "• Elimina todos los pares del tablero.",
            "• ¡Limpia el tablero completo para ganar!"
        ], () => this.ejecutarConnect());
    }

    ejecutarConnect() {
        this.detener();
        this.activo = true;
        let colores = ["🔴", "🔵", "🟡", "🟢"];
        let grilla = Array.from({ length: 16 }, () => colores[Math.floor(Math.random() * colores.length)]);
        let selec = -1, score = 0, paresRestantes = 8;

        this.canvas.onclick = (e) => {
            const rect = this.canvas.getBoundingClientRect();
            let col = Math.floor((e.clientX - rect.left) / (this.canvas.width / 4));
            let fila = Math.floor((e.clientY - rect.top - 60) / 70);
            let idx = fila * 4 + col;

            if (idx >= 0 && idx < 16 && grilla[idx] !== "⚪") {
                if (selec === -1) selec = idx;
                else {
                    if (selec !== idx && grilla[selec] === grilla[idx]) {
                        score += 15;
                        grilla[selec] = "⚪";
                        grilla[idx] = "⚪";
                        paresRestantes--;
                        if (paresRestantes <= 0) {
                            this.mostrarPantallaResultado("Connect", score, 20, true);
                            return;
                        }
                    }
                    selec = -1;
                }
            }
        };

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            for (let i = 0; i < 16; i++) {
                let r = Math.floor(i / 4), c = i % 4;
                let x = c * (this.canvas.width / 4) + 22;
                let y = r * 70 + 90;

                if (selec === i) {
                    this.ctx.strokeStyle = "#eab308";
                    this.ctx.lineWidth = 3;
                    this.ctx.strokeRect(x - 12, y - 32, 55, 55);
                }

                this.ctx.font = "32px sans-serif";
                this.ctx.fillText(grilla[i], x, y);
            }

            this.dibujarHUD("Connect", score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 6. Color Match
    iniciarColorMatch() {
        this.mostrarManual("Color Match", "🎨", [
            "• Lee el NOMBRE del color en pantalla.",
            "• Presiona 'IGUAL' si el color del texto coincide.",
            "• Presiona 'DIFERENTE' si no coinciden.",
            "• Completa 10 rondas de agilidad."
        ], () => this.ejecutarColorMatch());
    }

    ejecutarColorMatch() {
        this.detener();
        this.activo = true;
        let objetivos = ["ROJO", "AZUL", "VERDE", "AMARILLO"];
        let hex = ["#ef4444", "#3b82f6", "#22c55e", "#eab308"];
        let actualText = 0, actualColor = 0, score = 0, ronda = 0;

        const nuevoReto = () => {
            actualText = Math.floor(Math.random() * 4);
            actualColor = Math.floor(Math.random() * 4);
            ronda++;
        };
        nuevoReto();

        this.canvas.onclick = (e) => {
            const rect = this.canvas.getBoundingClientRect();
            let x = e.clientX - rect.left;
            let esCoincidente = actualText === actualColor;
            let presionoSi = x < this.canvas.width / 2;

            if (esCoincidente === presionoSi) {
                score += 10;
                if (ronda >= 10) {
                    this.mostrarPantallaResultado("Color Match", score, 20, true);
                    return;
                }
                nuevoReto();
            } else {
                this.mostrarPantallaResultado("Color Match", score, Math.floor(score / 5), false);
            }
        };

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            this.ctx.fillStyle = hex[actualColor];
            this.ctx.font = "bold 38px sans-serif";
            this.ctx.textAlign = "center";
            this.ctx.fillText(objetivos[actualText], this.canvas.width / 2, 170);

            this.ctx.fillStyle = "#22c55e";
            this.ctx.beginPath();
            this.ctx.roundRect(15, this.canvas.height - 85, this.canvas.width / 2 - 25, 55, 12);
            this.ctx.fill();

            this.ctx.fillStyle = "#ef4444";
            this.ctx.beginPath();
            this.ctx.roundRect(this.canvas.width / 2 + 10, this.canvas.height - 85, this.canvas.width / 2 - 25, 55, 12);
            this.ctx.fill();

            this.ctx.fillStyle = "#ffffff";
            this.ctx.font = "bold 18px sans-serif";
            this.ctx.fillText("IGUAL", this.canvas.width / 4, this.canvas.height - 50);
            this.ctx.fillText("DIFERENTE", (this.canvas.width / 4) * 3, this.canvas.height - 50);

            this.ctx.textAlign = "left";
            this.dibujarHUD(`Color Match (${ronda}/10)`, score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 7. Memory
    iniciarMemory() {
        this.mostrarManual("Memory", "🎴", [
            "• Toca las cartas volteadas para descubrirlas.",
            "• Encuentra los 4 pares idénticos.",
            "• Memoriza sus posiciones antes de voltear otra."
        ], () => this.ejecutarMemory());
    }

    ejecutarMemory() {
        this.detener();
        this.activo = true;
        let iconos = ["🍎", "🍕", "🚗", "⚽", "🍎", "🍕", "🚗", "⚽"];
        iconos.sort(() => Math.random() - 0.5);
        let revelados = Array(8).fill(false);
        let sel = [], score = 0, encontrados = 0;

        this.canvas.onclick = (e) => {
            const rect = this.canvas.getBoundingClientRect();
            let c = Math.floor((e.clientX - rect.left) / (this.canvas.width / 4));
            let r = Math.floor((e.clientY - rect.top - 80) / 90);
            let idx = r * 4 + c;

            if (idx >= 0 && idx < 8 && !revelados[idx] && sel.length < 2) {
                sel.push(idx);
                if (sel.length === 2) {
                    if (iconos[sel[0]] === iconos[sel[1]]) {
                        revelados[sel[0]] = true;
                        revelados[sel[1]] = true;
                        score += 25;
                        encontrados += 2;
                        sel = [];

                        if (encontrados >= 8) {
                            setTimeout(() => {
                                this.mostrarPantallaResultado("Memory", score, 25, true);
                            }, 500);
                        }
                    } else {
                        setTimeout(() => sel = [], 700);
                    }
                }
            }
        };

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            for (let i = 0; i < 8; i++) {
                let r = Math.floor(i / 4), c = i % 4;
                let x = c * (this.canvas.width / 4) + 12;
                let y = r * 90 + 90;

                this.ctx.fillStyle = "#334155";
                this.ctx.beginPath();
                this.ctx.roundRect(x, y, 65, 75, 10);
                this.ctx.fill();

                if (revelados[i] || sel.includes(i)) {
                    this.ctx.font = "32px sans-serif";
                    this.ctx.fillText(iconos[i], x + 14, y + 48);
                }
            }

            this.dibujarHUD("Memory Game", score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 8. Sad Tap
    iniciarSadTap() {
        this.mostrarManual("Sad Tap", "😢", [
            "• Toca solo las caritas TRISTES (😢).",
            "• Cada carita feliz que toques te restará puntos.",
            "• Tienes 30 segundos para juntar el máximo puntaje."
        ], () => this.ejecutarSadTap());
    }

    ejecutarSadTap() {
        this.detener();
        this.activo = true;
        let caritas = Array.from({ length: 9 }, () => ({ triste: Math.random() < 0.5 }));
        let score = 0, tiempo = 30;

        const timer = setInterval(() => {
            if (!this.activo) { clearInterval(timer); return; }
            tiempo--;
            if (tiempo <= 0) {
                clearInterval(timer);
                let esVictoria = score >= 50;
                let monedas = Math.floor(score / 3);
                this.mostrarPantallaResultado("Sad Tap", score, monedas, esVictoria);
            }
        }, 1000);

        this.canvas.onclick = (e) => {
            const rect = this.canvas.getBoundingClientRect();
            let c = Math.floor((e.clientX - rect.left) / (this.canvas.width / 3));
            let r = Math.floor((e.clientY - rect.top - 60) / 90);
            let idx = r * 3 + c;

            if (idx >= 0 && idx < 9) {
                if (caritas[idx].triste) {
                    score += 10;
                    caritas[idx].triste = false;
                } else {
                    score = Math.max(0, score - 5);
                }
            }
        };

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            if (Math.random() < 0.04) caritas[Math.floor(Math.random() * 9)].triste = true;

            for (let i = 0; i < 9; i++) {
                let r = Math.floor(i / 3), c = i % 3;
                let x = c * (this.canvas.width / 3) + 32;
                let y = r * 90 + 95;

                this.ctx.font = "38px sans-serif";
                this.ctx.fillText(caritas[i].triste ? "😢" : "😊", x, y);
            }

            this.dibujarHUD(`Sad Tap (Tiempo: ${tiempo}s)`, score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 9. Tic Tac
    iniciarTicTacPou() {
        this.mostrarManual("Tic Tac", "❌", [
            "• Juegas con ❌ y la IA juega con ⭕.",
            "• Forma una línea de 3 en raya horizontal, vertical o diagonal.",
            "• ¡Vence a la computadora para ganar 20 monedas!"
        ], () => this.ejecutarTicTacPou());
    }

    ejecutarTicTacPou() {
        this.detener();
        this.activo = true;
        let tablero = Array(9).fill(null), turnoJugador = true, score = 0;

        const evaluarGanador = () => {
            const combos = [
                [0,1,2], [3,4,5], [6,7,8],
                [0,3,6], [1,4,7], [2,5,8],
                [0,4,8], [2,4,6]
            ];
            for (let c of combos) {
                if (tablero[c[0]] && tablero[c[0]] === tablero[c[1]] && tablero[c[0]] === tablero[c[2]]) {
                    return tablero[c[0]];
                }
            }
            return tablero.includes(null) ? null : "Empate";
        };

        this.canvas.onclick = (e) => {
            if (!turnoJugador) return;
            const rect = this.canvas.getBoundingClientRect();
            let c = Math.floor((e.clientX - rect.left) / (this.canvas.width / 3));
            let r = Math.floor((e.clientY - rect.top - 60) / 90);
            let idx = r * 3 + c;

            if (idx >= 0 && idx < 9 && !tablero[idx]) {
                tablero[idx] = "❌";
                let g = evaluarGanador();
                if (g) {
                    this.concluirJuego(g);
                    return;
                }

                turnoJugador = false;
                setTimeout(() => {
                    if (!this.activo) return;
                    let vacios = tablero.map((v, i) => v === null ? i : null).filter(v => v !== null);
                    if (vacios.length > 0) {
                        let bot = vacios[Math.floor(Math.random() * vacios.length)];
                        tablero[bot] = "⭕";
                        let gBot = evaluarGanador();
                        if (gBot) {
                            this.concluirJuego(gBot);
                            return;
                        }
                    }
                    turnoJugador = true;
                }, 400);
            }
        };

        this.concluirJuego = (ganador) => {
            let esVictoria = ganador === "❌";
            let monedas = esVictoria ? 20 : (ganador === "Empate" ? 10 : 0);
            this.mostrarPantallaResultado("Tic Tac", esVictoria ? 100 : 0, monedas, esVictoria);
        };

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            for (let i = 0; i < 9; i++) {
                let r = Math.floor(i / 3), c = i % 3;
                let x = c * (this.canvas.width / 3) + 38;
                let y = r * 90 + 115;

                this.ctx.strokeStyle = "#ffffff";
                this.ctx.lineWidth = 2;
                this.ctx.strokeRect(c * (this.canvas.width / 3) + 8, r * 90 + 65, this.canvas.width / 3 - 16, 78);

                if (tablero[i]) {
                    this.ctx.font = "38px sans-serif";
                    this.ctx.fillText(tablero[i], x, y);
                }
            }

            this.dibujarHUD("Tic Tac", score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }
}

```