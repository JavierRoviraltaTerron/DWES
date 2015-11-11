<?php
  session_start();
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 6</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 6
        Amplía el programa anterior de tal forma que se pueda ver el detalle de 
        un producto. Para ello, cada uno de los productos del catálogo deberá 
        tener un botón *Detalle que, al ser accionado, debe llevar al usuario a 
        la vista de detalle que contendrá una descripción exhaustiva del 
        producto en cuestión. Se podrán añadir productos al carrito tanto desde 
        la vista de listado como desde la vista de detalle.
      -->
      <?php
        $listaArticulos =& $_SESSION["listaArticulos"];
        $listaCarrito =& $_SESSION["listaCarrito"];
        $codigo = $_POST['clave'];
        $eliminar = $_POST['eliminar'];
        $precioTotal;
        
        // crea array $listaArticulos
        if (!isset($listaArticulos)) {
          $listaArticulos = [
            "ff1" => [
              "imagen" => 1, 
              "titulo" => "Final Fantasy", 
              "precio" => 20, 
              "cantidad" => 1, 
              "descripcion" => "¡El primer titulo de la saga remasterizado!",
              ],
            "ff5" => [
              "imagen" => 5, 
              "titulo" => "Final Fantasy V", 
              "precio" => 20, 
              "cantidad" => 1, 
              "descripcion" => "¡El quinto título de la saga remasterizado!",
              ],
            "ff7" => [
              "imagen" => 7, 
              "titulo" => "Final Fantasy VII", 
              "precio" => 40, 
              "cantidad" => 1,
              "descripcion" => "¡El título de mayor éxito de la saga!",
              ],
            "ff8" => [
              "imagen" => 8, 
              "titulo" => "Final Fantasy VIII", 
              "precio" => 40, 
              "cantidad" => 1,
              "descripcion" => "¡Uno de los títulos de mayor éxito de la saga!",
              ],
            "ff10" => [
              "imagen" => 10, 
              "titulo" => "Final Fantasy X", 
              "precio" => 40, 
              "cantidad" => 1,
              "descripcion" => "¡Uno de los grandes títulos de la saga!",
              ],
          ];
          
          $eliminar = false;
          $precioTotal = 0;
        }
      ?>
      
      <div id="titulo">
        <h1>Comercio electrónico</h1>
      </div> 
      <div id="contenido">

        <div id="listaArticulos">
        
          <h2>Artículos</h2>
          <?php
            // muestra contenido de array $listaArticulos y rellena formularios
            foreach ($listaArticulos as $clave => $value) {
              ?>
                <div class="articulo">
                  <div><img src='img/ff<?= $value["imagen"] ?>.jpg'/></div>
                  <div><?= $value["titulo"] ?></div>
                  <div><?= $value["precio"] ?>€</div>
                  
                  <form action="#" method="post">
                    <input type="hidden" name="clave" value="<?= $clave ?>"/>
                    <input type="submit" value="Añadir al carrito"/>
                  </form>
                  
                  <form action="t6ej6comercioElectronicoArraysDescripcion.php" method="post">
                    <input type="hidden" name="clave" value="<?= $clave ?>"/>
                    <input type="submit" value="Descripción"/>
                  </form>
                  
                </div>
              <?php
            }
          ?>
        </div>
        
        <div id="listaCarrito">
          <h2>Carrito</h2>
          
          <?php
            if ((isset($codigo)) && (!$eliminar)){
              if (!array_key_exists($codigo, $listaCarrito)) {
                $listaCarrito[$codigo] = $listaArticulos[$codigo];
              } else {
                $listaCarrito[$codigo]["cantidad"]++;
              }
            } else {
              unset($listaCarrito[$codigo]);
            }
            
            // muestra contenido de array $listaCarrito
            foreach ($listaCarrito as $clave => $value) {
              ?>
                <div class="articulo">
                  <div><img src='img/ff<?= $value["imagen"] ?>.jpg'/></div>
                  <div><?= $value["titulo"] ?></div>
                  <div><?= $value["precio"] ?>€</div>
                  <div><?= $value["cantidad"] ?>ud</div>
                  
                  <form action="#" method="post">
                    <input type="hidden" name="clave" value="<?= $clave ?>"/>
                    <input type="hidden" name="eliminar" value="<?= $eliminar = true ?>"/>
                    <input type="submit" value="Eliminar"/>
                  </form>
                  
                </div>
              <?php
            }
            
            foreach ($listaCarrito as $clave => $value) {
              $precioTotal += ($value["precio"] * $value["cantidad"]);
            }
          ?>
          <div class="articulo">Precio total: <?= $precioTotal ?>€</div>
        </div>
        
      </div>

      <div id="autor">
        <p>Javier Roviralta Terrón</p>
      </div>

    </div>
  </body>

</html>
