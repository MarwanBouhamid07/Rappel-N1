<?php
$host = 'localhost';
$pass = '12345678';
$dbname = 'fitness';
$user = 'root';


try{

    $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC);


}catch(PDOException $e){
    die('failde connection : '.$e->getMessage());
}