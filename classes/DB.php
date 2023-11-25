<?php
class DB
{
  public $conn;
  public $statement;

  public function __construct($config, $user, $pass, $dbname)
  {
    $this->config = $config;
    $this->user = $user;
    $this->pass = $pass;
    $dsn = 'mysql:dbname=' . $dbname . ';' . http_build_query($config, '', ';');

    $this->conn = new PDO($dsn, $user, $pass, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
  }
  public function query($sql, $params = [])
  {
    $this->statement = $this->conn->prepare($sql);
    $this->statement->execute($params);
    return $this;
  }

  public function queryAll($sql, $params = [])
  {
    $this->statement = $this->conn->prepare($sql);
    $this->statement->execute($params);
    return $this->statement->fetchAll();
  }

  public function find()
  {
    return $this->statement->fetch();
  }
  public function findAll()
  {
    return $this->statement->fetchAll(PDO::FETCH_ASSOC);
  }
  public function rowCount()
  {
    return $this->statement->rowCount();
  }
  public function close()
  {
    $this->conn = null;
  }
  function authorize($condition, $status = Response::FORBIDDEN)
  {
    if (!$condition) {
      echo "<p><a href='index.php'>Back</a></p>";
      echo "You don't have permission to view this " . $status;
      die();
    }
  }
  public function get_store($id)
  {
    $sql = "SELECT * FROM cracked_store WHERE user_id = :id";
    $param = [":id" => $id];
    $results = $this->queryAll($sql, $param);

    if (count($results) > 0) {
      return $results[0]['slug']; // Access the first row and the 'store_slug' column
    } else {
      return false;
    }
  }
  public function get_store_name($slug)
  {
      $sql = "SELECT * FROM cracked_store WHERE slug = :slug";
      $param = [":slug" => $slug];
      $this->query($sql, $param);
      return $this->rowCount() > 0;
  } 

  public function check_login($username_or_email, $password)
  {
    // Prepare the SQL statement to check user credentials
    $sql = "SELECT * FROM cracked_user WHERE username = :username_or_email OR email = :email";
    $parameters = [':username_or_email' => $username_or_email, ':email' => $username_or_email];

    // Execute the SQL statement
    $this->query($sql, $parameters);

    // Fetch the user data
    $user = $this->find();

    // Check if the password is correct
    if ($user && password_verify($password, $user['password'])) {
      return $user; // Return user data on successful login
    }

    return false; // Return false if login fails
  }
  public function check_value($field, $value)
  {
    // Make sure $field is either 'email' or 'username' to avoid SQL injection
    $allowedFields = ['email', 'username'];
    if (!in_array($field, $allowedFields)) {
      return false; // Invalid field
    }

    // Prepare the SQL statement to check if the value exists
    $sql = "SELECT COUNT(*) FROM cracked_user WHERE $field = :value";
    $parameters = [':value' => $value];

    // Execute the SQL statement
    $this->query($sql, $parameters);

    // Fetch the result
    $count = $this->statement->fetchColumn();

    // If count is greater than 0, the value already exists
    return $count > 0;
  }
  public function clean_data($data)
  {
    $cleaned = preg_replace('/[^a-zA-Z0-9_ -]/', '', $data);
    $slugged = str_replace(' ', '-', $cleaned);
    return ["clean" => $cleaned, "slug" => $slugged];
  }
}