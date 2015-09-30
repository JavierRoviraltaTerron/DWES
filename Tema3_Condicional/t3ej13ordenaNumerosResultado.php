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
        Escribe un programa que ordene tres números enteros introducidos por 
        teclado.
      -->
      <?php
        $a = $_GET['a'];
        $b = $_GET['b'];
        $c = $_GET['c'];
        
        (($a < $b) && ($b < $c)) ? ($respuesta = "$a  $b  $c") : 
        ((($a < $c) && ($c < $b)) ? ($respuesta = "$a  $c  $b") :
        
        (((($b < $a) && ($a < $c)) ? ($respuesta = "$b  $a  $c") :
        ((((($b < $c) && ($c < $a)) ? ($respuesta = "$b  $c  $a") :
        
        (((((($c < $a) && ($a < $b)) ? ($respuesta = "$c  $a  $b") :
        ($respuesta = "$c  $b  $a")))))))))));
        
        echo "<p>Desordenado: $a $b $c </p> <p>Ordenado: $respuesta </p>";
      ?>
    </div>
  </body>

</html>