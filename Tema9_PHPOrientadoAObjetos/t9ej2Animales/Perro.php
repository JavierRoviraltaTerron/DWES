<?php
  include_once "Mamifero.php";
  
  class Perro extends Mamifero {
    
    public function __construct($c) {
      parent::__construct($c);
    }
    
    public function ladra() {
      echo "<p>guau guau</p>";
    }
    
    public function huele() {
      echo "<p>huele</p>";
    }
    
    public function babea() {
      echo "<p>está babeando</p>";
    }
    
  }
  