<?php


  
 $con = "mysql:host=localhost;dbname=tcc";
try{
    
    
$db = new PDO($con,"root","");
} catch (PDOException $e) {
    echo $e->getMessage();
}
