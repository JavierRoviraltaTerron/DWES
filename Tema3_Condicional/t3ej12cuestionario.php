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
      <form action="t3ej12cuestionarioResultado.php" method="post">
        Pregunta 1
        </br>
        V
        <input type="radio" name="p1" value="1">
        F
        <input type="radio" name="p1" value="0">
        </br>
        Pregunta 2
        </br>
        V
        <input type="radio" name="p2" value="0">
        F
        <input type="radio" name="p2" value="1">
        </br>
        Pregunta 3
        </br>
        V
        <input type="radio" name="p3" value="1">
        F
        <input type="radio" name="p3" value="0">
        </br>
        Pregunta 4
        </br>
        V
        <input type="radio" name="p4" value="1">
        F
        <input type="radio" name="p4" value="0">
        </br>
        Pregunta 5
        </br>
        V
        <input type="radio" name="p5" value="0">
        F
        <input type="radio" name="p5" value="1">
        </br>
        Pregunta 6
        </br>
        V
        <input type="radio" name="p6" value="1">
        F
        <input type="radio" name="p6" value="0">
        </br>
        Pregunta 7
        </br>
        V
        <input type="radio" name="p7" value="0">
        F
        <input type="radio" name="p7" value="1">
        </br>
        Pregunta 8
        </br>
        V
        <input type="radio" name="p8" value="0">
        F
        <input type="radio" name="p8" value="1">
        </br>
        Pregunta 9
        </br>
        V
        <input type="radio" name="p9" value="0">
        F
        <input type="radio" name="p9" value="1">
        </br>
        Pregunta 10
        </br>
        V
        <input type="radio" name="p10" value="1">
        F
        <input type="radio" name="p10" value="0">
        </br>
        <input type="submit" value="Enviar">
      </form>
      </div>
  </body>

</html>
