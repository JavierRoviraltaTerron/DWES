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
        Define tres arrays de 20 números enteros cada una, con nombres “numero”, 
        “cuadrado” y “cubo”. Carga el array “numero” con valores aleatorios 
        entre 0 y 100. En el array “cuadrado” se deben almacenar los cuadrados 
        de los valores que hay en el array “numero”. En el array “cubo” se deben 
        almacenar los cubos de los valores que hay en “numero”. A continuación, 
        muestra el contenido de los tres arrays dispuesto en tres columnas.
      -->
      <?php
        $numeroMaximo = 20;
        $numero = new SplFixedArray($numeroMaximo);
        $cuadrado = new SplFixedArray($numeroMaximo);
        $cubo = new SplFixedArray($numeroMaximo);
        
        for ($i = 0; $i < count($numero); $i++) {
          $numero[$i] = rand(0, 100);
          $cuadrado[$i] = pow($numero[$i], 2);
          $cubo[$i] = pow($numero[$i], 3);
        }
        ?>
        <h1>Potencias</h1>
        <table>
          <tr>
            <th>x</th>
            <th>x<sup>2</sup></th>
            <th>x<sup>3</sup></th>
          </tr>
        
        <?php
        for ($i = 0; $i < count($numero); $i++) {
          echo "<tr>";
          echo "<td>$numero[$i]</td>";
          echo "<td>$cuadrado[$i]</td>";
          echo "<td>$cubo[$i]</td>";
          echo "</tr>";
        }
        ?>
        </table>
        <p id="autor">Javier Roviralta Terrón</p>
    </div>
  </body>

</html>
