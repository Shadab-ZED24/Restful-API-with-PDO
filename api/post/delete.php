<?php

//Headers

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


include '../../config/Database.php';
include '../../models/Post.php';

//Instantiate DB & Connect
$databse = new Database();
$db = $databse->connect();

//Instantiate blog post object
$post = new Post($db);

//Get row posted data
$data = json_decode(file_get_contents("php://input"));

//Set ID to delete
$post->id = $data->id;

//Delete Post
if($post->delete()) {
    echo json_encode(
        array('message' => 'Post Deleted')
    );
}else{
    echo json_encode(
        array('message' => 'Post Not Deleted')
    ); 
}