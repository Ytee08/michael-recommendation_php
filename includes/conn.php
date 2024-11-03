<?php

//DATABASE CONNECTION DETAILS
$host = 'localhost';
$port = 3306;
$db = 'event_recommendation';
$username = 'root';
$password ='';


$dsn = "mysql:host=$host;port=$port;dbname=$db";

//CREATIMG A NEW PDO INSTANCE FOR DATABASE CONNECTION
$conn =new PDO($dsn, $username, $password);


?>