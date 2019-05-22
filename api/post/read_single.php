<?php

//Headers

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include '../../config/Database.php';
include '../../models/Post.php';

//Instantiate DB & Connect
$databse = new Database();
$db = $databse->connect();

//Instantiate blog post object
$post = new Post($db);

//Get ID
$post->id = isset($_GET['id']) ? $_GET['id'] : die();

//Get Post
$post->read_single();

//Create Array
$post_arr = array(
    'id'            => $post->id,
    'tiitle'        => $post->title,
    'body'          => $post->body,
    'author'        => $post->author,
    'category_id'   => $post->category_id,
    'category_name' => $post->category_name
);

//Make JSON
print_r(json_encode($post_arr)); 