<?php
include_once '../fonctions.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?>">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style-js/style.css">
    <title><?= $title ?></title>
</head>
<body>

<nav class="nav-header">
    <a href="/portfoliobdd" title="lien pour revenir à l'accueil"> <img class="icones" src="../images/favicon.svg" alt="Logo de Charline Royer"></a> 

<div class="menu-matieres">
        <ul class="ul-menu-matieres matieres2">
            <a href="newArticle.php">
                <li class="li-menu">
                    <img src="../images/article.svg" alt="" class="icones3">
                </li>
            </a>

            <a href="categories.php">
                <li class="li-menu">
                <img src="../images/etiquette.svg" alt="" class="icones3">
                </li>
            </a>
            
            <a href="tableau.php">
                <li class="li-menu">
                <img src="../images/dashboard.svg" alt="" class="icones3">
                </li>
            </a>
           
        </ul>
        </div>


        <div class="menu-contact">
        <a href="deconnexion.php" title="Se déconnecter">
                <li class="li-menu">
                <img src="../images/deconnexion.svg" alt="deconnexion" class="icones3" >
                </li>
            </a>

        </div>



        <div class="menu-tel">
            <svg id="menu" fill="white" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384.97 264.67"><path d="M12,84.21H372.94a12,12,0,1,0,0-24.06H12a12,12,0,1,0,0,24.06Z" transform="translate(0 -60.15)" /><path d="M372.94,180.46H12a12,12,0,1,0,0,24H372.94a12,12,0,1,0,0-24Z" transform="translate(0 -60.15)" /><path d="M372.94,300.76H12a12,12,0,0,0,0,24.06H372.94a12,12,0,0,0,0-24.06Z" transform="translate(0 -60.15)" /></svg>

            
        </div>
</nav>

<div class="menu-matieres-tel">
                <ul class="ul-menu-matieres-tel">
                    <a href="newArticle.php">
                        <li class="li-menu">
                            <img src="../images/article.svg" alt="" class="icones3">
                            <span>Articles</span>
                        </li>
                    </a>

                    <a href="categories.php">
                        <li class="li-menu">
                            <img src="../images/etiquette.svg" alt="" class="icones3">
                            <span>Categories</span>
                        </li>
                    </a>

                     <a href="tableau.php">
                        <li class="li-menu">
                            <img src="../images/dashboard.svg" alt="" class="icones3">
                            <span>Tableau de bord</span>
                        </li>
                    </a>
                    <a href="deconnexion.php" title="Se déconnecter">
                        <li class="li-menu">
                            <img src="../images/deconnexion.svg" alt="deconnexion" class="icones3" >
                            <span>Déconnexion</span>
                        </li>
                     
                    </a>
                </ul>
    </div>
