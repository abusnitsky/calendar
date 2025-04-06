<?php
class db
{
    private $host = "localhost";
    private $user = 'root';
    private $pass = '';
    private $db_name = 'calendar_db';

    protected PDO $pdo;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $con = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $this->pdo = new PDO($con, $this->user, $this->pass);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    protected function query(string $sql, array $params = []): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
