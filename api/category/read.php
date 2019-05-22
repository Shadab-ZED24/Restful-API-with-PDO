<?php

//Headers

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include '../../config/Database.php';
include '../../models/Category.php';

//Instantiate DB & Connect
$databse = new Database();
$db = $databse->connect();

//Instantiate category object
$category = new Category($db);

//category query
$result = $category->read();

//Get count rows
$num = $result->rowCount();

//Check if any category
if($num > 0) {
    //category array
    $category_arr = array();
    $category_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $category_item = array(
            'id'   => $id,
            'name' => $name
        );

        //Push to "data"
        array_push($category_arr['data'], $category_item);
    }
    //Turn to JSON & output
    echo json_encode($category_arr);
} else {
    //No Categories
    echo json_encode(
        array('message' => 'No Category Found')
    );
}

