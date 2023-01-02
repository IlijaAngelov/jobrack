<?php

require_once 'config.php';
require_once 'Database.php';

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$db = new Database($pdo);
$db->insertUser($username, $password, $email);
header("Location: index.php");