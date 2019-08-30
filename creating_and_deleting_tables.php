<?php

require_once "login.php";

/*
 * Creating and Deleting tables
 */
$connection = new mysqli($hostName, $username, $password, $database);
if ($connection->connect_error) die("Fatal error");

$query = "CREATE TABLE cats(
id SMALLINT NOT NULL AUT_INCREMENT,
family VARCHAR(32) NOT NULL,
name VARCHAR(32) NOT NULL,
age TINYINT NOT NULL,
PRIMARY KEY (id)
)";

$result = $connection->query($query);
if (!$result) die("Error performing query.");