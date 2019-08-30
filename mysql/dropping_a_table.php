<?php

require_once "login.php";

$connection = new mysqli($hostName, $username, $password, $databaseName);
if ($connection->connect_error) die("Error connecting to database.");

$queryResult = $connection->query("DROP TABLE cats");
if (!$queryResult) die("Error dropping table.");

