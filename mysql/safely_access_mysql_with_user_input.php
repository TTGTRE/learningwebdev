<?php

require_once "login.php";

$connection = new mysqli($hostName, $username, $password, $databaseName);
if ($connection->connect_error) die("Error connecting to database.");

$inputUsername = mysql_fix_string($connection, $_POST["user"]);
$inputPassword = mysql_fix_string($connection, $_POST["password"]);

$query = "SELECT * FROM users WHERE username='$inputUsername' AND pass='$inputPassword'";

// Etc..

function mysql_fix_string(mysqli $connection, string $string) {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
}
