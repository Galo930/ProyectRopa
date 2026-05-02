<?php

class Pantalon extends Prenda{
    private $tallaNumerica;
    private $largura;
    private $estilo;

    public function __construct($nombre, $marca, $precioBase, $stock, $tallaNumerica, $largura, $estilo, $id=0){
        parent::__construct($nombre, $marca, $precioBase, $stock, $id);
        $this->tallaNumerica = $tallaNumerica;
        $this->largura = $largura;
        $this->estilo = $estilo;
    }

    public function getTallaNumerica(){return $this->tallaNumerica;}
    public function getLargura(){return $this->largura;}
    public function getEstilo(){return $this->estilo;}

    public function setTallaNumerica($tallaNumerica){$this->tallaNumerica = $tallaNumerica;}
    public function setLargura($largura){$this->largura = $largura;}
    public function setEstilo($estilo){$this->estilo = $estilo;}

    public function calcularPrecioFinal(){
        $impuesto = $this->getPrecioBase() * 1.21;
        return ($this->estilo === 'Baggy') ? $impuesto + 5 : $impuesto;
    }
}