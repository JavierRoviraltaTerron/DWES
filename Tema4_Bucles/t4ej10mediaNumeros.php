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
        Escribe un programa que calcule la media de un conjunto de números 
        positivos introducidos por teclado. A priori, el programa no sabe 
        cuántos números se introducirán. El usuario indicará que ha terminado 
        de introducir los datos cuando meta un número negativo.
      -->
      <h1>Calculador de media</h1>
        
      <p>Por favor, introduzca un numero positivo para añadir al sumatorio o un 
        número negativo para pasar a calcular la media</p>
      
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
