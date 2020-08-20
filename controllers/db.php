<?php
class Database
{
  // property declaration
  private $pdo = NULL;
  private $database = 'catalog';
  private $host = 'localhost';
  private $charset = 'utf8';
  private $user = 'root';
  private $password = '';
  private $options = [];
  // method declaration
  public function __construct() {
    try {
      $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database . ';charset=' . $this->charset, $this->user, $this->password, $this->options);
      echo '<div style="display: flex;justify-content: center;"><p>connected to ' . $this->database . '!</p></div>'; // just for debugging
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
      echo '<div style="display: flex; justify-content: center;"><p>error:' . $e . '!</p></div>';
    }
  }
  //method declaration
  public function run_query($sql, $placeholders = []) {
    try {
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($placeholders);
      return $stmt;
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
      echo '<div style="display: flex; justify-content: center;"><p>error:' . $e . '!</p></div>';
    }
  }
}
?>
