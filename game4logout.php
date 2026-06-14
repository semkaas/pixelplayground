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
    $lang = $_COOKIE["language"] ?? "nl"; ?>
    <style>
  body {
    text-align: center;
    margin-top: 15vh;
  }
  #word {
    font-size: 32px;
    letter-spacing: 8px;
    margin-bottom: 15px;
  }
  #wrong-letters {
    margin: 10px 0;
    color: red;
  }
  #message {
    margin: 10px 0;
    font-size: 18px;
  }
  input {
    padding: 5px;
    font-size: 16px;
    text-align: center;
    width: 40px;
  }
  button {
    padding: 6px 12px;
    font-size: 16px;
    margin-left: 5px;
    cursor: pointer;
  }
</style>
</head>
<body>

<h1>Pixman</h1>
<article id="word">_ _ _ _ _</article>
<article id="wrong-letters">Foute letters: </article>
<article id="message"></article>

<input type="text" id="letter-input" maxlength="1" placeholder="letter">
<button id="guess-btn">Raad</button>
<button id="reset-btn">Opnieuw</button>

<script>
const woorden = [
  "KAAS", "KOEKJE", "COMPUTER", "SPEL", "BOWSER",
  "PIZZA", "DRAAK", "HEFTRUCK", "KOFFIE", "ZONNEBRIL",
  "TANDPASTA", "KROKODIL", "BUREAUSTOEL", "SNEEUWPOP", "VLIEGTUIG",
  "KATAPULT", "SOKKEN", "WATERFLES", "TELEFOON", "KANGOEROE",
  "BROODROOSTER", "MAGNEET", "RUGZAK", "KABEL", "SLAAPKAMER",
  "PANTOFFEL", "BLOEMKOOL", "HELIKOPTER", "KABOUTER", "STOFPZUIGER"
];

  let geheimWoord = "";
  let goedGeraden = [];
  let foutGeraden = [];
  let maxFouten = 9;
  const wordEl = document.getElementById("word");
  const wrongEl = document.getElementById("wrong-letters");
  const msgEl = document.getElementById("message");
  const inputEl = document.getElementById("letter-input");
  const guessBtn = document.getElementById("guess-btn");
  const resetBtn = document.getElementById("reset-btn");

  function nieuwSpel() {
    geheimWoord = woorden[Math.floor(Math.random() * woorden.length)];
//kiest een nummer (key) die gelijk staat aan een woord
    goedGeraden = [];
    foutGeraden = [];
    msgEl.textContent = "";
    inputEl.value = "";
    inputEl.focus();
    updateWeergave();
  }
//maakt het textveld leeg na het typen van de letter
  function updateWeergave() {

    let display = "";
    for (let letter of geheimWoord) {
      if (goedGeraden.includes(letter)) {
        display += letter + " ";
      } else {
        display += "_ ";
      }
    }
// checkt of de geraden letter een deel is van het geheime woord, als dat niet zo is laat het een underscore zien
    wordEl.textContent = display.trim();
    wrongEl.textContent = "Foute letters: " + foutGeraden.join(" ");
// elk fout geraden letter word laten zien

    let gewonnen = geheimWoord.split("").every(l => goedGeraden.includes(l));
    if (gewonnen) {
      msgEl.textContent = "Je hebt gewonnen! Het woord was: " + geheimWoord;
    }
    if (foutGeraden.length >= maxFouten && !gewonnen) {
      msgEl.textContent = "Je hebt verloren! Het woord was: " + geheimWoord;
    }
  }

  function raadLetter() {
    let letter = inputEl.value.toUpperCase();
    if (!letter || letter.length !== 1) return;
// zorgt er voor dat de ingevoerde letters hoofdletters worden en dat er maximaal 1 letter per input kan

    if (msgEl.textContent.includes("gewonnen") || msgEl.textContent.includes("verloren")) {
      return;
    }
//laat zien of je gewonnen hebt of verloren

    if (goedGeraden.includes(letter) || foutGeraden.includes(letter)) {
      msgEl.textContent = "Die letter heb je al geprobeerd.";
      inputEl.value = "";
      inputEl.focus();
      return;
    }
//als je dezelfde letter invoert gebeurt er niks
    if (geheimWoord.includes(letter)) {
      goedGeraden.push(letter);
      msgEl.textContent = "";
    } else {
      foutGeraden.push(letter);
      msgEl.textContent = "Foute letter!";
    }
//kijkt of je een goede of foute letter intypt afhankelijk van het geheime woord
    inputEl.value = "";
    inputEl.focus();
    updateWeergave();
  }

  guessBtn.addEventListener("click", raadLetter);
  inputEl.addEventListener("keyup", function(e) {
    if (e.key === "Enter") {
      raadLetter();
    }
  });
// je kan op enter klikken en op de knop met dezelfde uitkomst, het woord raden
  resetBtn.addEventListener("click", nieuwSpel);
  nieuwSpel();
</script>
    <?php include 'includes/footer.php'; ?>
</body>
</html>