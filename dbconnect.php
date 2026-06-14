<?php
try{
    $conn = new mysqli("localhost", "root", "", "pixelplayground");
}
catch (Exception $e){
    echo "connection not good";
}
?>
<!-- connectie aanmaken met database -->