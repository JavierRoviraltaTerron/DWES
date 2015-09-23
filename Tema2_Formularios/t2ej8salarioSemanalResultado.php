2<!DOCTYPE html>
<html>
    
  <head>
    <title>Ejercicio 8</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
    
  <body>
    <div id="contenedor">
      <!--
        Ejercicio 8
        Escribe un programa que calcule el salario semanal de un trabajador en
        base a las horas trabajadas.
        Se pagarán 12 euros por hora.
      -->
      <h3>Resultado:</h3>
      <?php
        echo $_GET['horas'] . "h * 12€ = " .  ($_GET['horas'] * 12) . "€ semanales";
      ?>
    </div>
  </body>
    
</html>
