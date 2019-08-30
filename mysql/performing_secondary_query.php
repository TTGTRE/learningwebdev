<?php

require_once "login.php";

$connection = new mysqli($hostName, $username, $password, $databaseName);
if ($connection->connect_error) die("Error connecting to database");

$result = $connection->query("SELECT * FROM customers");
if (!$result) die("Error querying database.");

$rowCount = $result->num_rows;

for ($i = 0; $i < $rowCount; ++$i) {
    $row = $result->fetch_array(MYSQLI_NUM);
    echo htmlspecialchars($row[0]) . " puchased ISBN " . htmlspecialchars($row[1]) . ":<br>";

    $subqueryResult = $connection->query("SELECT * FROM classics WHERE isbn='$row[1]'");
    if (!$subqueryResult) die("Error performing subquery.");

    $subqueryRow = $subqueryResult->fetch_array(MYSQLI_NUM);
    echo "&nbsp;&nbsp;" . htmlspecialchars("'$subqueryRow[1]'") . " by " . htmlspecialchars($subqueryRow[0]) . "<br><br>";
}