<?php
session_start();
require "dbconnect.php";

// Check of gebruiker is ingelogd
if (!isset($_SESSION['user_id'])) {
    die("Je bent niet ingelogd");
}

$user_id = $_SESSION['user_id'];

// Verwijder gebruiker uit database
$sql = "DELETE FROM gebruikers WHERE id = $user_id";

if ($conn->query($sql) === TRUE) {

    // Session leegmaken
    session_unset();
    session_destroy();

    // Terug naar homepage
    header("Location: index.php?deleted=1");
    exit;

} else {
    echo "Er ging iets mis: " . $conn->error;
}
?>
