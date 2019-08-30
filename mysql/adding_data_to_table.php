<?php
/*
 * Adding data to a table
 */
require_once "login.php";

$connection = new mysqli($hostName, $username, $password, $databaseName);
if ($connection->connect_error) die("Error connecting to database.");

$result = $connection->query("INSERT INTO cats VALUES(NULL, 'Lion', 'Leo', 4)");
$result = $connection->query("INSERT INTO cats VALUES(NULL, 'Cougar', 'Growler', 2)");
$result = $connection->query("INSERT INTO cats VALUES(NULL, 'Cheetah', 'Charly', 3)");
if (!$result) die("Error inserting data into database.");