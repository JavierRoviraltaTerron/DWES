<?php
  abstract class Animal {
    
    private static $contadorAnimales = 0;
    
    public function __construct($s) {
      // sexo por defecto: macho
      if (!isset($s)) {
        $s = "macho";
      }
      $this->sexo = $s;
      Animal::$contadorAnimales++;
    }
    
    public function getContadorAnimales() {
      return Animal::$contadorAnimales;
    }
    
    public function getSexo() {
      return $this->sexo;
    }
    
    public function come() {
      echo "<p>come</p>";
    }
    
    public function bebe() {
      echo "<p>bebe</p>";
    }
    
    public function duerme() {
      echo "<p>duerme</p>";
    }
    
  }
  