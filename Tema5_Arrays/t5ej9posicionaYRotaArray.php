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
        Realiza un programa que pida 10 números por teclado y que los almacene 
        en un array. A continuación se mostrará el contenido de ese array junto 
        al índice (0 – 9). Seguidamente el programa pedirá dos posiciones a las 
        que llamaremos “inicial” y “final”. Se debe comprobar que inicial es 
        menor que final y que ambos números están entre 0 y 9. El programa 
        deberá colocar el número de la posición inicial en la posición final, 
        rotando el resto de números para que no se pierda ninguno. Al final se 
        debe mostrar el array resultante.
      -->
      
      <h1>Posiciona valores y rota</h1>
      
      <?php
        $numero = $_GET['numero'];
        $auxiliar;
        $contador = $_GET['contador'];
        $cadenaNumero = $_GET['cadenaNumero'];
        
        $cantidadNumeros = 10;
        
        $posicionInicial = $_GET['posicionInicial'];
        $posicionFinal = $_GET['posicionFinal'];
        $repetir = false;
        $anadirUltimoNumero = $_GET['anadirUltimoNumero'];
        
        if (!isset($contador)) {
          $contador = 0;
          $anadirUltimoNumero = false;
        }
        
        if ($contador < $cantidadNumeros) {
          $contador++;
          $cadenaNumero = $cadenaNumero . " " . $numero;
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
          // añade a la cadena el último número introducido 1 sola vez
          if ($anadirUltimoNumero == false) {
            $cadenaNumero = $cadenaNumero . " " . $numero;
            $anadirUltimoNumero = true;
          }
          
          // convierte la cadena en un array
          $cadenaNumeroRecortada = substr($cadenaNumero, 2);
          if ($repetir == true) {
            $cadenaNumeroRecortada = substr($cadenaNumeroRecortada, -2);
          }
          $arrayNumero = explode(" ", $cadenaNumeroRecortada);
          
          echo "<p>Array original</p>";
          
          // tabla de que muestra el array introducido bajo a sus índices
          echo "<table><tr class='separador'>";
          
          // muestra índice de array
          for ($i = 0; $i < count($arrayNumero); $i++) {
            echo "<th>" . ($i + 1) . "</th>";
          }
          
          echo "</tr><tr>";
          
          // muestra valores de array
          for ($i = 0; $i < count($arrayNumero); $i++) {
            echo "<td>$arrayNumero[$i]</td>";
          }  

          echo "</tr></table>"; // fin de la tabla
          
          //var_dump($arrayNumero);
          
          echo "<p>Array ordenado</p>";    
          
          // comprobación de posición correcta
          if ($posicionInicial >= $posicionFinal) {
            $repetir = true;
          } else {
            $repetir = false;
          }
          
          // 2º FORMULARIO
          if ((!isset($posicionInicial)) || ($repetir == true)) {
            // mensaje de error
            if ($repetir == true) {
              echo "<p id='resaltado'>El número de la posición inicial no "
              . "puede ser mayor o igual que el de la posición final.</p>";
            }
              
            ?>
              <form action="#" method="get">
                Posición inicial:
                <input type="number" min="0" max="9" name="posicionInicial" required autofocus/>
                <br/>
                Posición final:
                <input type="number" min="1" max="10" name="posicionFinal" required/>
                <input type="hidden" name="contador" value="<?= $contador ?>"/>
                <input type="hidden" name="anadirUltimoNumero" value="<?= $anadirUltimoNumero ?>"/>
                <input type="hidden" name="cadenaNumero" value="<?= $cadenaNumero ?>"/>
                <br/>
                <input type="submit" value="Enviar"/>
              </form>
            <?php
          } else {
            echo "<p>Posición inicial: " . $posicionInicial
              . " Posición final: " . $posicionFinal . "</p>";

            // se pasan los valores de las posiciones a un margen 0-9
            $posicionInicial--;
            $posicionFinal--;
            
            $ultimoValorArray = $arrayNumero[$cantidadNumeros - 1];
            
            // rotando parte posterior a $posicionFinal del array
            for ($i = ($cantidadNumeros - 1); $i > $posicionFinal; $i--) {
              $arrayNumero[$i] = $arrayNumero[$i - 1];
            }
            $arrayNumero[$posicionFinal] = $arrayNumero[$posicionInicial];
            
            // rotando parte anterior a $posicioninicial del array
            for ($i = ($posicionInicial); $i > 0; $i--) {
              $arrayNumero[$i] = $arrayNumero[$i - 1];
            }
            $arrayNumero[0] = $ultimoValorArray;
            
            // tabla de que muestra el array introducido bajo a sus índices
            echo "<table><tr class='separador'>";
          
            // muestra índice de array
            for ($i = 0; $i < count($arrayNumero); $i++) {
              echo "<th>" . ($i + 1) . "</th>";
            }

            echo "</tr><tr>";

            // muestra valores de array
            for ($i = 0; $i < count($arrayNumero); $i++) {
              echo "<td>$arrayNumero[$i]</td>";
            }  

            echo "</tr></table>"; // fin de la tabla

            //var_dump($arrayNumero);
          }
        }
      ?>
      
      <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
