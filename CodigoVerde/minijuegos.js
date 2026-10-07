class MotoresMinijuegos {
    constructor(canvas, ctx, alGanarMonedas) {
        this.canvas = canvas;
        this.ctx = ctx;
        this.alGanarMonedas = alGanarMonedas;
        this.animFrame = null;
        this.activo = false;
    }

    detener() {
        this.activo = false;
        if (this.animFrame) cancelAnimationFrame(this.animFrame);
    }

    // 1. Food Drop
    iniciarFoodDrop() {
        this.detener();
        this.activo = true;
        let pX = this.canvas.width / 2 - 25, items = [], score = 0;

        this.canvas.onpointermove = (e) => {
            const rect = this.canvas.getBoundingClientRect();
            pX = e.clientX - rect.left - 25;
        };

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
            if (Math.random() < 0.04) items.push({ x: Math.random() * (this.canvas.width - 30), y: 0, icon: ["🍕", "🍔", "🍩"][Math.floor(Math.random() * 3)] });

            this.ctx.fillStyle = "#f59e0b";
            this.ctx.fillRect(pX, this.canvas.height - 30, 60, 15);

            for (let i = items.length - 1; i >= 0; i--) {
                let it = items[i];
                it.y += 3.5;
                this.ctx.font = "24px sans-serif";
                this.ctx.fillText(it.icon, it.x, it.y);

                if (it.y >= this.canvas.height - 40 && it.x >= pX - 15 && it.x <= pX + 55) {
                    score += 5;
                    items.splice(i, 1);
                } else if (it.y > this.canvas.height) items.splice(i, 1);
            }

            this.dibujarHUD("Food Drop", score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 2. Sky Jump
    iniciarSkyJump() {
        this.detener();
        this.activo = true;
        let px = this.canvas.width / 2, py = 300, vy = -8, score = 0;
        let plataformas = Array.from({ length: 6 }, (_, i) => ({ x: Math.random() * (this.canvas.width - 60), y: i * 80 }));

        this.canvas.onpointermove = (e) => {
            const rect = this.canvas.getBoundingClientRect();
            px = e.clientX - rect.left;
        };

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            vy += 0.3;
            py += vy;

            plataformas.forEach(p => {
                this.ctx.fillStyle = "#22c55e";
                this.ctx.fillRect(p.x, p.y, 60, 10);

                if (vy > 0 && px >= p.x - 15 && px <= p.x + 65 && py >= p.y - 20 && py <= p.y + 10) {
                    vy = -9;
                    score += 10;
                }

                if (py < 200) {
                    p.y += 4;
                    if (p.y > this.canvas.height) { p.y = 0; p.x = Math.random() * (this.canvas.width - 60); }
                }
            });

            this.ctx.font = "24px sans-serif";
            this.ctx.fillText("💩", px - 12, py);

            if (py > this.canvas.height) {
                this.alGanarMonedas(Math.floor(score / 5));
                alert("Game Over - Monedas ganadas: " + Math.floor(score / 5));
                this.detener();
                return;
            }

            this.dibujarHUD("Sky Jump", score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 3. Free Fall
    iniciarFreeFall() {
        this.detener();
        this.activo = true;
        let px = this.canvas.width / 2, py = 100, score = 0;
        let obstaculos = [];

        this.canvas.onpointermove = (e) => {
            const rect = this.canvas.getBoundingClientRect();
            px = e.clientX - rect.left;
        };

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            if (Math.random() < 0.05) {
                let gap = Math.random() * (this.canvas.width - 100);
                obstaculos.push({ y: this.canvas.height, gap: gap });
            }

            for (let i = obstaculos.length - 1; i >= 0; i--) {
                let obs = obstaculos[i];
                obs.y -= 3;

                this.ctx.fillStyle = "#ef4444";
                this.ctx.fillRect(0, obs.y, obs.gap, 15);
                this.ctx.fillRect(obs.gap + 80, obs.y, this.canvas.width - (obs.gap + 80), 15);

                if (Math.abs(py - obs.y) < 15 && (px < obs.gap || px > obs.gap + 80)) {
                    this.alGanarMonedas(score);
                    alert("Game Over - Monedas ganadas: " + score);
                    this.detener();
                    return;
                }

                if (obs.y < 0) { score += 2; obstaculos.splice(i, 1); }
            }

            this.ctx.font = "24px sans-serif";
            this.ctx.fillText("💩", px - 12, py);

            this.dibujarHUD("Free Fall", score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 4. Goal (Penaltis)
    iniciarGoal() {
        this.detener();
        this.activo = true;
        let bx = this.canvas.width / 2, by = this.canvas.height - 50, bvy = 0;
        let porteroX = this.canvas.width / 2, porteroDir = 2, score = 0;

        this.canvas.onclick = () => { if (bvy === 0) bvy = -8; };

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            // Arquería
            this.ctx.strokeStyle = "#fff";
            this.ctx.lineWidth = 4;
            this.ctx.strokeRect(50, 40, this.canvas.width - 100, 80);

            // Portero
            porteroX += porteroDir;
            if (porteroX < 60 || porteroX > this.canvas.width - 100) porteroDir *= -1;
            this.ctx.fillStyle = "#ef4444";
            this.ctx.fillRect(porteroX, 90, 40, 20);

            // Balón
            if (bvy !== 0) {
                by += bvy;
                if (by <= 100) {
                    if (bx >= porteroX && bx <= porteroX + 40) {
                        alert("¡Atajado!");
                    } else if (bx >= 50 && bx <= this.canvas.width - 50) {
                        score += 10;
                        this.alGanarMonedas(10);
                    }
                    by = this.canvas.height - 50;
                    bvy = 0;
                }
            }

            this.ctx.font = "24px sans-serif";
            this.ctx.fillText("⚽", bx - 12, by);

            this.dibujarHUD("Goal - Haz Click para Disparar", score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 5. Connect / Connect 2
    iniciarConnect() {
        this.detener();
        this.activo = true;
        let colores = ["🔴", "🔵", "🟡", "🟢"];
        let grilla = Array.from({ length: 16 }, () => colores[Math.floor(Math.random() * colores.length)]);
        let selec = -1, score = 0;

        this.canvas.onclick = (e) => {
            const rect = this.canvas.getBoundingClientRect();
            let col = Math.floor((e.clientX - rect.left) / (this.canvas.width / 4));
            let fila = Math.floor((e.clientY - rect.top - 60) / 70);
            let idx = fila * 4 + col;

            if (idx >= 0 && idx < 16) {
                if (selec === -1) selec = idx;
                else {
                    if (selec !== idx && grilla[selec] === grilla[idx]) {
                        score += 10;
                        grilla[selec] = "⚪";
                        grilla[idx] = "⚪";
                        this.alGanarMonedas(5);
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
                let x = c * (this.canvas.width / 4) + 20;
                let y = r * 70 + 80;

                if (selec === i) {
                    this.ctx.strokeStyle = "#eab308";
                    this.ctx.strokeRect(x - 10, y - 30, 50, 50);
                }

                this.ctx.font = "30px sans-serif";
                this.ctx.fillText(grilla[i], x, y);
            }

            this.dibujarHUD("Connect", score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 6. Color Match / Match Tap
    iniciarColorMatch() {
        this.detener();
        this.activo = true;
        let objetivos = ["ROJO", "AZUL", "VERDE", "AMARILLO"];
        let hex = ["#ef4444", "#3b82f6", "#22c55e", "#eab308"];
        let actualText = 0, actualColor = 0, score = 0;

        const nuevoReto = () => {
            actualText = Math.floor(Math.random() * 4);
            actualColor = Math.floor(Math.random() * 4);
        };
        nuevoReto();

        this.canvas.onclick = (e) => {
            const rect = this.canvas.getBoundingClientRect();
            let x = e.clientX - rect.left;
            let esCoincidente = actualText === actualColor;
            let presionoSi = x < this.canvas.width / 2;

            if (esCoincidente === presionoSi) {
                score += 10;
                this.alGanarMonedas(5);
                nuevoReto();
            } else {
                alert("Game Over - Puntos: " + score);
                this.detener();
            }
        };

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            this.ctx.fillStyle = hex[actualColor];
            this.ctx.font = "bold 36px sans-serif";
            this.ctx.textAlign = "center";
            this.ctx.fillText(objetivos[actualText], this.canvas.width / 2, 180);

            // Botones SI / NO
            this.ctx.fillStyle = "#22c55e";
            this.ctx.fillRect(20, this.canvas.height - 80, this.canvas.width / 2 - 30, 50);
            this.ctx.fillStyle = "#ef4444";
            this.ctx.fillRect(this.canvas.width / 2 + 10, this.canvas.height - 80, this.canvas.width / 2 - 30, 50);

            this.ctx.fillStyle = "#fff";
            this.ctx.font = "bold 20px sans-serif";
            this.ctx.fillText("IGUAL", this.canvas.width / 4, this.canvas.height - 48);
            this.ctx.fillText("DIFERENTE", (this.canvas.width / 4) * 3, this.canvas.height - 48);

            this.ctx.textAlign = "left";
            this.dibujarHUD("Color Match", score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 7. Memory
    iniciarMemory() {
        this.detener();
        this.activo = true;
        let iconos = ["🍎", "🍕", "🚗", "⚽", "🍎", "🍕", "🚗", "⚽"];
        iconos.sort(() => Math.random() - 0.5);
        let revelados = [false, false, false, false, false, false, false, false];
        let sel = [], score = 0;

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
                        score += 20;
                        this.alGanarMonedas(15);
                        sel = [];
                    } else {
                        setTimeout(() => sel = [], 800);
                    }
                }
            }
        };

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            for (let i = 0; i < 8; i++) {
                let r = Math.floor(i / 4), c = i % 4;
                let x = c * (this.canvas.width / 4) + 10;
                let y = r * 90 + 90;

                this.ctx.fillStyle = "#334155";
                this.ctx.fillRect(x, y, 60, 70);

                if (revelados[i] || sel.includes(i)) {
                    this.ctx.font = "30px sans-serif";
                    this.ctx.fillText(iconos[i], x + 12, y + 45);
                }
            }

            this.dibujarHUD("Memory Game", score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 8. Sad Tap
    iniciarSadTap() {
        this.detener();
        this.activo = true;
        let pous = Array.from({ length: 9 }, () => ({ triste: Math.random() < 0.5 }));
        let score = 0;

        this.canvas.onclick = (e) => {
            const rect = this.canvas.getBoundingClientRect();
            let c = Math.floor((e.clientX - rect.left) / (this.canvas.width / 3));
            let r = Math.floor((e.clientY - rect.top - 60) / 90);
            let idx = r * 3 + c;

            if (idx >= 0 && idx < 9) {
                if (pous[idx].triste) {
                    score += 10;
                    this.alGanarMonedas(5);
                    pous[idx].triste = false;
                } else {
                    score = Math.max(0, score - 5);
                }
            }
        };

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            if (Math.random() < 0.03) pous[Math.floor(Math.random() * 9)].triste = true;

            for (let i = 0; i < 9; i++) {
                let r = Math.floor(i / 3), c = i % 3;
                let x = c * (this.canvas.width / 3) + 30;
                let y = r * 90 + 90;

                this.ctx.font = "36px sans-serif";
                this.ctx.fillText(pous[i].triste ? "😢" : "😊", x, y);
            }

            this.dibujarHUD("Sad Tap - Toca los Pou tristes", score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    // 9. Tic Tac Pou
    iniciarTicTacPou() {
        this.detener();
        this.activo = true;
        let tablero = Array(9).fill(null), turnoJugador = true, score = 0;

        this.canvas.onclick = (e) => {
            if (!turnoJugador) return;
            const rect = this.canvas.getBoundingClientRect();
            let c = Math.floor((e.clientX - rect.left) / (this.canvas.width / 3));
            let r = Math.floor((e.clientY - rect.top - 60) / 90);
            let idx = r * 3 + c;

            if (idx >= 0 && idx < 9 && !tablero[idx]) {
                tablero[idx] = "❌";
                turnoJugador = false;
                setTimeout(() => {
                    let vacios = tablero.map((v, i) => v === null ? i : null).filter(v => v !== null);
                    if (vacios.length > 0) {
                        let bot = vacios[Math.floor(Math.random() * vacios.length)];
                        tablero[bot] = "⭕";
                    }
                    turnoJugador = true;
                }, 500);
            }
        };

        const loop = () => {
            if (!this.activo) return;
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            for (let i = 0; i < 9; i++) {
                let r = Math.floor(i / 3), c = i % 3;
                let x = c * (this.canvas.width / 3) + 35;
                let y = r * 90 + 110;

                this.ctx.strokeStyle = "#fff";
                this.ctx.strokeRect(c * (this.canvas.width / 3) + 5, r * 90 + 60, this.canvas.width / 3 - 10, 80);

                if (tablero[i]) {
                    this.ctx.font = "36px sans-serif";
                    this.ctx.fillText(tablero[i], x, y);
                }
            }

            this.dibujarHUD("Tic Tac Pou", score);
            this.animFrame = requestAnimationFrame(loop);
        };
        loop();
    }

    dibujarHUD(titulo, puntos) {
        this.ctx.fillStyle = "rgba(0,0,0,0.5)";
        this.ctx.fillRect(0, 0, this.canvas.width, 40);
        this.ctx.fillStyle = "#fff";
        this.ctx.font = "bold 16px sans-serif";
        this.ctx.fillText(titulo, 10, 25);
        this.ctx.fillText("Puntos: " + puntos, this.canvas.width - 110, 25);
    }
}