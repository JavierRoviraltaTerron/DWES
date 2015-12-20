<?php
  
  abstract class Vehiculo {

    // atributos de clase
    private static $kilometrajeTotal = 0;
    private static $vehiculosCreados = 0;
    
    // atributos de instancia
    private $kilometraje;
    
    public function __construct() {
      $this->kilometraje = 0;
      Vehiculo::$vehiculosCreados += 1;
    }
    
    public function getVehiculosCreados() {
      return Vehiculo::$vehiculosCreados;
    }

    // método de clase
    public function getKmTotales() {
      return Vehiculo::$kilometrajeTotal;
    }
    
    public function getKmRecorridos() {
      return $this->kilometraje;
    }
    
    // metodo para instancia
    public function recorre($km) {
      $this->kilometraje += $km;
      Vehiculo::$kilometrajeTotal += $km;
    }
  }
  