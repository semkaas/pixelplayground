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
    <?php include 'includes/headerloggedin.php'; ?>
    <?php
if (isset($_POST['action']) && $_POST['action'] === 'logout') {
    $_SESSION = array();
    session_destroy();
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
<body>
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
            margin-top: 5vh;
            margin-left: 5vw;
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

    fetch("getfriend.php?username=" + name)
        .then(res => res.json())
        .then(data => {
            if (data) {
                const template = document.getElementById("friendTemplate");
                const clone = template.content.cloneNode(true);

                clone.querySelector(".username").textContent = data.username;
                clone.querySelector(".vriendid").textContent = "ID: " + data.vriend_id;

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