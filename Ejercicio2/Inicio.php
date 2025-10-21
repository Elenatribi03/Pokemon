<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            border: 5px solid black;
            background-color: red;
            height: 100%;
            padding: 0 20px;
        }

        h3 {
            margin: 0;
            color: white;
            margin-right: 10px;
        }

        img {
            height: 60px;
            width: 60px;
        }

        button {
            padding: 10px;
            background-color: #fff;
            color: red;
            border: 2px solid red;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 10px;
        }

        button:hover {
            background-color: #f1f1f1;
        }

        .logo-image {
            width: 100%;
            height: 90.5vh;
            object-fit: cover;
            display: block;
        }
    </style>
</head>

<body>
    <header>
        <h3>Bienvenido a la página Pokémon!</h3>
        <img src="https://img1.picmix.com/output/stamp/normal/5/3/2/3/2233235_0c846.png" alt="Pokébola">
        <div>
            <a href="Pokemon.php"><button>Buscar Pokemon</button></a>
            <a href="juego.php"><button>Juego Pokemon</button></a>
        </div>
    </header>

    <img src="img/fondo-pokemon.png" alt="Logo Pokémon" class="logo-image">
</body>

</html>