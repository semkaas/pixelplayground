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
    <?php include 'includes/headerloggedin.php'; 
    setcookie("language", "nl", time() + (86400 * 30), "/"); // 86400 seconden = 1 dag * 30 dagen
    $lang = $_COOKIE["language"] ?? "nl"; ?>?>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
<!-- overbodige pagina -->
 