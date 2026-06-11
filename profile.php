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
    <?php include 'includes/headerloggedin.php'; ?>
    <?php
if (isset($_POST['action']) && $_POST['action'] === 'logout') {
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Mijn Profiel</title>
</head>
<body>
    <form method="POST" action=""id="loguitknop">
        <button type="submit" name="action" value="logout" id="logoutbutton">
            Uitloggen
        </button>
    </form>
</body>
</html>
    <?php include 'includes/footer.php'; ?>
</body>
</html>