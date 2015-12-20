<?php

  class Zona {
    
    public function __construct() {
      $this->entradas = 0;
    }
    
    public function setEntradas($ent) {
      /*
      $entAux = $this->entradas;
      $entAux += $ent;
      
      if ($entAux > 0) {
        $this->entradas += $ent;
      }
       * 
       */
      
      $this->entradas += $ent;
    }

    
    
    public function __toString() {
      return "<p>$this->entradas</p>";
    }
    
    
    
    
    
    
    
    
    
    
    
  }
  