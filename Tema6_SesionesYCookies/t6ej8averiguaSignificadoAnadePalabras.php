<?php
  // se crea la cookie con los valores recogidos del formulario añadir palabra
  if (isset($_GET["anadirPalabraEspanol"])) {
    $anadirPalabraEspanol = $_GET["anadirPalabraEspanol"];
    $anadirPalabraIngles = $_GET["anadirPalabraIngles"];
    setcookie($anadirPalabraEspanol, $anadirPalabraIngles, time() + 3*24*3600); 
  }
  
  $diccionario = [
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
  ];
  
  // se integran las palabras de las cookies al array asociativo
  foreach ($_COOKIE as $espanol => $ingles) {
    $diccionario[$espanol] = $ingles;
  }
  
  // se integran la ultima palabra añadida por formulario al array asociativo
  // se hace directamente porque las cookies no se muestran hasta la siguiente
  // carga de pagina, por tanto se usan las variables esta vez, la proxima
  // carga de esta palabra si se hace desde la propia cookie con el foreach
  //anterior
  if (isset($_GET["anadirPalabraEspanol"])) {
    $diccionario[$anadirPalabraEspanol] = $anadirPalabraIngles;
  }
?>
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
        Realiza un programa que escoja al azar 5 palabras en inglés de un 
        mini-diccionario. El programa pedirá que el usuario teclee la traducción 
        al español de cada una de las palabras y comprobará si son correctas. Al 
        final, el programa deberá mostrar cuántas respuestas son válidas y 
        cuántas erróneas. La aplicación debe tener una opción para introducir 
        los pares de palabras (inglés - español) que se deben guardar en 
        cookies; de esta forma, si de vez en cuando se dan de alta nuevas 
        palabras, la aplicación puede llegar a contar con un número considerable 
        de entradas en el mini-diccionario.
      -->
      
      <h1>Averigua el significado</h1>
      
      <?php
        
        // inicializa en false el booleano que indica si se muestra el formulario
        // de añadir palabras al diccionario
        $anadirPalabra = $_GET['anadirPalabra'];
        if (!isset($anadirPalabra)) {
          $anadirPalabra = false;
        }
        
        $espanol = $_GET['espanol'];
        $ingles = $_GET['ingles'];
        $acierto = 0;
        $totalDiccionario = count($diccionario) - 1;
        
        //print_r($diccionario); // pruebas
        
        if (!$anadirPalabra) {
        if (!isset($_GET['espanol'])) {
          echo "<p>Traduce las siguientes palabras</p>";

        // Extrae palabras españolas de $diccionario
        foreach ($diccionario as $clave => $valor) {
          $palabrasEspanolas[] = $clave;
        }

        // Extrae 5 palabras aleatorias de $palabrasEspanolas
        $contadorPalabras = 0;
        do {
          $palabra = $palabrasEspanolas[rand(0, $totalDiccionario)];
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
        <td colspan="2">
          <form action="#" method="get">
            <input type="hidden" name="anadirPalabra" value="<?= $anadirPalabra = true ?>"/>
            <input type="submit" value="Añadir palabra al diccionario"/>
          </form>
        </td>
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
      ?>
        <tr>
          <td colspan="3">Respuestas correctas: <sup><?= $acierto ?></sup>/<sub>5</sub></td>
        </tr>
        <tr>
          <td colspan="3">
            <form action="#" method="get">
              <input type="hidden" name="anadirPalabra" value="<?= $anadirPalabra = true ?>"/>
              <input type="submit" value="Añadir palabra al diccionario"/>
            </form>
          </td>
        </tr>
      </table>
          <?php
      echo "<p></p>";
    }
    ?>
      

      <?php
        } else {
          ?>
            <form action="#" method="get">
              <table>
                <tr>
                  <td>Español:</td>
                  <td><input type="text" name="anadirPalabraEspanol" required autofocus/></td>
                </tr>
                <tr>
                  <td>Ingles:</td>
                  <td><input type="text" name="anadirPalabraIngles" required/></td>
                </tr>
                <tr>
                  <td><input type="submit" value="Enviar"/></td>
                </tr>
              </table>
            </form>
          <?php
        }
      ?>
      <div id="autor">
        <p>Javier Roviralta Terrón</p>
      </div>
    </div>
  </body>

</html>
