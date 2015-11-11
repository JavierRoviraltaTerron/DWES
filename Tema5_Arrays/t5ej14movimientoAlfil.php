<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 14</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 14
        Escribe un programa que, dada una posición en un tablero de ajedrez, nos 
        diga a qué casillas podría saltar un alfil que se encuentra en esa 
        posición. Indícalo de forma gráfica sobre el tablero con un color 
        diferente para estas casillas donde puede saltar la figura. El alfil se 
        mueve siempre en diagonal. El tablero cuenta con 64 casillas. Las 
        columnas se indican con las letras de la “a” a la “h” y las filas se 
        indican del 1 al 8.
      
        NOTA: las variables "x" e "y" no corresponden con el habitual uso de 
        "x" como abscisas e "y" como ordenadas.
      -->
      
      <h1>Movimiento del alfil</h1>
      
      <?php
        $casillaX = $_GET['casillaX'];
        $casillaY = $_GET['casillaY'];
        
        if (isset($casillaX)) {
          $casillaX--;
          $casillaY--;
        }
        
        //$casillaX = rand(0, 7); // pruebas
        //$casillaY = rand(0, 7); // pruebas
        
        if (!isset($casillaX)) {
        // tablero
        echo "<table class='tablero'>";
        echo "<tr class='borde'><td></td><td>a</td><td>b</td><td>c</td>"
        . "<td>d</td><td>e</td><td>f</td><td>g</td><td>h</td><td></td></tr>";
        
        for ($i = 0; $i < 8; $i++) {
          
          echo "<tr>";
          
          for ($j = 0; $j < 8; $j++) {
            // borde izquierdo
            if ($j == 0) {
              echo "<td class='borde'>" . ($i + 1) . "</td>";
            }
            
            // colores tablero
            if (($i % 2 == 0) && ($j % 2 == 0)) {
              echo "<td class='fondoBlanco'></td>";
            } else if (($i % 2 == 0) && ($j % 2 != 0)) {
              echo "<td class='fondoNegro'></td>";
            } else if (($i % 2 != 0) && ($j % 2 == 0)) {
              echo "<td class='fondoNegro'></td>";
            } else {
              echo "<td class='fondoBlanco'></td>";
            }
            
            // borde derecho
            if ($j == 7) {
              echo "<td class='borde'>" . ($i + 1) . "</td>";
            }
            
          }
          echo "</tr>";
        }
        echo "<tr class='borde'><td></td><td>a</td><td>b</td><td>c</td>"
        . "<td>d</td><td>e</td><td>f</td><td>g</td><td>h</td><td></td></tr>";
        echo "</table>";
        // fin tablero
      ?>
      <form action="#" method="get">
        Introduce x (1-8):
        <input type="number" min="1" max="8" name="casillaX" required autofocus/>
        <br/>
        Introduce y (1-8):
        <input type="number"min="1" max="8"  name="casillaY" required/>
        <br/>
        <input type="submit" value="Enviar"/>
      </form>
      <?php
        } else {
          
          
          // tablero
          echo "<table class='tablero'>";
          echo "<tr class='borde'><td></td><td>a</td><td>b</td><td>c</td>"
        . "<td>d</td><td>e</td><td>f</td><td>g</td><td>h</td><td></td></tr>";

          for ($i = 0; $i < 8; $i++) {

            echo "<tr>";

            for ($j = 0; $j < 8; $j++) {
              // borde izquierdo
              if ($j == 0) {
                echo "<td class='borde'>" . ($i + 1) . "</td>";
              }

              // colores tablero
              if (($i % 2 == 0) && ($j % 2 == 0)) {
                echo "<td class='fondoBlanco'>";
                if (($i == $casillaX) && ($j == $casillaY)) {
                  echo "<img src='img/alfil.png'/>";
                } else if (abs((abs($i) - abs($casillaX))) == abs((abs($j) - abs($casillaY)))) {
                  echo "<img src='img/posicionAlfil.png'/>";
                }
                echo "</td>";
              } else if (($i % 2 == 0) && ($j % 2 != 0)) {
                echo "<td class='fondoNegro'>";
                if (($i == $casillaX) && ($j == $casillaY)) {
                  echo "<img src='img/alfil.png'/>";
                } else if (abs((abs($i) - abs($casillaX))) == abs((abs($j) - abs($casillaY)))) {
                  echo "<img src='img/posicionAlfil.png'/>";
                }
                echo "</td>";
              } else if (($i % 2 != 0) && ($j % 2 == 0)) {
                echo "<td class='fondoNegro'>";
                if (($i == $casillaX) && ($j == $casillaY)) {
                  echo "<img src='img/alfil.png'/>";
                } else if (abs((abs($i) - abs($casillaX))) == abs((abs($j) - abs($casillaY)))) {
                  echo "<img src='img/posicionAlfil.png'/>";
                }
                echo "</td>";
              } else {
                echo "<td class='fondoBlanco'>";
                if (($i == $casillaX) && ($j == $casillaY)) {
                  echo "<img src='img/alfil.png'/>";
                } else if (abs((abs($i) - abs($casillaX))) == abs((abs($j) - abs($casillaY)))) {
                  echo "<img src='img/posicionAlfil.png'/>";
                }
                echo "</td>";
              }

              // borde derecho
              if ($j == 7) {
                echo "<td class='borde'>" . ($i + 1) . "</td>";
              }

            }
            echo "</tr>";
          }
          echo "<tr class='borde'><td></td><td>a</td><td>b</td><td>c</td>"
        . "<td>d</td><td>e</td><td>f</td><td>g</td><td>h</td><td></td></tr>";
          echo "</table>";
          // fin tablero
          
          echo "<div> x: $casillaX y: $casillaY" . "</div>";
        }
        ?>
      
      
      <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
