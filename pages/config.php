<?php
$conn = new mysqli('localhost', 'root', '','csrs');
if ($conn->connect_error) {
    die('Unable to connect to database [' . $conn->connect_error . ']');
}

?>
