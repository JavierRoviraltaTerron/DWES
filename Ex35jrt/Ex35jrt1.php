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
        Autor: Javier Roviralta Terrón
        Fecha: 21 de Octubre de 2015
        Turno: 2º Turno
      
        Ejercicio 1
        Escribe un programa que pida 10 números uno detrás de otro (no se pueden 
        pedir los 10 en la misma página) y que, a continuación, muestre el 
        máximo, el mínimo y el número de capicúas (solo la cantidad).
      
        NOTA: voltear cadena para comparar
        Función para voltear cadena: strrev($cadena)
      -->
      
      <h1>Ejercicio 1</h1>
      
      <?php
        $numeroMaximo = 10; // 10
        $numero = $_GET['numero'];
        $contador = $_GET['contador'];
        $numeroEnCadena = $_GET['numeroEnCadena'];
        $minimo = PHP_INT_MAX;
        $maximo = -PHP_INT_MAX;
        $capicua = 0;
        
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
            
            if ($n == strrev($n)) {
              $capicua++;
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
          
          echo "<ul>"
          . "<li>Número máximo: $maximo</li>"
            . "<li>Número mínimo: $minimo</li>"
            . "<li>Cantidad de capicúas: $capicua</li>"
            . "</ul>";
        }
      ?>
        <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
