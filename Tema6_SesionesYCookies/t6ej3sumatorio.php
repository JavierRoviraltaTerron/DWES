<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 3</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 3
        Escribe un programa que permita ir introduciendo una serie indeterminada 
        de números mientras su suma no supere el valor 10000. Cuando esto último 
        ocurra, se debe mostrar el total acumulado, el contador de los números 
        introducidos y la media. Utiliza sesiones.
      -->

      <h1>Sumatorio</h1>

      <div id="contenido">

        <?php
          session_start();
          
          $numero = $_GET['numero'];
          $numeroMaximo = 10000;
          $contador =& $_SESSION['contador'];
          $sumatorio =& $_SESSION['sumatorio'];
          
          $sumatorio += $numero;
          
          if(!isset($contador)) {
            $contador = 0;
            $sumatorio = 0;
          }
          
          if ($sumatorio <= $numeroMaximo) {
            $contador++;
          ?>

          <form action="#" method="get">
            Introduce número
            <input type="number" name="numero" autofocus/>
            <input type="submit" value="Enviar"/>
          </form>

        <?php
          } else {
            echo "<table>"
            . "<tr>"
              . "<th>Total acumulado</th>"
              . "<td>$sumatorio</td>"
              . "</tr>"
              . "<tr>"
              . "<th>Contador</th>"
              . "<td>$contador</td>"
              . "</tr>"
              . "<tr>"
              . "<th>Media</th>"
              . "<td>" . round(($sumatorio / $contador), 2). "</td>"
              . "</tr>"
              . "</table>";
          }
          ?>
      </div>

      <p id="autor">Javier Roviralta Terrón</p>

    </div>
  </body>

</html>
