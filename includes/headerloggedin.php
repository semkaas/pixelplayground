<?php
session_start();
?>
<article class="banner2">
    <img class="logo" src="img/logo.png">
    <h1 class="welkom">Welcome, <?php echo $_SESSION['username'] ?? "Newbie"; ?></h1>
    <nav class="nav2">
        <a href="indexlogin.php">Home</a>
        <a href="gameslogin.php">Games</a>
        <a href="highscoreslogin.php">Highscores</a>
        <a href="profile.php">Profile</a>
    </nav>
</article>
