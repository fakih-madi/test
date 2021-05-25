<?php

//require_once('fonction.php');
require_once('Database.php');

$pdo = getPdo();

$success = 0;
$msg= "Une erreur est survenue #";

if (isset($_POST)) {
    if(!empty($_POST['nom'])){
        $nom = htmlspecialchars($_POST['nom']);
        if (!empty($_POST['prenom'])) {
            $prenom = htmlspecialchars($_POST['prenom']);
                if (!empty($_POST['club'])) {
                    $club = htmlspecialchars($_POST['club']);
                    if (!empty($_POST['ville'])) {
                        $ville = htmlspecialchars($_POST['ville']);
                        if (!empty($_POST['adresse'])) {
                            $adresse = htmlspecialchars($_POST['adresse']);
                            if (!empty($_POST['codePostal'])) {
                                $codePostal = htmlspecialchars($_POST['codePostal']);
                                if (!empty($_POST['sport'])) {
                                    $sport = htmlspecialchars($_POST['sport']);
                                    if (!empty($_POST['telephone'])) {
                                        $telephone = htmlspecialchars($_POST['telephone']);
                                        if (!empty($_POST['email'])) {
                                            $email = htmlspecialchars($_POST['email']);
                                            $c = array(
                                                'nom' => $nom,
                                                'prenom' => $prenom,
                                                'club' => $club,
                                                'ville' => $ville,
                                                'adresse' => $adresse,
                                                'code_postal' => $codePostal,
                                                'sport' => $sport,
                                                'telephone' => $telephone,
                                                'email' => $email 
                                            );
                                            //$insert = insertContact($c);
                                            $sql = "INSERT INTO contact_maillot (date, nom, prenom, club, ville, adresse, code_postal, sport, telephone, email) VALUES (NOW(), :nom, :prenom, :club, :ville, :adresse, :code_postal, :sport, :telephone, :email)";
                                            $query = $pdo->prepare($sql);
                                            $query->execute($c);
                                            $msg = "Merci une personne va vous recontacter";
                                            $success = 1;
                                            
                                        }else {
                                            $msg = "Erreur : email manquant";
                                        }
                                    }else {
                                        $msg = "Erreur : numéro de téléphone manquant";
                                    }
                                }else {
                                    $msg = "Erreur : veuillez renseignez votre activité sportive";
                                }
                            }else {
                                $msg = "Erreur : code postal manquant";
                            }
                        }else {
                            $msg = "Erreur : adresse non renseignée";
                        }
                    }else {
                        $msg = "Erreur : ville non renseignée";
                    }
                }else {
                    $msg = "Erreur : club non renseigné";
                }
        }else {
            $msg = "Erreur : veuillez écrire votre prenom";
        }
    }else {
        $msg = "Erreur : veuillez écrire votre nom";
    }
}

$res = ["success" => $success, "msg" => $msg];
echo json_encode($res);

?>