<?php
define('DB_SERVER', '3.140.90.98');
define('DB_USERNAME', 'blueDbUser');
define('DB_PASSWORD', '22@APR2021!Stack');
define('DB_NAME', 'blueDb');
 
/* Attempt to connect to MySQL database */
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>