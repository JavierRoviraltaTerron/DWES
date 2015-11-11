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
        Autor: Javier Roviralta Terrón
        Fecha: 21 de Octubre de 2015
        Turno: 2º Turno
      
        Ejercicio 3
        En ajedrez, el valor de las piezas se mide en peones según la siguiente 
        tabla:
        (ver tabla en pdf)
        Realiza un programa que genere al azar las capturas que han hecho dos 
        jugadores durante una partida. Las capturas pueden ir de 0 a 15 Hay que 
        tener en cuenta que cada jugador tiene la posibilidad de capturar 
        algunas de las siguientes piezas (no más): 1 dama, 2 torres, 2 alfiles, 
        2 caballos y 8 peones.
        (ver ejemplo en pdf)
        El valor de cada pieza se debe almacenar en un array asociativo.
      -->
      
      <h1>Ejercicio 3</h1>
      
      <?php
        
        $diccionario = array(
          "dama" => 9,
          "torre" => 5,
          "alfil" => 3,
          "caballo" => 2,
          "peon" => 1,
        );
        
        
        // JUGADOR 1
        
        
        
        $totalCapturasJugador1 = rand(0, 15);
        $capturasJugador;
        $cuentaDama = 0;
        $cuentaTorre = 0;
        $cuentaAlfil = 0;
        $cuentaCaballo = 0;
        $cuentaPeon = 0;
        $sumatorio = 0;
        $captura;
        
        // se genera $diccionarioAuxiliar para poder obtener mediante la función
        // rand() los índices de forma aleatoria
        foreach ($diccionario as $clave => $valor) {
          $diccionarioAuxiliar[] = $clave;
        }
        
        // genera capturas
        
        do {
          $captura = $diccionarioAuxiliar[rand(0, 4)];
          //$captura = $diccionarioAuxiliar[4]; // pruebas
          
          // máximo damas
          if ($captura == $diccionarioAuxiliar[0]) {
            if ($cuentaDama < 1) {
              $capturasJugador[] = $captura;
              $cuentaDama++;
              $sumatorio += 9;
            }
          }
          
          // máximo torres
          if ($captura == $diccionarioAuxiliar[1]) {
            if ($cuentaTorre < 2) {
              $capturasJugador[] = $captura;
              $cuentaTorre++;
              $sumatorio += 5;
            }
          }
          
          // máximo alfiles
          if ($captura == $diccionarioAuxiliar[2]) {
            if ($cuentaAlfil < 2) {
              $capturasJugador[] = $captura;
              $cuentaAlfil++;
              $sumatorio += 3;
            }
          }
          
          // máximo caballos
          if ($captura == $diccionarioAuxiliar[3]) {
            if ($cuentaCaballo < 2) {
              $capturasJugador[] = $captura;
              $cuentaCaballo++;
              $sumatorio += 2;
            }
          }
          
          // máximo peones
          if ($captura == $diccionarioAuxiliar[4]) {
            if ($cuentaPeon < 8) {
              $capturasJugador[] = $captura;
              $cuentaPeon++;
              $sumatorio++;
            }
          }
          
          $contador++;
        } while ($contador < $totalCapturasJugador1);
        //var_dump($capturasJugador);
        // fin genera capturas
        
        // muestra capturas
        echo "<table>"
        . "<tr>"
          . "<th>Jugador 1</th>"
          . "</tr>"
          . "<tr>"
          . "<td>Dama: $cuentaDama</td>"
          . "</tr>"
          . "<tr>"
          . "<td>Torre: $cuentaTorre</td>"
          . "</tr>"
          . "<tr>"
          . "<td>Alfil: $cuentaAlfil</td>"
          . "</tr>"
          . "<tr>"
          . "<td>Caballo: $cuentaCaballo</td>"
          . "</tr>"
          . "<tr>"
          . "<td>Peón: $cuentaPeon</td>"
          . "</tr>"
          . "<tr>"
          . "<td><strong>Resultado: $sumatorio</strong></td>"
          . "</tr>"
          . "</table>";
        
        
        
        // JUGADOR 2
        
        
        
        $totalCapturasJugador2 = rand(0, 15);
        
        $capturasJugador;
        $cuentaDama = 0;
        $cuentaTorre = 0;
        $cuentaAlfil = 0;
        $cuentaCaballo = 0;
        $cuentaPeon = 0;
        $sumatorio = 0;
        $captura;
        
        // se genera $diccionarioAuxiliar para poder obtener mediante la función
        // rand() los índices de forma aleatoria
        foreach ($diccionario as $clave => $valor) {
          $diccionarioAuxiliar[] = $clave;
        }
        
        // genera capturas
        
        do {
          $captura = $diccionarioAuxiliar[rand(0, 4)];
          //$captura = $diccionarioAuxiliar[4]; // pruebas
          
          // máximo damas
          if ($captura == $diccionarioAuxiliar[0]) {
            if ($cuentaDama < 1) {
              $capturasJugador[] = $captura;
              $cuentaDama++;
              $sumatorio += 9;
            }
          }
          
          // máximo torres
          if ($captura == $diccionarioAuxiliar[1]) {
            if ($cuentaTorre < 2) {
              $capturasJugador[] = $captura;
              $cuentaTorre++;
              $sumatorio += 5;
            }
          }
          
          // máximo alfiles
          if ($captura == $diccionarioAuxiliar[2]) {
            if ($cuentaAlfil < 2) {
              $capturasJugador[] = $captura;
              $cuentaAlfil++;
              $sumatorio += 3;
            }
          }
          
          // máximo caballos
          if ($captura == $diccionarioAuxiliar[3]) {
            if ($cuentaCaballo < 2) {
              $capturasJugador[] = $captura;
              $cuentaCaballo++;
              $sumatorio += 2;
            }
          }
          
          // máximo peones
          if ($captura == $diccionarioAuxiliar[4]) {
            if ($cuentaPeon < 8) {
              $capturasJugador[] = $captura;
              $cuentaPeon++;
              $sumatorio++;
            }
          }
          
          $contador++;
        } while ($contador < $totalCapturasJugador2);
        //var_dump($capturasJugador);
        // fin genera capturas
        
        // muestra capturas
        echo "<table>"
        . "<tr>"
          . "<th>Jugador 2</th>"
          . "</tr>"
          . "<tr>"
          . "<td>Dama: $cuentaDama</td>"
          . "</tr>"
          . "<tr>"
          . "<td>Torre: $cuentaTorre</td>"
          . "</tr>"
          . "<tr>"
          . "<td>Alfil: $cuentaAlfil</td>"
          . "</tr>"
          . "<tr>"
          . "<td>Caballo: $cuentaCaballo</td>"
          . "</tr>"
          . "<tr>"
          . "<td>Peón: $cuentaPeon</td>"
          . "</tr>"
          . "<tr>"
          . "<td><strong>Resultado: $sumatorio</strong></td>"
          . "</tr>"
          . "</table>";
        
      ?>
      
      <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
