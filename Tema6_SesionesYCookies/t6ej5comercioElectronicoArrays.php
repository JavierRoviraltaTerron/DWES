<?php
  session_start();
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 5</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 5
        Crea una tienda on-line sencilla con un catálogo de productos y un 
        carrito de la compra. Un catálogo de cuatro o cinco productos será 
        suficiente. De cada producto se debe conocer al menos la descripción y 
        el precio. Todos los productos deben tener una imagen que los 
        identifique. Al lado de cada producto del catálogo deberá aparecer un 
        botón Comprar que permita añadirlo al carrito. Si el usuario hace clic 
        en el botón Comprar de un producto que ya estaba en el carrito, se 
        deberá incrementar el número de unidades de dicho producto. Para cada 
        producto que aparece en el carrito, habrá un botón Eliminar por si el 
        usuario se arrepiente y quiere quitar un producto concreto del carrito 
        de la compra. A continuación se muestra una captura de pantalla de una 
        posible solución.
        (ver ejemplo)
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
            "ff1" => ["imagen" => 1, "titulo" => "Final Fantasy", "precio" => 20, "cantidad" => 1],
            "ff5" => ["imagen" => 5, "titulo" => "Final Fantasy V", "precio" => 20, "cantidad" => 1],
            "ff7" => ["imagen" => 7, "titulo" => "Final Fantasy VII", "precio" => 40, "cantidad" => 1],
            "ff8" => ["imagen" => 8, "titulo" => "Final Fantasy VIII", "precio" => 40, "cantidad" => 1],
            "ff10" => ["imagen" => 10, "titulo" => "Final Fantasy X", "precio" => 40, "cantidad" => 1],
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
              //$listaCarrito[$codigo]["cantidad"] = 0;
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
