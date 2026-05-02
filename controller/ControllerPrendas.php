<?php
class ControllerPrendas {
    private $gestor;

    public function __construct($gestor){
        $this->gestor = $gestor;
    }

    public function index(){
        $prendas = $this->gestor->listar();
        include "views/listar.php";
    }
    public function crear(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'] ?? '';
        $marca = $_POST['marca'] ?? '';
        $precioBase = $_POST['precioBase'] ?? 0;
        $stock = $_POST['stock'] ?? 0;
        $tipo = $_POST['tipo'] ?? 'camiseta';

        if ($tipo === 'camiseta') {
            $talla = $_POST['talla'] ?? '';
            $tipoCuello = $_POST['tipoCuello'] ?? '';
            $tejido = $_POST['tejido'] ?? '';
            $prenda = new Camiseta($nombre, $marca, $precioBase, $stock, $talla, $tipoCuello, $tejido);
        } else {
            $tallaNumerica = $_POST['tallaNumerica'] ?? 0;
            $largo = $_POST['largura'] ?? ''; 
            $estilo = $_POST['estilo'] ?? '';
            $prenda = new Pantalon($nombre, $marca, $precioBase, $stock, $tallaNumerica, $largo, $estilo);
        }
        $this->gestor->agregarPrenda($prenda);
        
        header("Location: index.php?accion=index");
        exit;
    } else {
        include "views/crear.php";
    }
}
   public function editar() {
    $id = $_GET['id'] ?? null;

    if (!$id) {
        header("Location: index.php?accion=index");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'] ?? '';
        $marca = $_POST['marca'] ?? '';
        $precioBase = $_POST['precioBase'] ?? 0;
        $stock = $_POST['stock'] ?? 0;
        $tipo = $_POST['tipo'] ?? '';

        if ($tipo === 'camiseta') {
            $prenda = new Camiseta($nombre, $marca, $precioBase, $stock, $_POST['talla'], $_POST['tipoCuello'], $_POST['tejido'], $id);
        } else {
            $prenda = new Pantalon($nombre, $marca, $precioBase, $stock, $_POST['tallaNumerica'], $_POST['largura'], $_POST['estilo'], $id);
        }
        $this->gestor->actualizarPrenda($prenda);
        header("Location: index.php?accion=index");
        exit;
    }
    $prenda = $this->gestor->obtener($id);
    if ($prenda) {
        include "views/editar.php";
    } else {
        header("Location: index.php?accion=index");
        exit;
    }
}
    public function eliminar() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->gestor->eliminar($id);
        }
        header("Location: index.php?accion=index");
        exit;
}

}