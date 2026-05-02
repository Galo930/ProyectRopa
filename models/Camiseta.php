<?php

class Camiseta extends Prenda{
    private $talla;
    private $tipoCuello;
    private $tejido;

    public function __construct($nombre, $marca, $precioBase, $stock, $talla, $tipoCuello, $tejido, $id=0){
        parent::__construct($nombre, $marca, $precioBase, $stock, $id);
        $this->talla = $talla;
        $this->tipoCuello = $tipoCuello;
        $this->tejido = $tejido;
    }

    public function getTalla(){return $this->talla;}
    public function getTipoCuello(){return $this->tipoCuello;}
    public function getTejido(){return $this->tejido;}

    public function setTalla($talla){$this->talla = $talla;}
    public function setTipoCuello($tipoCuello){$this->tipoCuello = $tipoCuello;}
    public function setTejido($tejido){$this->tejido = $tejido;}

    public function calcularPrecioFinal() {
        return $this->getPrecioBase() * 1.21;
    }   
}