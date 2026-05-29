<!DOCTYPE html>
<html lang="nl" data-mode="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="webpagina van pixelplayground">
    <meta name="keywords" content="HTML, Gaming, Site, Onlinegaming, Highscores">
    <meta name="author" content="Sem en Jayden">
    <title>pixelplayground</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/script.js" defer></script>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "dbconnect.php"; 
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    
        $sql = "SELECT * FROM gebruikers WHERE username = '$uname' AND password = '$pass'";
        $result = $conn->query($sql);
        if($result && $result->num_rows == 1){
            $user = $result->fetch_assoc();
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $uname;
            $_SESSION['ingelogd'] = true;
            header("Location: indexlogin.php");
        } else {
            echo "login incorrect";
        }
    } 
?> 

    <form method="POST" id="login">
        <h2 id="textlogin">New here? Try signing up instead!</h2>
        <article>
            <h1>USERNAME:</h1>
            <input type="text" id="username" name="username" required>
        </article>
        <br>
        <article>
            <h1>PASSWORD:</h1>
            <input type="password" id="password" name="password" required>
        </article>
        <br>
        <button type="submit" id="submitpassword">Log in</button>
    </form>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
