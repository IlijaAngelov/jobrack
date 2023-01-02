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
        $sql = "INSERT INTO `users` (`username`, `password`, `email`) VALUES (:username, :password, :email)";
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);

        if(!$stmt->execute()) {
            print_r($stmt->errorInfo());
        } 
    }
}

?>