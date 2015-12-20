<?php

  class DadoPocker {
    
    private static $tiradasTotales = 0;
    
    public function __construct() {
    }
    
    public function tira() {
      return rand(0, 5);
    }
    
    public function nombreFigura() {
      $figura = [
        "As",
        "K",
        "Q",
        "J",
        "7",
        "8",
      ];
      
      DadoPocker::$tiradasTotales++;
      
      return $figura[$this->tira()];
    }
    
    public function getTiradasTotales() {
      return DadoPocker::$tiradasTotales;
    }
    
  }
  