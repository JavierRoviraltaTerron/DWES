<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 1</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Crea la clase DadoPoker. Las caras de un dado de poker tienen las 
        siguientes figuras: As, K, Q, J, 7 y 8 . Crea el método tira() que no 
        hace otra cosa que tirar el dado, es decir, genera un valor aleatorio 
        para el objeto al que se le aplica el método. Crea también el método 
        nombreFigura(), que diga cuál es la figura que ha salido en la última 
        tirada del dado en cuestión. Crea, por último, el método 
        getTiradasTotales() que debe mostrar el número total de tiradas entre 
        todos los dados. Realiza una aplicación que permita tirar un cubilete 
        con cinco dados de poker.
      -->

      <h1>Dados de Pocker</h1>

      <div id="contenido">

        <?php
          include_once "DadoPocker.php";
          
          // crea dados
          $dado1 = new DadoPocker();
          $dado2 = new DadoPocker();
          $dado3 = new DadoPocker();
          $dado4 = new DadoPocker();
          $dado5 = new DadoPocker();
          
          // tira dados
          echo "<p>" . $dado1->nombreFigura() . "</p>";
          echo "<p>" . $dado2->nombreFigura() . "</p>";
          echo "<p>" . $dado3->nombreFigura() . "</p>";
          echo "<p>" . $dado4->nombreFigura() . "</p>";
          echo "<p>" . $dado5->nombreFigura() . "</p>";
          
          echo "<p>Total tiradas: " . DadoPocker::getTiradasTotales() . "</p>";
           
        ?>

      </div>

      <p id="autor">Javier Roviralta Terrón</p>
    </div>
  </body>

</html>
