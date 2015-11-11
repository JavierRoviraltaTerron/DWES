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
      ?>
      
      <div id="titulo">
        <h1>Descripción <?= $listaArticulos[$codigo]["titulo"] ?></h1>
      </div> 
      <div id="contenido">

        <div id="listaArticulos">
        
          <h2>Artículos</h2>
          
          <div class="articulo">
            <div><img src='img/ff<?= $listaArticulos[$codigo]["imagen"] ?>.jpg'/></div>
            <div><?= $listaArticulos[$codigo]["titulo"] ?></div>
            <div><?= $listaArticulos[$codigo]["precio"] ?>€</div>
                  
            <form action="t6ej6comercioElectronicoArraysConDescripcion.php" method="post">
              <input type="hidden" name="clave" value="<?= $codigo ?>"/>
              <input type="submit" value="Añadir al carrito"/>
            </form>
            
            <form action="t6ej6comercioElectronicoArraysConDescripcion.php" method="post">
              <input type="submit" value="Volver"/>
            </form>
          </div>
          
          <div class="descripcion"><?= $listaArticulos[$codigo]["descripcion"] ?></div>
          
        </div>
        
        <div class="volver"><a href="t6ej6comercioElectronicoArraysConDescripcion.php">Volver</a></div>
        
      </div>

      <div id="autor">
        <p>Javier Roviralta Terrón</p>
      </div>

    </div>
  </body>

</html>
