<!DOCTYPE html>
<!--
    Javier Roviralta Terrón
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            /* Escribe un programa que pinte por pantalla una pirámide rellena a 
             * base de asteriscos. La base de la pirámide debe estar formada por 
             * 9 asteriscos.*/
        
            $largo = 5;
        
            for ($i = 0; $i < $largo; $i++) {
                for ($j = ($largo - 1) - $i; $j > 0; $j--) {
                    echo "&nbsp";
                    //echo "_"; //prueba
                }
                
                for ($k = 1 + ($i * 2); $k > 0; $k--) {
                    echo "*";
                }
                
                echo "<br/>";
            }
        ?>
    </body>
</html>
