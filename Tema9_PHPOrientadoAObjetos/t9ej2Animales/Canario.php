<?php
  include_once "Ave.php";
  
  class Canario extends Ave {
    
    public function __construct($c) {
      parent::__construct($c);
    }
    
    public function vuela() {
      echo "<p>vuela</p>";
    }
    
    public function pia() {
      echo "<p>pio pio</p>";
    }
    
    public function canta() {
      echo "<p>canta</p>";
    }
    
  }
  