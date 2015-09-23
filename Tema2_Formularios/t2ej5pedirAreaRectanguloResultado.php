<!DOCTYPE html>
<html>
    
  <head>
    <title>Ejercicio 5</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
    
  <body>
    <div id="contenedor">
      <!--
        Ejercicio 5
        Escribe un programa que calcule el área de un rectángulo.
      -->
      <h3>Resultado:</h3>
      <?php
        echo $_GET['base'] . "cm<sup>2</sup> * " .  $_GET['altura'] 
          . "cm<sup>2</sup> = " .  $_GET['base'] * $_GET['altura'] . "cm<sup>2</sup>";
      ?>
    </div>
  </body>
    
</html>
