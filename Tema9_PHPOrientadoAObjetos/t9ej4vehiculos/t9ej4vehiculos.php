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
        Crea la clase Vehiculo, así como las clases Bicicleta y Coche como 
        subclases de la primera. Para la clase Vehiculo, crea los métodos de 
        clase getVehiculosCreados() y getKmTotales(); así como el método de 
        instancia getKmRecorridos(). Crea también algún método específico para 
        cada una de las subclases. Prueba las clases creadas mediante una 
        aplicación que realice, al menos, las siguientes acciones:
          •Anda con la bicicleta
          •Haz el caballito con la bicicleta
          •Anda con el coche
          •Quema rueda con el coche
          •Ver kilometraje de la bicicleta
          •Ver kilometraje del coche
          •Ver kilometraje total
      -->

      <h1>Vehículos</h1>

      <div id="contenido">

        <?php
          include_once "Bicicleta.php";
          include_once "Coche.php";
          
          $bici = new Bicicleta();
          $carro = new Coche();
          
          $bici->anda();
          $bici->haceCaballito();
          
          $carro->anda();
          $carro->quemaRueda();
          
          echo "<p>La bici ha recorrido " . $bici->getKmRecorridos() . "Km.</p>";
          echo "<p>El coche ha recorrido " . $carro->getKmRecorridos() . "Km.</p>";
          echo "<p>El kilometraje total ha sido de " . Vehiculo::getKmTotales() . "Km</p>";
          echo "<p>Vehiculos creados: " . Vehiculo::getVehiculosCreados() . "</p>";
          
          
        ?>

      </div>

      <p id="author">Javier Roviralta Terrón</p>

    </div>
  </body>

</html>
