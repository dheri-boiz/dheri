<?php
// Replace these values with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "2205";
$dbname = "studentcomplaintphp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
