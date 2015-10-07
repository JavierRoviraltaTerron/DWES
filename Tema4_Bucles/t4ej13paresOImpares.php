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
        Escribe un programa que lea una lista de diez números y determine 
        cuántos son positivos, y cuántos son negativos.
      -->
      <h1>Contador de positivos y negativos</h1>
      
      <?php
        $maximoNumeros = 10; // 10
        $numero = $_GET['numero'];
        $contadorTotal = $_GET['contadorTotal'];
        $contadorPositivos = $_GET['contadorPositivos'];
        $contadorNegativos = $_GET['contadorNegativos'];
        
        if (!isset($numero)) {
          $contadorTotal = 0;
          $contadorPositivos = 0;
          $contadorNegativos = 0;  
        }
        
        //echo "t:" . $contadorTotal . " +:" . $contadorPositivos 
        //  . " -:" . $contadorNegativos . " n:" . $numero; //pruebas
        
        if ($contadorTotal != $maximoNumeros) {
          if ($numero > 0) {
            $contadorPositivos++;
          } else {
            $contadorNegativos++;
          }
            
          $contadorTotal++;
          
          ?>
            <p>Introduce un número</p>
            
            <form action="t4ej13paresOImpares.php" method="get">
              <input type="number" name="numero" autofocus/>
              <input type="hidden" name="contadorTotal" value="<?php echo $contadorTotal;?>"/>
              <input type="hidden" name="contadorPositivos" value="<?php echo $contadorPositivos;?>"/>
              <input type="hidden" name="contadorNegativos" value="<?php echo $contadorNegativos;?>"/>
              <input type="submit" value="Enviar"/>
            </form>
          <?php
            
        } else {
          echo "<p>Total de positivos: <sub>$contadorPositivos</sub>/"
            . "<sup>$contadorTotal</sup> </p>";
          echo "<p>Total de negativos: <sub>$contadorNegativos</sub>/"
            . "<sup>$contadorTotal</sup> </p>";
        }
      ?>
    </div>
  </body>

</html>
