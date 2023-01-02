<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

require_once 'config.php';
require_once 'Database.php';

// GET THE DATA
// Instantiate the class
// Error Handlers

if(isset($_POST["submit"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $db = new Database($pdo);
    $rows = $db->getUsers();
    $db->insertUser($username, $password, $email);

}