<?php

//app/objects/product.php

class Product {
  private $conn;
  private $table_name = "products";

  public $answer_one;
  public $answer_two;
  public $answer_three;
  public $answer_four;
  public $answer_five;

  public function __construct($db){
    $this->conn = $db;
  }

  public function read() {

    //Select all the products if the user hasn’t answered any questions
    if(
        $this->answer_one == 0 &&
        $this->answer_two == 0 &&
        $this->answer_three == 0 &&
        $this->answer_four == 0 &&
        $this->answer_five == 0

        ) {

        $query = "SELECT id, name, description, price,
                        category_id, sub_category_id,
                        created_at, image_path
              FROM " . $this->table_name;

    } else {

      $sqlReq = '';
      $answers = [];

      //Get answers array
      foreach ($this as $key => $value) {
        if (!in_array($key, ['conn', 'table_name']) ) {
          if($value) {
            array_push($answers, $key);
          }
        }
      }

      //Create the SQL request to the database
      $i = 0;
      foreach ($answers as $answer) {

        if ($i == 0) {
          $sqlReq = $answer . ' = 1';
        } else {
          $sqlReq = $sqlReq . ' AND ' . $answer . ' = 1';
        }

        $i++;
      }

      $query = "SELECT id, name, description, price,
                       category_id, sub_category_id,
                       created_at, image_path
        FROM " . $this->table_name . " WHERE " . $sqlReq;

    }

    //Prepare query
    $req = $this->conn->prepare($query);

    //Ececute query
    $req->execute();

    return $req;

  }

}
