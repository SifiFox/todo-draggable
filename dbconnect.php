<?php

$server = "localhost";
$user = "root";
$password = "";
$db_name = "todolist";


try{
    $conn = new PDO("mysql:host=$server;dbname=$db_name",
                        $user,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo "Connection failed : ". $e->getMessage();
}