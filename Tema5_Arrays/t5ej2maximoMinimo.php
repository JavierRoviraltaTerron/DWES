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
        Ejercicio 2
        Escribe un programa que pida 10 números por teclado y que luego muestre 
        los números introducidos junto con las palabras “máximo” y “mínimo” al 
        lado del máximo y del mínimo respectivamente.
      -->
      
      <h1>Máximo y mínimo</h1>
      
      <?php
        $numeroMaximo = 10; // 10
        $numero = $_GET['numero'];
        $contador = $_GET['contador'];
        $numeroEnCadena = $_GET['numeroEnCadena'];
        $minimo = PHP_INT_MAX;
        $maximo = -PHP_INT_MAX;
        
        if (!isset($numero)) {
          $contador = 0;
          $numeroEnCadena = "";
        }
        
        if ($contador < $numeroMaximo || !isset($numero)) {
          $contador++;
      ?>
      
      <form action="#" method="get">
        Introduce un número
        <input type="number" name="numero" autofocus/>
        <input type="hidden" name="contador" value="<?= $contador ?>"/>
        <input type="hidden" name="numeroEnCadena" value="<?= $numeroEnCadena . " " . $numero ?>"/>
        <input type="submit" value="Enviar"/>
      </form>
        
      <?php
        } else {
          $numeroEnCadena = $numeroEnCadena . " " . $numero;
          
          //echo "$numeroEnCadena"; // pruebas
          
          $numeroEnCadena = substr($numeroEnCadena, 2); // asi se elimina el " " conque
          //se ha inicializado la variable, y su correspondiente " " de separacion
          
          $numero = explode(" ", $numeroEnCadena);
          
          //var_dump($numero); // pruebas
          
          foreach ($numero as $n) {
            if ($n < $minimo) {
              $minimo = $n;
            }
            if ($n > $maximo) {
              $maximo = $n;
            }
          }
          
          foreach ($numero as $n) {
            echo $n;
            if ($n == $minimo) {
              echo " (mínimo)";
            }
            
            if ($n == $maximo) {
              echo " (maximo)";
            }
            
            echo "<br/>";
          }
        }
      ?>
        <p id="autor">Javier Roviralta Terrón</p>
    </div>
  </body>

</html>
