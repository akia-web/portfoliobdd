<?php

require_once 'header.php';

$contenu = ''; // pour le message de deconnexion

if ($_POST) { // si le formulaire est envoyé


    //controle du formulaire : 
    if (empty($_POST['pseudo'])|| empty($_POST['mdp'])){
        $contenu .='<div>Les identifiants sont obligatoires </div>';

    }

    //si pas d'erreur affichée, on peut verifier le pseudo et le mdp en BDD : 
    if(empty ($contenu)){
        $resultat = executeRequete2("SELECT * FROM membre WHERE pseudo = :pseudo",
                                    array(':pseudo' => $_POST['pseudo']));

        if ($resultat->rowCount() == 1){ // si il y a une ligne, c'est que le pseudo existe en BDD

            $membre = $resultat->fetch(PDO::FETCH_ASSOC); // on transforme l'objet PDOStatement en tableau pour en extraire le mdp
            // debug($membre); 

                 // on verifie le mdp : 
                if($_POST['mdp'] ==  $membre['mdp']) { // retourne true si le hash du mdp en BDD correspond au mdp de connexion

                    $_SESSION['membre'] = $membre; // on remplit la session avec un indice "membre" et toutes les infos du membre provenant de la BDD en valeur
                       
                    header('location:tableau.php'); // une fois les identifiants corrects, et la session remplie, on redirige l'internaute vers la page profil.php
                    exit(); // pour quitter cette page

                 }else{ // sinon il y a erreur sur le mot de passe
                    $contenu .='<div> Erreur sur le mdp </div>';
                }   

        }   else{ //si le pseudo n'existe pas
            $contenu .= '<div class="alert alert-danger"> Erreur le pseudo </div>';
        }                         
    }
 






} // fin du if ($_POST)


echo $contenu; // pour les autres messages

    
?>


<form action="" method="post">

<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
<input type="text" name="mdp" id="mdp" placeholder="mot de passe">
<input type="submit"value="connexion">


</form>