<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 1</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 1
        Escribe un programa que calcule la media de un conjunto de números 
        positivos introducidos por teclado. A priori, el programa no sabe 
        cuántos números se introducirán. El usuario indicará que ha terminado de 
        introducir los datos cuando meta un número negativo. Utiliza sesiones.
      -->
      
      <h1>Media</h1>
      
      <div id="contenido">
      
      <?php
        session_start();
        
        $contador =& $_SESSION['contador'];
        $sumatorio =& $_SESSION['sumatorio'];
        
        $numero = $_GET['numero'];
        $sumatorio += $numero;
        
        // inicializo
        if(!isset($numero)) {
          // doy alias
          $numero =& $_SESSION['numero'];  
          
          $contador = 0;
          $sumatorio = 0;
        }
        
        if ($numero >= 0) {
          $contador++;
        ?>
      
        <form action="#" method="get">
          Introduce número
          <input type="number" name="numero" autofocus/>
          <input type="submit" value="Enviar"/>
        </form>
        
      <?php
        } else {
          $contador--; // resto cuenta del valor negativo
          $sumatorio -= $numero; // resto valor negativo
          echo "<p>La media es: " . round($sumatorio / $contador, 2) . "</p>";
          //echo "<p>último numero: $numero contador: $contador sumatorio: $sumatorio</p>"; // pruebas
        }        
      ?>
      </div>
      
      <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
