<?php

#server name
$sName = "localhost";
#user name 
$uName = "root";
#password 
$pass = "Kwangsoo70012";

# database name
$db_name = "online_book_store_db";

/*
creating database connection 
using The PHP Data Objects (PDO)*/

try{
    $conn= new PDO ("mysql:host=$sName;dbname=$db_name",
          $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::
          ERRMODE_EXCEPTION );
}catch(PDOException $e){
echo "Connection failed : ". $e->getMessage();
}


