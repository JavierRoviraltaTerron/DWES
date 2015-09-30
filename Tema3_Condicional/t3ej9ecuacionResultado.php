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
      <!--
      <?php
        $a = intval($_GET['a']); //convertir string a int
        $b = intval($_GET['b']);
        $c = intval($_GET['c']);
        
        $solucion = ((($b * (-1)) + sqrt(pow($b,2) - (4 * $a * $c)))/(2 * $a));
        
        echo "<p>$a" . "x<sup>2</sup> + " . "$b" . "x + $c = $solucion</p>";
      ?>
      -->
      <?php
        $a = intval($_GET['a']); //convertir string a int
        $b = intval($_GET['b']);
        $c = intval($_GET['c']);
        $temp1 = $b * $b;
        $temp2 = (4 * $a * $c);
        if ($temp1 < $temp2) {
            echo "Las soluciones de la ecuación son complejas.";
        } else if ($a == 0) {
            echo "División entre 0";
        } else {
            echo "solucion 1 = ", ( - $b + sqrt($temp1 - $temp2) ) / - 2 * $a;
            echo "<br>";
            echo "solucion 2 = ", ( - $b - sqrt($temp1 - $temp2) ) / - 2 * $a;
        }
        ?>
    </div>
  </body>

</html>
