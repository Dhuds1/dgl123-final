<?php 
class DB {
    public $conn;
    public $statement;

    public function __construct($config, $user, $pass, $dbname) {
        $this->config = $config;
        $this->user = $user;
        $this->pass = $pass;
        $dsn = 'mysql:dbname=' . $dbname . ';' . http_build_query($config, '', ';');
    
        $this->conn = new PDO($dsn, $user, $pass, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    public function query($sql, $params = []) {
        $this->statement = $this->conn->prepare($sql);
        $this->statement->execute($params);
        return $this;
    }
    
    public function queryAll($sql, $params = []) {
        $this->statement = $this->conn->prepare($sql);
        $this->statement->execute($params);
        return $this->statement->fetchAll();
    }
    
    public function find(){
        return $this->statement->fetch();
    }
    public function findAll() {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function close() {
        $this->conn = null;
    }
    function authorize($condition, $status = Response::FORBIDDEN){
        if (!$condition){
           echo "<p><a href='index.php'>Back</a></p>";
           echo "You don't have permission to view this ".$status;
           die();
        }
     }
}