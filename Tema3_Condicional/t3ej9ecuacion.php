<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 9</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 9
        Realiza un programa que resuelva una ecuación de segundo grado (del 
        tipo ax2 + bx + c = 0).
      -->
      <form action="t3ej9ecuacionResultado.php" method="get">
        Introduce 3 números
        <br/>
        número a:
        <input type="number" min="1" name="a"/>
        <br/>
        número b:
        <input type="number" name="b"/>
        <br/>
        número c:
        <input type="number" name="c"/>
        <br/>
        <input type="submit" value="Enviar"/>
      </form>
    </div>
  </body>

</html>
