<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 13</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 13
        Rellena un array bidimensional de 6 filas por 9 columnas con números 
        enteros positivos comprendidos entre 100 y 999 (ambos incluidos). Todos 
        los números deben ser distintos, es decir, no se puede repetir ninguno. 
        Muestra a continuación por pantalla el contenido del array de tal forma 
        que se cumplan los siguientes requisitos:
        • Los números de las dos diagonales donde está el mínimo deben aparecer 
          en color verde.
        • El mínimo debe aparecer en color azul.
        • El resto de números debe aparecer en color negro.
      -->
      
      <h1>Números diagonales</h1>
      
      <?php
        $numeroFilas = 6;
        $numeroColumnas = 9;
        $arrayNumeros;
        $arrayNumerosAuxiliar;
        $minimo = PHP_INT_MAX;
        $k = 0;
        
        // rellena array con números que no se repiten
        do {
          $numeroAleatorio = rand(100, 999);
          if (!in_array($numeroAleatorio, $arrayNumerosAuxiliar)) {
            $arrayNumerosAuxiliar[] = $numeroAleatorio;
            $k++;
          }
        } while ($k < ($numeroFilas * $numeroColumnas));
        
        $k = 0;
        
        // rellena array $arrayNumeros
        for ($i = 0; $i < $numeroFilas; $i++) {
          for ($j = 0; $j < $numeroColumnas; $j++) {
            $arrayNumeros[$i][$j] = $arrayNumerosAuxiliar[$k];
            $k++;
            if ($arrayNumeros[$i][$j] < $minimo) {
              $minimo = $arrayNumeros[$i][$j];
              $iMinimo = $i;
              $jMinimo = $j;
            }
          }
        }
        
        // muestra array $arrayNumeros
        echo "<table class='colapsada'>";
        for ($i = 0; $i < $numeroFilas; $i++) {
          echo "<tr>";
          
          for ($j = 0; $j < $numeroColumnas; $j++) {
            echo "<td>";
            if ($arrayNumeros[$i][$j] == $minimo) {
              echo "<span class='resaltadoAzul'><strong>"
              . $arrayNumeros[$i][$j] . "</strong></span> ";
            // con esta operación se determina que la posición hace diagonal
            // con $minimo
            } else if (abs((abs($i) - abs($iMinimo))) == abs((abs($j) - abs($jMinimo)))) {
              echo "<span class='resaltadoVerde'><strong>"
              . $arrayNumeros[$i][$j] . "</strong></span> ";
            } else {
              echo $arrayNumeros[$i][$j] . " ";
            }
            echo "</td>";
          }
          
          echo "</tr>";
        }
        echo "</table>";
      ?>
      
      <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
