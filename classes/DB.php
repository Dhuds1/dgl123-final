<?php 
class DB {
    public $con;
    public $statement;

    public function __construct($config, $user, $pass) {
        $this->config = $config;
        $this->user = $user;
        $this->pass = $pass;
        $dsn = 'mysql:'.http_build_query($config, '', ';');

        $this->conn = new PDO($dsn, $user, $pass, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($sql, $params) {
        $statement = $this->con->query->prepare($sql, $params);
        $statement->execute($params);
        return $this;
    }

    public function find(){
        return $this->statement->fetch();
    }
    public function findAll() {
        return $this->statement->fetchAll();
    }
    public function close() {
        $this->con->close();
    }
    function authorize($condition, $status = Response::FORBIDDEN){
        if (!$condition){
           echo "<p><a href='index.php'>Back</a></p>";
           echo "You don't have permission to view this ".$status;
           die();
        }
     }
}