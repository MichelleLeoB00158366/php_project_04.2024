<?php
// MySQL server host
$host = 'localhost';
// Database name
$dbname = 'diabetes_sensor_stickers';
// MySQL username
$username = 'root';
// MySQL password
$password = 'root';

try {
    // connection using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // PDO if errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Error msg
    die("Connection failed: Please try again later.");
}
?>