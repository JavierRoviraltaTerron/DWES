<?php
  session_start();
?>
<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 2 PDO Arranged</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
    <style type="text/css">
      #content > h1:first-child {
        background: grey;
        border-top-left-radius: 0.1em;
        border-top-right-radius: 0.1em;
        color: white;
      }
      
      #content {
        background: yellow;
        border-radius: 0.2em;
        width: -moz-fit-content;
        width: -webkit-fit-content;
      } 
      
      #content > p:last-child {
        background: grey;
        border-bottom-left-radius: 0.1em;
        border-bottom-right-radius: 0.1em;
      }
      
      #form1,form2 { float: left;}
      
      button {
        background: grey;
        border-radius: 0.2em; 
        border: none;
        color: #fff;
      }
      
      #buttons {
        text-align: center;
      }
      
    </style>
  </head>

  <body>
    <div id="container">
      <!--
        Ejercicio 2
        Modifica el programa anterior añadiendo las siguientes mejoras:
        • El listado debe aparecer paginado en caso de que haya muchos clientes.
        • Al hacer un alta, se debe comprobar que no exista ningún cliente con 
          el DNI introducido en el formulario.
        • La opción de borrado debe pedir confirmación.
        • Cuando se realice la modificación de los datos de un cliente, los 
          campos que no se han cambiado deberán permanecer inalterados en la 
          base de datos.
      -->
      <div id="content">

        <h1>Clientes</h1>
        
      <?php
        // Conexión a la base de datos
        try {
          $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
        } catch (PDOException $e) {
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
          die ("Error: " . $e->getMessage());
        }

        if (isset($_GET['page'])) {
          $_SESSION['page'] = $_GET['page'];
        }
  
        if (!isset($_SESSION['page'])) {
          $_SESSION['page'] = 1;
        }
        
        $consultaTotalClients = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente");
        $numFilas = 3; // 5
        $isName = false;
        $isAddress = false;
        echo ceil($consultaTotalClients->rowCount()/$numFilas) . "<br>"; // pruebas
        echo $_SESSION['page'] . "<br>"; // pruebas
        
        // la pagina vuelve a la anterior si ya no quedan filas en la actual
        if ($_SESSION['page'] > (ceil($consultaTotalClients->rowCount()/$numFilas))) {
          $_SESSION['page']--;
        }
        
        echo $_SESSION['page']; // pruebas
          
        // alta de cliente si no existe en la BBDD
        if (isset($_POST['dni']) && ($_POST["action"] == "alta")) {
          $consultaClienteExiste = $conexion->query("SELECT dni FROM cliente WHERE dni=".$_POST['dni']);

          if ($consultaClienteExiste->rowCount() > 0) {
      ?>
        <p>Ya existe un cliente con DNI <?= $_POST['dni'] ?></p>
      <?php
          } else {
            $insercion = "INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES ('$_POST[dni]','$_POST[nombre]','$_POST[direccion]','$_POST[telefono]')";
            $conexion->exec($insercion);
            $_SESSION['page'] = $_GET['page'];
            header("refresh: 0;");
            ?>
            <p>Cliente dado de alta correctamente.</p>
            <?php
          }
        }
        
        // borrado cliente
        if (isset($_POST['dni']) && ($_POST["action"] == "borrado")) {
          $borrado = "DELETE FROM cliente WHERE dni = '" . $_POST["dni"] . "'";
          $conexion->exec($borrado);
          header("refresh: 0;");
          
          ?>
          <p>Cliente dado de baja correctamente.</p>
          
        <?php
        }
        
        // baja de cliente
        if (isset($_POST['dni']) && ($_POST["action"] == "baja")) {
          ?>

            <p>¿Está seguro que desea eliminar el cliente con DNI <?= $_POST['dni'] ?> ?</p>
            
              <form id="form1" action="#" method="post">
                <button type="submit" class="btn btn-primary" value="Cancelar">Cancelar</button>
              </form>
            
              <form id="form2" action="#" method="post">
                <input type="hidden" name="dni" value="<?= $_POST['dni'] ?>"/>                
                <input type="hidden" name="action" value="borrado"/>
                <button type="submit" class="btn btn-danger" value="Confirmar">Confirmar</button>
              </form>
            <?php
        }
        
        // modificado de cliente
        if (isset($_POST['dni']) && ($_POST["action"] == "modificado")) {
          $modificado = "UPDATE cliente SET ";
            if (isset($_POST["nombre"]) && ($_POST['nombre'] != "")) {
              $modificado .= "nombre = '" . $_POST["nombre"] . "'";
              $isName = true;
            }
            
            if (isset($_POST["direccion"]) && ($_POST["direccion"])) {
              if ($isName) {
                $modificado .= ",";
              }
              $modificado .= "direccion = '" . $_POST["direccion"] . "'";
              $isAddress = true;
            }
            
            if (isset($_POST["telefono"]) && ($_POST["telefono"])) {
              if ($isAddress || $isName) { 
                $modificado .= ",";
              }
              $modificado .= "telefono = '" . $_POST["telefono"] . "'";
            }
            
            $modificado .= "WHERE dni = '" . $_POST["dni"] . "'";
            
          $conexion->exec($modificado);
          ?>
          <p>Cliente modificado correctamente.</p>
          <?php
        }
        
        // modificacion de cliente
        if (isset($_POST['dni']) && ($_POST["action"] == "modificacion")) {
          ?>
        
        <table>
          <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
          </tr>
          <tr>
            <form action="#" method="post">
              <td><input type="text" name="dni" value="<?= $_POST['dni'] ?>" readonly></td>
              <td><input type="text" name="nombre"></td>
              <td><input type="text" name="direccion"></td>
              <td><input type="tel" name="telefono"></td>
              <td><input type="hidden" name="action" value="modificado"/></td>
              <td><button type="submit"  class="btn btn-info" value="Enviar"><i class="fa fa-pencil fa-lg"></i></button></td>
            </form>
          </tr>
        </table>
          <?php
            
            
        } else {
        
          // listado de clientes
          $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono "
            . "FROM cliente Order by nombre "
            . "LIMIT " . (($_SESSION['page'] - 1) * $numFilas) . ", " . $numFilas);
        ?>

        <table>
          <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
          </tr>

          <tr>
          <form action="#" method="post">
            <td><input type="text" name="dni" required></td>
            <td><input type="text" name="nombre"></td>
            <td><input type="text" name="direccion"></td>
            <td><input type="tel" name="telefono"></td>
            <td><input type="hidden" name="action" value="alta"/></td>
            <td><button type="submit" value="Enviar" class="btn btn-primary"><i class="fa fa-plus-circle fa-lg"></i></button></td>
          </form>
        </tr>
        <?php
          while ($cliente = $consulta->fetchObject()) {
        ?>
          <tr>
            <td><?= $cliente->dni ?></td>
            <td><?= $cliente->nombre ?></td>
            <td><?= $cliente->direccion ?></td>
            <td><?= $cliente->telefono ?></td>
            <td>
              <form action="#" method="post">
                <input type="hidden" name="dni" value="<?= $cliente->dni ?>"/>
                <input type="hidden" name="action" value="baja"/>
                <td><button type="submit" class="btn btn-danger" value="Eliminar"><i class="fa fa-minus-circle fa-lg"></i></button></td>
              </form>
            </td>
            <td>
              <form action="#" method="post">
                <input type="hidden" name="dni" value="<?= $cliente->dni ?>"/>
                <input type="hidden" name="action" value="modificacion"/>
                <td><button type="submit"  class="btn btn-info" value="Modificar"><i class="fa fa-pencil fa-lg"></i></button></td>
              </form>
            </td>
          </tr>
        <?php              
          }
        ?>
        </table>
        <br/>
        <p>Número de clientes: <?= $consulta->rowCount() ?></p>
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
            ?>
          </form>
        </div>
        <?php 
        }
        $conexion->close();
      ?>
      </div>

      <p id="author">Javier Roviralta Terrón</p>

    </div>
  </body>

</html>
