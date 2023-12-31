<?php

class history
{
    /**
     * @param $week
     * @return array|false
     */
    public static function getAllByWeek($week){
        global $conn;

        $stmt = $conn->prepare("SELECT history.ammount, total, date, products.name, firstname, lastname, week FROM history JOIN products ON history.products_id = products.id JOIN users on history.users_id = users.id where week = ?");
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

        $stmt = $conn->prepare("SELECT history.ammount, total, date, products.name, firstname, lastname FROM history JOIN products ON history.products_id = products.id JOIN users on history.users_id = users.id  where products.id = ?");
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
    public static function add($ammount, $total, $products_id)
    {
        global $conn;
        date_default_timezone_set('Europe/Amsterdam');
        $date = date('Y/m/d H:i:s');
        $week = date('W');

        if ($ammount > 0) {
            $ammount = '+' . $ammount;
        }

        $stmt = $conn->prepare("INSERT INTO history (ammount, total, date, week, products_id, users_id) values (?,?,?,?,?,?)");
        $stmt->bindValue(1, $ammount);
        $stmt->bindValue(2, $total);
        $stmt->bindValue(3, $date);
        $stmt->bindValue(4, $week);
        $stmt->bindValue(5, $products_id);
        $stmt->bindValue(6, $_SESSION['user']);
        $stmt->execute();
    }

    public static function delete($id)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM history WHERE products_id= ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
    public static function deleteByUser($id)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM history WHERE users_id= ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }




}