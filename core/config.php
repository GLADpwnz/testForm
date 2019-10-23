<?php
$host     = 'localhost';
$userName = 'root';
$password = '';
$dbName   = 'testdb';

try {
  $conn = new \PDO('mysql:host=' . $host . ';dbname=' . $dbName . ';charset=utf8', $userName, $password, [
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ]);
} catch(\PDOException $e) {
  echo "Error connecting to mysql: " . $e->getMessage();
}