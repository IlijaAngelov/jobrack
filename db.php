<?php
// die('hi');
// $host = "127.0.0.1";
// // $host = "localhost";
// $db = "jobrack";
// $username = "root";
// $password = "neznam";

// $dsn = "mysql:host;port=3306;dbname=$db;charset=UTF8";

// try {
//     $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

//     $conn = new PDO($dsn, $username, $password, $options);
    
//     if($conn) {
//         echo "Connected to DB";
//     }
// } catch (PDOException $e){
//     echo $e->getMessage();
// }





// $dsn = "mysql:host=localhost;port=3306;dbname=jobrack;user=root;password=neznam";
// $pdo = new PDO();
// die($dsn);

// $statement = $pdo->prepare("SELECT * FROM users");
// $statement->execute();

// $users = $statement->fetchAll(PDO::FETCH_ASSOC);

// var_dump($users);

// echo "hi";
// $mysqli  = new mysqli("127.0.0.1", "root", "neznam", "users");
// echo $mysqli;
// $uresult = $mysqli->query("SELECT * FROM users", MYSQLI_USE_RESULT);

// if ($uresult) {
//    while ($row = $uresult->fetch_assoc()) {
//        echo $row['Name'] . PHP_EOL;
//    }
// }


?>