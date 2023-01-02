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
        $sql = "INSERT INTO users ('username', 'password', 'email') VALUES (:username, :password, :email)";
        $stmt = $this->pdo->prepare($sql);
        $error = '';
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        // if(!$stmt->execute(['$username', '$password', '$email'])) {
        // if(!$stmt->execute(array($username, $password, $email))){
            // printf("Error: %s.\n", $stmt->error);
            // header("Location: index.php");
            // exit();
        // } else {
        //     print_r("SUCCESSFUL ENTRY");
        // }
    }
}

?>