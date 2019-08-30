<?php
/*
 * Deleting data from table
 */
require_once "login.php";

$connection = new mysqli($hostName, $username, $password, $databaseName);
if ($connection->connect_error) die("Error connecting to database.");

$result = $connection->query("DELETE FROM cats WHERE name='Growler'");
if (!$result) die("Error querying database.");