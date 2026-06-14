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



<!-- inhoud spel -->

</head>
<body>

<h1>Boter, Kaas en Eieren</h1>
<div id="status">Speler X is aan de beurt</div>

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


<!-- Js -->

<script>
  const boardEl = document.getElementById("board");
  const statusEl = document.getElementById("status");
  const resetBtn = document.getElementById("reset");
  const cells = document.querySelectorAll(".cell");

  let board = ["", "", "", "", "", "", "", "", ""];
  //maakt het lege bord aan
  let currentPlayer = "X";
  let gameOver = false;

  const winPatterns = [
    [0,1,2],[3,4,5],[6,7,8], 
    [0,3,6],[1,4,7],[2,5,8], 
    [0,4,8],[2,4,6]          
  ];

  function checkWin() {
    for (let pattern of winPatterns) {
      const [a,b,c] = pattern;
      if (board[a] && board[a] === board[b] && board[a] === board[c]) {
        return board[a]; 
      }
    }
    return null;
  }

  function checkDraw() {
    return board.every(cell => cell !== "");
  }

  function handleClick(e) {
    if (gameOver) return;
    const cell = e.target;
    if (!cell.classList.contains("cell")) return;

    const index = cell.getAttribute("data-index");
    if (board[index] !== "") return;

    board[index] = currentPlayer;
    cell.textContent = currentPlayer;

    const winner = checkWin();
    if (winner) {
      statusEl.textContent = `Speler ${winner} heeft gewonnen!`;
      gameOver = true;
      cells.forEach(c => c.classList.add("disabled"));
      return;
    }

    if (checkDraw()) {
      statusEl.textContent = "Gelijkspel!";
      gameOver = true;
      return;
    }

    currentPlayer = currentPlayer === "X" ? "O" : "X";
    statusEl.textContent = `Speler ${currentPlayer} is aan de beurt`;
  }

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

  boardEl.addEventListener("click", handleClick);
  resetBtn.addEventListener("click", resetGame);
</script>

    <?php include 'includes/footer.php'; ?>
</body>
</html>