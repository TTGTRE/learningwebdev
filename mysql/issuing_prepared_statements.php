<?php

require_once "login.php";

$connection = new mysqli($hostName, $username, $password, $databaseName);
if ($connection->connect_error) die("Error connecting to database.");

$statement = $connection->prepare("INSERT INTO classics VALUES(?, ?, ?, ?, ?)");

$author = "Emily Bronte";
$title = "Wuthering Heights";
$category = "Classic Fiction";
$year = "1847";
$isbn = "9780553212587";

// s = string
// i = integer
// d = double
// b = blob (binary data)
$statement->bind_param("sssss", $author, $title, $category, $year, $isbn);
$statement->execute();

printf("%d Row inserted.\n", $statement->affected_rows);
$statement->close();
$connection->close();
