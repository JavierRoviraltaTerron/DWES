<?php
  session_start()
?>
<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 2</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
  </head>

  <body>
    <div id="container">
      <!--
        Autor: Javier Roviralta Terrón
        Fecha: 2 de Diciembre de 2015
        Turno: A
      
        Ejercicio 2
        Añade las siguientes funcionalidades a la tienda on-line (con base de datos) realizada en clase:
        a) Se podrán mostrar los productos ordenados alfabéticamente por nombre o por precio (de menor
        a mayor y de mayor a menor). Se puede utilizar una lista desplegable, un clic sobre la columna a
        ordenar o cualquier otro método.
        b) De cada producto se debe conocer su categoría. En la tienda se podrá seleccionar la categoría
        de tal forma que sólo se vean los productos correspondientes.
        c) El carrito de la compra debe tener un botón o enlace que permita vaciar su contenido
        completamente.
        d) Cada producto del carrito debe tener un botón o enlace que permita eliminarlo (quitarlo del
        carrito).
      
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
          proddes varchar(500),
          categoria varchar(10)
        )
      
        /* Inserta filas en tabla */
        insert into products
          (prodcod, prodimg, prodtit, prodpri, prodcua, proddes)
        values 
          ('ff01', 1, 'Final Fantasy', 20, 1, '¡El primer titulo de la saga remasterizado!', 'psx'),
          ('ff05', 5, 'Final Fantasy V', 20, 1, '¡El quinto título de la saga remasterizado!', 'psx'),
          ('ff07', 7, 'Final Fantasy VII', 40, 1, '¡El título de mayor éxito de la saga!', 'psx'),
          ('ff08', 8, 'Final Fantasy VIII', 40, 1, '¡Uno de los títulos de mayor éxito de la saga!', 'psx'),
          ('ff10', 10, 'Final Fantasy X', 40, 1, '¡Uno de los grandes títulos de la saga!', 'ps2')
      -->
      
      <h1>Ejercicio 2</h1>
      
      <?php
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
        
        
        if (!isset($_POST['orden'])) {
          $orden = 3;
        }
        
        if (isset($_POST['categoria'])) {
          $_SESSION['categoria'] = $_POST['categoria'];
        }
        if (!isset($_SESSION['categoria'])) {
          $_SESSION['categoria'] = "psx";
        }
        
        $consultaTotalClients = $conexion->query("SELECT prodcod, prodimg, prodtit, prodpri, prodcua, proddes "
            . "FROM products");
        $numFilas = 3; // 5
        
      ?>
      
      <div id="titulo">
        <h1>Comercio electrónico</h1>
      </div> 
      <div id="contenido">

        Alfabetico:
        <form action="#" method="post">
          <input type="hidden" name="orden" value="alfabeticoNormal"/>
          <button type="submit" value="Alfabetico">Alfabetico</button>
        </form>
        <form action="#" method="post">
          <input type="hidden" name="orden" value="alfabeticoInverso"/>
          <button type="submit" value="AlfabeticoInverso">Alfabetico inverso</button>
        </form>
        Precio:
        <form action="#" method="post">
          <input type="hidden" name="orden" value="menorPrecio"/>
          <button type="submit" value="MenorPrecio">Menor precio</button>
        </form>
        <form action="#" method="post">
          <input type="hidden" name="orden" value="mayorPrecio"/>
          <button type="submit" value="MayorPrecio">Mayor precio</button>
        </form>
        
        Categoria: 
        <form action="#" method="post">
          <input type="hidden" name="categoria" value="psx"/>
          <button type="submit" value="psx">psx</button>
        </form>
        <form action="#" method="post">
          <input type="hidden" name="categoria" value="ps2"/>
          <button type="submit" value="ps2">ps2</button>
        </form>
        
        <div id="listaArticulos">
        
          <h2>Artículos <?= $_SESSION['categoria'] ?></h2>
          <?php
            if ($_POST['orden'] == "alfabeticoNormal") {
              $orden = 3;
            }
            
            if ($_POST['orden'] == "alfabeticoInverso") {
              $orden = '3 desc';
            }
            
            if ($_POST['orden'] == "menorPrecio") {
              $orden = 4;
            }
            
            if ($_POST['orden'] == "mayorPrecio") {
              $orden = '4 desc';
            }
            
            // listado de productos
            $consulta = $conexion->query("SELECT prodcod, prodimg, prodtit, prodpri, prodcua, proddes "
            . "FROM products "
              . "WHERE categoria = '" . $_SESSION['categoria'] . "'"
              . " Order by " . $orden);
            
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
            
            // eliminar todo
            if (isset($_POST["eliminarTodo"])) {
              foreach ($listaCarrito as $clave => $value) {
                unset($listaCarrito[$clave]);
              }
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
            <form action="#" method="post">
              <input type="hidden" name="clave" value="<?= $clave ?>"/>
              <input type="hidden" name="eliminarTodo" value="<?= $eliminarTodo ?>"/>
              <input type="submit" value="Eliminar todo"/>
            </form>
          
          <div class="articulo">Precio total: <?= $precioTotal ?>€</div>
        </div>
        
        
        
      </div>

      <div id="autor">
        <p>Javier Roviralta Terrón</p>
      </div>

    </div>
  </body>

</html>
