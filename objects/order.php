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

    // здесь будет метод read() 
}
?>