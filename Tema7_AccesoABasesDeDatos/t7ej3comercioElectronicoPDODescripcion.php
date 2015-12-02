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
        Ejercicio 3
        Modifica la tienda virtual realizada anteriormente de tal forma que 
        todos los datos de los artículos se guarden en una base de datos.
      -->
      <?php        
        try {
          $conexion = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", "root", "root");
        } catch (PDOException $e) {
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
          die ("Error: " . $e->getMessage());
        }
        
        //$listaArticulos =& $_SESSION["listaArticulos"];
        $listaCarrito =& $_SESSION["listaCarrito"];
        $codigo = $_POST['clave'];        
      ?>
      
      <div id="titulo">
        <h1>Descripción <?= $_POST["titulo"] ?></h1>
      </div> 
      <div id="contenido">

        <div id="listaArticulos">
        
          <h2>Artículos</h2>
          
          <div class="articulo">
            <div><img src='img/ff<?= $_POST["imagen"] ?>.jpg'/></div>
            <div><?= $_POST["titulo"] ?></div>
            <div><?= $_POST["precio"] ?>€</div>
                  
            <form action="t7ej3comercioElectronicoPDO.php" method="post">
              <input type="hidden" name="clave" value="<?= $codigo ?>"/>
              <input type="hidden" name="imagen" value="<?= $_POST['imagen'] ?>"/>
              <input type="hidden" name="titulo" value="<?= $_POST['titulo'] ?>"/>
              <input type="hidden" name="precio" value="<?= $_POST['precio'] ?>"/>
              <input type="hidden" name="cantidad" value="<?= $_POST['cantidad'] ?>"/>
              <input type="hidden" name="descripcion" value="<?= $_POST['descripcion'] ?>"/>
              <input type="submit" value="Añadir al carrito"/>
            </form> 
          </div>
          
          <div class="descripcion"><?= $_POST["descripcion"] ?></div>
          
        </div>
        
        <div class="volver"><a href="t7ej3comercioElectronicoPDO.php">Volver</a></div>
        
      </div>

      <div id="autor">
        <p>Javier Roviralta Terrón</p>
      </div>

    </div>
  </body>

</html>
