<?php
  include_once "Animal.php";
  
  class Lagarto extends Animal {
    public function __construct($s) {
      parent::__construct($s);
    }
    
    public function repta() {
      echo "<p>repta</p>";
    }
    
    public function desova() {
      echo "<img src='img/desove.jpeg' style='height: 200px;'/>";
    }
    
    public function ataca() {
      // no muestra el video, parece que falta contenido en el html dentro del
      // iframe, lo que puede generar el fallo. El problema se ocasiona
      // por ser mostrado por una funcion
      //echo "<iframe width='420' height='315' src='https://www.youtube.com/embed/E5_eSygwrRs' frameborder='1' allowfullscreen></iframe>";
      echo "<p>ataca</p>";
      
    }
    
  }
  