<!DOCTYPE html>
<html>
    
  <head>
    <title>Ejercicio 6</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
    
  <body>
    <div id="contenedor">
      <!--
        Ejercicio 6
        Escribe un programa que calcule el área de un triángulo.
      -->
      <h3>Resultado:</h3>
      <?php
        echo "  (" . $_GET['base'] . "cm<sup>2</sup> * " .  $_GET['altura'] 
          . "cm<sup>2</sup>) / 2 = " .  ($_GET['base'] * $_GET['altura']) / 2 
          . "cm<sup>2</sup>";
      ?>
    </div>
  </body>
    
</html>
