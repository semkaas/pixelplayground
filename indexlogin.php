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
    $lang = $_COOKIE["language"] ?? "nl"; ?>
        <h1 id="hometext">Welkom terug in PixelPlayground. De plek waar kleine games grote glimlachen brengen.  
Deze website is gebouwd met één doel: jou een relaxte, vrolijke plek geven om even te spelen. Geen high-end graphics, geen gigantische werelden, maar twee simpele, zelfgemaakte games die precies doen wat ze moeten doen: je vermaken.

PixelPlayground voelt een beetje als een digitale speeltuin. Je klikt, je probeert, je ontdekt en voor je het weet ben je weer even helemaal in het moment. De games zijn klein, maar gemaakt met liefde voor pixels, creativiteit en plezier.

Of je nu komt om je score te verbeteren, even te ontsnappen aan school of werk, of gewoon nieuwsgierig bent: je bent hier altijd welkom.</h1>
<h2 id="updatelogs"><br><br><br>Update log V(1.012)<br><br>
<ul>
    <li><p>Games verbeterd</p></li>
    <li><p>Profiel uitgebreid</p></li>
    <li><p>Database aangepast</p></li>
    </ul>
</h2>
<style>
    #hometext{
        margin-top: 14vh;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
        width: 90vw;
        margin-left: 5vw;
    }
    #updatelogs{
        width: 90vw;
        margin-left: 5vw;
    }

</style>
    <?php include 'includes/footer.php'; ?>
</body>
</html>