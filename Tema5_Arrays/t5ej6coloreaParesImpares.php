<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 6</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 6
        Realiza un programa que pida 8 números enteros y que luego muestre esos 
        números de colores, los pares de un color y los impares de otro.
      -->
      
      <h1>Colorea pares e impares</h1>
      
      <?php
        $numero = $_GET['numero'];
        
        $contador = $_GET['contador'];
        
        $cadenaNumero = $_GET['cadenaNumero'];
        
        if (!isset($contador)) {
          $contador = 0;
        }
        
        $cadenaNumero = $cadenaNumero . " " . $numero;
        
        $cantidadNumeros = 8;
        
        //var_dump($temperaturaMes); // pruebas
        
        //echo $cadenaTemperaturaMes; // pruebas
        
        if ($contador < $cantidadNumeros) {
          $contador++;
          ?>
      
      <form action="#" method="get">
        Introduce un número:
        <input type="number" name="numero" autofocus/>
        <input type="hidden" name="contador" value="<?= $contador ?>"/>
        <input type="hidden" name="cadenaNumero" value="<?= $cadenaNumero ?>"/>
        <input type="submit" value="Enviar"/>
      </form>
      
      <?php
        } else {
          $cadenaNumero = substr($cadenaNumero, 2);
          $numero = explode(" ", $cadenaNumero);
          
          //var_dump($temperaturaMes); // pruebas          
          
          foreach ($numero as $n) {
            if ($n % 2 == 0) {
              echo "<span class='resaltado'>$n </span>";
            } else {
              echo "<span class='resaltadoAzul'>$n </span>";
            }
          }
        }
        ?>
      
      <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
