<?php

  include_once "Vehiculo.php";
  
  class Coche extends Vehiculo {
    
    public function __construct($c) {
      parent::__construct($c);
    }
    
    public function anda() {
      $this->recorre(50);
      echo "<p>El coche está andando.</p>";
    }
    
    public function quemaRueda() {
      echo "<p>El coche está quemando rueda.</p>";
    }
    
  }
  