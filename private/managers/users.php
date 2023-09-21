<?php

class users
{
    public static function login($email, $password){

            global $conn;
            $stmt = $conn->prepare("SELECT id, password_hash FROM users WHERE email = ?");
            $stmt->bindValue(1, $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_OBJ);
            if($user !== ''){
                if(password_verify($password, $user->password_hash)){
                    $_SESSION['user'] = $user->id;
                } else {
                    return 'Wachtwoord of E-mail onjuist';
                }
            }else{
                return 'Wachtwoord of E-mail onjuist';
            }
    }
}