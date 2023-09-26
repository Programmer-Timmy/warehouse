<?php

class history
{
    /**
     * @param $week
     * @return array|false
     */
    public static function getAllByWeek($week){
        global $conn;

        $stmt = $conn->prepare("SELECT ammount, direction, date, products.name FROM history JOIN products ON history.products_id = products.id where week = ");
        $stmt->bindValue(1, $week);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }

    /**
     * @param $product_id
     * @return array|false
     */
    public static function getByProduct($product_id){
        global $conn;

        $stmt = $conn->prepare("SELECT ammount, direction, date, products.name FROM history JOIN products ON history.products_id = products.id where products.id = ?");
        $stmt->bindValue(1, $product_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param $ammount
     * @param $direction
     * @param $products_id
     * @return void
     */
    public static function add($ammount, $direction, $products_id){
        global $conn;
        date_default_timezone_set('Europe/Amsterdam');
        $date = date('Y/m/d H:i:s');
        $week = date('W');

        $stmt = $conn->prepare("INSERT INTO history (ammount, direction, date, week, products_id) values (?,?,?,?,?)");
        $stmt->bindValue(1, $ammount);
        $stmt->bindValue(2, $direction);
        $stmt->bindValue(3, $products_id);
        $stmt->bindValue(4, $date);
        $stmt->bindValue(5, $week);
        $stmt->execute();
    }




}