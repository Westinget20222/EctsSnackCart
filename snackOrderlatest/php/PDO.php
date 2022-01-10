<?php

$host = 'jklins-1.cret6wgx6skt.us-east-2.rds.amazonaws.com';
$db   = 'SnackCart';
$user = 'snackcart';
$pass = '$n@ckC@rt';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
];
$db = new PDO($dsn, $user, $pass, $opt);

?>