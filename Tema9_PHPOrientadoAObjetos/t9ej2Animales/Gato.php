<?php
  include_once "Mamifero.php";
  
  class Gato extends Mamifero {
    public function __construct($c) {
      parent::__construct($c);
    }
    
    public function maulla() {
      echo "<p>miau miau</p>";
    }
    
    public function bufa() {
      echo "<p>fffffffffffff</p>";
    }
    
    public function ronronea() {
      echo "<p>prrrrrrrrn prrrrrrrn</p>";
    }
  }
  