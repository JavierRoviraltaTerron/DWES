<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 3</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 3
        Escribe un programa que lea 15 números por teclado y que los almacene en 
        un array. Rota los elementos de ese array, es decir, el elemento de la 
        posición 0 debe pasar a la posición 1, el de la 1 a la 2, etc. El número 
        que se encuentra en la última posición debe pasar a la posición 0. 
        Finalmente, muestra el contenido del array.
      -->
      
      <h1>Rotar elementos del array</h1>
      
      <?php
        $numeroMaximo = 15; // 15
        $numero = $_GET['numero'];
        $contador = $_GET['contador'];
        $numeroEnCadena = $_GET['numeroEnCadena'];
        
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
          $numeroEnCadena = substr($numeroEnCadena, 2);
          $numero = explode(" ", $numeroEnCadena);
          
          //var_dump($numero); // pruebas
          
          /* // array antes de rotación
          foreach ($numero as $n) {
            echo $n . "<br/>";
          }
          echo "<br/>";
          */
          
          $ultimoElemento = $numero[count($numero) - 1]; // último elemento
          
          for ($i = (count($numero) - 1); $i > 0; $i--) {
            $numero[$i] = $numero[$i - 1];
          }
          
          //echo count($numero); // pruebas
          
          $numero[0] = $ultimoElemento;
          
          // var_dump($numero); // pruebas
          
          foreach ($numero as $n) {
            echo $n . "<br/>";
          }
        }
      ?>
      
      <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
