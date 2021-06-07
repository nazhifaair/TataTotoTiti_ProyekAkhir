<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "covid";

try {    
    //create PDO connection 
    $dbe = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}

// Create connection

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

