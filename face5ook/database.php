<?php
$host = 'localhost';
$port = 3306;
$dbname = 'face5ook';
$user = 'root';
$password = '';
$dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8";

try {
    $pdo = new PDO($dsn, $user, $password);
} catch(PDOException $e) {
    echo $e->getMessage();
}