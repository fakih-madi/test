<?php

require_once('Database.php');

$pdo = getPdo(); 

function insertContact ($c)
{
    global $pdo;
    $sql = "INSERT INTO contact_maillot (date, nom, prenom, club, ville, adresse, code_postal, sport, telephone, email) VALUES (NOW(), :nom, :prenom, :club, :ville, :adresse, :codePostal, :sport, :telephone, :email)";
    $query = $pdo->prepare($sql);
    $query->execute($c);
    return $query;
    if ($query) {
        echo "YES BABA";
    }
}



?>