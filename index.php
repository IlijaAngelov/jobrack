<?php 

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

require_once 'config.php';

require_once 'Database.php';

$db = new Database($pdo);
$rows = $db->getUsers();
// $db->insertUser($username, $password, $email);
var_dump($rows);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <title>DoorProfit</title>
</head>
<body>
    <div class="container">
        <form action="signupForm.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">

            <label for="password">Password:</label>
            <input type="password" name="password" id="password">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email">

            <button type="submit" name="submit" id="submit">Submit</button>

        </form>
    </div>
</body>
</html>
<script>
$(document).ready(function(){
    // $("#submit").click(function() {
    //     console.log('clik');
    //     return false;
    // });
    var username = $("#username").val();
    console.log(username);
    $.ajax({
        type: "POST",
        url: 'script.php',
        data: {
            username: username 
        },
        success: function(data){
            console.log(data);
        },
        error: function(xhr, status, error){
            console.log(xhr);
        }
    });
});
</script>
