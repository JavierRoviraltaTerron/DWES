<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 11</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 11
        Crea un mini-diccionario español-inglés que contenga, al menos, 20 
        palabras (con su traducción). Utiliza un array asociativo para almacenar 
        las parejas de palabras. El programa pedirá una palabra en español y 
        dará la correspondiente traducción en inglés.
      -->
      
      <h1>Mini-diccionario</h1>
      
      <?php
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
        
        $palabra = $_GET['palabra'];
        
        if (!isset($palabra)) {
      ?>
      <form action="#" method="get">
        Introduce una palabra en español:
        <input type="text" name="palabra" value="<?= $palabra ?>" required autofocus/>
        <input type="submit" value="Enviar"/>
      </form>
      <?php
        } else {
          if (array_key_exists($palabra, $diccionario)) {
            echo "$palabra : $diccionario[$palabra]";
          } else {
            echo "Lo siento, la palabra introducida no se encuentra en el diccionario.";
          }
        }
      
      ?>
      
      <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
