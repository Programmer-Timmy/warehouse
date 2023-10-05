<?php

class users
{
    /**
     * @param $email
     * @param $password
     * @return string|void
     */
    public static function login($email, $password){

            global $conn;
            $stmt = $conn->prepare("SELECT id, password_hash FROM users WHERE email = ?");
            $stmt->bindValue(1, $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_OBJ);
            if($user !== ''){
                if(password_verify($password, $user->password_hash)){
                    $_SESSION['user'] = $user->id;
                    header('location:home');

                } else {
                    return 'Wachtwoord of E-mail onjuist';
                }
            }else{
                return 'Wachtwoord of E-mail onjuist';
            }
    }

    public static function getAll(){
        global $conn;

        $stmt = $conn->prepare("SELECT id, email, firstname, lastname FROM users");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function get($id){
        global $conn;

        $stmt = $conn->prepare("SELECT email, firstname, lastname FROM users WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function add($email, $password, $firstname, $lastname){
        global $conn;
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (email, password_hash, firstname, lastname) values (?,?,?,?)");
        $stmt->bindValue(1, htmlspecialchars($email));
        $stmt->bindValue(2, $password_hash);
        $stmt->bindValue(3, htmlspecialchars($firstname));
        $stmt->bindValue(4, htmlspecialchars($lastname));
        $stmt->execute();
        header('location:users');
    }

    public static function edit($id, $email, $password, $firstname,$lastname){
        if ($password == ""){
            $password_hash = self::getPasword($id);
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
        }
        global $conn;

        $stmt = $conn->prepare("UPDATE users SET email = ?, password_hash =?, firstname =?, lastname=? WHERE id = ?");
        $stmt->bindValue(1, htmlspecialchars($email));
        $stmt->bindValue(2, $password_hash);
        $stmt->bindValue(3, htmlspecialchars($firstname));
        $stmt->bindValue(4, htmlspecialchars($lastname));
        $stmt->bindValue(5, $id);
        $stmt->execute();
        header('location:users');
    }

    public static function delete($id){
        global $conn;
        history::deleteByUser($id);

        $stmt = $conn->prepare('DELETE FROM users WHERE id =?');
        $stmt->bindValue(1, $id);
        $stmt->execute();
        header('location:users');
    }

    private static function getPasword($id){
        global $conn;

        $stmt = $conn->prepare("SELECT password_hash FROM users WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $password = $stmt->fetch(PDO::FETCH_OBJ);
        return $password->password_hash;
    }
}