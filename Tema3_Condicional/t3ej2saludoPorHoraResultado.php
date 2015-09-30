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
        Realiza un programa que pida una hora por teclado y que muestre
        luego buenos días, buenas tardes o buenas noches según la hora. Se 
        utilizarán los tramos de 6 a 12, de 13 a 20 y de 21 a 5. 
        respectivamente. Sólo se tienen en cuenta las horas, los minutos 
        no se deben introducir por teclado.
      -->
      <?php
        $hora = $_REQUEST['hora'];
        if (( $hora >= 6)&&($hora < 14)) {
          echo "<h1>¡Buenos dias!</h1>";
        } else if (( $hora >= 14)&&($hora < 22)) {
          echo "<h1>¡Buenas tardes!</h1>";
        } else {
          echo "<h1>¡Buenas noches!</h1>";
        }
      ?>
    </div>
  </body>

</html>
