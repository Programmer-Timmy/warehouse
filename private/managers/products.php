<?php
require_once '/static/database.php';

class products
{
    /**
     * @return array|false
     */
    public static function getAll(){
        global $conn;
        $stmt = $conn->prepare("SELECT products.id, products.name, ammount, json_img_url, category.name as category, racks.number as rack FROM products join category on products.category_id = category.id join racks on products.racks_id = racks.id");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function get($id){

    }

    public static function edit($id, $name, $amount,$json_img_url, $category_id, $racks_id){

    }

    public static function add($name, $amount,$json_img_url, $category_id, $racks_id){

    }

    public static function changeAmount($id, $amount, $direction){

    }

    public static function delete(){

    }
}