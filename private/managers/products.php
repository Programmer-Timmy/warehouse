<?php

class products
{
    /**
     * @return array|false
     */
    public static function getAll($category_id = null)
    {
        global $conn;

        if ($category_id == null) {
            $stmt = $conn->prepare("SELECT products.id, products.name, ammount, json_img_url, qr_url, category.name as category, racks.number as rack FROM products join category on products.category_id = category.id join racks on products.racks_id = racks.id");
            $stmt->execute();

        } else {
            $stmt = $conn->prepare("SELECT products.id, products.name, ammount, json_img_url, qr_url, category.name as category, racks.number as rack FROM products join category on products.category_id = category.id join racks on products.racks_id = racks.id where category_id =?");
            $stmt->bindValue(1, $category_id);
            $stmt->execute();

        }
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function get($id)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT products.id, products.name, ammount, json_img_url, qr_url, category.name as category, racks.number as rack FROM products join category on products.category_id = category.id join racks on products.racks_id = racks.id WHERE products.id = ?");
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function edit($id, $name, $amount, $oldammount, $category_id, $racks_id)
    {
        global $conn;
        $stmt = $conn->prepare("UPDATE products SET name =? , ammount =? , category_id =? , racks_id=? WHERE id =?");
        $stmt->bindValue(1, htmlspecialchars($name));
        $stmt->bindValue(2, $amount);
        $stmt->bindValue(3, $category_id);
        $stmt->bindValue(4, $racks_id);
        $stmt->bindValue(5, $id);
        $stmt->execute();

        $total = $amount - $oldammount;

        if ($total !== 0) {

            history::add($total, $amount, $id);

        }
        header("location:productpage?id=$id");
    }

    public static function add($name, $amount, $category_id, $racks_id, $files)
    {
        $locations = self::imgUpload($files);
        global $conn;

        $stmt = $conn->prepare("INSERT INTO products (name, ammount, qr_url, json_img_url, category_id, racks_id) values (?,?,?,?,?,?)");
        $stmt->bindValue(1, htmlspecialchars($name));
        $stmt->bindValue(2, $amount);
        $stmt->bindValue(3, uniqid());
        $stmt->bindValue(4, $locations);
        $stmt->bindValue(5, $category_id);
        $stmt->bindValue(6, $racks_id);
        $stmt->execute();

        history::add($amount, $amount, $conn->lastInsertId());

        header('location:home');
    }

    public static function changeAmount($id, $amount, $oldAmount)
    {
        $total = $oldAmount - $amount;

        global $conn;
        $stmt = $conn->prepare("UPDATE products SET ammount =? WHERE id =?");
        $stmt->bindValue(1, $total);
        $stmt->bindValue(2, $id);
        $stmt->execute();

        history::add('-' . $amount, $total, $id);

        header('location:scanproduct');

    }

    public static function delete($id, $images)
    {
        history::delete($id);
        global $conn;
        $stmt = $conn->prepare("DELETE FROM products WHERE id= ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        foreach ($images as $image) {
            unlink('../public/' . $image);
        }

        header('location:home');
    }

    private static function imgUpload($files)
    {
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        $locations = [];

        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
        $fileNames = array_filter($files['name']);
        if (!empty($fileNames)) {
            foreach ($files['name'] as $key => $val) {
                $filename = basename($files['name'][$key]);
                $targetFilePath = '../public/img/' . uniqid() . $filename;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server
                    if (move_uploaded_file($files["tmp_name"][$key], $targetFilePath)) {
                        array_push($locations, str_replace('../public/', '', $targetFilePath));
                    } else {
                        $errorUpload .= $files['name'][$key] . ' | ';
                    }
                } else {
                    $errorUploadType .= $files['name'][$key] . ' | ';
                }

            }
        }
        return json_encode($locations);

    }

    public static function getByQR($id)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT products.id, products.name, ammount, qr_url, category.name as category, racks.number as rack FROM products join category on products.category_id = category.id join racks on products.racks_id = racks.id WHERE products.QR_url = ?");
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}