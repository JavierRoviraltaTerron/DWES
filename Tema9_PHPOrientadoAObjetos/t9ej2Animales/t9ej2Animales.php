<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 2</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Crea las clases Animal, Mamifero, Ave, Gato, Perro, Canario, Pinguino y 
        Lagarto. Crea, al menos, tres métodos específicos de cada clase y 
        redefine el/los método/s cuando sea necesario. Prueba las clases en un 
        programa en el que se instancien objetos y se les apliquen métodos. 
        Puedes aprovechar las capacidades que proporciona HTML y CSS para 
        incluir imágenes, sonidos, animaciones, etc. para representar acciones 
        de objetos; por ejemplo, si el canario canta, el perro ladra, o el ave 
        vuela.
      -->

      <h1>Animales</h1>

      <div id="contenido">

        <?php
          //include_once "Ave.php";
          include_once "Canario.php";
          include_once "Pinguino.php";
          include_once "Perro.php";
          include_once "Gato.php";
          include_once "Lagarto.php";
          
          //$pajaro1 = new Ave("hembra");
          $canario1 = new Canario("hembra");
          $pinguino1 = new Pinguino();
          $perro1 = new Perro();
          $gato1 = new Gato();
          $lagarto1 = new Lagarto();
          
          /*
          echo "<h3>Ave</h3>";
          
          echo "<p>" . $pajaro1->getSexo() . "</p>";
          $pajaro1->camina();
          $pajaro1->picotea();
          $pajaro1->aletea();
          $pajaro1->come();
          */
          echo "<h3>Canario</h3>";
          
          echo "<p>" . $canario1->getSexo() . "</p>";
          $canario1->bebe();
          $canario1->picotea();
          $canario1->vuela();
          $canario1->pia();
          $canario1->canta();
          
          echo "<h3>Pinguino</h3>";
          echo "<p>" . $pinguino1->getSexo() . "</p>";
          $pinguino1->duerme();
          $pinguino1->aletea();
          $pinguino1->nada();
          $pinguino1->grazna();
          $pinguino1->desliza();
          
          echo "<h3>Perro</h3>";
          echo "<p>" . $perro1->getSexo() . "</p>";
          $perro1->come();
          $perro1->corre();
          $perro1->juega();
          $perro1->ladra();
          $perro1->huele();
          $perro1->babea();
          
          echo "<h3>Gato</h3>";
          echo "<p>" . $gato1->getSexo() . "</p>";
          $gato1->duerme();
          $gato1->mama();
          $gato1->maulla();
          $gato1->bufa();
          $gato1->ronronea();
          
          echo "<h3>Lagarto</h3>";
          echo "<p>" . $lagarto1->getSexo() . "</p>";
          $lagarto1->come();
          $lagarto1->repta();
          $lagarto1->desova();
          $lagarto1->ataca();
          
          echo "<p>Total animales creados: " . Animal::getContadorAnimales() . "</p>";
        ?>

      </div>

      <p id="autor">Javier Roviralta Terrón</p>

    </div>
  </body>

</html>
