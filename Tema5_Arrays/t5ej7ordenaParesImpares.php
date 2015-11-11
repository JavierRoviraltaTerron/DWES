<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 7</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 7
        Escribe un programa que genere 20 números enteros aleatorios entre 0 y 
        100 y que los almacene en un array. El programa debe ser capaz de pasar 
        todos los números pares a las primeras posiciones del array (del 0 en 
        adelante) y todos los números impares a las celdas restantes. Utiliza 
        arrays auxiliares si es necesario.
      -->
      
      <h1>Ordena pares e impares</h1>
      
      <?php
        $cantidadNumeros = 20;
        $numero = new SplFixedArray($cantidadNumeros);
        $auxiliar = new SplFixedArray($cantidadNumeros);
        $j = 0;
        echo "<p>Array original</p>";
        
        // genera array $numero con valores aleatorios
        for ($i = 0; $i < count($numero); $i++) {
          $numero[$i] = rand(0, 100);
          
          
          // rellena array $auxiliar con valores pares de $numero
          if ($numero[$i] % 2 == 0) {
            echo "<span class='resaltado'>$numero[$i] </span>";
            $auxiliar[$j] = $numero[$i];
            $j++;
          } else {
            echo "<span class='resaltadoAzul'>$numero[$i] </span>";
          }
        }
        
        // rellena array $auxiliar con valores impares de $numero
        foreach ($numero as $n) {
          if ($n % 2 != 0) {
            $auxiliar[$j] = $n;
            $j++;
          }
        }
        
        echo "<p>Array ordenado</p>";
        
        $i = 0;
        
        // copia valores de $auxiliar a $numero y lo muestra
        foreach ($auxiliar as $a) {
          $numero[$i] = $a;
          if ($numero[$i] % 2 == 0) {
            echo "<span class='resaltado'>$numero[$i] </span>";
          } else {
            echo "<span class='resaltadoAzul'>$numero[$i] </span>";
          }
          $i++;
        }
        
        //var_dump($numero);
      ?>
      
      <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
