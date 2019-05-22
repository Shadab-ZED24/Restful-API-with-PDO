<?php

class Category {
    //DB Stuff
    private $conn;
    private $table = 'categories';

    //Constructor
    public function __construct($db){
        $this->conn = $db;
    }

    //Get Categories
    public function read(){
        //Create Query
        $query = "SELECT id, name, created_at FROM `".$this->table."` ORDER BY created_at DESC";

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Execute Query
        $stmt->execute();

        return $stmt;
    }
}