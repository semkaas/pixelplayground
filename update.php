<?php
session_start();
require "dbconnect.php";


if (!isset($_SESSION['user_id'])) {
    die("Je bent niet ingelogd");
}

$user_id = $_SESSION['user_id'];
$newUser = $_POST['new_username'];
$newPass = $_POST['new_password'];


$sql = "UPDATE gebruikers SET username = '$newUser', password = '$newPass' WHERE id = $user_id";

if ($conn->query($sql) === TRUE) {
    
    $_SESSION['username'] = $newUser;

    header("Location: indexlogin.php?updated=1");
exit;

} else {
    echo "Er ging iets mis: " . $conn->error;
}
?>
