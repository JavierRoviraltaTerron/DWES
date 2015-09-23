<!DOCTYPE html>
<html>
    
  <head>
    <title>Ejercicio 1</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
    
  <body>
    <div id="contenedor">
      <!--
        Ejercicio 1
        Realiza un programa que pida dos números y luego muestre el resultado 
        de su multiplicación.
      -->
      <h3>Resultado:</h3>
      <?php
        echo $_GET['n1'] . " * " .  $_GET['n2'] . " = " .  $_GET['n1'] * $_GET['n2'];
      ?>
    </div>
  </body>
    
</html>
