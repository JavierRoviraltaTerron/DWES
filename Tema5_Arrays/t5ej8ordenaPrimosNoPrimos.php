<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 8</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 8
        Realiza un programa que pida 10 números por teclado y que los almacene 
        en un array. A continuación se mostrará el contenido de ese array junto 
        al índice (0 – 9) utilizando para ello una tabla. Seguidamente el 
        programa pasará los primos a las primeras posiciones, desplazando el 
        resto de números (los que no son primos) de tal forma que no se pierda 
        ninguno. Al final se debe mostrar el array resultante.
        (ver ejemplo en pdf)
      -->
      
      <h1>Ordena primos y no primos</h1>
      
      <?php
        $numero = $_GET['numero'];
        $auxiliar;
        $contador = $_GET['contador'];
        $cadenaNumero = $_GET['cadenaNumero'];        
        $cadenaNumero = $cadenaNumero . " " . $numero;
        $cantidadNumeros = 10;
        
        if (!isset($contador)) {
          $contador = 0;
        }
        
        if ($contador < $cantidadNumeros) {
          $contador++;
          ?>
      
      <form action="#" method="get">
        Introduce un número:
        <input type="number" name="numero" required autofocus/>
        <input type="hidden" name="contador" value="<?= $contador ?>"/>
        <input type="hidden" name="cadenaNumero" value="<?= $cadenaNumero ?>"/>
        <input type="submit" value="Enviar"/>
      </form>
      
      <?php
        } else {
          $cadenaNumero = substr($cadenaNumero, 2);
          $numero = explode(" ", $cadenaNumero);
         
          echo "<p>Array original</p>";
          
          // tabla de que muestra el array introducido bajo a sus índices
          echo "<table><tr class='separador'>";
          
          //var_dump($numero);
          
          // muestra índice de array
          for ($i = 0; $i < count($numero); $i++) {
            echo "<th>" . ($i + 1) . "</th>";
          }
          
          echo "</tr><tr>";
          
          $i = 0;
          $j = 0;
          
          // muestra valores de array
          for ($i = 0; $i < count($numero); $i++) {
            echo "<td>$numero[$i]</td>";
            
            // introduce primos en $auxiliar
            if (primo($numero[$i])) {
              $auxiliar[$j] = $numero[$i];
              $j++;
            }
          }
          
          // introduce no primos en $auxiliar
          for ($i = 0; $i < count($numero); $i++) {
            if (!primo($numero[$i])) {
              $auxiliar[$j] = $numero[$i];
              $j++;
            }
          }
          
          echo "</tr></table>"; // fin de la tabla
          
          echo "<p>Array ordenado</p>";
          
          //var_dump($auxiliar);
          
          
          // tabla que muestra el array $auxiliar con los primos ordenados
          echo "<table><tr class='separador'>";
          
          // muestra índice de array $auxiliar
          for ($i = 0; $i < count($auxiliar); $i++) {
            echo "<th>" . ($i + 1) . "</th>";
          }
          
          echo "</tr><tr>";
          
          // muestra valores de array $auxiliar
          for ($i = 0; $i < count($auxiliar); $i++) {
            echo "<td>$auxiliar[$i]</td>";
          }          
        }
        
        echo "</tr></table>"; // fin de la tabla
        
        // funcion
        function primo($numero) {
          $contador = 0;

          for($i = 1; $i <= $numero; $i++) {

            if($numero % $i == 0) {
              if($contador++ > 1) {
                return false;
              }
            }
          }
          return true;
        }
      ?>
      
      <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
