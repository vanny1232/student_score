<?php
$servername = "localhost";
$user = "test";
$password = "123";
$database = "la";

$conn = new mysqli($servername, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>