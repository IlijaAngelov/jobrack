<?php

class Database {
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function getUsers()
    {
        $query = $this->pdo->prepare('SELECT * FROM users');
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function insertUser($username, $password, $email)
    {
        $hashedPassword = password_hash("$password", PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`username`, `password`, `email`) VALUES (:username, :password, :email)";
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);

        if(!$stmt->execute()) {
            print_r($stmt->errorInfo());
        } 
    }

    public function checkDuplicateUsername($username)
    {
        $sql = "SELECT * FROM `users` WHERE (username) = :username";
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        if(!$stmt->execute()) {
            print_r($stmt->errorInfo());
        }
        if($stmt->fetchColumn() > 0) {
            echo "Username taken!";
        }
    }
}

?>