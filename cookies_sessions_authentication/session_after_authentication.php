<?php
require_once '../login.php';

$connection = new mysqli($hostName, $username, $password, $databaseName);
if ($connection->connect_error) die("Error connecting to database");

if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    $un_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_USER']);
    $pw_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_PW']);
    $query = "SELECT * FROM users WHERE username='$un_temp'";
    $result = $connection->query($query);

    if (!$result) die("Error performing query");
    elseif ($result->num_rows) {
        $row = $result->fetch_array(MYSQLI_NUM);
        $result->close();
        if (password_verify($pw_temp, $row[3])) {
            session_start();
            // Set the lifetime of the session
            ini_set('session.gc_maxlifetime', 60 * 60 * 24);
            // Get the lifetime of the session
            // ini_get('session.gc_maxlifetime');
            $_SESSION['forename'] = $row[0];
            $_SESSION['surname'] = $row[1];
            echo htmlspecialchars("$row[0] $row[1] : Hi $row[0], you are now logged in as '$row[2]'");
            die("<p><a href='continue.php'>Click here to continue</a></p>");
        }
        else die("Invalid username/password combination");
    } else die("Invalid username/password combination.");
} else {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    die("Please enter your username and password.");
}

$connection->close();

function mysql_entities_fix_string(mysqli $connection, $string) {
    return htmlentities(mysql_fix_string($connection, $string));
}

function mysql_fix_string(mysqli $connection, $string) {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
}
