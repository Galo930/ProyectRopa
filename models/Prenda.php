<?php

abstract class Prenda{
    private $nombre;
    private $marca;
    private $precioBase;
    private $stock;
    private $id;

    public function __construct($nombre, $marca, $precioBase, $stock, $id=0){
        $this->nombre = $nombre;
        $this->marca = $marca;
        $this->precioBase = $precioBase;
        $this->stock = $stock;
        $this->id = $id;
    }

    public function getNombre(){return $this->nombre;}
    public function getMarca(){return $this->marca;}
    public function getPrecioBase(){return $this->precioBase;}
    public function getStock(){return $this->stock;}
    public function getId(){return $this->id;}

    public function setNombre($nombre){$this->nombre = $nombre;}
    public function setMarca($marca){$this->marca = $marca;}
    public function setPrecioBase($precioBase){$this->precioBase = $precioBase;}
    public function setStock($stock){$this->stock = $stock;}
    public function setId($id){$this->id = $id;}

    abstract public function calcularPrecioFinal();
}