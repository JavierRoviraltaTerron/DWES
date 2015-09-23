<!DOCTYPE html>
<html>
    
  <head>
    <title>Ejercicio 9</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
    
  <body>
    <div id="contenedor">
      <!--
        Ejercicio 9
        Escribe un programa que calcule el volumen de un cono mediante la 
        fórmula V = 1/3 πr2 h.
      -->
      <h3>Resultado:</h3>
      <?php
        echo ((1/3) * M_PI * ($_GET['r'] * $_GET['r']) * $_GET['h']) 
        . "cm<sup>2</sup>";
      ?>
    </div>
  </body>
    
</html>
