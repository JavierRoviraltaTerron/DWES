<?php
  include_once "Animal.php";
  
  abstract class Mamifero extends Animal {
    
    public function __construct($c) {
      parent::__construct($c);
    }
    
    public function corre() {
      echo "<p>corre</p>";
    }
    
    public function mama() {
      echo "<p>chup chup</p>";
    }
    
    public function juega() {
      echo "<p>juega</p>";
    }
    
  }
  