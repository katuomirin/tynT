<?php
const SERVER = 'mysql218.phy.lolipop.lan';
const DBNAME = 'LAA1517465-sistem';
const USER = 'LAA1517465';
const PASS = 'Pass0124';

$connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
$pdo = new PDO($connect, USER, PASS);
?>
