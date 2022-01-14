<?php

//app/database.php

require_once __DIR__ . "../../..//bootstrap/init.php";

class Database {

  public  $conn;

  private function __construct() {
    $this->conn = null;

    try {
      $this->conn = new PDO("mysql:host=" . $_SERVER['APP_HOST'] . ";dbname=" . $_SERVER['APP_DBNAME'], $_SERVER['APP_USERNAME'], $_SERVER['APP_PASSWORD']);
      $this->conn->exec("set names utf8mb4");
    } catch(PDOException $exception){
        echo "Connection error: " . $exception->getMessage();
    }
  }

  private static $instance = null;

  public static function getInstance(){

    if(is_null(self::$instance)) {
      self::$instance = new self;
    }

    return self::$instance;

  }

  private function __clone() {}
  private function __wakeup() {}

}
