<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 20</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 19
        Realiza un programa que pinte una pirámide por pantalla. La altura se 
        debe pedir por teclado mediante un formulario. La pirámide estará hecha 
        de bolitas, ladrillos o cualquier otra imagen de las 5 que se deben dar 
        a elegir mediante un formulario.
      
        Ejercicio 20
        Igual que el ejercicio anterior pero esta vez se debe pintar una 
        pirámide hueca.
      -->
      
      <h1>Pirámide</h1>

      <?php
        $largo = $_GET['largo'];
        $iconos = $_GET['iconos'];
        
        if (!isset($largo)) {
          ?>
            <form action="t4ej20piramide.php" method="get">
              tamaño <input type="number" name="largo" autofocus/>
              <br/>
              iconos <select name="iconos">
                <option value="1" selected>Bolas</option>
                <option value="2">Ladrillos</option>
                <option value="3">Estrellas</option>
                <option value="4">Huevos</option>
                <option value="5">Perros</option>
              </select>
              <br/>
              <input type="submit" value="Enviar"/>
            </form>
          <?php
            
        } else {
          
          for ($i = 0; $i < $largo; $i++) {
            for ($j = ($largo - 1) - $i; $j > 0; $j--) {
              echo "<img src='img/0.png'/>";
              //echo "_"; //prueba
            }

            for ($k = 1 + ($i * 2); $k > 0; $k--) {
              if ($i == ($largo - 1)) {
                echo "<img src='img/$iconos.png'/>";
              } else {
                if (($k == 1 + ($i * 2)) || ($k == 1)) {
                  echo "<img src='img/$iconos.png'/>";
                } else {
                  echo "<img src='img/0.png'/>";
                  //echo "_"; //prueba
                }
              }
            }

            echo "<br/>";
          }
        }
      ?>
    </div>
  </body>

</html>
