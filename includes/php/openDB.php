<?php

try {
    $bdd = new PDO('mysql:host='.$serveur.';dbname='.$BDDName.';charset=utf8', $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    die('Erreur : ' .$e->getMessage());
}

?>