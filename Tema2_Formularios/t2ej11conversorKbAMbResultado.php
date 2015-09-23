<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 11</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 11
        Realiza un conversor de Kb a Mb.
      -->
      <h3>Resultado:</h3>
      <?php
        echo $_GET['kb'] . "Kb" . " = " . ($_GET['kb'] / 1024) . "Mb";
      ?>
    </div>
  </body>

</html>
