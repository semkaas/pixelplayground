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
    


     <header class="title">Cute Corgi Bakery</header>                
        <detail class="cookies">
            <div id="cookie-counter">0</div>
            kaasblokjes
        </detail>
        <img id="cookie" src="img/ccookie.png" alt="cookie">
       </header>
    <script>
        cookie = document.querySelector("#cookie");
counter = document.querySelector("#cookie-counter");
count = 0;
cookie.addEventListener("click", kaas);
function kaas(){
counter.innerHTML = count++;
}
  

    </script>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
