
<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 10</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 10
        Escribe un programa que nos diga el horóscopo a partir del día y 
        el mes de nacimiento.
      -->
      <form action="t3ej10horoscopoResultado.php" method="get">
        Introduce un día:
        <input type="number" min="1" max="31" name="dia">
        </br>
        Introduce un mes:
        <input type="number" min="1" max="12" name="mes">
        </br>
        <input type="submit" value="Enviar">
      </form>
    </div>
  </body>

</html>
