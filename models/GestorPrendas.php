<?php
class GestorPrendas extends Connection{
    public function __construct(){
        parent::__construct();
    }
    public function listar(){
        $conn = $this->getConnection();
        $prendas = [];
        try {
            $sqlCamisetas = "SELECT * FROM prendas WHERE tipo = 'camiseta'";
            $stmtCamisetas = $conn->query($sqlCamisetas);
            while ($row = $stmtCamisetas->fetch(PDO::FETCH_ASSOC)) {
                $prendas[] = new Camiseta($row['nombre'], $row['marca'], $row['precioBase'], $row['stock'], $row['talla'], $row['tipoCuello'], $row['tejido'], $row['id']);
            }
            $sqlPantalones = "SELECT * FROM prendas WHERE tipo = 'pantalon'";
            $stmtPantalones = $conn->query($sqlPantalones);
            while ($row = $stmtPantalones->fetch(PDO::FETCH_ASSOC)) {
               $prendas[] = new Pantalon($row['nombre'], $row['marca'], $row['precioBase'], $row['stock'], $row['tallaNumerica'], $row['largura'], $row['estilo'], $row['id']);
            }
        } catch (PDOException $e) {
            echo "Error al listar prendas: " . $e->getMessage() . "<br>";
        }
        return $prendas;
        }
    

    public function agregarPrenda(Prenda $prenda) {
    $conn = $this->getConnection();
    
    try {
        $sql = "INSERT INTO prendas (nombre, marca, precioBase, stock, tipo, talla, tipoCuello, tejido, tallaNumerica, largura, estilo) 
                VALUES (:nombre, :marca, :precioBase, :stock, :tipo, :talla, :tipoCuello, :tejido, :tallaNumerica, :largura, :estilo)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':nombre', $prenda->getNombre());
        $stmt->bindValue(':marca', $prenda->getMarca());
        $stmt->bindValue(':precioBase', $prenda->getPrecioBase());
        $stmt->bindValue(':stock', $prenda->getStock());

        if ($prenda instanceof Camiseta) {
            $stmt->bindValue(':tipo', 'camiseta');
            $stmt->bindValue(':talla', $prenda->getTalla());
            $stmt->bindValue(':tipoCuello', $prenda->getTipoCuello());
            $stmt->bindValue(':tejido', $prenda->getTejido());
            $stmt->bindValue(':tallaNumerica', null, PDO::PARAM_NULL);
            $stmt->bindValue(':largura', null, PDO::PARAM_NULL);
            $stmt->bindValue(':estilo', null, PDO::PARAM_NULL);
            
        } elseif ($prenda instanceof Pantalon) {
            $stmt->bindValue(':tipo', 'pantalon');
            $stmt->bindValue(':tallaNumerica', $prenda->getTallaNumerica());
            $stmt->bindValue(':largura', $prenda->getLargura()); 
            $stmt->bindValue(':estilo', $prenda->getEstilo());
            $stmt->bindValue(':talla', null, PDO::PARAM_NULL);
            $stmt->bindValue(':tipoCuello', null, PDO::PARAM_NULL);
            $stmt->bindValue(':tejido', null, PDO::PARAM_NULL);
        }
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error al insertar la prenda: " . $e->getMessage();
    }
}
    public function obtener($id){
        $conn = $this->getConnection();
        try {
            $sql = "SELECT * FROM prendas WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                if ($row['tipo'] === 'camiseta') {
                    return new Camiseta($row['nombre'], $row['marca'], $row['precioBase'], $row['stock'], $row['talla'], $row['tipoCuello'], $row['tejido'], $row['id']);
                } elseif ($row['tipo'] === 'pantalon') {
                    return new Pantalon($row['nombre'], $row['marca'], $row['precioBase'], $row['stock'], $row['tallaNumerica'], $row['largura'], $row['estilo'], $row['id']);
                }
            }
        } catch (PDOException $e) {
            echo "Error al obtener prenda: " . $e->getMessage() . "<br>";
        }
    }
    public function actualizarPrenda(Prenda $prenda) {
    $conn = $this->getConnection();
    try {
        $sql = "UPDATE prendas SET 
                nombre = :nombre, marca = :marca, precioBase = :precioBase, stock = :stock, 
                talla = :talla, tipoCuello = :tipoCuello, tejido = :tejido, 
                tallaNumerica = :tallaNumerica, largura = :largura, estilo = :estilo 
                WHERE id = :id";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $prenda->getId());
        $stmt->bindValue(':nombre', $prenda->getNombre());
        $stmt->bindValue(':marca', $prenda->getMarca());
        $stmt->bindValue(':precioBase', $prenda->getPrecioBase());
        $stmt->bindValue(':stock', $prenda->getStock());

        if ($prenda instanceof Camiseta) {
            $stmt->bindValue(':talla', $prenda->getTalla());
            $stmt->bindValue(':tipoCuello', $prenda->getTipoCuello());
            $stmt->bindValue(':tejido', $prenda->getTejido());
            $stmt->bindValue(':tallaNumerica', null, PDO::PARAM_NULL);
            $stmt->bindValue(':largura', null, PDO::PARAM_NULL);
            $stmt->bindValue(':estilo', null, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(':talla', null, PDO::PARAM_NULL);
            $stmt->bindValue(':tipoCuello', null, PDO::PARAM_NULL);
            $stmt->bindValue(':tejido', null, PDO::PARAM_NULL);
            $stmt->bindValue(':tallaNumerica', $prenda->getTallaNumerica());
            $stmt->bindValue(':largura', $prenda->getLargura());
            $stmt->bindValue(':estilo', $prenda->getEstilo());
        }
        $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error al actualizar: " . $e->getMessage());
    }
}
    public function eliminar($id){
        $conn = $this->getConnection();
        try {
            $sql = "DELETE FROM prendas WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar prenda: " . $e->getMessage() . "<br>";
        }
    }
    public function registrarUsuario(Usuario $usuario) {
    try {
        $sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':password', $usuario->getPassword());
        return $stmt->execute();
    } catch (PDOException $e) {
        return false;
    }
}

    public function buscarUsuarioPorEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $value = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($value) {
            return new Usuario($value['email'], $value['password'], $value['id']);
        }
        return false;
}
}