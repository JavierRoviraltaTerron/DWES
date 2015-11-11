<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 2</title>
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
      
        Ejercicio 2
        Realiza un programa que pida 8 números por teclado y que los almacene en 
        un array. A continuación se debe mostrar el contenido de ese array junto 
        al índice (0 – 7). Seguidamente el programa debe colocar de forma 
        alterna y en orden los primos y los no primos: primero primo, luego no 
        primo, luego primo, luego no primo... Cuando se acaben los primos o los 
        no primos, se completará con los números que queden.
        (ver ejemplo en pdf)
      -->
      
      <h1>Ejercicio 2</h1>
      
      <?php
        $numero = $_GET['numero'];
        $auxiliar;
        $auxiliarPrimos;
        $auxiliarNoPrimos;
        $contador = $_GET['contador'];
        $cadenaNumero = $_GET['cadenaNumero'];        
        $cadenaNumero = $cadenaNumero . " " . $numero;
        $cantidadNumeros = 8;
        
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
          $k = 0;
          
          // muestra valores de array
          for ($i = 0; $i < count($numero); $i++) {
            echo "<td>$numero[$i]</td>";
            
            // introduce primos en $auxiliarPrimos
            if (primo($numero[$i])) {
              $auxiliarPrimos[$j] = $numero[$i];
              $j++;
            }
          }
          
          // introduce no primos en $auxiliarNoPrimos
          for ($i = 0; $i < count($numero); $i++) {
            if (!primo($numero[$i])) {
              $auxiliarNoPrimos[$k] = $numero[$i];
              $k++;
            }
          }
          
          echo "</tr></table>"; // fin de la tabla
          
          echo "<p>Array ordenado</p>";
          
          // coloca primos y no primos en $auxiliar alternándolos
          $i = 0;
          $j = 0;
          $k = 0;
          
          //echo "<br/>";
          //var_dump($auxiliarPrimos); // pruebas
          
          //echo "<br/>";
          //var_dump($auxiliarNoPrimos); // pruebas
          
          // rellenado de $auxiliar (opción 1)
          do {            
            if ($j < count($auxiliarPrimos)) {
              $auxiliar[] = $auxiliarPrimos[$j];
              $j++;
            }
            
            if ($k < count($auxiliarNoPrimos)) {
              $auxiliar[] = $auxiliarNoPrimos[$k];
              $k++;
            }
            
            $i++;
          } while ($i < (count($auxiliarPrimos) + count($auxiliarNoPrimos)));
          
          /*
          // rellenado de $auxiliar (opción 2)
          for ($i = 0; $i < (count($auxiliarPrimos) + count($auxiliarNoPrimos)); $i++) {
            if ($i % 2 == 0) {
              if ($j < count($auxiliarPrimos)) {
                $auxiliar[$i] = $auxiliarPrimos[$j];
                $j++;
              } else {
                $auxiliar[$i] = $auxiliarNoPrimos[$k];
                $k++;
              }
            } else {
              if ($k < count($auxiliarNoPrimos)) {
                $auxiliar[$i] = $auxiliarNoPrimos[$k];
                $k++;
              } else {
                $auxiliar[$i] = $auxiliarPrimos[$j];
                $j++;
              }
            }
          }
          */
          //echo "<br/>";
          //var_dump($auxiliar); // pruebas
          
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
