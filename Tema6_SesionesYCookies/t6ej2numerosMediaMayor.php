<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 2</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 2
        Realiza un programa que vaya pidiendo números hasta que se introduzca un 
        numero negativo y nos diga cuantos números se han introducido, la media 
        de los impares y el mayor de los pares. El número negativo sólo se 
        utiliza para indicar el final de la introducción de datos pero no se 
        incluye en el cómputo. Utiliza sesiones.
      -->

      <h1>Cuenta números, media de impares y mayor de pares</h1>

      <div id="contenido">

        <?php
          session_start();
          
          
          $contador =& $_SESSION['contador'];
          $contadorImpares =& $_SESSION['contadorImpares'];
          $sumatorioImpares =& $_SESSION['sumatorioImpares'];
          $mayorPares =& $_SESSION['mayorPares'];
          
          $numero = $_GET['numero'];
          
          // inicializo
          if(!isset($contador)) {
            $numero =& $_SESSION['numero'];
            $contador = 0;
            $contadorImpares = 0;
            $sumatorioImpares = 0;
            $mayorPares = -PHP_INT_MAX;
          }
          
          // media impares
          if ($numero % 2 != 0) {
            $sumatorioImpares += $numero;
            $contadorImpares++;
          }
          
          // mayor pares
          if (($numero % 2 == 0) && ($numero > $mayorPares)) {
            $mayorPares = $numero;
          }
          
          if ($numero >= 0) {
            $contador++;
          ?>

          <form action="#" method="get">
            Introduce número
            <input type="number" name="numero" autofocus/>
            <input type="submit" value="Enviar"/>
          </form>

        <?php
          } else {
            $contador--; // resto cuenta del valor negativo
            
            if ($numero % 2 != 0) {
              $sumatorioImpares -= $numero; // resto valor negativo
              $contadorImpares--;
            }
            echo "<table>"
            . "<tr>"
              . "<th>Total números</th>"
              . "<td>$contador</td>"
              . "</tr>"
              . "<tr>"
              . "<th>Media impares</th>"
              . "<td>" . ($sumatorioImpares / $contadorImpares) . "</td>"
              . "</tr>"
              . "<tr>"
              . "<th>Mayor pares</th>"
              . "<td>$mayorPares</td>"
              . "</tr>"
              . "</table>";
          }
        ?>

      </div>

      <p id="autor">Javier Roviralta Terrón</p>

    </div>
  </body>

</html>
