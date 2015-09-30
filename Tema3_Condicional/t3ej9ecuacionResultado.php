<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 9</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 9
        Realiza un programa que resuelva una ecuación de segundo grado (del 
        tipo ax2 + bx + c = 0).
      -->
      <?php
        $a = intval($_GET['a']); //convertir string a int
        $b = intval($_GET['b']);
        $c = intval($_GET['c']);
        
        $potencia = pow($b,2);
        $multiplicacion = (4 * $a * $c);
        
        $solucionPos = (((-$b) + sqrt($potencia - $multiplicacion))/(2 * $a));
        $solucionNeg = (((-$b) - sqrt($potencia - $multiplicacion))/(2 * $a));
        
        //La condición de que "a != 0" se cumple con el min="1" en el formulario
        if ($potencia < $multiplicacion) {
            echo "Las soluciones son complejas.";
        } else {
            echo "<p>$a" . "x<sup>2</sup> + " . "$b" . "x + $c = " 
              . round($solucionPos, 2) . " o " . round($solucionNeg, 2) . "</p>";
        }
      ?>
    </div>
  </body>

</html>
