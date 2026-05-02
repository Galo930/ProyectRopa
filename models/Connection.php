<?php
class Connection{
    private static $instance = null;
    protected $conn;
    private $config="conf.json";

    public function __construct(){
        $this->makeConnection();
    }
    public static function getInstance(){
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function makeConnection(){
    try {
         if (!file_exists($this->config)) {
            throw new Exception("Archivo de configuración no encontrado: " . $this->config);
         }
        $configData = file_get_contents($this->config);
        $c = json_decode($configData, true);
        $dsn = "mysql:host=". $c['host'] . ";dbname=" . $c['db'];
        $this->conn = new PDO($dsn, $c['userName'], $c['pasword']);
         }
    catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage() . "<br>";
        echo "Codigo de error MySQL: " . $e->getCode() . "<br>";
    }
    catch (Exception $e) {
            echo "Error: " . $e->getMessage() . "<br>";
    }
    }   
    public function getConnection(){
        return $this->conn;
    }
    public function __destruct(){
        $this->conn = null;
    }
    private function __clone() { }
}