<?php
  session_start();
?>
<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 3 - Control de acceso</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 3 - Versión de control de acceso
      -->

      <h1>Sumatorio</h1>

      <div id="contenido">

        <?php
          $estaLogeado =& $_SESSION['estaLogeado'];
          //$_SESSION['estaLogeado'];
          if (/*$_SESSION['estaLogeado']*/$estaLogeado) {

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
          } else {
            echo "Redireccionando a pantalla de inicio de sesión...";
            header("Refresh: 2; url=t6ej4controlDeAcceso.php", true, 303); // recarga la página
          }
            ?>
      </div>

      <p id="autor">Javier Roviralta Terrón</p>

    </div>
  </body>

</html>
