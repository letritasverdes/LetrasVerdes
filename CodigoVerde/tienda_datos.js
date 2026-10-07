const TIENDA_CATALOGO = {
    comida: {
        desayuno: [
            { id: "bacon", nombre: "Tocineta", precio: 8, restaura: 10, icon: "🥓" },
            { id: "egg", nombre: "Huevo Frito", precio: 6, restaura: 8, icon: "🍳" },
            { id: "pancake", nombre: "Panqueque", precio: 12, restaura: 15, icon: "🥞" },
            { id: "waffle", nombre: "Waffle", precio: 14, restaura: 18, icon: "🧇" }
        ],
        dulces: [
            { id: "candy", nombre: "Caramelo", precio: 4, restaura: 5, icon: "🍬" },
            { id: "lollipop", nombre: "Paleta", precio: 5, restaura: 6, icon: "🍭" },
            { id: "chocolate", nombre: "Chocolate", precio: 10, restaura: 12, icon: "🍫" },
            { id: "marshmallow", nombre: "Malvavisco", precio: 6, restaura: 7, icon: "🍡" }
        ],
        comida_rapida: [
            { id: "burger", nombre: "Hamburguesa", precio: 20, restaura: 25, icon: "🍔" },
            { id: "fries", nombre: "Papas Fritas", precio: 10, restaura: 12, icon: "🍟" },
            { id: "hotdog", nombre: "Perro Caliente", precio: 15, restaura: 18, icon: "🌭" },
            { id: "pizza", nombre: "Pizza", precio: 18, restaura: 22, icon: "🍕" },
            { id: "nuggets", nombre: "Nuggets", precio: 14, restaura: 16, icon: "🍗" }
        ],
        frutas: [
            { id: "apple", nombre: "Manzana", precio: 5, restaura: 8, icon: "🍎" },
            { id: "banana", nombre: "Banana", precio: 6, restaura: 9, icon: "🍌" },
            { id: "strawberry", nombre: "Fresa", precio: 8, restaura: 10, icon: "🍓" },
            { id: "watermelon", nombre: "Sandía", precio: 12, restaura: 14, icon: "🍉" },
            { id: "orange", nombre: "Naranja", precio: 6, restaura: 8, icon: "🍊" }
        ],
        verduras: [
            { id: "carrot", nombre: "Zanahoria", precio: 5, restaura: 7, icon: "🥕" },
            { id: "broccoli", nombre: "Brócoli", precio: 7, restaura: 10, icon: "🥦" },
            { id: "tomato", nombre: "Tomate", precio: 4, restaura: 6, icon: "🍅" },
            { id: "cucumber", nombre: "Pepino", precio: 5, restaura: 7, icon: "🥒" }
        ],
        postres: [
            { id: "donut", nombre: "Dona", precio: 8, restaura: 10, icon: "🍩" },
            { id: "icecream", nombre: "Helado", precio: 12, restaura: 15, icon: "🍦" },
            { id: "cake", nombre: "Pastel", precio: 25, restaura: 30, icon: "🍰" },
            { id: "cookie", nombre: "Galleta", precio: 6, restaura: 8, icon: "🍪" }
        ],
        bebidas: [
            { id: "milk", nombre: "Leche", precio: 8, restaura: 10, icon: "🥛" },
            { id: "soda", nombre: "Refresco", precio: 10, restaura: 8, icon: "🥤" },
            { id: "juice", nombre: "Jugo", precio: 9, restaura: 11, icon: "🧃" },
            { id: "coffee", nombre: "Café", precio: 15, restaura: 5, icon: "☕" }
        ],
        mariscos: [
            { id: "shrimp", nombre: "Camarón", precio: 16, restaura: 20, icon: "🍤" },
            { id: "sushi", nombre: "Sushi", precio: 22, restaura: 26, icon: "🍣" },
            { id: "fish", nombre: "Pescado", precio: 18, restaura: 22, icon: "🐟" }
        ]
    },
    pociones: [
        { id: "small_health", nombre: "Poción Salud +25", precio: 20, efecto: "salud_25", icon: "🧪" },
        { id: "health", nombre: "Poción Salud Máxima", precio: 50, efecto: "salud_100", icon: "🍷" },
        { id: "energizer", nombre: "Energizante 100%", precio: 60, efecto: "energia_100", icon: "⚡" },
        { id: "hunger", nombre: "Poción Hambre", precio: 15, efecto: "hambre_0", icon: "🌶️" },
        { id: "fat_burner", nombre: "Quemador de Grasa", precio: 30, efecto: "quemar_grasa", icon: "💊" },
        { id: "max_potion", nombre: "Max Poción (Todo 100%)", precio: 120, efecto: "max_todo", icon: "🌟" },
        { id: "adult", nombre: "Poción Adulto", precio: 99, efecto: "crecer", icon: "👨" },
        { id: "baby", nombre: "Poción Bebé", precio: 99, efecto: "encoger", icon: "👶" }
    ]
};