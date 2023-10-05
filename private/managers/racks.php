<?php

class racks
{
    public static function add($rack){
        global $conn;

        $stmt = $conn->prepare('INSERT INTO racks (number) VALUES (?)');
        $stmt->bindValue(1, $rack);
        $stmt->execute();
        header('location:racks_categories');
    }

    public static function delete($id){
        global $conn;

        $stmt = $conn->prepare("DELETE FROM racks where id = ?");
        $stmt->bindValue(1, $id);
        try {
            $stmt->execute();
            header('location:racks_categories');
        } catch (Exception){
            return '<script>alert("Verplaats eerst de producten!")</script>';
        }
    }

    public static function getAll(){
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM racks ORDER BY number');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}