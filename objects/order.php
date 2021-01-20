<?php
class Order {

    // подключение к базе данных и таблице 'products' 
    private $conn;
    private $table_name = "bookings";

    // свойства объекта 
    public $id;
    public $date;
    public $timeslot;
    public $name;
    public $phone;
    public $email;
    public $address;
    public $status;

    // конструктор для соединения с базой данных 
    public function __construct($db){
        $this->conn = $db;
    }

  // метод read() - получение заказов 
  function read(){
      // выбираем все записи 
      $query = "SELECT
                  c.date as date, p.id, p.date, p.timeslot, p.name, p.phone, p.email, p.address, p.status
              FROM
                  " . $this->table_name . " p
                  LEFT JOIN
                      categories c
                          ON p.category_id = c.id
              ORDER BY
                  p.date DESC";

      // подготовка запроса 
      $stmt = $this->conn->prepare($query);

      // выполняем запрос 
      $stmt->execute();

      return $stmt;
  }
}
?>
