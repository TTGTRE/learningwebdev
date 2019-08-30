<?php
/*
 * Retrieving data from table
 */
require_once "login.php";

$connection = new mysqli($hostName, $username, $password, $databaseName);
if ($connection->connect_error) die("Error connecting to database.");

$result = $connection->query("SELECT * FROM cats");
if (!$result) die("Error querying database.");

$rows = $result->num_rows;
echo "<table><tr><th>Id</th><th>Family</th><th>Name</th><th>Age</th></tr>";
for ($i = 0; $i < $rows; ++$i) {
    $currentRow = $result->fetch_array(MYSQLI_NUM);
    echo "<tr>";
    for ($j = 0; $j < count($currentRow); ++$j) {
        echo "<td>$currentRow[$j]</td>";
    }
    echo "</tr>";
}
echo "</table>";
