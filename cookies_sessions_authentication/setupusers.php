<?php

require_once '../login.php';

$connection = new mysqli($hostName, $username, $password, $databaseName);
if ($connection->connect_error) die("Error connecting to database");

$query = "CREATE TABLE users(
          forename VARCHAR(32) NOT NULL,
          surname VARCHAR(32) NOT NULL,
          username VARCHAR(32) NOT NULL,
          password VARCHAR(255) NOT NULL
)";

$result = $connection->query($query);
if (!$result) die("Error performing query");

$forename = 'Bill';
$surname = 'Smith';
$username = 'bsmith';
$password = 'mysecret';
$hash = password_hash($password, PASSWORD_DEFAULT);

add_user($connection, $forename, $surname, $username, $hash);

function add_user(mysqli $connection, $fn, $sn, $un, $pw) {
    $stmt = $connection->prepare('INSERT INTO users VALUES(?, ?, ?, ?)');
    $stmt->bind_param('ssss', $fn, $sn, $un, $pw);
    $stmt->execute();
    $stmt->close();
}
