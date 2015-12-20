<?php

  include_once "Vehiculo.php";
  
  class Bicicleta extends Vehiculo {
    
    public function __construct($c) {
      parent::__construct($c);
    }
    
    public function anda() {
      $this->recorre(20);
      echo "<p>La bicicleta está andando.</p>";
    }
    
    public function haceCaballito() {
      echo "<p>La bicicleta está haciendo el caballito.</p>";
    }
    
  }
  