<?php 
class DB {
    private $host;
    private $user;
    private $pass;
    private $db;
    private $con;

    public function __construct($host, $user, $pass, $db) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->con = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }

    public function query($sql) {
        return $this->con->query($sql);
    }
    public function close() {
        $this->con->close();
    }
}

