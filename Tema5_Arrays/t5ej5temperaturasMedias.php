<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 5</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 5
        Realiza un programa que pida la temperatura media que ha hecho en cada 
        mes de un determinado año y que muestre a continuación un diagrama de 
        barras horizontales con esos datos. Las barras del diagrama se pueden 
        dibujar a base de la concatenación de una imagen.
      -->
      
      <h1>Temperaturas medias</h1>
      
      <?php
        
        $mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        
        $temperaturaMes = $_GET['temperaturaMes'];
        
        $contador = $_GET['contador'];
        
        if (!isset($contador)) {
          $contador = 0;
          $temperaturaMes = "";
        }
        
        $cadenaTemperaturaMes = $_GET['cadenaTemperaturaMes'];
        
        $cadenaTemperaturaMes = $cadenaTemperaturaMes . " " . $temperaturaMes;
        
        //var_dump($temperaturaMes); // pruebas
        
        //echo $cadenaTemperaturaMes; // pruebas
        
        if ($contador < 12) {
          $contador++;
          ?>
      <p>Introduce la temperatura</p>
      <form action="#" method="get">
        <?= $mes[$contador - 1]?>:
        <input type="number" name="temperaturaMes" autofocus/>
        <input type="hidden" name="contador" value="<?= $contador ?>"/>
        <input type="hidden" name="cadenaTemperaturaMes" value="<?= $cadenaTemperaturaMes ?>"/>
        <input type="submit" value="Enviar"/>
      </form>
      
      <?php
        } else {
          $cadenaTemperaturaMes = substr($cadenaTemperaturaMes, 2);
          $temperaturaMes = explode(" ", $cadenaTemperaturaMes);
          
          //var_dump($temperaturaMes); // pruebas          
          ?>
      <table>
      
      <?php
          
          for ($i = 0; $i < 12; $i++) {
            echo "<tr><td>$mes[$i]</td><td>";
            for ($j = 0; $j < $temperaturaMes[$i]; $j++) {
              echo "<span class='grados'>&nbsp;</span>";
            }
            echo "$temperaturaMes[$i]%</td></tr>";
          }
        }
      ?>
      </table>
        
      <p id="autor">Javier Roviralta Terrón</p>
      
    </div>
  </body>

</html>
