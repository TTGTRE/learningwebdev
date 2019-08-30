<?php
require_once "login.php";

$connection = new mysqli($hostName, $username, $password, $databaseName);
if ($connection->connect_error) die("Error connecting to database.");

$result = $connection->query("INSERT INTO cats VALUES(NULL, 'Bear', 'Bubbly', '3')");
if (!$result) die("Error querying database.");

echo "The Insert ID was: $connection->insert_id.";