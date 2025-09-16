<?php
$host = "localhost";
$user_name = "root";
$password = null;
try{
    $conn = new PDO("mysql:host=$host;dbname=task_management", $user_name,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(ErrorException $e){
    echo "connection failed". $e->getMessage();
}
?>