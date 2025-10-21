<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="">

    <div class="form_container">

        <form method="" style="">
            <label for="pokemon">Pokémon:</label>
            <input type="text" name="pokemon" id="pokemon" required>
            <button type="submit">Buscar</button>
        </form>
    </div>
    <div class="container" style=" ">

        <?php
        if (isset($_REQUEST['pokemon'])) {
            $pokemon = $_REQUEST['pokemon'];
            $url = "https://pokeapi.co/api/v2/pokemon/$pokemon";

            $json = @file_get_contents($url);
            if ($json == false) {
                echo "<br>";
                echo "Error, pokemon no encontrado ";
                echo "<img src='img/team-rocket.png' alt='Team Rocket'' style='height:200px; width:200px;'>";

            } else {
                $pok = json_decode($json);

                if ($pok) {
                    echo "<h3>Información del Pokémon:</h3>";
                    echo "<strong>Nombre:</strong> " . $pok->name . "<br>";
                    echo "<strong>Número (ID):</strong> " . $pok->id . "<br>";

                    // Tipo de pokemon
                    echo "<strong>Tipo:</strong> ";
                    if (isset($pok->types[1])) {
                        echo $pok->types[0]->type->name . " / " . $pok->types[1]->type->name . "<br>";
                    } else {
                        echo $pok->types[0]->type->name . "<br>";
                    }

                    // Habilidades pokemon
                    echo "<strong>Habilidades:</strong> ";
                    if (isset($pok->abilities[2])) {
                        echo $pok->abilities[0]->ability->name . " / " . $pok->abilities[1]->ability->name . "<br>";
                    } else {
                        echo $pok->abilities[0]->ability->name . "<br>";
                    }

                    echo "<strong>Imagen:</strong><br>";
                    echo "<img src='" . $pok->sprites->front_default . "' style='height:200px; width:200px;'>";

                }
            }
            ?>
            <a href="inicio.php"><button style="background-color: red; position:relative; top: -5px;">Salir</button></a>
            <?php
        }
        ?>
    </div>
</body>
<style>
    body {
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        flex-direction: column;
    }

    .form_container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .container {
        background-color: white;
        border-radius: 10px;
        width: 300px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        margin-top: 20px;

    }

    button {
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

</html>