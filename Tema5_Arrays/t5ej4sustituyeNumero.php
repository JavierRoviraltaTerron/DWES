<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 4</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 4
        Escribe un programa que genere 100 números aleatorios del 0 al 20 y que 
        los muestre por pantalla separados por espacios. El programa pedirá 
        entonces por teclado dos valores y a continuación cambiará todas las 
        ocurrencias del primer valor por el segundo en la lista generada 
        anteriormente. Los números que se han cambiado deben aparecer resaltados 
        de un color diferente.
      -->
      
      <h1>Sustituye números</h1>
      
      <p>Array original</p>
      
      <?php
        
        $numeros = new SplFixedArray(99);
        
        $numeroNuevo = $_GET['numeroNuevo'];
        $numeroViejo = $_GET['numeroViejo'];
        $cadenaNumeros = $_GET['cadenaNumeros'];
        
        if (!isset($numeroNuevo)) {
          // Genera y muestra array original
          for ($i = 0; $i < count($numeros); $i++) {
            $numeros[$i] = rand(0, 20);
            echo $numeros[$i] . " ";
            $cadenaNumeros = $cadenaNumeros. " " . $numeros[$i];
          }
      ?>

      <br/><br/>
      <form action="#" method="get">
        Número nuevo:
        <input type="number" min="0" max="20" name="numeroNuevo" autofocus/>
        <br/>
        Número a cambiar:
        <input type="number" min="0" max="20" name="numeroViejo"/>
        <br/>
        <input type="hidden" name="cadenaNumeros" value="<?= $cadenaNumeros ?>"/>
        <input type="submit" value="Enviar"/>
      </form>
      <?php
        } else {
          $cadenaNumeros = $cadenaNumeros . " " . $numero;
          $cadenaNumeros = substr($cadenaNumeros, 1);
          $numero = explode(" ", $cadenaNumeros);
          
          //var_dump($numero); // pruebas
          
          // Muestra array original
          foreach ($numero as $n) {
            echo $n . " ";
          }
          
          echo "<p>Array modificado</p>";
          
          for ($i = 0; $i < count($numero); $i++) {
            if ($numero[$i] == $numeroViejo) {
              $numero[$i] = $numeroNuevo;
              echo "<span class='resaltado'>$numero[$i]</span> ";
            } else {
              echo "$numero[$i] ";
            }
          }
        }
      ?>
      
      <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
