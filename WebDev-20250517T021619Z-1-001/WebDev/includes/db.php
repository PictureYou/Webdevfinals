<?php
$host = 'localhost'; 
$dbname = 'travel_booking'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>