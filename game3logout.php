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


<!-- styling -->

<style>
  body {
    text-align: center;
    margin-top: 15vh;
  }
  h1 { margin-bottom: 10px; }
  #status { 
    margin-bottom: 15px; 
    font-size: 18px; 
}
  #board {
    margin-top: 5vh;
    display: grid;
    grid-template-columns: repeat(3, 100px);
    grid-template-rows: repeat(3, 100px);
    gap: 5px;
    justify-content: center;
    margin: 0 auto 20px;
  }
  .cell {
    
    border: 2px solid #333;
    font-size: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    user-select: none;
    border-radius: 5px;
  }
  .cell.disabled {
    cursor: default;
  }
  button {
    padding: 8px 16px;
    font-size: 16px;
    cursor: pointer;
  }
</style>

</head>
<body>

<h1>Boter, Kaas en Eieren</h1>
<article id="status">Speler X is aan de beurt</article>

<article id="board">
  <article class="cell" data-index="0"></article>
  <article class="cell" data-index="1"></article>
  <article class="cell" data-index="2"></article>
  <article class="cell" data-index="3"></article>
  <article class="cell" data-index="4"></article>
  <article class="cell" data-index="5"></article>
  <article class="cell" data-index="6"></article>
  <article class="cell" data-index="7"></article>
  <article class="cell" data-index="8"></article>
</article>

<button id="reset">Opnieuw spelen</button>

<script>
  const boardEl = document.getElementById("board");
  const statusEl = document.getElementById("status");
  const resetBtn = document.getElementById("reset");
  const cells = document.querySelectorAll(".cell");

  let board = ["", "", "", "", "", "", "", "", ""];
  let currentPlayer = "X";
  let gameOver = false;
// maakt een array aan van 9 lege strings die het bord moet gaan voorstellen
  const winPatterns = [
    [0,1,2],[3,4,5],[6,7,8], 
    [0,3,6],[1,4,7],[2,5,8], 
    [0,4,8],[2,4,6]          
  ];
// alle mogelijke win technieken, alle plekken waar 3 op een rij kunnen
  function checkWin() {
    for (let pattern of winPatterns) {
      const [a,b,c] = pattern;
      if (board[a] && board[a] === board[b] && board[a] === board[c]) {
        return board[a]; 
      }
    }
    return null;
  }
// checkt of er 1 van de wincodities is, en of de waarde a gelijk is aan b en c
  function checkDraw() {
    return board.every(cell => cell !== "");
  }
// dit checkt of alle lege arrays zijn ingevult
  function handleClick(e) {
    if (gameOver) return;
    const cell = e.target;
    if (!cell.classList.contains("cell")) return;
// als het spel over is of als er niks wordt gedaan gebreurt er ook echt niks
    const index = cell.getAttribute("data-index");
    if (board[index] !== "") return;
    board[index] = currentPlayer;
    cell.textContent = currentPlayer;
// laat zien welke speler er aan de beurt is en op welk vakje is geklikt
    const winner = checkWin();
    if (winner) {
      statusEl.textContent = `Speler ${winner} heeft gewonnen!`;
      gameOver = true;
      cells.forEach(c => c.classList.add("disabled"));
      return;
    }
// als er 3 op een rij zijn dan wordt het hele bord onklikbaar
    if (checkDraw()) {
      statusEl.textContent = "Gelijkspel!";
      gameOver = true;
      return;
    }
// als het bord gevult is en er is geen check win true dan word het hele bord onklikbaar
    currentPlayer = currentPlayer === "X" ? "O" : "X";
    statusEl.textContent = `Speler ${currentPlayer} is aan de beurt`;
  }
// geeft de beurt van de speler aan, begint altijd met x
  function resetGame() {
    board = ["", "", "", "", "", "", "", "", ""];
    currentPlayer = "X";
    gameOver = false;
    cells.forEach(c => {
      c.textContent = "";
      c.classList.remove("disabled");
    });
    statusEl.textContent = "Speler X is aan de beurt";
  }
// alle arrays worden leeg gemaakt en het bord word weer klikbaar
  boardEl.addEventListener("click", handleClick);
  resetBtn.addEventListener("click", resetGame);
// maakt de strings in de arrays echt klikbaar en de reset knop ook
</script>


    <?php include 'includes/footer.php'; ?>
</body>
</html>