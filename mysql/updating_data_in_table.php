<?php
/*
 * Updating data in table
 */

require_once "login.php";

$connection = new mysqli($hostName, $username, $password, $databaseName);
if ($connection->connect_error) die("Error connection to database.");

$result = $connection->query("UPDATE cats SET name='Charlie' WHERE name='Charly'");
if (!$result) die("Error querying database.");
