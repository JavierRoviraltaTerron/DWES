<!DOCTYPE html>
<html>
    
  <head>
    <title>Ejercicio 7</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
    
  <body>
    <div id="contenedor">
      <!--
        Ejercicio 7
        Escribe un programa que calcule el total de una factura a partir de la 
        base imponible.
      -->
      <h3>Resultado:</h3>
      <?php
        echo $_GET['base'] . "€ + 21%IVA = " 
          . ($_GET['base'] + (($_GET['base'] * 21)/100)) . "€";
      ?>
    </div>
  </body>
    
</html>
