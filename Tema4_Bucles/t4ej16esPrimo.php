<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 16</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 16
        Escribe un programa que diga si un número introducido por teclado es o 
        no primo. Un número primo es aquel que sólo es divisible entre él mismo 
        y la unidad.
      -->
      
      <h1>Detector de números primos</h1>

      <?php
        $numero = $_GET['numero'];
        $esPrimo = true;
        
        if (!isset($numero)){
          ?>
            <p>Introduce un número</p>
            
            <form action="t4ej16esPrimo.php" method="get">
              <input type="number" name="numero" autofocus/>
              <input type="submit" value="Comprobar"/>
            </form>
          <?php
        } else {
          for ($i = 2; $i < $numero; $i++) {
            if ($numero % $i == 0) {
              $esPrimo = false;
            }
          }
          
          if ($esPrimo == true) {
            echo "<p>El número es primo</p>";
          } else {
            echo "<p>El número $numero <b>no</b> es primo</p>";
          }
        }
      ?>
      
      
    </div>
  </body>

</html>
