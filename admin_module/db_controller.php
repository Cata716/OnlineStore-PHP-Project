<?php
class db_controller
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "magazin2proiect";
    private $conn;
    function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->database}",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            die("Eroare la conectare: " . $e->getMessage());
        }
    }

    public function getDBResult($query, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception("Eroare la executarea interogarii: " . $e->getMessage());
        }
    }

    public function updateDB($query, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception("Eroare la executarea interogarii" . $e->getMessage());
        }
    }

    public function getConnection($query, $params = [])
    {
        return $this->conn;
    }
}
?>