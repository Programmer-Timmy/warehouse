<?php
require_once '/static/database.php';

class products
{
    public static function GetAll(){
        global $conn;
        $stmt = $conn->prepare("SELECT products.id, products.name, ammount, json_img_url, category.name as category, racks.number as rack FROM products join category on products.category_id = category.id join racks on products.racks_id = racks.id");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}