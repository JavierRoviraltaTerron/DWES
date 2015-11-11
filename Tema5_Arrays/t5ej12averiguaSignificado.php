<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 12</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 12
        Realiza un programa que escoja al azar 5 palabras en español del 
        mini-diccionario del ejercicio anterior. El programa pedirá que el 
        usuario teclee la traducción al inglés de cada una de las palabras y 
        comprobará si son correctas. Al final, el programa deberá mostrar 
        cuántas respuestas son válidas y cuántas erróneas.
      -->
      
      <h1>Averigua el significado</h1>
      
      <?php
        
        $espanol = $_GET['espanol'];
        $ingles = $_GET['ingles'];
        $acierto = 0;
        
        $diccionario = array(
          "hola" => "hello",
          "adios" => "bye",
          "hoy" => "today",
          "ayer" => "yesterday",
          "mañana" => "tomorrow",
          "dia" => "day",
          "semana" => "week",
          "mes" => "month",
          "año" => "year",
          "siglo" => "century",

          "milenio" => "millenium",
          "zona" => "zone",
          "villa" => "ville",
          "pueblo" => "town",
          "ciudad" => "city",
          "provincia" => "province",
          "pais" => "country",
          "continente" => "continent",
          "planeta" => "planet",
          "galaxia" => "galaxy",
        );
        
        if (!isset($_GET['espanol'])) {
          echo "<p>Traduce las siguientes palabras</p>";

        // Extrae palabras españolas de $diccionario
        foreach ($diccionario as $clave => $valor) {
          $palabrasEspanolas[] = $clave;
        }

        // Extrae 5 palabras aleatorias de $palabrasEspanolas
        $contadorPalabras = 0;
        do {
          $palabra = $palabrasEspanolas[rand(0, 19)];
          if (!in_array($palabra, $espanol)) {
            $espanol[] = $palabra;
            $contadorPalabras++;
          }
        } while ($contadorPalabras < 5);
    ?>
      <table class="traduccion">  
    <form action="#" method="get">
      <?php
        for ($i = 0; $i < 5; $i++) {
          echo "<tr>";
          echo "<td>$espanol[$i]</td>";
          echo '<td><input type="text" name="ingles['.$i.']" ></td>';
          echo '<input type="hidden" name="espanol['.$i.']" value="'.$espanol[$i].'">';
          echo "</tr>";
        }
      ?>
      <tr><td><input type="submit" value="Enviar"></td></tr>
    </form>
      </table>
    <?php
    } else {
      echo "<table>"
      . "<tr><th>Palabra</th><th>Respuesta</th><th>Resultado</th></tr>";
      for ($i = 0; $i < 5; $i++) {
        echo "<tr>";
        if ($diccionario[$espanol[$i]] == $ingles[$i]) {
          echo "<td>$espanol[$i]</td><td>$ingles[$i]</td><td class='resaltadoVerde'>¡correcto!</td>";
          $acierto++;
        } else {
          echo "<td>$espanol[$i]</td><td>$ingles[$i]</td><td class='resaltado'>¡incorrecto!</td>";
        }
        echo "</tr>";
      }
      echo "</table>";
      echo "<p>Respuestas correctas: <sup>$acierto</sup>/<sub>5</sub></p>";
    }
      ?>
      <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
