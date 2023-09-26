<?php

class category
{
    public static function add($name){

    }

    public static function delete($id){

    }

    public static function getAll(){
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM category');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}