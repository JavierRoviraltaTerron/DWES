<?php
  session_start()
?>
<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 1</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style3.css">
  </head>

  <body>
    <div id="container">
      <!--
        Autor: Javier Roviralta Terrón
        Fecha: 2 de Diciembre de 2015
        Turno: A
      
        1. Escribe un programa que pida números positivos uno detrás de otro. 
        Se termina introduciendo un número negativo. A continuación, el programa 
        debe mostrar la media, el máximo, el mínimo y el número de primos 
        encontrados. Utiliza sesiones para propagar los datos necesarios; no se 
        permite utilizar campos ocultos en formularios.
      -->
      
      <h1>Ejercicio 1</h1>
      
      <?php
          $numero = $_GET['numero'];
          $sumatorio =& $_SESSION['sumatorio'];
          $contador =& $_SESSION['contador'];
          $contadorPrimos =& $_SESSION['contadorPrimos'];
          $mayor =& $_SESSION['mayor'];
          $menor =& $_SESSION['menor'];
          
          // inicializo
          if(!isset($contador)) {
            $numero =& $_SESSION['numero'];
            $sumatorio = 0;
            $contador = 0;
            $contadorPrimos = 0;
            $mayor = -PHP_INT_MAX;
            $menor = PHP_INT_MAX;
          }
          
          // media
          $sumatorio += $numero;
          
          // mayor
          if ($numero > $mayor) {
            $mayor = $numero;
          }
          
          
          
          if (primo($numero)) {
            $contadorPrimos++;
          }
          
          if ($numero >= 0) {
            $contador++;
            
            // menor
            if ((isset($numero)) && ($numero < $menor)) {
              $menor = $numero;
            }
          ?>

          <form action="#" method="get">
            Introduce número
            <input type="number" name="numero" autofocus/>
            <input type="submit" value="Enviar"/>
          </form>

        <?php
          } else {
            $contador--; // resto cuenta del valor negativo
            
            $sumatorio -= $numero; // resto valor negativo
            
            if (primo($numero)) {
            $contadorPrimos-= 2;
          }
            
            echo "<table>"
            . "<tr>"
              . "<th>Total números</th>"
              . "<td>$contador</td>"
              . "</tr>"
              . "<tr>"
              . "<th>Media</th>"
              . "<td>" . ($sumatorio / $contador) . "</td>"
              . "</tr>"
              . "<tr>"
              . "<th>Mayor</th>"
              . "<td>$mayor</td>"
              . "</tr>"
              . "<tr>"
              . "<th>Menor</th>"
              . "<td>$menor</td>"
              . "</tr>"
              . "<tr>"
              . "<th>Cantidad primos</th>"
              . "<td>$contadorPrimos</td>"
              . "</tr>"
              . "</table>";
          }
          
          // funcion
          function primo($numero) {

            for ($i = 2; $i < $numero; $i++) {
              if ($numero % $i == 0) {
                return false;
              }
            }
            return true;
          }
          
        ?>
      
    </div>
  </body>

</html>
