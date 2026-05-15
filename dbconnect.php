<?php
try{
    $conn = new mysqli("localhost", "root", "", "phples");
}
catch (Exception $e){
    echo "connection not good";
}
?>