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
<?php include 'includes/header.php'; ?>
    <style>
  body {
    text-align: center;
  }
  #game2 {
    display: flex;
    gap: 20px;
    justify-content: center;
    margin-top: 30px;
  }
  .circle {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: #3498db;
    cursor: pointer;
  }
  .target {
    background: #e74c3c;
  }
  #score2, #timerDisplay {
    font-size: 22px;
    margin-top: 10px;
    font-weight: bold;
  }
  #tekstgame2 {
    font-size: 60px;
  }
  #gameplay{
    height: 100vh;
  }
  #kaas{
    margin-bottom: 300px;
  }
</style>
    <section id="gameplay">
        <p id="kaas">kaas</p>
        <h2 id="tekstgame2">klik op de juiste cirkel</h2>
        <article id="score2">Score: 0</article>
        <article id="timerDisplay">Tijd: 2.00</article>
        <article id="game2"></article>
        <p id="result"></p>
        <a class="gameknop2" href="games.php">TERUG NAAR GAMES</a>
    </section>
<script>
  const game = document.getElementById("game2");
  const result = document.getElementById("result");
  const scoreDisplay = document.getElementById("score2");
  const timerDisplay = document.getElementById("timerDisplay");
  
  let score = 0;
  let countdownInterval;
  let timeLeft;

  function startTimer() {
    clearInterval(countdownInterval); // Stop de vorige timer
    timeLeft = 2.00;
    timerDisplay.textContent = "Tijd: " + timeLeft.toFixed(2);

    countdownInterval = setInterval(() => {
      timeLeft -= 0.01;
      
      if (timeLeft <= 0) {
        timeLeft = 0;
        timerDisplay.textContent = "Tijd: 0.00";
        clearInterval(countdownInterval);
        score = 0;
        scoreDisplay.textContent = "Score: " + score;
        result.textContent = "Te laat! Je score is gereset.";
        kaas(); // Genereer direct een nieuw veld
      } else {
        timerDisplay.textContent = "Tijd: " + timeLeft.toFixed(2);
      }
    }, 10);
  }

  function kaas() {
    game.innerHTML = "";
    const targetIndex = Math.floor(Math.random() * 5);
    for (let i = 0; i < 5; i++) {
      const circle = document.createElement("div");
      circle.classList.add("circle");
      if (i === targetIndex) circle.classList.add("target");
      game.appendChild(circle);
    }
    startTimer();
  }

  game.addEventListener("click", function (e) {
    if (e.target.classList.contains("target")) {
      score++;
      result.textContent = "Goed gedaan!";
      scoreDisplay.textContent = "Score: " + score;
      kaas();
    } else if (e.target.classList.contains("circle")) {
      score = 0;
      result.textContent = "Dat was geen rode cirkel, je score is 0";
      scoreDisplay.textContent = "Score: " + score;
      kaas();
    }
  });

  kaas();
</script>
    <?php include 'includes/footer.php'; ?>
</body>
</html>