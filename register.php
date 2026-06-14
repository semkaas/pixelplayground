<!DOCTYPE html>
<html lang="nl" data-mode="dark">
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
    <?php include 'includes/header.php';
    setcookie("language", "nl", time() + (86400 * 30), "/"); // 86400 seconden = 1 dag * 30 dagen
    $lang = $_COOKIE["language"] ?? "nl"; ?> ?>
    <?php
$foutmelding = 'Er gaat iets niet helemaal gut';
$succesmelding = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "dbconnect.php";
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $pass_confirm = $_POST['password_confirm'];
    if ($pass !== $pass_confirm) {
        $foutmelding = "Wachtwoorden komen niet overeen!";
    } else {
        $check_sql = "SELECT * FROM gebruikers WHERE username = '$uname'";
        $check_result = $conn->query($check_sql);
        if ($check_result && $check_result->num_rows > 0) {
            $foutmelding = "Gebruikersnaam is al bezet!";
        } else {
            $insert_sql = "INSERT INTO gebruikers (username, password) VALUES ('$uname', '$pass')";
            // als de gebruiksnaam niet bezet is en beide velden zijn ingevult, maak dan het account aan
            if ($conn->query($insert_sql)) {
                header("Location: indexlogin.php");
                exit;
            } else {
                $foutmelding = "Er ging iets fout bij de registratie.";
            }
        }
    }
} 
?>

<form method="POST" id="register">
    <h2 id="textlogin">Create an account!</h2>
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
    <article>
        <h1>CONFIRM:</h1>
        <input type="password" id="password" name="password_confirm" required>
    </article>
    <br>
    <button type="submit" id="submitpassword">Sign up</button>
</form>
    <?php include 'includes/footer.php'; ?>
</body>
</html>