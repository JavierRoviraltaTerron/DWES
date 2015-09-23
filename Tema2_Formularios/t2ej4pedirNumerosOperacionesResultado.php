<!DOCTYPE html>
<html>
    
  <head>
    <title>Ejercicio 4</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
    
  <body>
    <div id="contenedor">
      <!--
        Ejercicio 4
        Escribe un programa que sume, reste, multiplique y divida dos números 
        introducidos por teclado.
      -->
      <h3>Resultado:</h3>
      <?php
        echo "<p>" . $_GET['n1'] . " + " .  $_GET['n2'] . " = " 
          .  ($_GET['n1'] + $_GET['n2']) . "</p>";
        
        echo "<p>" . $_GET['n1'] . " - " .  $_GET['n2'] . " = " 
          .  ($_GET['n1'] - $_GET['n2']) . "</p>";
        
        echo "<p>" . $_GET['n1'] . " * " .  $_GET['n2'] . " = " 
          . ($_GET['n1'] * $_GET['n2']) . "</p>";
        
        echo "<p>" . $_GET['n1'] . " / " .  $_GET['n2'] . " = " 
          .  ($_GET['n1'] / $_GET['n2']) . "</p>";
      ?>
    </div>
  </body>
    
</html>
