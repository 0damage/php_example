<?php 
require_once 'logi.php';

// подключение к базе данных через субд mysql расширение PDO
$dsn="mysql:host=$host;dbname=$dbname";
$opt=array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

$pdo=new PDO ($dsn,$name,$pass,$opt);
$pdo->exec('SET NAMES utf8');
//____________________________________________________________________________________
