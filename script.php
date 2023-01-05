<?php

require_once 'config.php';
require_once 'Database.php';

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if ($_POST['type'] === "checkDuplicate") {
    $checkUser = new Database($pdo);
    $result = $checkUser->checkDuplicateUsername($username);
} else if($_POST['type'] == "insertUser") {
    $db = new Database($pdo);
    $db->insertUser($username, $password, $email); 
}