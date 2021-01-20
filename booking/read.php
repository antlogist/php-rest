<?php
// необходимые HTTP-заголовки 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// подключение базы данных и файл, содержащий объекты 
include_once '../config/database.php';
include_once '../objects/order.php';

// получаем соединение с базой данных 
$database = new Database();
$db = $database->getConnection();

// инициализируем объект 
$order = new Order($db);
 
// запрашиваем заказы 
$stmt = $order->read();
$num = $stmt->rowCount();

// проверка, найдено ли больше 0 записей 
if ($num>0) {

    // массив товаров 
    $orders_arr=array();
    $orders_arr["records"]=array();

    // получаем содержимое нашей таблицы 
    // fetch() быстрее, чем fetchAll() 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        // извлекаем строку 
        extract($row);

        $order_item=array(
            "id" => $id,
            "date" => $date,
            "timeslot" => $timeslot,
            "name" => $name,
            "phone" => $phone,
            "email" => $email,
            "address" => $address,
            "status" => html_entity_decode($status)
        );

        array_push($orders_arr["records"], $order_item);
    }

    // устанавливаем код ответа - 200 OK 
    http_response_code(200);

    // выводим данные о товаре в формате JSON 
    echo json_encode($orders_arr);
}else {

    // установим код ответа - 404 Не найдено 
    http_response_code(404);

    // сообщаем пользователю, что товары не найдены 
    echo json_encode(array("message" => "Orders not found."), JSON_UNESCAPED_UNICODE);
}
