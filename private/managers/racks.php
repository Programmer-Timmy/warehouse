<?php

class racks
{
    public static function add($rack){

    }

    public static function delete($id){

    }

    public static function getAll(){
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM racks');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}