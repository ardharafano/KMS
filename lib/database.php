<?php
$conn = new mysqli("localhost", "root", "", "kms2");
if ($conn->connect_errno) {
    echo die("Failed to connect to MySQL: " . $conn->connect_error);
}
?>