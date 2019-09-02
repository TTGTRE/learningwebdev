<?php
session_start();

if (isset($_SESSION['forename'])) {
    $forename = $_SESSION['forename'];
    $surname = $_SESSION['surname'];

    destroy_session_and_data();

    echo "Welcome back $forename.<br>
          Your full name is $forename $surname.<br>";
} else {
    echo "Please <a href='session_after_authentication.php'>click here</a> to log in.";
}

function destroy_session_and_data() {
    $_SESSION = array();
    setcookie(session_name(), '', 0, '/');
    session_destroy();
}
