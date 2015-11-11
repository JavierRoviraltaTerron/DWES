<?php
  if (isset($_GET["color"])) {
    $color = $_GET["color"];
    setcookie("color", $color, time() + 3*24*3600);
  } else if (isset($_COOKIE["color"])) {
    $color = $_COOKIE["color"];
  }
?>
<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 7</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <style>
      #texto {
        background-color: <?= $color ?> !important;
      }
    </style>
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 7
        Escribe un programa que guarde en una cookie el color de fondo 
        (propiedad background-color) de una página. Esta página debe tener 
        únicamente algo de texto y un formulario para cambiar el color.
      -->

      <h1>Cambio de color de fondo</h1>

      <div id="contenido">

        <div id="texto">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad 
          minim veniam, quis nostrud exercitation ullamco laboris nisi ut 
          aliquip ex ea commodo consequat. Duis aute irure dolor in 
          reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
          pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
          culpa qui officia deserunt mollit anim id est laborum.
        </div>
        
        <form action="#" method="get">
          <input type="color" name="color"/>
          <input type="submit" value="Enviar"/>
        </form>

      </div>

      <p id="autor">Javier Roviralta Terrón</p>

    </div>
  </body>

</html>
