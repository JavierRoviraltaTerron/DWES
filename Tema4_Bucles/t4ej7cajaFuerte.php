<!DOCTYPE html>
<html>

  <head>
    <title>Ejercicio 7</title>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Roviralta Terrón">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <div id="contenedor">
      <!--
        Ejercicio 7
        Realiza el control de acceso a una caja fuerte. La combinación será un 
        número de 4 cifras. El programa nos pedirá la combinación para abrirla. 
        Si no acertamos, se nos mostrará el mensaje “Lo siento, esa no es la 
        combinación” y si acertamos se nos dirá “La caja fuerte se ha abierto 
        satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja 
        fuerte.
      -->

      <h1>Acceso a caja fuerte</h1>
        
      
      
      <?php
        $claveValida = 1234;
        
        // variables que dependen de si ya han recibido valor del formulario o no
        if (isset($_POST['contadorIntentos'])) {
          $claveIntroducida = $_POST['claveIntroducida'];
          $contadorIntentos = $_POST['contadorIntentos'];
        } else {
          $claveIntroducida = 10000; // numero fuera del rango para inicializar variable
          $contadorIntentos = 4;
        }
        
        // condiciones para 
        
        if ($claveIntroducida == $claveValida) { // acierto
          echo "La caja fuerte se ha abierto satisfactoriamente";
        } else if ($contadorIntentos == 0) { // fin de intentos
          echo "Lo siento, esa no es la combinación. Acceso denegado.";
        } else { // intentos
          $contadorIntentos--;
      ?>
      <p>Por favor, introduzca la contraseña</p>
      
      <form action="t4ej7cajaFuerte.php" method="post">
        <input type="number" min="0" max="9999" name="claveIntroducida" autofocus/>
        <input type="hidden" name="contadorIntentos" value="<?php echo $contadorIntentos; ?>"/>
        <input type="submit" value="Enviar"/>
      </form>      
      <?php
          if ($contadorIntentos < 3) {
            echo "Lo siento, esa no es la combinación. Intentos restantes: " 
            . $contadorIntentos;        
          }    
        }
      ?>
      
    </div>
  </body>

</html>
