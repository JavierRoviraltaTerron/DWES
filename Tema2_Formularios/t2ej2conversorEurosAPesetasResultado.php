<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 2</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 2
        Realiza un conversor de euros a pesetas. Ahora la cantidad en euros que 
        se quiere convertir se deberá introducir por teclado.
      -->
      <h3>Resultado:</h3>
      <?php
        echo $_GET['euros'] . "€" . " = " . ($_GET['euros'] * 166) . "pts";
      ?>
    </div>
  </body>

</html>
