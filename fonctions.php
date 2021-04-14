<?php

// connexion à la BDD :
//-------------------
function getConnexion(){
    $host = "localhost";
    $db = "portfolio";
    $root = "root";
    $mdp = "";

    // $host = "mysql.cloud.local";
    // $db = "inst94941";
    // $root = "inst94941";
    // $mdp = "OMprvWqejQCLY127";
    //je sais meme pas comment ça marche global...
    $pdo = new PDO("mysql:host=$host;dbname=$db", 
                "$root", 
                "$mdp", 
    array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' 
    )
    );
    return $pdo;
}

// La création ou l'ouverture des sessions
//-------------------
session_start();

// Fonction de débug
//-------------------
function debug($param) {
    echo '<pre>';
        var_dump($param);
    echo '</pre>';
}


// Fonction qui vérifie si le membre est connecté : 
//-------------------  
function estConnecte(){
    if((isset($_SESSION['membre']) && $_SESSION['membre']['statut'] ==1)){ // si l'indice "membre existe dans la session, c'est que le membre est passé par la page de connexion et qu'il s'est correctement identifié (voir connexion.php)
        return true; // il est connecté
    }else{
        return false; // il n'est pas connecté
    }
} 

// Requete pour tous les autres formulaires
//-------------------
function executeRequete($requete, $param = array()){ // $requete attend une requete SQL sous forme de string. $param attend un array qui associe les marqueurs à leur valeur, sinon prend un array vide par defaut si on ne lui donne rien
    
 
     $pdo = getConnexion(); // pour acceder à cette variable définie dans l'espace global du fichier init.php
 
    $resultat = $pdo->prepare($requete); // on prépare la requete reçue
    $succes = $resultat->execute($param); // on execute la requete  avec le tableau qui associe les marqueurs aux valeurs
 
    if ($succes) {
     return $resultat; // retourne l'objet PDOStatement en cas de succès de la requete
    }else{
     return false; // retourne false en cas d'echec de la requete
      
    }
}

// Requete pour connexion
//-------------------
function executeRequete2($requete, $param = array()){ // $requete attend une requete SQL sous forme de string. $param attend un array qui associe les marqueurs à leur valeur, sinon prend un array vide par defaut si on ne lui donne rien
    if(!empty($param)){// si on a bien un tableau, on peut faire la boucle ci dessous
      foreach($param as $indice=>$valeur){
         $param[$indice]= htmlspecialchars($valeur); // pour transformer les < et > en entité HTML et éviter les injections JS et CSS
     }
    }
 
     $pdo = getConnexion(); // pour acceder à cette variable définie dans l'espace global du fichier init.php
 
    $resultat = $pdo->prepare($requete); // on prépare la requete reçue
    $succes = $resultat->execute($param); // on execute la requete  avec le tableau qui associe les marqueurs aux valeurs
 
    if ($succes) {
     return $resultat; // retourne l'objet PDOStatement en cas de succès de la requete
    }else{
     return false; // retourne false en cas d'echec de la requete
      
    }
 
 
 }