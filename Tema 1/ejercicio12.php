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
            /* Igual que el programa anterior, pero esta vez la pirámide debe 
             * aparecer invertida, con el vértice hacia abajo.*/
        
            $largo = 5;
        
            for ($i = ($largo - 1); $i >= 0; $i--) {
                for ($j = ($largo - 1) - $i; $j > 0; $j--) {
                    echo "&nbsp";
                    //echo "_"; //prueba
                }
                
                for ($k = 1 + ($i * 2); $k > 0; $k--) {
                    if ($i == ($largo - 1)) {
                        echo "*";
                    } else {
                        if (($k == 1 + ($i * 2)) || ($k == 1)) {
                            echo "*";
                        } else {
                            echo "&nbsp";
                            //echo "_"; //prueba
                        }
                    }
                }
                
                echo "<br/>";
            }
        ?>
    </body>
</html>
