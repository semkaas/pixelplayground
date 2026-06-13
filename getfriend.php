<?php
require "dbconnect.php";

$username = $_GET['username'];

$sql = "SELECT * FROM vrienden WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(null);
}
?>
