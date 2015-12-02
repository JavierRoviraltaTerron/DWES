<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 1 mysql</title>
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
    </style>
  </head>

  <body>
    <div id="container">
      <!--
        Ejercicio 1
        Crea una aplicación web que permita hacer listado, alta, baja y 
        modificación sobre la tabla cliente de la base de datos banco.
        • Para realizar el listado bastará un SELECT, tal y como se ha visto en 
          los ejemplos.
        • El alta se realizará mediante un formulario donde se especificarán 
          todos los campos del nuevo registro. Luego esos datos se enviarán a 
          una página que ejecutará INSERT.
        • Para realizar una baja, se pedirá el DNI del cliente mediante un 
          formulario y a continuación se ejecutará DELETE para borrar el 
          registro cuyo DNI coincida con el introducido.
        • La modificación se realiza mediante UPDATE. Se pedirá previamente en 
          un formulario el DNI del cliente para el que queremos modificar los 
          datos.
      -->

      <div id="content">

        <h1>Clientes</h1>
        
      <?php
        // Conexión a la base de datos
        $conexion = mysql_connect("localhost", "root", "root");
        
        if (!$conexion) {
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
          die ("Error: " . mysql_error());
        }

        mysql_select_db("banco", $conexion);
        mysql_set_charset('utf8');
        
        // alta de cliente si no existe en la BBDD
        if (isset($_POST['dni']) && ($_POST["action"] == "alta")) {
          $consultaClienteExiste = mysql_query("SELECT dni FROM cliente WHERE dni=".$_POST['dni']);

          if (mysql_num_rows($consultaClienteExiste) > 0) {
      ?>
        <p>Ya existe un cliente con DNI <?= $_POST['dni'] ?></p>
      <?php
          } else {
            mysql_query("INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES ('$_POST[dni]','$_POST[nombre]','$_POST[direccion]','$_POST[telefono]')");
            ?>
            <p>Cliente dado de alta correctamente.</p>
            <?php
          }
        }
        
        // baja de cliente
        if (isset($_POST['dni']) && ($_POST["action"] == "baja")) {
          mysql_query("DELETE FROM cliente WHERE dni = '" . $_POST["dni"] . "'");
          ?>
          <p>Cliente dado de baja correctamente.</p>
          <?php
        }
        
        // modificado de cliente
        if (isset($_POST['dni']) && ($_POST["action"] == "modificado")) {
          mysql_query("UPDATE cliente "
            . "SET nombre = '" . $_POST["nombre"] . "',"
            . "direccion = '" . $_POST["direccion"] . "',"
            . "telefono = '" . $_POST["telefono"] . "'"
            . "WHERE dni = '" . $_POST["dni"] . "'");
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
          $consulta = mysql_query("SELECT dni, nombre, direccion, telefono FROM cliente", $conexion);
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
          while ($cliente = mysql_fetch_array($consulta)) {
        ?>
          <tr>
            <td><?= $cliente[dni] ?></td>
            <td><?= $cliente[nombre] ?></td>
            <td><?= $cliente[direccion] ?></td>
            <td><?= $cliente[telefono] ?></td>
            <td>
              <form action="#" method="post">
                <input type="hidden" name="dni" value="<?= $cliente[dni] ?>"/>
                <input type="hidden" name="action" value="baja"/>
                <td><button type="submit" class="btn btn-danger" value="Eliminar"><i class="fa fa-minus-circle fa-lg"></i></button></td>
              </form>
            </td>
            <td>
              <form action="#" method="post">
                <input type="hidden" name="dni" value="<?= $cliente[dni] ?>"/>
                <input type="hidden" name="action" value="modificacion"/>
                <td><button type="submit"  class="btn btn-info" value="Modificar"><i class="fa fa-pencil fa-lg"></i></button></td>
              </form>
            </td>
          </tr>
        <?php              
          }
          //$contador = mysql_query("SELECT COUNT(dni) as d FROM cliente", $conexion);
          //$contador2 = mysql_result($contador, 0, "d");
          //$contador2 = mysql_fetch_array($contador);
        ?>
        </table>
        <br/>
        <p>Número de clientes: <?= mysql_num_rows($consulta) ?></p>
        <!--<p>Número de clientes: <?= $contador2 ?></p>-->
        <!--<p>Número de clientes: <?= $contador2[0] ?></p>-->
        

        <?php 
        }
        $conexion->close();
      ?>
      </div>

      <p id="author">Javier Roviralta Terrón</p>

    </div>
  </body>

</html>
