<?php

class products
{
    /**
     * @return array|false
     */
    public static function getAll()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT products.id, products.name, ammount, json_img_url, qr_url, category.name as category, racks.number as rack FROM products join category on products.category_id = category.id join racks on products.racks_id = racks.id");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function get($id)
    {

    }

    public static function edit($id, $name, $amount, $json_img_url, $category_id, $racks_id)
    {

    }

    public static function add($name, $amount, $category_id, $racks_id, $files)
    {
        $locations = self::imgUpload($files);
        global $conn;

        $stmt = $conn->prepare("INSERT INTO products (name, ammount, qr_url, json_img_url, category_id, racks_id) values (?,?,?,?,?,?)");
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $amount);
        $stmt->bindValue(3, uniqid());
        $stmt->bindValue(4, $locations);
        $stmt->bindValue(5, $category_id);
        $stmt->bindValue(6, $racks_id);
        $stmt->execute();
    }

    public static function changeAmount($id, $amount, $direction)
    {

    }

    public static function delete()
    {

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
}