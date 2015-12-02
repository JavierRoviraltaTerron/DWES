<?php
  session_start();
?>
<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 4</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style3.css">
    <link href="font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
  </head>

  <body>
    <div id="container">
      <!--
        Ejercicio 4
        Crea el programa GESTISIMAL (GESTIón SIMplifcada de Almacén) para llevar 
        el control de los artículos de un almacén. De cada artículo se debe 
        saber el código, la descripción, el precio de compra, el precio de venta 
        y el stock (número de unidades). La entrada y salida de mercancía supone 
        respectivamente el incremento y decremento de stock de un determinado 
        artículo. Hay que controlar que no se pueda sacar más mercancía de la 
        que hay en el almacén. El programa debe tener, al menos, las siguientes 
        funcionalidades: listado, alta, baja, modificación, entrada de mercancía 
        y salida de mercancía.
      
        /* MySQL Queries para la BBDD de este ejercicio*/
        /* Crea BBDD */
        create database gestisimal

        /* Selecciona BBDD */
        use gestisimal

        /* Crea tabla con columnas */
        create table products (
          prodcod varchar(10) primary key,
          proddes varchar(500),
          prodbuypri int,
          prodselpri int,
          prodsto int
        )
      
        /* Inserta filas en tabla */
        insert into products
          (prodcod, proddes, prodbuypri, prodselpri, prodsto)
        values 
          ('cod1', 'Producto1', 11, 15, 111),
          ('cod2', 'Producto2', 12, 22, 222),
          ('cod3', 'Producto3', 13, 33, 333),
          ('cod4', 'Producto4', 14, 44, 444),
          ('cod5', 'Producto5', 15, 55, 555),
          ('cod6', 'Producto6', 16, 66, 666),
          ('cod7', 'Producto7', 17, 77, 777),
          ('cod8', 'Producto8', 18, 88, 888),
          ('cod9', 'Producto9', 19, 99, 999)
      -->

      <h1 id="title">GESTISIMAL</h1>

      <div id="content">
      <?php
        // Conexión a la base de datos /////////////////////////////////////////
        $dbname = "gestisimal";
        $dbuser = "root";
        $dbpass = "root";
        
        try {
          $connection = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", "$dbuser", "$dbpass");
        } catch (PDOException $e) {
          echo "<p>No se ha podido establecer conexión con el servidor de bases de datos.</p>";
          die ("Error: " . $e->getMessage());
        }

        $tableName = "products";
        $totalProductsQuery = $connection->query("SELECT * FROM $tableName");
        
        $fileNumber = 3; // número de filas mostradas por página
        $isSecondField = false;
        $isThirdField = false;
        $isFourthField = false;
        
        $keyField = "prodcod";
        $secondField = "proddes";
        $thirdField = "prodbuypri";
        $fourthField = "prodselpri";
        $fifthField = "prodsto";
        
        // Número de página
        if (isset($_GET['page'])) {
          $_SESSION['page'] = $_GET['page'];
        } else {
          $_SESSION['page'] = 1;
        }
        // La página vuelve a la anterior si ya no quedan filas en la actual
        if ($_SESSION['page'] > (ceil($totalProductsQuery->rowCount()/$fileNumber))) {
          $_SESSION['page']--;
        }
          
        // ALTA - realizar alta si no existe en la BBDD ////////////////////////
        if (isset($_POST[$keyField]) && ($_POST["action"] == "register")) {
          $register = "SELECT $keyField FROM $tableName WHERE $keyField='" . $_POST[$keyField] . "'";
          $productExistsQuery = $connection->query($register);
          
          if ($productExistsQuery->rowCount() > 0) {
            header("refresh: 2;");
      ?>
        <p>Ya existe un producto con código <?= $_POST[$keyField] ?></p>
      <?php
          } else {
            // insercion
            $insertQuery = "INSERT INTO $tableName ($keyField, $secondField, $thirdField, $fourthField, $fifthField) "
              . "VALUES ('$_POST[$keyField]','$_POST[$secondField]','$_POST[$thirdField]','$_POST[$fourthField]','$_POST[$fifthField]')";
            $connection->exec($insertQuery);
            // regresa a la pagina actual tras insertar
            $_SESSION['page'] = $_GET['page'];
            header("refresh: 2;");
            ?>
            <p>Cliente dado de alta correctamente.</p>
            <?php
          }
        }
        
        // BORRADO - realizar borrado después de la confirmación previa ////////
        if (isset($_POST[$keyField]) && ($_POST["action"] == "removed")) {
          $delete = "DELETE FROM $tableName WHERE $keyField = '" . $_POST[$keyField] . "'";
          $connection->exec($delete);
          header("refresh: 2;");
          
          ?>
          <p>Cliente dado de baja correctamente.</p>
          
        <?php
        }
        
        // BORRADO - confirmación //////////////////////////////////////////////
        if (isset($_POST[$keyField]) && ($_POST["action"] == "remove")) {
          ?>

            <p>¿Está seguro que desea eliminar el producto con codigo <?= $_POST[$keyField] ?> ?</p>
            <div id="removeButtonPanel">
              <form action="#" method="post">
                <button type="submit" class="floatLeft" value="Cancel">Cancelar</button>
              </form>

              <form action="#" method="post">
                <input type="hidden" name="<?= $keyField ?>" value="<?= $_POST[$keyField] ?>"/>                
                <input type="hidden" name="action" value="removed"/>
                <button type="submit" class="floatLeft marginLeft redButton" value="Confirm">Confirmar</button>
              </form>
            </div>
          <?php
        }
        
        // MODIFICACIÓN - realizar modificación en base al formulario previo ///
        if (isset($_POST[$keyField]) && ($_POST["action"] == "modified")) {
          $modified = "UPDATE $tableName SET ";
            if (isset($_POST[$secondField]) && ($_POST[$secondField] != "")) {
              $modified .= "$secondField = '" . $_POST[$secondField] . "'";
              $isSecondField = true;
            }
            
            if (isset($_POST[$thirdField]) && ($_POST[$thirdField])) {
              if ($isSecondField) {
                $modified .= ",";
              }
              $modified .= "$thirdField = '" . $_POST[$thirdField] . "'";
              $isThirdField = true;
            }
            
            if (isset($_POST[$fourthField]) && ($_POST[$fourthField])) {
              if ($isThirdField || $isSecondField) { 
                $modified .= ",";
              }
              $modified .= "$fourthField = '" . $_POST[$fourthField] . "'";
            }
            
            if (isset($_POST[$fifthField]) && ($_POST[$fifthField])) {
              if ($isFourthField || $isThirdField || $isSecondField) { 
                $modified .= ",";
              }
              $modified .= "$fifthField = '" . $_POST[$fifthField] . "'";
            }
            
            $modified .= "WHERE $keyField = '" . $_POST[$keyField] . "'";
            
          $connection->exec($modified);
          header("refresh: 2;");
          ?>
          <p>Cliente modificado correctamente.</p>
          <?php
        }
        
        // MODIFICACIÓN - formulario ///////////////////////////////////////////
        if (isset($_POST[$keyField]) && ($_POST["action"] == "modify")) {
          ?>
          <p>Introduce solo el/los campo/s a modificar.</p>
        <table>
          <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Precio de compra</th>
            <th>Precio de venta</th>
            <th>Stock</th>
          </tr>
          <tr>
            <form action="#" method="post">
            <td><input type="text" size="10" name="<?= $keyField ?>" value="<?= $_POST[$keyField] ?>" readonly></td>
            <td><input type="text" maxlength="500" size="10" name="<?= $secondField ?>"></td>
            <td><input type="number" name="<?= $thirdField ?>"></td>
            <td><input type="number" name="<?= $fourthField ?>"></td>
            <td><input type="number" name="<?= $fifthField ?>"></td>
            <td><input type="hidden" name="action" value="modified"/></td>
            <td><button type="submit"  class="btn btn-info" value="Submit"><i class="fa fa-pencil fa-lg"></i></button></td>
          </form>
          </tr>
        </table>
          <?php
        }
        
        // STOCK INCREMENTO ////////////////////////////////////////////////////
        if (isset($_POST[$keyField]) && ($_POST["action"] == "increaseStock")) {
          ?>
          
            <table>
              <tr>
                <th>Código</th>
                <th>Stock</th>
                <th>Stock entrante</th>
              </tr>
              <tr>
                <form action="#" method="post">
                  <td><input type="text" size="10" name="<?= $keyField ?>" value="<?= $_POST[$keyField] ?>" readonly></td>
                  <td><input type="text" name="<?= $fifthField ?>" value="<?= $_POST[$fifthField] ?>" readonly></td>
                  <td><input type="number" name="increment" autofocus></td>
                  <td><input type="hidden" name="action" value="increasedStock"/></td>
                  <td><button type="submit" value="Submit"><i class="fa fa-plus-circle fa-lg"></i></button></td>
                </form>
              </tr>
            </table>
          <?php
        }
        
        // STOCK INCREMENTADO //////////////////////////////////////////////////
        if (isset($_POST[$keyField]) && ($_POST["action"] == "increasedStock")) {
          $sum = $_POST[$fifthField] + $_POST['increment'];
          $increased = "UPDATE $tableName SET $fifthField = " . $sum . " WHERE $keyField = '" . $_POST[$keyField] . "'";
          $connection->exec($increased);
          header("refresh: 2;");
          ?>
          <p>Stock incrementado correctamente.</p>
          <?php
        }
        
        // STOCK DECREMENTO ////////////////////////////////////////////////////
        if (isset($_POST[$keyField]) && ($_POST["action"] == "decreaseStock")) {
          ?>
          
            <table>
              <tr>
                <th>Código</th>
                <th>Stock</th>
                <th>Stock saliente</th>
              </tr>
              <tr>
                <form action="#" method="post">
                  <td><input type="text" size="10" name="<?= $keyField ?>" value="<?= $_POST[$keyField] ?>" readonly></td>
                  <td><input type="text" name="<?= $fifthField ?>" value="<?= $_POST[$fifthField] ?>" readonly></td>
                  <td><input type="number" name="decrement" autofocus></td>
                  <td><input type="hidden" name="action" value="decreasedStock"/></td>
                  <td><button type="submit" value="Submit"><i class="fa fa-minus-circle fa-lg"></i></button></td>
                </form>
              </tr>
            </table>
          <?php
        }
        
        // STOCK DECREMENTADO //////////////////////////////////////////////////
        if (isset($_POST[$keyField]) && ($_POST["action"] == "decreasedStock")) {
          $substraction = $_POST[$fifthField] - $_POST['decrement'];
          if ($substraction >= 0) {
          $decreased = "UPDATE $tableName SET $fifthField = " . $substraction . " WHERE $keyField = '" . $_POST[$keyField] . "'";
          $connection->exec($decreased);
          header("refresh: 2;");
          ?>
          <p>Stock decrementado correctamente.</p>
          <?php
          } else {
            header("refresh: 2;");
            ?>
              <p>El stock no puede ser inferior a 0.</p>
            <?php
          }
        }
        
        // LISTADO /////////////////////////////////////////////////////////////
        if ($_POST["action"] == "") {
          $listQuery = $connection->query("SELECT prodcod, proddes, prodbuypri, prodselpri, prodsto "
            . "FROM $tableName ORDER BY 1 "
            . "LIMIT " . (($_SESSION['page'] - 1) * $fileNumber) . ", " . $fileNumber);
        ?>
        <table id="list">
          <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Precio de compra</th>
            <th>Precio de venta</th>
            <th>Stock</th>
          </tr>
          <tr>
            <form action="#" method="post">
              <td><input type="text" maxlength="10" size="10" name="<?= $keyField ?>" required autofocus></td>
              <td><input type="text" maxlength="500" size="10" name="<?= $secondField ?>"></td>
              <td><input type="number" name="<?= $thirdField ?>"></td>
              <td><input type="number" name="<?= $fourthField ?>"></td>
              <td><input type="number" name="<?= $fifthField ?>"></td>
              <input type="hidden" name="action" value="register"/>
              <td><button type="submit" class="blueButton" value="Submit"><i class="fa fa-check-circle fa-lg"></i></button></td>
            </form>
          </tr>
        <?php
          while ($product = $listQuery->fetchObject()) {
        ?>
          <tr>
            <td><?= $product->$keyField ?></td>
            <td><?= $product->$secondField ?></td>
            <td><?= $product->$thirdField ?></td>
            <td><?= $product->$fourthField ?></td>
            <td><?= $product->$fifthField ?></td>
            <td class="backgroundNone">
              <form action="#" method="post">
                <input type="hidden" name="<?= $keyField ?>" value="<?= $product->$keyField ?>"/>
                <input type="hidden" name="action" value="remove"/>
                <button type="submit" class="redButton" value="Remove"><i class="fa fa-trash fa-lg"></i></button>
              </form>
            </td>
            <td class="backgroundNone">
              <form action="#" method="post">
                <input type="hidden" name="<?= $keyField ?>" value="<?= $product->$keyField ?>"/>
                <input type="hidden" name="action" value="modify"/>
                <button type="submit"  class="orangeButton" value="Modify"><i class="fa fa-pencil fa-lg"></i></button>
              </form>
            </td>
            <td class="backgroundNone">
              <form action="#" method="post">
                <input type="hidden" name="<?= $keyField ?>" value="<?= $product->$keyField ?>"/>
                <input type="hidden" name="<?= $fifthField ?>" value="<?= $product->$fifthField ?>"/>
                <input type="hidden" name="action" value="increaseStock"/>
                <button type="submit" value="Increment"><i class="fa fa-plus-circle fa-lg"></i></button>
              </form>
            </td>
            <td class="backgroundNone">
              <form action="#" method="post">
                <input type="hidden" name="<?= $keyField ?>" value="<?= $product->$keyField ?>"/>
                <input type="hidden" name="<?= $fifthField ?>" value="<?= $product->$fifthField ?>"/>
                <input type="hidden" name="action" value="decreaseStock"/>
                <button type="submit" value="Decrement"><i class="fa fa-minus-circle fa-lg"></i></button>
              </form>
            </td>
          </tr>
        <?php              
          }
        ?>
        </table>
        <br/>
        <p>Productos en lista: <?= $listQuery->rowCount() ?></p>
        
        <!--// SELECCIÓN DE PÁGINA //////////////////////////////////////////-->
        <div id="buttonPanel">
          <form action="#" method="get">
            <?php
              // Botón retroceder - se muestra si la página no es la primera
              if ($_SESSION['page'] > 1) {
            ?>
            <button type="submit" name="page" value="<?= $_SESSION['page']-1 ?>"><<</button>
            <?php
              }

              // Botones de páginas
              for ($i = 1; $i <= ceil($totalProductsQuery->rowCount()/$fileNumber); $i++) {
                if ($_SESSION['page'] == $i) {
                  ?>
                  <span><?= $i ?></span>
                  <?php
                } else {
                ?>
                <button type="submit" name="page" value="<?= $i ?>"><?= $i ?></button>
                <?php
                }
              }

              // Botón avanzar - se muestra si la página no es la última
              if ($_SESSION['page'] < (($totalProductsQuery->rowCount())/$fileNumber)) {
            ?>
            <button type="submit" name="page" value="<?= $_SESSION['page']+1 ?>">>></button>
            <?php
              }
            ?>
          </form>
        </div>
        <?php 
        }
        //$connection->close(); // causa error
      ?>
      </div>
      <p id="author">Javier Roviralta Terrón</p>
    </div>
  </body>

</html>
