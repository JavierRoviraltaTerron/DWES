<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 10</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 10
        Realiza un programa que escoja al azar 10 cartas de la baraja española y 
        que diga cuántos puntos suman según el juego de la brisca. Emplea un 
        array asociativo para obtener los puntos a partir del nombre de la 
        figura de la carta. Asegúrate de que no se repite ninguna carta, igual 
        que si las hubieras cogido de una baraja de verdad.
      -->
      
      <h1>Brisca</h1>
      
      <?php
        
        $cantidadCartas = 10;
        $suma = 0;
        $cartasEchadas = "";
        
        $arrayPalo = array(
          "bastos",
          "copas",
          "oros",
          "espadas",
        );
        
        $arrayCarta = array(
          "as",
          "dos",
          "tres",
          "cuatro",
          "cinco",
          "seis",
          "siete",
          "sota",
          "caballo",
          "rey",
        );
        
        $arrayPuntuacionCarta = array(
          "as" => 11,
          "dos" => 0,
          "tres" => 10,
          "cuatro" => 0,
          "cinco" => 0,
          "seis" => 0,
          "siete" => 0,
          "sota" => 2,
          "caballo" => 3,
          "rey" => 4,
        );
        
        echo "<table>"
        . "<theader>"
          . "<tr>"
          . "<th>Carta</th><th>&nbsp;</th><th>Puntuación</th>"
          . "</tr>"
          . "</theader>"
          . "<tbody>";
        
        for ($i = 0; $i < $cantidadCartas; $i++) {
          $palo = $arrayPalo[rand(0, 3)];
          $carta = $arrayCarta[rand(0, 9)];
          $puntos = $arrayPuntuacionCarta[$carta]; // recoge puntuación
          $nombreCarta = "$carta de $palo"; // genera cadena con carta y palo
          
          // si no se encuentra un objeto en el array $cartasEchadas que coincida
          // con la cadena que contiene $nombreCarta, recoge dicha cadena
          // dentro del array y aumenta la puntuación en $suma
          if (!in_array($nombreCarta, $cartasEchadas)) {
            echo "<tr><td>$carta de $palo</td><td></td><td>$puntos puntos</td></tr>";
            $cartasEchadas[] = $nombreCarta;
            $suma += $puntos;
          }
        }
        
        echo "</tbody>"
        . "<tfooter>"
          . "<tr class='resaltado'><td>Puntuación total</td><td></td><td>$suma puntos</td></tr>"
          . "</tfooter>"
          . "</table>";
        
      ?>
      
      <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
