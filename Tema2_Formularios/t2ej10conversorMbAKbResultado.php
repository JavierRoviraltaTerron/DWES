<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 10</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 10
        Realiza un conversor de Mb a Kb.
      -->
      <h3>Resultado:</h3>
      <?php
        echo $_GET['mb'] . "Mb" . " = " . ($_GET['mb'] * 1024) . "Kb";
      ?>
    </div>
  </body>

</html>
