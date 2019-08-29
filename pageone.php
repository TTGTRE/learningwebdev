<?php
require_once "login.php";

/*
 * Chapter 10: Connecting to MySQL using PHP
 */

// Establishing a MySQL connection
$connection = new mysqli($hostName, $username, $password, $database);
if ($connection->connect_error) die ("Fatal error");

// Querying a database
$query = "SELECT * FROM classics";
$result = $connection->query($query);
if (!$result) die ("Fatal error: $connection->error");

// Displaying result on screen
$rows = $result->num_rows;
for ($j = 0; $j < $rows; $j++) {
    $result->data_seek($j);
    echo "Author: " . htmlspecialchars($result->fetch_assoc()["author"]) . "<br>";
    echo "Title: " . htmlspecialchars($result->fetch_assoc()["title"]) . "<br>";
    echo "Category: " . htmlspecialchars($result->fetch_assoc()["category"]) . "<br>";
    echo "Year: " . htmlspecialchars($result->fetch_assoc()["year"]) . "<br>";
    echo "ISBN: " . htmlspecialchars($result->fetch_assoc()["isbn"]) . "<br><br>";
}

$result->close();
$connection->close();
