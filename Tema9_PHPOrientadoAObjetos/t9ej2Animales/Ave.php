<?php
  include_once "Animal.php";
  
  abstract class Ave extends Animal {
    
    public function __construct($c) {
      parent::__construct($c);
    }
    
    public function camina() {
      echo "<p>camina</p>";
    }
    
    public function picotea() {
      echo "<p>toc toc</p>";
    }
    
    public function aletea() {
      echo "<p>aletea</p>";
    }
    
  }
  