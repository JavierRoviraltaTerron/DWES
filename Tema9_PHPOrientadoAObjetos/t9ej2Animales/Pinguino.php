<?php
  include_once "Ave.php";
  
  class Pinguino extends Ave {
    
    public function __construct($c) {
      parent::__construct($c);
    }
    
    public function nada() {
      echo "<p>nada</p>";
    }
    
    public function grazna() {
      echo "<p>mac mac</p>";
    }
    
    public function desliza() {
      echo "<p>se desliza</p>";
    }
    
  }
  