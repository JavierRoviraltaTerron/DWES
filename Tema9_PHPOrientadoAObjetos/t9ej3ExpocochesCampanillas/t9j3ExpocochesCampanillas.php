<?php
  session_start()
?>

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
        Queremos gestionar la venta de entradas (no numeradas) de Expocoches 
        Campanillas que tiene 3 zonas, la sala principal con 1000 entradas 
        disponibles, la zona de compra-venta con 200 entradas disponibles y la 
        zona vip con 25 entradas disponibles. Hay que controlar que existen 
        entradas antes de venderlas. Define las clase Zona con sus atributos y 
        métodos correspondientes y crea un programa que permita vender las 
        entradas. En la pantalla principal debe aparecer información sobre las 
        entradas disponibles y un formulario para vender entradas. Debemos 
        indicar para qué zona queremos las entradas y la cantidad de ellas. 
        Lógicamente, el programa debe controlar que no se puedan vender más 
        entradas de la cuenta.
      -->

      <h1>Expocoches Campanillas</h1>

      <div id="contenido">

        <?php
          include_once "Zona.php";
          
          // si no existen las sesiones se crean e inicializan, si existen y se
          // les pasa por formulario un valor, se les resta, para posteriormente
          // crear las instancias de zona e introducirles el valor ya calculado
          if (!isset($_SESSION["salaPrincipal"])) {
            $_SESSION["salaPrincipal"] = 1000;
            $_SESSION["compraVenta"] = 200;
            $_SESSION["vip"] = 25;
          } else {
            if ($_SESSION["salaPrincipal"] - $_POST["entradasSalaPrincipal"] >= 0) {
              $_SESSION["salaPrincipal"] -= $_POST["entradasSalaPrincipal"];
            }
            if ($_SESSION["compraVenta"] - $_POST["entradasCompraVenta"] >= 0) {
              $_SESSION["compraVenta"] -= $_POST["entradasCompraVenta"];
            }
            if ($_SESSION["vip"] - $_POST["entradasVip"] >= 0) {
              $_SESSION["vip"] -= $_POST["entradasVip"];
            }
          }
          
          // crea instancias de zona
          $salaPrincipal = new Zona();
          $compraVenta = new Zona();
          $vip = new Zona();
          
          // añade atributo entradas pasadas por formulario
          $salaPrincipal->setEntradas($_SESSION["salaPrincipal"]);
          $compraVenta->setEntradas($_SESSION["compraVenta"]);
          $vip->setEntradas($_SESSION["vip"]);
          
        ?>
        
          <table>
            <tr>
              <th>Zona</th>
              <th>Entradas</th>
            </tr>
            <tr>
              <th></th>
              <th>disponibles</th>
              <th>solicitadas</th>
            </tr>
            <tr>
              <form action="#" method="post">
                <td>Sala Principal</td>
                <td><?= $salaPrincipal ?></td>
                <td><input type="number" name="entradasSalaPrincipal"/></td>
                <td><input type="submit" value="Enviar"/></td>
              </form>
            </tr>
            <tr>
              <form action="#" method="post">
                <td>Compra-Venta</td>
                <td><?= $compraVenta ?></td>
                <td><input type="number" name="entradasCompraVenta"/></td>
                <td><input type="submit" value="Enviar"/></td>
              </form>
            </tr>
            <tr>
              <form action="#" method="post">
                <td>VIP</td>
                <td><?= $vip ?></td>
                <td><input type="number" name="entradasVip"/></td>
                <td><input type="submit" value="Enviar"/></td>
              </form>
            </tr>
          </table>
      </div>

      <p id="autor">Javier Roviralta Terrón</p>

    </div>
  </body>

</html>
