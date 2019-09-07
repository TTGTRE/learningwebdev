<?php

$forename = $surname = $username = $password = $age = $email = "";

if (isset($_POST["forename"])) $forename = fix_string($_POST["forename"]);
if (isset($_POST["surname"])) $surname = fix_string($_POST["surname"]);
if (isset($_POST["surname"])) $username = fix_string($_POST["username"]);
if (isset($_POST["surname"])) $password = fix_string($_POST["password"]);
if (isset($_POST["surname"])) $age = fix_string($_POST["age"]);
if (isset($_POST["surname"])) $email = fix_string($_POST["email"]);

$fail = validate_forename($forename);
$fail .= validate_surname($surname);
$fail .= validate_username($username);
$fail .= validate_password($password);
$fail .= validate_age($age);
$fail .= validate_email($email);

echo "<!DOCTYPE html>\n<html><head><title>An Example Form</title>";

if ($fail == "") {
    echo "</head><body>Form data successfully validated:
    $forename, $surname, $username, $password, $age, $email</body></html>";

    // This is where you would enter the posted fields into a database
    // preferably using hash encryption for the password.

    exit;
}

echo <<<_END
<!-- The HTML/JavaScript section -->
...
_END;

// The PHP functions

function validate_forename($field) {
    return ($field == "") ? "No forename was entered<br>": "";
}

function validate_surname($field) {
    return ($field == "") ? "No surname was entered<br>" : "";
}

function validate_username($field) {
    if ($field == "") return "No username was entered<br>";
    else if (strlen($field) < 5) return "Usernames must be at least 5 characters<br>";
    else if (preg_match("/[^a-zA-Z0-9_-]/", $field)) return "Only letters, numbers, - and _ in usernames<br>";
    return "";
}

function validate_password($field) {
    if ($field == "") return "No password was entered<br>";
    else if (strlen($field) < 6) return "Passwords must be at least 6 characters<br>";
    else if (!preg_match("/[a-z]/", $field) || !preg_match("/[A-Z]/", $field) || !preg_match("/[0-9]/", $field))
        return "Passwords require 1 each of a-z, A-Z and 0-9<br>";
    return "";
}

function validate_age($field) {
    if ($field == "") return "No Age was entered<br>";
    elseif ($field < 18 || $field > 110) return "Age must be between 18 and 110<br>";
    return "";
}

function validate_email($field) {
    if ($field == "") return "No email was entered<br>";
    else if (!((strpos($field, ".") > 0) && (strpos($field, "@") > 0)) || preg_match("/[^a-zA-Z0-9.@_-]/", $field))
        return "The email address is invalid<br>";
    return "";
}

function fix_string($string) {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities($string);
}
