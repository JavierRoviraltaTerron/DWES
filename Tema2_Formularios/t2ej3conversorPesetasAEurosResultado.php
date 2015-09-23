<!DOCTYPE html>
<html>

    <head>
        <title>Ejercicio 3</title>
        <meta charset="UTF-8">
        <meta name="author" content="Javier Roviralta Terrón">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <div id="contenedor">
            <!--
              Ejercicio 3
              Realiza un conversor de pesetas a euros. La cantidad en pesetas
              que se quiere convertir se deberá introducir por teclado.
            -->
            <h3>Resultado:</h3>
            <?php
              echo $_GET['pts'] . "pts" . " = " . ($_GET['pts'] / 166) . "€";
            ?>
        </div>
    </body>

</html>
