<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 12</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 12
        Realiza un minicuestionario con 10 preguntas tipo test sobre las 
        asignaturas que se imparten en el curso. Cada pregunta acertada sumará 
        un punto. El programa mostrará al final la calificación obtenida. Pásale 
        el minicuestionario a tus compañeros y pídeles que lo hagan para ver qué 
        tal andan de conocimientos en las diferentes asignaturas del curso.
      -->
      <?php
        $puntuacion = 0;
        
        for($i = 1; $i <= 10; $i++) {
          $puntuacion += $_REQUEST['p' . $i];
        }
        echo "Puntuación: " . "<sup>$puntuacion</sup>/<sub>10</sub>";
      ?>
      </div>
  </body>

</html>
