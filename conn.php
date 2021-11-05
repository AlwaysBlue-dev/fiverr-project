<?php
$username = "root";
$password = "";
$server = "localhost";
$db = "fiverrpractice";

// Create connection
$conn = mysqli_connect($server, $username, $password, $db);

// Check connection
if ($conn) {
    echo "";
} else {
    die("No Connection" . mysqli_connect_error());
}

