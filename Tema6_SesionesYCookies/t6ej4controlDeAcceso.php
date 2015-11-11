<?php
  session_start();
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 4</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 4
        Establece un control de acceso mediante nombre de usuario y contraseña 
        para cualquiera de los programas de la relación anterior. La aplicación 
        no nos dejará continuar hasta que iniciemos sesión con un nombre de 
        usuario y contraseña correctos.
      -->

      <h1>Control de acceso</h1>

      <div id="contenido">

      <?php        
        $nombreUsuario = "u";
        $contrasenaUsuario = "c";
        $estaLogeado =& $_SESSION['estaLogeado'];
        
        // variable que redireccionará la página al formulario o permite acceso
        if (/*!isset($_SESSION['estaLogeado'])*/!isset($estaLogeado)) {
          
          $estaLogeado = false;
          //$_SESSION['estaLogeado'] = false;
        }
        
        // comprobación de formulario
        if (isset($_POST['usuarioIntroducido'])) {
          if (($_POST['usuarioIntroducido'] == $nombreUsuario) 
            && ($_POST['contrasenaIntroducida'] == $contrasenaUsuario)) {
            $estaLogeado = true;
            //$_SESSION['estaLogeado'] = true;
            echo "<p>Accediendo...</p>";
            header("Refresh: 2; url=t6ej4controlDeAccesoResultado.php", true, 303); // recarga la página
          } else {
            echo "<p class='resaltado'>Contraseña incorrecta. Inténtelo de nuevo.</p>";
            header("Refresh: 2; url=#", true, 303); // recarga la página
          }
        }
        
        // formulario de control de acceso
        if (/*!$_SESSION['estaLogeado']*/!$estaLogeado) {
          ?>
            <form action="#" method="post">
              <table>
                <tr>
                  <td>usuario</td>
                  <td><input type="text" name="usuarioIntroducido" required autofocus/></td>
                </tr>
                <tr>
                  <td>contraseña</td>
                  <td><input type="password" name="contrasenaIntroducida" required/></td>
                </tr>
                <tr>
                  <td><input type="submit" value="Enviar"/></td>
                </tr>
              </table>
            </form>
          <?php
        }
        ?>

      </div>

      <p id="autor">Javier Roviralta Terrón</p>

    </div>
  </body>

</html>
