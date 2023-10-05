<?php

class category
{
    public static function add($name){
        global $conn;

        $stmt = $conn->prepare('INSERT INTO category (name) VALUES (?)');
        $stmt->bindValue(1, $name);
        $stmt->execute();
        header('location:racks_categories');
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