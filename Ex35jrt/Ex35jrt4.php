<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 4</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Autor: Javier Roviralta Terrón
        Fecha: 21 de Octubre de 2015
        Turno: 2º Turno
      
        Ejercicio 4
        Crea un array bidimensional de 6 filas por 8 columnas relleno con 
        números aleatorios entre 1 y 500 (ambos incluidos). Los números se 
        pueden repetir. Se deben mostrar todos los números bien alineados en 
        filas y columnas. Muestra el mínimo de entre los primos en rojo y los 
        números adyacentes en amarillo. Si el mínimo primo se repite, se puede 
        colorear uno cualquiera de ellos o todos, como al alumno le resulte más 
        fácil.
      -->
      
      <h1>Ejercicio 4</h1>
      
      <?php
        $numeroFilas = 6;
        $numeroColumnas = 8;
        $arrayNumeros;
        $arrayNumerosAuxiliar;
        $minimo = PHP_INT_MAX;
        $k = 0;
        
        // rellena $arrayNumerosAuxiliar
        do {
            $arrayNumerosAuxiliar[] = rand(1, 500);
            $k++;
        } while ($k < ($numeroFilas * $numeroColumnas));
        
        $k = 0;
        
        // rellena array $arrayNumeros con los valores de $arrayNumerosAuxiliar
        for ($i = 0; $i < $numeroFilas; $i++) {
          for ($j = 0; $j < $numeroColumnas; $j++) {
            $arrayNumeros[$i][$j] = $arrayNumerosAuxiliar[$k];
            $k++;
            // recoge $minimo
            if ($arrayNumeros[$i][$j] < $minimo) {
              $minimo = $arrayNumeros[$i][$j];
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
              echo "<span class='resaltado'><strong>"
              . $arrayNumeros[$i][$j] . "</strong></span> ";
              
            } else if (($arrayNumeros[$i - 1][$j - 1] == $minimo) 
              || $arrayNumeros[$i + 1][$j + 1] == $minimo
              || $arrayNumeros[$i - 1][$j + 1] == $minimo
              || $arrayNumeros[$i + 1][$j - 1] == $minimo
              || $arrayNumeros[$i + 1][$j] == $minimo
              || $arrayNumeros[$i - 1][$j] == $minimo
              || $arrayNumeros[$i][$j + 1] == $minimo
              || $arrayNumeros[$i][$j - 1] == $minimo) {
              echo "<span class='resaltadoAmarillo'><strong>"
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
