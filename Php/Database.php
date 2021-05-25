<?php

function getPdo(): PDO
{
    
    $host_name = 'db5002550237.hosting-data.io';
    $database = 'dbs2025319';
    $user_name = 'dbu540748';
    $password = 'fakih13003';
    $dbh = null;
    /*
    $host_name = 'localhost';
    $database = 'dbs2025319';
    $user_name = 'root';
    $password = 'fakih13003';*/
    $pdo = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}





?>