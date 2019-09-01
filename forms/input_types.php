<?php

if (isset($_POST['icecream'])) {
    $flavors = $_POST['icecream'];
    echo "Your favorite ice cream flavors are: <br>";
    foreach($flavors as $flavor) {
        $flavor = ucfirst($flavor);
        echo "$flavor<br>";
    }
}

echo "<hr>";

if (isset($_POST['delivery'])) {
    $deliveryTime = $_POST['delivery'];
    echo "You would like your package delivered during the " . ucfirst($deliveryTime) . ".<br>";
}
