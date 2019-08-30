<?php

require_once "login.php";

/*
 *Connecting to MySQL using PHP
 */

// Establishing a MySQL connection
$connection = new mysqli($hostName, $username, $password, $databaseName);
if ($connection->connect_error) die ("Fatal error");

// Querying a database
$query = "SELECT * FROM classics";
$result = $connection->query($query);
if (!$result) die ("Fatal error: $connection->error");

// Displaying result on screen using method of seeking
$rows = $result->num_rows;
for ($j = 0; $j < $rows; ++$j) {
    $result->data_seek($j);
    echo "Author: " . htmlspecialchars($result->fetch_assoc()["author"]) . "<br>";
    $result->data_seek($j);
    echo "Title: " . htmlspecialchars($result->fetch_assoc()["title"]) . "<br>";
    $result->data_seek($j);
    echo "Category: " . htmlspecialchars($result->fetch_assoc()["category"]) . "<br>";
    $result->data_seek($j);
    echo "Year: " . htmlspecialchars($result->fetch_assoc()["year"]) . "<br>";
    $result->data_seek($j);
    echo "ISBN: " . htmlspecialchars($result->fetch_assoc()["isbn"]) . "<br><br>";
}

// Using method of returning one row at a time (less code same output)
$rows = $result->num_rows;
for ($j = 0; $j < $rows; ++$j) {
    $row = $result->fetch_array(MYSQLI_ASSOC);

    echo "Author: " . htmlspecialchars($row["author"]) . "<br>";
    echo "Title: " . htmlspecialchars($row["title"]) . "<br>";
    echo "Category: " . htmlspecialchars($row["category"]) . "<br>";
    echo "Year: " . htmlspecialchars($row["year"]) . "<br>";
    echo "ISBN: " . htmlspecialchars($row["isbn"]) . "<br><br>";
}

$result->close();
$connection->close();