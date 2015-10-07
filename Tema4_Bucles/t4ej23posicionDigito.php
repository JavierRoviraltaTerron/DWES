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
      
      <?php
        // las siguientes variables se declaran, pero la 1ª vez son nulas.
        $numero = $_GET['numero'];
        $sumatorio = $_GET['sumatorio'];
        $contador = $_GET['contador'];
        $numeroMaximo = 10000;
        
        // se cumple el if si $numero es aún nula, o bien $número es negativo
        if (!isset($numero)) {
          $numero = 0;
          $sumatorio = 0;
          $contador = 0;
        }
        
        $sumatorio += $numero;
        
        if ($sumatorio <= $numeroMaximo) {  
          $contador++;
      ?>
          <p>Por favor, introduzca un numero </p>
      
          <form action="t4ej23posicionDigito.php" method="get">
            <input type="number" name="numero" autofocus/>
            <input type="hidden" name="sumatorio" value="<?= $sumatorio ?>"/>
            <input type="hidden" name="contador" value="<?= $contador ?>"/>
            <input type="submit" value="Enviar"/>
          </form>
      
      <?php    
        } else {
          echo "<p>Total acumulado: $sumatorio</p>";
          echo "<p>Total de números introducidos: $sumatorio</p>";
          echo "<p>La media es " . round(($sumatorio / $contador), 2) . "</p>";
        }
      ?>
    </div>
  </body>

</html>
