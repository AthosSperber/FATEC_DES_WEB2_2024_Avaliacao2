<?php
class Cadastro {
    private $conn;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vestibular";

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }

    public function __destruct() {
        $this->conn = null;
    }

    public function cadastrarCandidato($nome, $curso) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO candidatos (nome, curso) VALUES (:nome, :curso)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':curso', $curso);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Erro ao cadastrar candidato: " . $e->getMessage();
            return false;
        }
    }

    public function listarCandidatos() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM candidatos");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Erro ao listar candidatos: " . $e->getMessage();
            return false;
        }
    }
}
?>
