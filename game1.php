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
    
<div id="game-container">
    <h2>Koekjes: <span id="cookie-counter">0</span></h2>
    <p>Klikkracht: <span id="click-power">1</span></p>
    <img id="cookie" src="img/ccookie.png" alt="cookie" style="width: 400px;px;cursor:pointer;">
    <button id="upgrade">Koop Upgrade (Kost: 10)</button>
    <button id="reset">Reset Data</button>
</div>
<script>
    let count = parseInt(localStorage.getItem("cookieCount")) || 0;
    let clickPower = parseInt(localStorage.getItem("clickPower")) || 1;
    let upgradeCost = parseInt(localStorage.getItem("upgradeCost")) || 10;
    const counterEl = document.querySelector("#cookie-counter");
    const powerEl = document.querySelector("#click-power");
    const upgradeEl = document.querySelector("#upgrade");
    const gameContainer = document.querySelector("#game-container");
    function updateSpel() {
        counterEl.textContent = count;
        powerEl.textContent = clickPower;
        upgradeEl.textContent = `Koop Upgrade (Kost: ${upgradeCost})`;

        localStorage.setItem("cookieCount", count);
        localStorage.setItem("clickPower", clickPower);
        localStorage.setItem("upgradeCost", upgradeCost);
    }
    gameContainer.addEventListener("click", function(e) {

        if (e.target.id === "cookie") {
            count += clickPower;
            updateSpel();
}
        else if (e.target.id === "upgrade") {
            if (count >= upgradeCost) {
                count -= upgradeCost;
                clickPower++;
                upgradeCost = Math.floor(upgradeCost * 1.5);
                updateSpel();
            } else {
                alert("Niet genoeg koekjes!");
            }
        }
        else if (e.target.id === "reset") {
            count = 0;
            clickPower = 1;
            upgradeCost = 10;
            updateSpel();
        }
    });
    updateSpel();
</script>
<style>
    #game-container{
        margin-top: 10vh;
    }
    </style>
    
    <?php include 'includes/footer.php'; ?>
</body>
</html>