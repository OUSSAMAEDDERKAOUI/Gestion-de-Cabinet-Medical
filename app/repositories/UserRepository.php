<?php
require_once(__DIR__ . '/../models/User.php');  
require_once(__DIR__ . '/../config/database.php');  

class UserRepository {
    public function findByEmailAndPassword($email, $password) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user &&  $user['password']) {
            return new User(
                $user['id'], 
                $user['first_name'], 
                $user['last_name'], 
                $user['phone'], 
                $user['email'], 
                $user['password'], 
                $user['role'], 
                $user['status']
            );
        }

        return null; 
    }
}
