
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Adivinar el Pokémon</title>
</head>

<body>
<?php
    session_start();

function cargarPokemon()
{
    $pokemon_id = rand(1, 400);
    $url = "https://pokeapi.co/api/v2/pokemon/$pokemon_id";
    $json = file_get_contents($url);
    $pokemon = json_decode($json);

    $_SESSION['pokemon_name'] = $pokemon->name;
    $_SESSION['pokemon_image'] = $pokemon->sprites->front_default;
}


$frase = "";
if (isset($_POST['boton_adivinar'])) {
    $adivinar_pokemon = $_POST['adivinar'];
    $respuesta = $_SESSION['pokemon_name'];

    if ($adivinar_pokemon == $respuesta) {
        $_SESSION['contador']++;
        $frase = "<p style='color: green;'>Felicidades has acertado.</p>";
        cargarPokemon();
    } else {
        $frase = "<p style='color: red;'>Has fallado, el pokemon era:" . $_SESSION['pokemon_name'] . ".</p>";
        cargarPokemon();
    }

    $puntos = $_SESSION['contador'];
    echo "Puntos: " . $puntos;
}
if (!isset($_SESSION['pokemon_name']) || isset($_POST['reiniciar'])) {
    $_SESSION['contador'] = 0;
    cargarPokemon();

}
?>


    <a href="inicio.php"><button style="background-color: red;">Salir</button></a>
    <div class="container">
        <h1>¡Adivina el Pokémon!</h1>
        <p>¿Qué Pokémon es este?</p>
        <img src="<?= $_SESSION['pokemon_image'] ?>" alt="Pokémon">

        <form method="POST">
            <input type="text" id="adivinar" name="adivinar" placeholder="Escribe el nombre del Pokémon" required>
            <button type="submit" name="boton_adivinar">Adivinar</button>
        </form>

        <div id="result">
            <?= $frase ?>
        </div>

        <form method="POST">
            <button type="submit" name="reiniciar" class="reiniciar_boton">Reiniciar Juego</button>
        </form>
    </div>

</body>
<style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        img {
            width: 150px;
            height: 150px;
        }

        input {
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .reiniciar_boton {
            background-color: #f44336;
        }

        .reiniciar_boton:hover {
            background-color: #e53935;
        }
    </style>

</html>