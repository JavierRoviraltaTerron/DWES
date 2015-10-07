<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 23</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 23
        Escribe un programa que permita ir introduciendo una serie indeterminada 
        de números hasta que la suma de ellos supere el valor 10000. Cuando esto 
        último ocurra, se debe mostrar el total acumulado, el contador de los 
        números introducidos y la media.
      -->
      
      <h1>Sumatorio</h1>
        
      <p>Por favor, introduzca un numero </p>
      
      <?php
        // las siguientes variables se declaran, pero la 1ª vez son nulas.
        $numero = $_GET['numero'];
        $sumatorio = $_GET['sumatorio'];
        $contador = $_GET['contador'];
        
        // se cumple el if si $numero es aún nula, o bien $número es negativo
        if (!isset($numero) || $numero >= 0) {
          $sumatorio += $numero;
          $contador++;
      ?>
      
          <form action="t4ej10mediaNumeros.php" method="get">
            <input type="number" name="numero" autofocus/>
            <input type="hidden" name="sumatorio" value="<?php echo $sumatorio; ?>"/>
            <input type="hidden" name="contador" value="<?php echo $contador; ?>"/>
            <input type="submit" value="Enviar"/>
          </form>
      
      <?php    
        } else {
          echo "<p>La media es " . ($sumatorio / ($contador -1)) . "</p>";
          //echo "<p>Valores:" . $sumatorio . " " . ($contador -1) . "</p>";
        }
      ?>
    </div>
  </body>

</html>
