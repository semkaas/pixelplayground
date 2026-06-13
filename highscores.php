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
    <main>
<style>
    h3{
        margin-top: 15vh;
        display: flex;
        justify-items: center;
        align-items: center;
        flex-direction: column-reverse;
}
    main{
        font-size: 30px;
    }
    #test6{
        display: flex;
        justify-items: center;
        align-items: center;
        flex-direction: column-reverse;
       
}

</style>
    <?php require "dbconnect.php"; 

$query = "SELECT * FROM highscores ORDER BY highscore DESC LIMIT 15";
$result = $conn->query($query);

echo "<h3>Top 10 Highscores</h3>";

while($row = $result->fetch_assoc()) {
    echo "<article id = 'test6'>";
    echo "Speler: " . $row['gebruiker_id'] . " | ";
    echo "Score: " . $row['highscore'] . " | ";
    echo "Tijd: " . $row['timestamp'];
    echo "</article>";
}
?>
</main>
<?php include 'includes/footer.php'; ?>

</body>
</html>