
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
        Escribe un programa que nos diga el horóscopo a partir del día y 
        el mes de nacimiento.
      -->
      <?php
        $dia = $_REQUEST['dia'];
        $mes = $_REQUEST['mes'];
        
        if ((($dia >= 20) && ($mes == 3)) || (($dia <= 19) && ($mes == 4))) {
          echo "<h1>Aries</h1>";
        } else if (((($dia >= 20) && ($dia <= 30)) && ($mes == 4)) || (($dia <= 20) && ($mes == 5))) {
          echo "<h1>Tauro</h1>";
        } else if ((($dia >= 21) && ($mes == 5)) || (($dia <= 20) && ($mes == 6))) {
          echo "<h1>Géminis</h1>";
        } else if (((($dia >= 21) && ($dia <= 30)) && ($mes == 6)) || (($dia <= 22) && ($mes == 7))) {
          echo "<h1>Cancer</h1>";
        } else if ((($dia >= 23) && ($mes == 7)) || (($dia <= 22) && ($mes == 8))) {
          echo "<h1>Leo</h1>";
        } else if ((($dia >= 23) && ($mes == 8)) || (($dia <= 22) && ($mes == 9))) {
          echo "<h1>Virgo</h1>";
        } else if (((($dia >= 23) && ($dia <= 30)) && ($mes == 9)) || (($dia <= 22) && ($mes == 10))) {
          echo "<h1>Libra</h1>";
        } else if ((($dia >= 23) && ($mes == 10)) || (($dia <= 21) && ($mes == 11))) {
          echo "<h1>Escorpio</h1>";
        } else if (((($dia >= 22) && ($dia <= 30)) && ($mes == 11)) || (($dia <= 21) && ($mes == 12))) {
          echo "<h1>Sagitario</h1>";
        } else if ((($dia >= 22) && ($mes == 12)) || (($dia <= 19) && ($mes == 1))) {
          echo "<h1>Capricornio</h1>";
        } else if ((($dia >= 20) && ($mes == 1)) || (($dia <= 17) && ($mes == 2))) {
          echo "<h1>Acuario</h1>";
        } else if (((($dia >= 18) && ($dia <= 29)) && ($mes == 2)) || (($dia <= 19) && ($mes == 3))) {
          echo "<h1>Piscis</h1>";
        } else {
          echo "<h1>Mes o día incorrecto</h1>";
        }
      ?>
    </div>
  </body>

</html>
