<?php
// Database de 80 cuentos (20 Español 1º, 20 Mates 1º, 20 Español 2º, 20 Mates 2º)
$TODOS_LOS_CUENTOS = [
    // ==========================================
    // 📚 PRIMER GRADO - ESPAÑOL (20 CUENTOS)
    // ==========================================
    [
        "id" => "e1-1", "grado" => 1, "materia" => "espanol", "emoji" => "🦁🐭",
        "titulo" => "El secreto del león Leo",
        "resumen" => "Leo es el rey de la selva, pero tiene un secreto que solo el ratón Milo conoce...",
        "moraleja" => "Reírse de uno mismo y compartir secretos nos acerca a los demás.",
        "texto" => "<p>Leo caminaba por la selva erguido y orgulloso. Todos le decían '¡Buenos días, su majestad!'. Pero Leo tenía un secreto: le daban miedo las mariposas amarillas y le daban mucha risa las cosquillas en las orejas.</p><p>Un día, el ratón Milo saltó a su cabeza para alcanzar una mora. Sus patitas rozaron la oreja de Leo y el león soltó un rugido que terminó en una carcajada gigante: '¡Jajaja, detente Milo!'.</p><p>Milo prometió guardar el secreto. A cambio, Leo lo llevaba a dar paseos diarios en su lomo.</p>"
    ],
    [
        "id" => "e1-2", "grado" => 1, "materia" => "espanol", "emoji" => "🐸🎶",
        "titulo" => "La rana Rina y las vocales",
        "resumen" => "Rina quería cantar en el coro del estanque pero solo sabía decir 'Croac'...",
        "moraleja" => "Practicar los sonidos paso a paso nos ayuda a expresarnos mejor.",
        "texto" => "<p>Rina la rana quería cantar con los grillos por la noche. El grillo director le dijo: 'Para cantar bien, debes abrir la boca con las vocales'.</p><p>Rina saltó a una hoja de lirio y practicó: '¡AAAA!' al abrir la boca grande, '¡EEEE!' al sonreír, '¡IIII!' al poner cara de sorpresa, '¡OOOO!' haciendo un círculo con los labios, y '¡UUUU!' como el viento.</p><p>Esa noche, Rina dio el mejor concierto del estanque combinando todas sus nuevas vocales.</p>"
    ],
    [
        "id" => "e1-3", "grado" => 1, "materia" => "espanol", "emoji" => "🐻🍯",
        "titulo" => "El oso Bernard y su nombre",
        "resumen" => "Bernard perdió la primera letra de su nombre y se convirtió en Ernard...",
        "moraleja" => "Las letras mayúsculas al inicio le dan identidad a todo lo que nos rodea.",
        "texto" => "<p>Bernard el oso escribió su nombre en un cartel sobre su cueva, pero una ráfaga de viento se llevó la letra B gigante. Al día siguiente, la ardilla leyó: 'Cueva de Ernard'.</p><p>'¡Ese no soy yo!', dijo preocupado. Buscó entre las ramas hasta encontrar la B mayúscula, alta y pancita doble.</p><p>La pegó con miel de abeja y exclamó: '¡Ahora sí, soy Bernard con B grande de valiente!'.</p>"
    ],
    [
        "id" => "e1-4", "grado" => 1, "materia" => "espanol", "emoji" => "🐢✏️",
        "titulo" => "La tortuga y el lápiz mágico",
        "resumen" => "Tomás aprendió a trazar líneas rectas sin desesperarse...",
        "moraleja" => "La paciencia y el trazo firme hacen a los mejores escritores.",
        "texto" => "<p>Tomás la tortuga quería dibujar letras, pero sus manitas temblaban y las líneas le salían chuecas. El conejo le dijo: 'Sopla suave y no te apures'.</p><p>Tomás tomó su lápiz verde, respiró hondo y comenzó a trazar una línea vertical de arriba hacia abajo. Luego una horizontal. ¡Había hecho una L perfecta!</p><p>Paso a paso, llenó su libreta con las letras más limpias de la escuela del bosque.</p>"
    ],
    [
        "id" => "e1-5", "grado" => 1, "materia" => "espanol", "emoji" => "🐥💬",
        "titulo" => "El pollito que hablaba bajito",
        "resumen" => "Pío tenía miedo de leer en voz alta frente a sus compañeros...",
        "moraleja" => "Tu voz es importante y todos quieren escucharte.",
        "texto" => "<p>Cuando la maestra gallina pedía leer el cuento del día, Pío escondía su cabeza bajo el ala. Su voz era tan suave que parecía un suspiro.</p><p>Un día le tocó leer sobre su comida favorita: 'Los granos de maíz dorado'. Pío se emociono tanto que tomó aire, levantó el pico y leyó fuerte para que hasta el último pato en la fila escuchara.</p><p>Todos aplaudieron y Pío descubrió que hablar fuerte no daba miedo.</p>"
    ],
    [
        "id" => "e1-6", "grado" => 1, "materia" => "espanol", "emoji" => "🦔🎒",
        "titulo" => "Emi el erizo y la mochila de cuentos",
        "resumen" => "Emi guardaba historias en su mochila en lugar de juguetes...",
        "moraleja" => "Los libros son el mejor tesoro para compartir en el recreo.",
        "texto" => "<p>En el recreo, mientras los demás jugaban a las atrapadas, Emi sacaba un libro ilustrado de su mochila verde. Un día se le acercó el zorro y le preguntó: '¿Por qué no traes pelotas?'.</p><p>Emi abrió el libro y le mostró una página con un dragón azul. Al cabo de cinco minutos, seis animalitos estaban sentados alrededor de Emi escuchando la historia.</p>"
    ],
    [
        "id" => "e1-7", "grado" => 1, "materia" => "espanol", "emoji" => "🦋🌸",
        "titulo" => "El vuelo de la letra S",
        "resumen" => "Una mariposa dibuja la letra S mientras vuela entre las flores...",
        "moraleja" => "Las formas de las letras están presentes en toda la naturaleza.",
        "texto" => "<p>Sara la mariposa no volaba en línea recta. A ella le gustaba hacer curvas: bajaba hacia la derecha, daba una vuelta suave a la izquierda y volvía a bajar. '¡Miren, estoy haciendo mi letra inicial!', decía orgullosa.</p><p>Los niños del colegio la veían desde la ventana y practicaban el movimiento de la 'S' en el aire con sus dedos.</p>"
    ],
    [
        "id" => "e1-8", "grado" => 1, "materia" => "espanol", "emoji" => "🐶🦴",
        "titulo" => "Toby y el letrero del parque",
        "resumen" => "Toby aprendió a leer la palabra 'NO' para evitar problemas...",
        "moraleja" => "Leer letreros en la calle nos protege y nos guía.",
        "texto" => "<p>Toby el perrito corría hacia el estanque de barro cuando su dueño le señaló un cartel con letras rojas: 'N-O C-O-R-R-E-R'. Toby frenó con sus cuatro patitas.</p><p>Comprendió que leer las palabras a su alrededor no solo era para la escuela, sino para saber qué cosas eran seguras en la ciudad.</p>"
    ],
    [
        "id" => "e1-9", "grado" => 1, "materia" => "espanol", "emoji" => "🦉📚",
        "titulo" => "El búho sabio y los rhymes",
        "resumen" => "Aprender rimas jugando con palabras que terminan igual...",
        "moraleja" => "Las rimas le dan ritmo y poesía a nuestras conversaciones.",
        "texto" => "<p>El profesor Búho jugaba a la pelota de palabras: 'Si yo digo *botón*, ¿ustedes qué dicen?'. La ardilla gritó '¡Ratón!', el mapache dijo '¡Limon!' y el castorcito añadió '¡Cajón!'.</p><p>Rieron tanto juntando palabras que terminaban igual que crearon una canción entera antes de que sonara la campana.</p>"
    ],
    [
        "id" => "e1-10", "grado" => 1, "materia" => "espanol", "emoji" => "🐱🧶",
        "titulo" => "El gato con botas de letras",
        "resumen" => "Pelusa encuentra letras de plástico en la alfombra...",
        "moraleja" => "Armar palabras es como construir torres con bloques.",
        "texto" => "<p>Pelusa empujó con su patita una letra 'M' de plástico rojo, luego una 'A', otra 'M' y una 'A' con acento. '¡MAMÁ!', dijo la niña al ver el piso.</p><p>Pelusa ronroneó. Había descubierto que juntar letras pequeñas creaba palabras gigantes llenas de cariño.</p>"
    ],
    [
        "id" => "e1-11", "grado" => 1, "materia" => "espanol", "emoji" => "🐭🧀",
        "titulo" => "La M de queso y la P de pan",
        "resumen" => "Dos ratoncitos organizan su alacena por la primera letra...",
        "moraleja" => "El alfabeto ayuda a poner orden en nuestras cosas.",
        "texto" => "<p>Mickey y Pepe querían ordenar su alacena. Mickey guardó la Mantequilla, las Manzanas y la Miel en la repisa de la **M**. Pepe acomodó el Pan, las Papas y las Peras en la repisa de la **P**.</p><p>Cuando tuvieron hambre, encontraron todo en un segundo gracias al abecedario.</p>"
    ],
    [
        "id" => "e1-12", "grado" => 1, "materia" => "espanol", "emoji" => "🦜🗣️",
        "titulo" => "Paco el loro parlanchín",
        "resumen" => "Paco aprendió a decir 'Por favor' y 'Gracias'...",
        "moraleja" => "Las palabras mágicas abren todas las puertas.",
        "texto" => "<p>Paco repetía todo lo que oía, pero a veces gritaba feo. La niña de la casa le enseñó dos frases especiales antes de darle su semilla de girasol: 'Por favor' y 'Gracias'.</p><p>Paco las aprendió tan bien que ahora todos en la vecindad le sonreían al escucharlo hablar.</p>"
    ],
    [
        "id" => "e1-13", "grado" => 1, "materia" => "espanol", "emoji" => "🐰🥕",
        "titulo" => "La lista de compras del conejo",
        "resumen" => "Tambor escribe dibujando lo que necesita comprar...",
        "moraleja" => "Escribir e ilustrar nos ayuda a no olvidar los compromisos.",
        "texto" => "<p>Tambor fue al mercado de la selva. Llevaba una hojita donde había dibujado 3 zanahorias, 2 lechugas y la letra 'Z' gigante. Al llegar con el vendedor, no tuvo dudas de qué pedir y volvió a casa sin olvidar nada.</p>"
    ],
    [
        "id" => "e1-14", "grado" => 1, "materia" => "espanol", "emoji" => "🐿️🌰",
        "titulo" => "Las avellanas habladoras",
        "resumen" => "Separar sílabas dando aplausos como las ardillas...",
        "moraleja" => "Las sílabas son los aplausos que forman las palabras.",
        "texto" => "<p>La ardilla Susi enseñaba a sus hijos a contar los golpes de sonido: 'A-VE-LLA-NA' (4 aplausos), 'SOL' (1 aplauso), 'CHO-CO-LA-TE' (4 aplausos). Los ardillitos daban saltos por cada sílaba aprendida.</p>"
    ],
    [
        "id" => "e1-15", "grado" => 1, "materia" => "espanol", "emoji" => "🦒☁️",
        "titulo" => "Rafaela la jirafa y el punto final",
        "resumen" => "Descubrir para qué sirve el punto al terminar una oración...",
        "moraleja" => "El punto final le da un descanso al lector.",
        "texto" => "<p>Rafaela leía una oración muy larga y se quedó sin aire. La maestra le dijo: 'Mira ese puntito negro al final, significa alto, toma aire y sonríe antes de seguir'. Desde ese día, Rafaela nunca más se quedó desinflada al leer.</p>"
    ],
    [
        "id" => "e1-16", "grado" => 1, "materia" => "espanol", "emoji" => "🦔🎨",
        "titulo" => "El erizo que pintaba vocales",
        "resumen" => "Pintar letras con acuarelas para recordarlas...",
        "moraleja" => "El arte y la lectura van siempre de la mano.",
        "texto" => "<p>Pincelito el erizo mojaba sus púas suaves en acuarela azul para trazar la letra O redonda como un sol de noche. Cada vocal tenía su propio color y así su libreta parecía un arcoíris de palabras.</p>"
    ],
    [
        "id" => "e1-17", "grado" => 1, "materia" => "espanol", "emoji" => "🐟🌊",
        "titulo" => "El pececito que buscaba la letra F",
        "resumen" => "Buscar la forma de la F en las algas marinas...",
        "moraleja" => "Observar con atención nos revela detalles sorprendentes.",
        "texto" => "<p>Felipe el pez nadaba buscando cosas que empezaran como su nombre. Encontró una **F**oca juguetona, una **F**lor marina y una **F**ila de caracoles. ¡Comprendió que su letra inicial era la más divertida del océano!</p>"
    ],
    [
        "id" => "e1-18", "grado" => 1, "materia" => "espanol", "emoji" => "🐜🐜",
        "titulo" => "El desfilar de las hormigas A, B, C",
        "resumen" => "Las hormigas marchan en orden alfabético al hormiguero...",
        "moraleja" => "El orden alfabético nos ayuda a organizarnos juntos.",
        "texto" => "<p>La hormiga reina organizó el gran desfile. La hormiga Ana llevaba una **A**lmedra, Bernardo llevaba una **B**ota de juguete y Carla llevaba una **C**ereza. Marcharon felices en estricto orden alfabético.</p>"
    ],
    [
        "id" => "e1-19", "grado" => 1, "materia" => "espanol", "emoji" => "🦩🪞",
        "titulo" => "El flamenco y su espejo de letras",
        "resumen" => "Cuidado con escribir la D y la B al revés...",
        "moraleja" => "Atender la dirección de los trazos evita confusiones.",
        "texto" => "<p>Fifi el flamenco confundía la **b** (con la guatita a la derecha) y la **d** (con la guatita a la izquierda). Mirándose en el agua clara aprendió: 'La b mira al futuro, la d mira al pasado'. Nunca más se equivocó.</p>"
    ],
    [
        "id" => "e1-20", "grado" => 1, "materia" => "espanol", "emoji" => "Koala 🐨",
        "titulo" => "Kiko el koala y la letra K",
        "resumen" => "Un animalito australiano nos enseña palabras con K...",
        "moraleja" => "Hay letras poco comunes pero muy especiales.",
        "texto" => "<p>Kiko comía Kiwi encaramado en un árbol de Kilo. A sus amigos les parecía rara la letra **K**, pero Kiko les mostró que sin ella no habría **K**imonos, **K**aratecas ni pequeños **K**oalas en los libros de cuentos.</p>"
    ],

    // ==========================================
    // 🔢 PRIMER GRADO - MATEMÁTICAS (20 CUENTOS)
    // ==========================================
    [
        "id" => "m1-1", "grado" => 1, "materia" => "matematicas", "emoji" => "🔢🎈",
        "titulo" => "La gran fiesta del 1 al 10",
        "resumen" => "El Uno invita a sus amigos números a organizar un picnic...",
        "moraleja" => "Contar en orden nos ayuda a que nadie se quede sin pastel.",
        "texto" => "<p>El Uno organizó un día de campo. El 2 trajo dos sándwiches, el 3 llevó tres jugos de naranja, y el 4 cuatro globos de colores. Cada número aportaba exactamente la cantidad que indicaba su nombre.</p><p>Cuando llegó el 10, armaron una fila perfecta en la mantita del prado para contar todas las delicias del 1 al 10.</p>"
    ],
    [
        "id" => "m1-2", "grado" => 1, "materia" => "matematicas", "emoji" => "🟡🔷",
        "titulo" => "Las figuras geométricas del parque",
        "resumen" => "Un círculo, un cuadrado y un triángulo construyen una casita...",
        "moraleja" => "Todas las formas son valiosas al trabajar en equipo.",
        "texto" => "<p>El Cuadrado dijo: 'Yo tengo cuatro lados iguales y seré la base fuerte de la casa'. El Triángulo sonrió: 'Yo tengo tres picos y seré un techo resistente contra la lluvia'.</p><p>El Círculo rodó alegremente: '¡Yo seré la ventana redonda para ver la luna!'. Y así crearon el refugio más bonito del bosque.</p>"
    ],
    [
        "id" => "m1-3", "grado" => 1, "materia" => "matematicas", "emoji" => "🍎🧺",
        "titulo" => "La canasta de las sumas",
        "resumen" => "Caperucita junta manzanas rojas y verdes usando el signo +...",
        "moraleja" => "Sumar es juntar dos grupos para saber cuántos hay en total.",
        "texto" => "<p>Lucía tenía 3 manzanas rojas en su canasta. Su abuelita le regaló 2 manzanas verdes. Lucía usó el signo mágico **+** (más) y las juntó todas.</p><p>Contó con su dedito: 1, 2, 3, 4... ¡5 manzanas en total! La suma hizo que su canasta fuera más rica.</p>"
    ],
    [
        "id" => "m1-4", "grado" => 1, "materia" => "matematicas", "emoji" => "🍌🐵",
        "titulo" => "El mono Simón y la resta",
        "resumen" => "Aprender a restar reglando bananas a los amigos...",
        "moraleja" => "Restar es quitar o compartir cosas que tenemos.",
        "texto" => "<p>Simón el mono tenía 6 plátanos maduros. Tenía tanta hambre que se comió 2. ¿Cuántos le quedaron? Colocó el signo **-** (menos) y contó los que aún estaban en la rama: '1, 2, 3, 4 plátanos'. Restar le enseñó a llevar la cuenta de sus bocadillos.</p>"
    ],
    [
        "id" => "m1-5", "grado" => 1, "materia" => "matematicas", "emoji" => "📏🦒",
        "titulo" => "El torneo de los tamaños",
        "resumen" => "Comparar quién es más alto, mediano o bajo...",
        "moraleja" => "Medir cosas nos ayuda a comprender nuestro entorno.",
        "texto" => "<p>La jirafa, el perro y el ratón querían saber quién alcanzaba los frutos del árbol. Se pusieron de pie en una línea recta. La jirafa era **alta**, el perro **mediano** y el ratón **bajo**.</p><p>El ratón se subió a la cabeza de la jirafa y juntos alcanzaron la manzana más alta.</p>"
    ],
    [
        "id" => "m1-6", "grado" => 1, "materia" => "matematicas", "emoji" => "📦🧸",
        "titulo" => "Arriba, abajo, dentro y fuera",
        "resumen" => "Organizar el cuarto usando palabras de ubicación espacial...",
        "moraleja" => "Usar bien las posiciones nos ayuda a encontrar todo rápido.",
        "texto" => "<p>Mamá oso dijo: 'Pongan los ositos **DENTRO** de la caja, la pelota **ARRIBA** de la mesa y las botas **ABAJO** de la cama'. En cinco minutos el cuarto quedó resplandeciente y súper ordenado.</p>"
    ],
    [
        "id" => "m1-7", "grado" => 1, "materia" => "matematicas", "emoji" => "🦆🦆",
        "titulo" => "Los patitos de los números pares",
        "resumen" => "Caminar de dos en dos hacia el lago...",
        "moraleja" => "Contar de 2 en 2 es un superpoder para ir más rápido.",
        "texto" => "<p>Los 10 patitos no iban en fila india, caminaban en parejas: 2, 4, 6, 8, 10. Llegaron al agua el doble de rápido y nadaron felices haciendo giros en el agua.</p>"
    ],
    [
        "id" => "m1-8", "grado" => 1, "materia" => "matematicas", "emoji" => "⚖️🐘",
        "titulo" => "Pesado y liviano en el balancín",
        "resumen" => "Descubrir el peso de los animales en el juego del parque...",
        "moraleja" => "El peso no depende solo del tamaño, sino del material.",
        "texto" => "<p>El elefante se sentó en un extremo del sube y baja y el extremo bajó de golpe: '¡Soy **PESADO**!'. Subió la mariposa al otro lado pero no se movió porque era **LIVIANA**. Se tuvieron que subir 10 monos juntos para equilibrar el juego.</p>"
    ],
    [
        "id" => "m1-9", "grado" => 1, "materia" => "matematicas", "emoji" => "🪙🐖",
        "titulo" => "El alcancía del cerdito Penco",
        "resumen" => "Aprender el valor de las monedas de $1, $2 y $5...",
        "moraleja" => "Ahorrar monedas poco a poco llena la alcancía.",
        "texto" => "<p>Penco guardaba una moneda de $1 el lunes, una de $2 el martes y una de $5 el viernes. Al contar su dinero exclamó: '$1 + $2 = $3, y $3 + $5 = $8'. ¡Ya le alcanzaba para su lápiz de colores nuevo!</p>"
    ],
    [
        "id" => "m1-10", "grado" => 1, "materia" => "matematicas", "emoji" => "📅🌞",
        "titulo" => "Ayer, hoy y mañana",
        "resumen" => "Entender cómo pasa el tiempo durante la semana...",
        "moraleja" => "Planear los días nos evita sorpresas.",
        "texto" => "<p>La ardilla dijo: '**AYER** comí bellotas. **HOY** estoy jugando con barro. **MAÑANA** iré a visitar a mi abuelita'. Entender el tiempo le ayudó a preparar su mochila con un día de anticipación.</p>"
    ],
    [
        "id" => "m1-11", "grado" => 1, "materia" => "matematicas", "emoji" => "🕯️🎂",
        "titulo" => "El pastel con cero velas",
        "resumen" => "Descubrir la importancia del número 0...",
        "moraleja" => "El cero representa la ausencia, ¡pero cambia todo si acompaña a otros!",
        "texto" => "<p>Cuando no hay juguetes en la caja, decimos que hay **0** juguetes. Pero cuando el 1 se junta con el 0, ¡se convierten en un grandioso **10**! El cero aprendió que solo o acompañado tiene un gran valor.</p>"
    ],
    [
        "id" => "m1-12", "grado" => 1, "materia" => "matematicas", "emoji" => "🎨🔴",
        "titulo" => "Patrones de colores",
        "resumen" => "Completar secuencias: Rojo, Azul, Rojo, Azul...",
        "moraleja" => "Los patrones crean diseño y armonía en las seriaciones.",
        "texto" => "<p>El gusanito vestía una camiseta a rayas: Roja, Verde, Roja, Verde. '¿Qué color sigue?', preguntó a la hormiga. '¡Roja!', contestó ella. Juntos completaron la bufanda más bonita de la temporada.</p>"
    ],
    [
        "id" => "m1-13", "grado" => 1, "materia" => "matematicas", "emoji" => "🖐️🖐️",
        "titulo" => "Contar con los diez dedos",
        "resumen" => "Las manos son nuestra calculadora natural...",
        "moraleja" => "Tus manos siempre están listas para ayudarte a calcular.",
        "texto" => "<p>Mati abrió las manos frente a la pizarra. 5 dedos en la izquierda y 5 en la derecha. '5 y 5 son 10', cantó contento. Sumar usando los dedos le daba mucha confianza en clase.</p>"
    ],
    [
        "id" => "m1-14", "grado" => 1, "materia" => "matematicas", "emoji" => "🎲🐸",
        "titulo" => "La carrera de los dados",
        "resumen" => "Avanzar casillas según los puntos marcados...",
        "moraleja" => "Respetar los puntos del dado hace el juego justo.",
        "texto" => "<p>La rana tiró el dado y salieron 4 puntos. Dio 4 saltos contados en voz alta: 1, 2, 3, 4. Luego el sapo tiró un 6. Aprender a asociar puntos con números hizo que el juego de mesa fuera muy divertido.</p>"
    ],
    [
        "id" => "m1-15", "grado" => 1, "materia" => "matematicas", "emoji" => "🍕🧩",
        "titulo" => "Media manzana para cada quien",
        "resumen" => "Noción básica de dividir a la mitad...",
        "moraleja" => "Compartir por la mitad es partir en 2 partes exactas.",
        "texto" => "<p>Había una sola manzana roja y dos conejitos hambrientos. Mamá conejita la cortó por el centro exacto. 'Ahora cada uno tiene **MEDIA** manzana limpia y jugosa', dijeron felices festejando la equidad.</p>"
    ],
    [
        "id" => "m1-16", "grado" => 1, "materia" => "matematicas", "emoji" => "👟🧦",
        "titulo" => "Pares de calcetines desordenados",
        "resumen" => "Juntar pares de 2 en 2 en el cajón...",
        "moraleja" => "Un par siempre lo forman dos elementos iguales.",
        "texto" => "<p>Camilo tenía 6 calcetines sueltos en su cama. Los juntó por colores de 2 en 2. Al final contó: 'Tengo 3 **PARES** de calcetines listos para ponerme con los zapatos'.</p>"
    ],
    [
        "id" => "m1-17", "grado" => 1, "materia" => "matematicas", "emoji" => "🚪🔑",
        "titulo" => "Muchos, pocos y ninguno",
        "resumen" => "Clasificar cantidades sin necesidad de contar detalladamente...",
        "moraleja" => "Estimación rápida de objetos a simple vista.",
        "texto" => "<p>En el plato de las galletas había **MUCHAS**, en el de las fresas había **POCAS** y en el de los dulces no quedaba **NINGUNO**. Así su abuelita supo qué plato debía rellenar primero.</p>"
    ],
    [
        "id" => "m1-18", "grado" => 1, "materia" => "matematicas", "emoji" => "⏳🍦",
        "titulo" => "Más rápido que un helado derretido",
        "resumen" => "Medir el tiempo breve usando un reloj de arena...",
        "moraleja" => "El tiempo pasa rápido cuando nos divertimos.",
        "texto" => "<p>El oso tenía un reloj de arena de 1 minuto. Retó a la liebre a amarrarse las agujetas antes de que cayera el último granito. ¡Lo lograron justo a tiempo antes de que se derritiera el helado!</p>"
    ],
    [
        "id" => "m1-19", "grado" => 1, "materia" => "matematicas", "emoji" => "📈📏",
        "titulo" => "La vara de medir del castorcito",
        "resumen" => "Medir usando pasos o ramas como unidad no convencional...",
        "moraleja" => "Puedes medir distancias con tus propios pasos.",
        "texto" => "<p>El castor quería saber qué tan ancho era el río. Caminó por el borde contando: '1, 2, 3, 4, 5 pasos de castor'. Usar sus pies le sirvió para elegir el tronco del tamaño exacto como puente.</p>"
    ],
    [
        "id" => "m1-20", "grado" => 1, "materia" => "matematicas", "emoji" => "🏆1️⃣",
        "titulo" => "Primero, segundo y tercero en la meta",
        "resumen" => "Números ordinales en la carrera del colegio...",
        "moraleja" => "Los números ordinales nos indican el orden de llegada.",
        "texto" => "<p>En la carrera escolar, la tortuga llegó **PRIMERA**, el conejo **SEGUNDO** y el zorrillo **TERCERO**. Todos recibieron su medalla correspondiente reconociendo su gran esfuerzo en la pista.</p>"
    ],

    // ==========================================
    // 📚 SEGUNDO GRADO - ESPAÑOL (20 CUENTOS)
    // ==========================================
    [
        "id" => "e2-1", "grado" => 2, "materia" => "espanol", "emoji" => "🐿️📖",
        "titulo" => "La ardilla Ada y la H muda",
        "resumen" => "Descubrir por qué la H no suena pero transforma las palabras...",
        "moraleja" => "Aunque seas silencioso, tu presencia en el equipo es clave.",
        "texto" => "<p>Ada la ardilla encontró una letra que no emitía ningún sonido al soplar por ella: era la letra **H**. Pensó que no servía, pero el búho le explicó: 'Sin la H no podríamos escribir *Helado*, *Huevo* ni *Hada*'.</p><p>Ada entendió que hay letras y personas discretas cuya labor es fundamental para que todo funcione bien.</p>"
    ],
    [
        "id" => "e2-2", "grado" => 2, "materia" => "espanol", "emoji" => "🦊✏️",
        "titulo" => "Zack el zorro y los signos de interrogación",
        "resumen" => "Un pequeño detective aprende a formular preguntas con ¿?...",
        "moraleja" => "Usar los signos de interrogación aclara nuestras dudas.",
        "texto" => "<p>Zack encontró una misteriosa nota en el bosque. Para investigar escribió en su libreta: '¿Quién dejó la nota?', '¿A qué hora volverá?'.</p><p>Su maestro le enseñó a abrir siempre con **¿** y cerrar con **?** para que quien leyera supiera que se trataba de una pregunta intrigante.</p>"
    ],
    [
        "id" => "e2-3", "grado" => 2, "materia" => "espanol", "emoji" => "🦉❗",
        "titulo" => "¡Qué sorpresa con la exclamación!",
        "resumen" => "Expresar emociones usando los signos de admiración ¡!...",
        "moraleja" => "Los signos de exclamación le dan emoción a la lectura.",
        "texto" => "<p>Cuando la lechuza vio caer una estrella fugaz gritó: '¡Es hermosa! ¡Mira cómo brilla!'. Colocó los palitos con punto **¡ !** al principio y al final de sus frases para transmitir la alegría que sentía en su corazón.</p>"
    ],
    [
        "id" => "e2-4", "grado" => 2, "materia" => "espanol", "emoji" => "🐝🍯",
        "titulo" => "El diccionario de las abejas",
        "resumen" => "Aprender el significado de palabras desconocidas en orden alfabético...",
        "moraleja" => "El diccionario es el mapa para descubrir el significado del mundo.",
        "texto" => "<p>La abeja Berta no sabía qué significaba la palabra 'Néctar'. Voló a la biblioteca del panal y buscó en el gran libro por la letra **N**. Encontró: 'Néctar: jugo dulce de las flores'. Sonrió y voló directo al campo floral.</p>"
    ],
    [
        "id" => "e2-5", "grado" => 2, "materia" => "espanol", "emoji" => "🐢📜",
        "titulo" => "El poema de la tortuga diminuta",
        "resumen" => "Escribir versos con rimas y musicalidad...",
        "moraleja" => "Los poemas expresan sentimientos con ritmo y belleza.",
        "texto" => "<p>Tomasa escribió cuatro líneas: 'Camina despacio / por la verde arena, / lleva su casita / limpia y sin pena'. Su maestra le dijo que eso era un **estrofa** y que las palabras finales rimaban dulcemente.</p>"
    ],
    [
        "id" => "e2-6", "grado" => 2, "materia" => "espanol", "emoji" => "🎭🦊",
        "titulo" => "El teatro de los animales",
        "resumen" => "Aprender a leer los guiones teatrales con acotaciones...",
        "moraleja" => "Actuar nos permite ponernos en el lugar de los demás.",
        "texto" => "<p>En el libreto decía: *Zorro (entrando con miedo): —¡Hay un ruido en la cueva!*. Zack leyó su parte haciendo la voz temblorosa tal como indicaban las instrucciones entre paréntesis. La obra fue un éxito total.</p>"
    ],
    [
        "id" => "e2-7", "grado" => 2, "materia" => "espanol", "emoji" => "📰🕊️",
        "titulo" => "El periódico del bosque",
        "resumen" => "Redactar noticias cortas respondiendo Qué, Quién y Dónde...",
        "moraleja" => "Informar con la verdad ayuda a mantener comunicada a la comunidad.",
        "texto" => "<p>La paloma mensajera escribió el titular: '¡NUEVO PUENTE EN EL RÍO!'. Explicó quién lo construyó (los castores), dónde (en el paso norte) y para qué (para cruzar sin mojarse). Todos leyeron la noticia en el roble central.</p>"
    ],
    [
        "id" => "e2-8", "grado" => 2, "materia" => "espanol", "emoji" => "🦔💬",
        "titulo" => "Sinónimos para no repetirse",
        "resumen" => "Cambiar la palabra 'bonito' por 'lindo', 'hermoso' o 'bello'...",
        "moraleja" => "Los sinónimos enriquecen nuestro vocabulario.",
        "texto" => "<p>El erizo decía 'bonito' diez veces al día: 'bonito día', 'bonito árbol', 'bonito hongo'. El búho le regaló tres palabras mágicas nuevas: **lindo**, **hermoso** y **radiante**. Sus textos se volvieron mucho más interesantes.</p>"
    ],
    [
        "id" => "e2-9", "grado" => 2, "materia" => "espanol", "emoji" => "⚪⚫",
        "titulo" => "El juego de los antónimos",
        "resumen" => "Palabras que significan lo contrario: grande/pequeño, alto/bajo...",
        "moraleja" => "Los opuestos nos ayudan a hacer comparaciones claras.",
        "texto" => "<p>El oso alto y el ratón bajo jugaban a decir lo contrario. Si el oso decía **fuerte**, el ratón decía **débil**; si el oso decía **día**, el ratón decía **noche**. Rieron mucho descubriendo el mundo de las palabras opuestas.</p>"
    ],
    [
        "id" => "e2-10", "grado" => 2, "materia" => "espanol", "emoji" => "📮✉️",
        "titulo" => "Una carta para la abuela",
        "resumen" => "Escribir cartas respetando Fecha, Saludo, Cuerpo y Firma...",
        "moraleja" => "Una carta escrita a mano es un abrazo que viaja en sobre.",
        "texto" => "<p>Sofía empezó su hoja: '12 de Mayo. Querida Abuelita: Te escribo para contarte que aprendí a andar en bici. Te quiero mucho. Con amor, Sofía'. Pegó la estampilla y la mandó por el correo postal.</p>"
    ],
    [
        "id" => "e2-11", "grado" => 2, "materia" => "espanol", "emoji" => "🐺🌾",
        "titulo" => "La fábula del lobo y la espiga",
        "resumen" => "Una historia breve que deja una enseñanza clara...",
        "moraleja" => "No juzgues a nadie por su apariencia externa.",
        "texto" => "<p>Un lobo hambriento ignoró una espiga de trigo por no parecer carne. Pero cuando el invierno heló la selva, los ratones que guardaron trigo tuvieron pan caliente. El lobo aprendió a valorar todas las comidas.</p>"
    ],
    [
        "id" => "e2-12", "grado" => 2, "materia" => "espanol", "emoji" => "📑🏷️",
        "titulo" => "La instructivo para armar un cometa",
        "resumen" => "Seguir pasos numerados 1, 2, 3 en un instructivo...",
        "moraleja" => "Seguir las instrucciones en orden garantiza un buen resultado.",
        "texto" => "<p>El instructivo decía: 1. Cruza dos palitos. 2. Amarra el papel china. 3. Ponle una cola de tela. Tomás siguió los pasos sin saltarse ninguno y su cometa fue la que más alto voló en el parque.</p>"
    ],
    [
        "id" => "e2-13", "grado" => 2, "materia" => "espanol", "emoji" => "🗣️👂",
        "titulo" => "El trabalenguas de las tres tristes ratas",
        "resumen" => "Ejercicios de vocalización con trabalenguas divertidos...",
        "moraleja" => "Los trabalenguas ejercitan la agilidad de nuestra lengua.",
        "texto" => "<p>'Tres tristes ratas comían trigo en un trigal'. Al principio a Mateo se le trababa la boca, pero practicando despacio y luego rápido logró decirlo sin tropezar ni una sola vez.</p>"
    ],
    [
        "id" => "e2-14", "grado" => 2, "materia" => "espanol", "emoji" => "🐉🏰",
        "titulo" => "El mito del dragón de las nubes",
        "resumen" => "Diferenciar cuentos fantásticos de historias reales...",
        "moraleja" => "La imaginación no tiene límites en la literatura.",
        "texto" => "<p>Cuentan los abuelos que cuando truena en la montaña no es una tormenta, sino un dragón de vapor jugando a las canicas. Los niños escuchaban fascinados la leyenda tradicional de su pueblo.</p>"
    ],
    [
        "id" => "e2-15", "grado" => 2, "materia" => "espanol", "emoji" => "💡✍️",
        "titulo" => "El borrador de los cuentos",
        "resumen" => "Revisar y corregir ortografía antes de publicar...",
        "moraleja" => "Corregir nuestros errores mejora la calidad de lo que escribimos.",
        "texto" => "<p>Lucas escribió una historia pero olvidó poner las mayúsculas. Junto a la maestra, borró suavemente y corrigió los detalles. Su cuento final quedó tan limpio que lo colgaron en el periódico escolar.</p>"
    ],
    [
        "id" => "e2-16", "grado" => 2, "materia" => "espanol", "emoji" => "🐸👑",
        "titulo" => "El final cambiado de la princesa",
        "resumen" => "Inventar finales alternativos a cuentos clásicos...",
        "moraleja" => "Tú tienes el poder de decidir cómo terminan tus historias.",
        "texto" => "<p>En lugar de casarse en un castillo, la princesa del cuento de Camila decidió abrir una escuela de equitación para ranas. A todos en el salón les encantó este nuevo final tan creativo.</p>"
    ],
    [
        "id" => "e2-17", "grado" => 2, "materia" => "espanol", "emoji" => "🔍📚",
        "titulo" => "El índice del libro misterioso",
        "resumen" => "Usar el índice para encontrar capítulos rápidamente...",
        "moraleja" => "El índice ahorra tiempo al buscar temas específicos.",
        "texto" => "<p>Para saber dónde hablaba de los dinosaurios voladores, Mateo no hojeó todo el libro página por página. Fue al **Índice**, vio 'Capítulo 4 - Página 32' y llegó de inmediato a la información.</p>"
    ],
    [
        "id" => "e2-18", "grado" => 2, "materia" => "espanol", "emoji" => "💬👥",
        "titulo" => "La mesa redonda de los animales",
        "resumen" => "Respetar el turno de palabra en una discusión grupal...",
        "moraleja" => "Escuchar con respeto es tan importante como hablar.",
        "texto" => "<p>Los animales debatían qué árbol plantar en el patio. Levantar la mano y esperar su turno permitió que la propuesta del castorcito fuera escuchada por todos sin gritos ni interrupciones.</p>"
    ],
    [
        "id" => "e2-19", "grado" => 2, "materia" => "espanol", "emoji" => "☀️🌙",
        "titulo" => "La metáfora del sol sonriente",
        "resumen" => "Comprender el lenguaje figurado en las lecturas...",
        "moraleja" => "El lenguaje figurado adorna y llena de color la poesía.",
        "texto" => "<p>El poema decía: 'El sol se peina los rayos de oro'. Camila entendió que el sol no tiene peine real, sino que sus luces matutinas parecían hermosas hebras doradas sobre el cielo.</p>"
    ],
    [
        "id" => "e2-20", "grado" => 2, "materia" => "espanol", "emoji" => "📜✨",
        "titulo" => "El diploma del buen lector",
        "resumen" => "Celebrar haber leído 20 cuentos completos en el año...",
        "moraleja" => "Leer todos los días te transforma en una persona sabia y libre.",
        "texto" => "<p>Al terminar su cuaderno de lectura de 20 cuentos, la biblioteca le entregó a Daniel un diploma dorado. Había viajado a mundos lejanos sin salir de su pupitre gracias al poder de las palabras.</p>"
    ],

    // ==========================================
    // 🔢 SEGUNDO GRADO - MATEMÁTICAS (20 CUENTOS)
    // ==========================================
    [
        "id" => "m2-1", "grado" => 2, "materia" => "matematicas", "emoji" => "🍕📊",
        "titulo" => "Toby el perro y las fracciones de pizza",
        "resumen" => "Aprender a dividir objetos enteros en 1/2, 1/4 y 1/8...",
        "moraleja" => "Partir en fracciones exactamente iguales garantiza justicia para todos.",
        "texto" => "<p>Toby preparó una deliciosa pizza redonda para sus cuatro amigos. Tomó el cortador y dividió la pizza en 4 rebanadas exactas. A cada uno le tocó un cuarto (**1/4**).</p><p>Cuando llegaron dos amigos más, aprendió a cortar rebanadas más pequeñas de un octavo (**1/8**) para que nadie se quedara sin comer.</p>"
    ],
    [
        "id" => "m2-2", "grado" => 2, "materia" => "matematicas", "emoji" => "⏰🐢",
        "titulo" => "La tortuga Tomasa y las horas del reloj",
        "resumen" => "Leer la manecilla corta (horas) y larga (minutos)...",
        "moraleja" => "Organizar el tiempo nos vuelve responsables y puntuales.",
        "texto" => "<p>Tomasa siempre llegaba tarde a la clase de natación. Su abuelo le regaló un reloj de agujas y le enseñó: 'La aguja chiquita marca la hora y la aguja flaca señala los minutos'.</p><p>Cuando la chiquita apuntó al 4 y la grande al 12, gritó: '¡Son las 4 en punto!' y llegó antes que nadie a la alberca.</p>"
    ],
    [
        "id" => "m2-3", "grado" => 2, "materia" => "matematicas", "emoji" => "✖️🐰",
        "titulo" => "La tabla del 2 del conejo saltarín",
        "resumen" => "Multiplicar es sumar el mismo número varias veces de forma rápida...",
        "moraleja" => "La multiplicación es el atajo de la suma.",
        "texto" => "<p>El conejo daba saltos de 2 en 2 para recoger zanahorias: 2, 4, 6, 8, 10. Su maestra le dijo: 'Dar 5 saltos de 2 es lo mismo que decir 5 veces 2, ¡es decir **5 x 2 = 10**!'. El conejo se ahorró muchísimo tiempo de conteo.</p>"
    ],
    [
        "id" => "m2-4", "grado" => 2, "materia" => "matematicas", "emoji" => "📦💯",
        "titulo" => "Las centenas de la tienda de frutos",
        "resumen" => "Comprender Unidades, Decenas y Centenas (100)...",
        "moraleja" => "Agrupar de 10 en 10 y de 100 en 100 facilita las grandes cuentas.",
        "texto" => "<p>El ardillón juntó 100 nueces. En lugar de tenerlas regadas, puso 10 nueces en bolsas de decenas, y 10 bolsas dentro de una caja grande de **Centena** (100). Así supe que tenía 1 Centena, 0 Decenas y 0 Unidades.</p>"
    ],
    [
        "id" => "m2-5", "grado" => 2, "materia" => "matematicas", "emoji" => "📐🎲",
        "titulo" => "Cuerpos geométricos en 3D",
        "resumen" => "Diferencia entre un cuadrado plano y un cubo de rubik...",
        "moraleja" => "Los cuerpos geométricos ocupan un lugar en el espacio tridimensional.",
        "texto" => "<p>El ratón dibujó un cuadrado plano en el papel. Pero al tomar un dado de madera exclamó: '¡Esto no es solo plano, tiene caras, vértices y profundidad! ¡Es un **CUBO**!'. Descubrió también las esferas y los cilindros.</p>"
    ],
    [
        "id" => "m2-6", "grado" => 2, "materia" => "matematicas", "emoji" => "🏧🛒",
        "titulo" => "El cambio en la tiendita escolar",
        "resumen" => "Calcular cuánto dinero te sobra tras comprar un producto...",
        "moraleja" => "Revisar tu cambio te asegura administrar bien tus ahorros.",
        "texto" => "<p>Mateo pagó un jugo de $12 pesos con un billete de $20 pesos. Hizo la resta en su mente: $20 - $12 = $8 pesos. La cajera le entregó sus $8 pesos de cambio exacto y Mateo le dio las gracias alegremente.</p>"
    ],
    [
        "id" => "m2-7", "grado" => 2, "materia" => "matematicas", "emoji" => "✖️5️⃣",
        "titulo" => "El reloj y la tabla del 5",
        "resumen" => "Contar minutos de 5 en 5 alrededor de la carátula...",
        "moraleja" => "La tabla del 5 nos da los minutos exactos del reloj.",
        "texto" => "<p>Cada número del reloj equivale a 5 minutos. Cuando la aguja grande marca el 1 son 5 min; en el 2 son 10 min; en el 3 son 15 min. Aprender la tabla del 5 hizo que leer el reloj fuera facilísimo.</p>"
    ],
    [
        "id" => "m2-8", "grado" => 2, "materia" => "matematicas", "emoji" => "⚖️kg",
        "titulo" => "El kilogramo de plátanos",
        "resumen" => "Aprender a pesar objetos en la báscula de la verdulería...",
        "moraleja" => "El kilogramo (kg) es la unidad para medir la masa de las cosas.",
        "texto" => "<p>El changuito puso bananas en la báscula hasta que la aguja llegó al número **1 kg**. Comprendió que 1 kilo de bananas pesaba exactamente lo mismo que 1 kilo de manzanas pesadas en el puesto vecino.</p>"
    ],
    [
        "id" => "m2-9", "grado" => 2, "materia" => "matematicas", "emoji" => "🥛L",
        "titulo" => "Los litros de agua para la excursión",
        "resumen" => "Capacidad de líquidos en recipientes de 1 Litro...",
        "moraleja" => "El litro (L) mide cuánto líquido cabe en un envase.",
        "texto" => "<p>Para el día de campo necesitaban 3 Litros de agua. Llenaron 3 botellas de 1 Litro cada una. Así aseguraron suficiente líquido para estar hidratados durante toda la caminata por el cerro.</p>"
    ],
    [
        "id" => "m2-10", "grado" => 2, "materia" => "matematicas", "emoji" => "📊📊",
        "titulo" => "La gráfica de barras del recreo",
        "resumen" => "Organizar votos sobre la fruta favorita en una gráfica...",
        "moraleja" => "Las gráficas de barras ayudan a comparar resultados fácilmente.",
        "texto" => "<p>Hicieron una encuesta sobre qué deporte gustaba más. 8 niños votaron por Fútbol, 5 por Básquetbol y 3 por Natación. Dibujaron barras de colores y todos vieron de un vistazo cuál era el deporte ganador.</p>"
    ],
    [
        "id" => "m2-11", "grado" => 2, "materia" => "matematicas", "emoji" => "🔄➕",
        "titulo" => "Sumas llevando a las decenas",
        "resumen" => "Aprender la suma con transformación (ej. 18 + 15)...",
        "moraleja" => "Cuando las unidades pasan de 9, 'llevamos' 1 a la columna de decenas.",
        "texto" => "<p>Al sumar 8 + 5 obtuvo 13. Dejó el 3 en las unidades y regaló el 1 a la columna de las decenas. Sumó las decenas y el resultado dio 33. ¡Había resuelto su primera suma de llevar!</p>"
    ],
    [
        "id" => "m2-12", "grado" => 2, "materia" => "matematicas", "emoji" => "➖🔄",
        "titulo" => "Restas pidiendo prestado",
        "resumen" => "Restas con transformación (ej. 42 - 15)...",
        "moraleja" => "Pedir prestada 1 decena a tu vecino soluciona la resta.",
        "texto" => "<p>A 2 no le podía quitar 5. Así que el 2 le pidió una decena prestada a su vecino el 4. Se convirtió en 12, y a 12 sí le pudo restar 5 quedándole 7. ¡Matemáticas de ayuda mutua!</p>"
    ],
    [
        "id" => "m2-13", "grado" => 2, "materia" => "matematicas", "emoji" => "🧵📏",
        "titulo" => "El metro de tela para el disfraz",
        "resumen" => "La unidad de medida estándar: el Metro (100 cm)...",
        "moraleja" => "El metro permite medir objetos largos con exactitud.",
        "texto" => "<p>La costurera sacó una cinta métrica amarilla de 100 centímetros. Midió la capa del disfraz de superhéroe exactamente a 1 **Metro**. El disfraz le quedó perfecto a la medida sin arrastrar.</p>"
    ],
    [
        "id" => "m2-14", "grado" => 2, "materia" => "matematicas", "emoji" => "✖️1️⃣0️⃣",
        "titulo" => "La magia de multiplicar por 10",
        "resumen" => "Agregar un cero al multiplicar cualquier número por 10...",
        "moraleja" => "Multiplicar por 10 solo requiere poner un cero al final.",
        "texto" => "<p>El mago mostró el número 7. Lo multiplicó por 10 y ¡pum!, apareció un 70. 'Para multiplicar por 10 solo agrégale un 0 a la derecha del número original', enseñó sonriendo.</p>"
    ],
    [
        "id" => "m2-15", "grado" => 2, "materia" => "matematicas", "emoji" => "🧩🔷",
        "titulo" => "El simétrico juego del Tangram",
        "resumen" => "Crear figuras combinando 7 piezas geométricas...",
        "moraleja" => "Combinando figuras simples creamos formas complejas.",
        "texto" => "<p>Con dos triángulos grandes, uno mediano, dos pequeños, un cuadrado y un romboide, Sofía armó la silueta de un gato elegante. El Tangram le enseñó cómo se componen las formas compuestas.</p>"
    ],
    [
        "id" => "m2-16", "grado" => 2, "materia" => "matematicas", "emoji" => "🗓️📌",
        "titulo" => "El calendario escolar de 12 meses",
        "resumen" => "Aprender los meses del año y los días que tiene cada uno...",
        "moraleja" => "El calendario nos ubica en el año para no perdernos las vacaciones.",
        "texto" => "<p>El búho marcó en el calendario: Enero, Febrero, Marzo... hasta Diciembre. Contaron 12 meses. Ubicó el día de su cumpleaños en Octubre y contó cuántas semanas faltaban para el gran festejo.</p>"
    ],
    [
        "id" => "m2-17", "grado" => 2, "materia" => "matematicas", "emoji" => "🍫🔲",
        "titulo" => "La barra de chocolate en cuadrícula",
        "resumen" => "Filas y columnas para calcular el área...",
        "moraleja" => "Multiplicar Filas x Columnas te da el total de cuadros.",
        "texto" => "<p>Una barra de chocolate tenía 3 filas y 4 columnas. En lugar de contar cuadro por cuadro, multiplicó 3 x 4 = 12 cuadritos de chocolate deliciosos en total.</p>"
    ],
    [
        "id" => "m2-18", "grado" => 2, "materia" => "matematicas", "emoji" => "🪞✨",
        "titulo" => "El eje de simetría en la mariposa",
        "resumen" => "Trazar una línea recta donde ambos lados son idénticos...",
        "moraleja" => "La simetría es el equilibrio perfecto entre dos mitades.",
        "texto" => "<p>Al doblar un dibujo de mariposa por el centro, el ala izquierda coincidió exactamente con el ala derecha. Esa línea imaginaria del centro se llama **Eje de Simetría**.</p>"
    ],
    [
        "id" => "m2-19", "grado" => 2, "materia" => "matematicas", "emoji" => "🎲❓",
        "titulo" => "Es seguro, posible o imposible",
        "resumen" => "Nociones básicas de probabilidad en eventos...",
        "moraleja" => "Clasificar sucesos según las posibilidades reales.",
        "texto" => "<p>Que el sol salga mañana es **SEGURO**. Que al tirar una moneda salga águila es **POSIBLE**. Que un elefante vuele con alas de plumas es **IMPOSIBLE**. Entender la probabilidad le ayudó a tomar sabias decisiones.</p>"
    ],
    [
        "id" => "m2-20", "grado" => 2, "materia" => "matematicas", "emoji" => "🎓🧮",
        "titulo" => "El gran torneo de cálculo mental",
        "resumen" => "Resolver operaciones rápidas sin usar lápiz ni papel...",
        "moraleja" => "Entrenar tu cerebro te da agilidad para toda la vida.",
        "texto" => "<p>La maestra dijo: '¡10 + 20 - 5!'. En tres segundos, Camila levantó la mano: '¡25!'. Todo el grupo festejó el campeonato de cálculo mental reconociendo la dedicación y práctica de todos los estudiantes.</p>"
    ]
];
?>