<?php
  session_start();
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 3</title>
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
      
        /* MySQL Queries para la BBDD de este ejercicio*/
        /* Crea BBDD */
        create database ecommerce

        /* Selecciona BBDD */
        use ecommerce

        /* Crea tabla con columnas */
        create table products (
          prodcod varchar(10) primary key,
          prodimg int,
          prodtit varchar(50),
          prodpri int,
          prodcua int,
          proddes varchar(500)
        )
      
        /* Inserta filas en tabla */
        insert into products
          (prodcod, prodimg, prodtit, prodpri, prodcua, proddes)
        values 
          ('ff01', 1, 'Final Fantasy', 20, 1, '¡El primer titulo de la saga remasterizado!'),
          ('ff05', 5, 'Final Fantasy V', 20, 1, '¡El quinto título de la saga remasterizado!'),
          ('ff07', 7, 'Final Fantasy VII', 40, 1, '¡El título de mayor éxito de la saga!'),
          ('ff08', 8, 'Final Fantasy VIII', 40, 1, '¡Uno de los títulos de mayor éxito de la saga!'),
          ('ff10', 10, 'Final Fantasy X', 40, 1, '¡Uno de los grandes títulos de la saga!')
      -->
      <?php
        //$listaArticulos =& $_SESSION["listaArticulos"]; // array eliminado
        $listaCarrito =& $_SESSION["listaCarrito"];
        $codigo = $_POST['clave'];
        $eliminar = $_POST['eliminar'];
        $precioTotal;
        
        try {
          $conexion = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", "root", "root");
        } catch (PDOException $e) {
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
          die ("Error: " . $e->getMessage());
        }
        
        $_SESSION['page'] = $_GET['page'];
        
        if (!isset($_SESSION['page'])) {
          $_SESSION['page'] = 1;
        }
        
        $consultaTotalClients = $conexion->query("SELECT prodcod, prodimg, prodtit, prodpri, prodcua, proddes "
            . "FROM products");
        $numFilas = 3; // 5
        
      ?>
      
      <div id="titulo">
        <h1>Comercio electrónico</h1>
      </div> 
      <div id="contenido">

        <div id="listaArticulos">
        
          <h2>Artículos</h2>
          <?php
            // listado de productos
            $consulta = $conexion->query("SELECT prodcod, prodimg, prodtit, prodpri, prodcua, proddes "
            . "FROM products Order by 1 "
            . "LIMIT " . (($_SESSION['page'] - 1) * $numFilas) . ", " . $numFilas);
            
            while ($products = $consulta->fetchObject()) {
            ?>
              <div class="articulo">
                <div><img src='img/ff<?= $products->prodimg ?>.jpg'/></div>
                <div><?= $products->prodtit ?></div>
                <div><?= $products->prodpri ?>€</div>
              
                <form action="#" method="post">
                  <input type="hidden" name="clave" value="<?= $products->prodcod ?>"/>
                  <input type="hidden" name="imagen" value="<?= $products->prodimg ?>"/>
                  <input type="hidden" name="titulo" value="<?= $products->prodtit ?>"/>
                  <input type="hidden" name="precio" value="<?= $products->prodpri ?>"/>
                  <input type="hidden" name="cantidad" value="<?= $products->prodcua ?>"/>
                  <input type="hidden" name="descripcion" value="<?= $products->proddes ?>"/>
                  <input type="submit" value="Añadir al carrito"/>
                </form>
                  
                <form action="t7ej3comercioElectronicoPDODescripcion.php" method="post">
                  <input type="hidden" name="clave" value="<?= $products->prodcod ?>"/>
                  <input type="hidden" name="imagen" value="<?= $products->prodimg ?>"/>
                  <input type="hidden" name="titulo" value="<?= $products->prodtit ?>"/>
                  <input type="hidden" name="precio" value="<?= $products->prodpri ?>"/>
                  <input type="hidden" name="cantidad" value="<?= $products->prodcua ?>"/>
                  <input type="hidden" name="descripcion" value="<?= $products->proddes ?>"/>
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
            // crea array listaArticulos con los valores recogidos
            if ((isset($codigo)) && (!$eliminar)){
              if (!array_key_exists($codigo, $listaCarrito)) {
                $listaArticulos = [ 
                  $codigo => [ 
                    "imagen" => $_POST['imagen'],
                    "titulo" => $_POST['titulo'],
                    "precio" => $_POST['precio'],
                    "cantidad" => $_POST['cantidad'],
                    "descripcion" => $_POST['descripcion'],
                  ]
                ];
                
                // inserta el array listaArticulos en listaCarrito
                $listaCarrito[$codigo] = $listaArticulos[$codigo];
                
              } else {
                // incrementa un producto que ya exite en listaCarrito
                $listaCarrito[$codigo]["cantidad"]++;
              }
            } else {
              // eliminar
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
            // calcula precio total del carrito
            foreach ($listaCarrito as $clave => $value) {
              $precioTotal += ($value["precio"] * $value["cantidad"]);
            }
            
          ?>
          <div class="articulo">Precio total: <?= $precioTotal ?>€</div>
        </div>
        
        <div id="buttons">
          <form action="#" method="get">
            <?php
              // se muestra botón si la página no es la primera
              if ($_SESSION['page'] > 1) {
            ?>
            <button type="submit" name="page" value="<?= $_SESSION['page']-1 ?>"><<</button>
            <?php
              }

              // se muestra boton por cada pagina
              for ($i = 1; $i <= ceil($consultaTotalClients->rowCount()/$numFilas); $i++) {
                ?>
                <button type="submit" name="page" value="<?= $i ?>"><?= $i ?></button>
                <?php
              }

              // se muestra botón si la página no es la última
              if ($_SESSION['page'] < (($consultaTotalClients->rowCount())/$numFilas)) {
            ?>
            <button type="submit" name="page" value="<?= $_SESSION['page']+1 ?>">>></button>
            <?php
              }
              $conexion->close(); // provoca aumento de divs en carrito
            ?>
          </form>
        </div>
        
        
      </div>

      <div id="autor">
        <p>Javier Roviralta Terrón</p>
      </div>

    </div>
  </body>

</html>
