<?php
session_start();
require "dbconnect.php";


if (!isset($_SESSION['user_id'])) {
    die("Je bent niet ingelogd");
}
// als je niet ingelogd bent maar toch op de pagina zit kan er niks geupdate worden

$user_id = $_SESSION['user_id'];
$newUser = $_POST['new_username'];
$newPass = $_POST['new_password'];

// slaat op wat je invult
$sql = "UPDATE gebruikers SET username = '$newUser', password = '$newPass' WHERE id = $user_id";
// zet de opgeslagen variabelen in de database als vervanging
if ($conn->query($sql) === TRUE) {
    
    $_SESSION['username'] = $newUser;

    header("Location: indexlogin.php?updated=1");
exit;

} else {
    echo "Er ging iets mis: " . $conn->error;
}
?>
