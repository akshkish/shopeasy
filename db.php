<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "online_shopping"
);

if (!$conn) {
    die("Database connection failed");
}

?>