<?php

require_once "login.php";

/*
 *  Inserting and deleting (practical exercise)
 */
if (isset($_POST["delete"]) && isset($_POST["isbn"])) {
    $isbn = get_post($connection, "isbn");
    $query = "DELETE FROM classics WHERE isbn='$isbn'";
    $result = $connection->query($query);
    if (!$result) echo "DELETE failed<br><br>";
}

if (!empty($_POST["author"]) &&
    !empty($_POST["title"]) &&
    !empty($_POST["category"]) &&
    !empty($_POST["year"]) &&
    !empty($_POST["isbn"])) {
    $author = get_post($connection, "author");
    $title = get_post($connection, "title");
    $category = get_post($connection, "category");
    $year = get_post($connection, "year");
    $isbn = get_post($connection, "isbn");
    $query = "INSERT INTO classics VALUES" .
        "('$author', '$title', '$category', '$year', '$isbn')";
    $result = $connection->query($query);
    if (!$result) echo "INSERT failed<br><br>";
}

echo <<<_END
<form action="inserting_and_deleting.php" method="post"><pre>
  Author <input type="text" name="author">
   Title <input type="text" name="title">
Category <input type="text" name="category">
    Year <input type="text" name="year">
    ISBN <input type="text" name="isbn">
<input type="submit" value="ADD RECORD">
</pre></form>
_END;

$query = "SELECT * FROM classics";
$result = $connection->query($query);
if (!$result) die ("Database access failed");

$rows = $result->num_rows;
for ($j = 0; $j < $rows; ++$j) {
    $row = $result->fetch_array(MYSQLI_NUM);
    $r0 = htmlspecialchars($row[0]);
    $r1 = htmlspecialchars($row[1]);
    $r2 = htmlspecialchars($row[2]);
    $r3 = htmlspecialchars($row[3]);
    $r4 = htmlspecialchars($row[4]);

    echo <<<_END
<pre>
Author $r0
Title $r1
Category $r2
Year $r3
ISBN $r4
</pre>
<form action="inserting_and_deleting.php" method="post">
<input type="hidden" name="delete" value="yes">
<input type="hidden" name="isbn" value="$r4">
<input type="submit" value="DELETE RECORD"></form>
_END;
}

$result->close();
$connection->close();

function get_post(mysqli $connection, $var) {
    return $connection->real_escape_string($_POST[$var]);
}
