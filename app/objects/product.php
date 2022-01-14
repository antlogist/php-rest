<?php

class Product {
  private $conn;
  private $table_name = "products";

  public $answer_one;
  public $answer_two;
  public $answer_tree;
  public $answer_four;
  public $answer_five;

  public function __construct($db){
    $this->conn = $db;
  }

  public function read() {

    $query = "SELECT id, name, description, price, category_id, sub_category_id, created_at
              FROM " . $this->table_name .
        " WHERE answer_one = " . $this->answer_one . " AND answer_two = " . $this->answer_two;


    // Prepare query
    $req = $this->conn->prepare($query);

    // Ececute query
    $req->execute();

    return $req;

  }

}
