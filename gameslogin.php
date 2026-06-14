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
    $lang = $_COOKIE["language"] ?? "nl"; ?> ?>
<main>
    <h1 id="textgames"> Pixelplayground originals<h1>
    <article id ="naamhouder">
    <h1 id="textkaas"> KaasKlikker<h1>
    <h1 id="textcirkel"> CirkelMadness<h1>
    <h1 id="textbke"> BoterkaasEI<h1>
</article>
    <article class="gameholder">
        <a class="gameknop1" href="game1.php"><img src="img/ccookie.png"></a>
        <a class="gameknop2" href="game2.php"><img src="img/game2.png"></a>
        <a class="gameknop3" href="game3.php"><img src="img/bke.png"></a>
        <a class="gameknop4" href="game4logout.php"><img src="img/pixman.png"></a>
    </article>
    <style>
    #textgames{
        font-size: 50px;
        display: flex;
        align-items: center;
        justify-items: center;
        flex-direction: column;
    }
    #naamhouder{
        display: flex;
        flex-direction: row;
        font-size: 22px;
        margin-left: 15vw;
        margin-top: 14vh;
        gap: 67px;
    }
    </style>

</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>