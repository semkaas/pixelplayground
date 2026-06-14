<?php
session_start();
require "dbconnect.php";
if (!isset($_SESSION['user_id'])) {
    die("Je bent niet ingelogd");
}
$user_id = $_SESSION['user_id'];
$sql = "DELETE FROM gebruikers WHERE id = $user_id";
if ($conn->query($sql) === TRUE) {
    session_unset();
    session_destroy();
    header("Location: index.php?deleted=1");
    exit;

} else {
    echo "Er ging iets mis: " . $conn->error;
}
?>
