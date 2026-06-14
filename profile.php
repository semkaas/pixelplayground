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
    <?php
if (isset($_POST['action']) && $_POST['action'] === 'logout') {
    $_SESSION = array();
    session_destroy();
    //logt je uit en stuurt je terug naar de uitgelogde versie
    header("Location: index.php");
    exit;
}
?>
<head>
    <meta charset="UTF-8">
    <title>Mijn Profiel</title>
</head>
<form method="POST" action=""id="loguitknop">
    <button type="submit" name="action" value="logout" id="logoutbutton">
        Uitloggen
    </button>
</form>
<form action="delete.php" method="post" id="accountvw">
    <button type="submit" id="vwknop">
        Verwijder mijn account
    </button>
</form>
<body>
    <article id="badges">
    <h1> Jouw behaalde badges</h1>
    <hr style="width: 20vw; border: 1px solid black;">
    <br><br>
    <h2>Getting there</h2>
    <h3>score 25 behaald cirkelmadness</h3>
    <br><br>
    <h2>Bullseye</h2>
    <h3>score 100 behaald cirkelmadness</h3>
</article>
<form action="update.php" method="post" id="wwchange">
    <h1>Data veranderen</h1>
    <br>
    <h2>Nieuwe gebruikersnaam:</h2>
    <input type="text" name="new_username" required>

    <h2>Nieuw wachtwoord:</h2>
    <input type="password" name="new_password" required>

    <button type="submit">Opslaan</button>
</form>
<section id="alles">


<h3 id="textvriend">Voeg vriend toe</h3>
<input type="text" id="friendInput" placeholder="(username)">
<button id="addBtn">Add friend</button>
<h3 id="textvriend">Vriendenlijst:</h3>

<article id="friendList"></article>
<template id="friendTemplate">
    <article class="friend">
        <p class="username"></p>
        <p class="vriendid"></p>
</article>
</template>
</section>

 <style>
        #vwknop{
            margin-left: 6vw;
            
            color: crimson;
            background-color: black;
            width: 8vw;
            height: 8vh;
            font-size: larger;
            border: solid crimson;
            border-radius: 10px;
            
            position: absolute;
        }
        #accountvw{
            margin-left: 40vw;
            margin-top: 10vh;
        }
        #wwchange{
            margin-left: 40vw;
            
            margin-top: 30vh;
            
        }
        #badges{
            margin-left: 70vw;
            margin-top: 5vh;
            position: absolute;
        }
        #friendInput{
            border: solid black 1px;
            border-radius: 15px;
            width: 200px;        
            height: 25px;        
            font-size: 18px;     
            padding: 8px;
        }
        #textvriend{
            font-size: 30px;
            margin-top: 5vh;
            
        }
       
        #alles{
            font-size: 20px;
            margin-top: -50vh;
            margin-left: 5vw;
            position: absolute;
        }
        #addBtn{
            height: 35px;
            width: 90px;
            border: solid black 2px;
        }
    </style>
<script>
document.getElementById("addBtn").addEventListener("click", function () {
    const name = document.getElementById("friendInput").value;
// kijkt wat er is ingevult
    fetch("getfriend.php?username=" + name)
        .then(res => res.json())
        .then(data => {
            // dit kan ik helaas niet uitleggen
            if (data) {
                const template = document.getElementById("friendTemplate");
                const clone = template.content.cloneNode(true);
                clone.querySelector(".username").textContent = data.username;
                document.getElementById("friendList").appendChild(clone);
            } else {
                alert("Geen gebruiker met deze gebruiksnaam");
            }
        });
});
</script>
    <?php include 'includes/footer.php'; ?>
</body>
</html>