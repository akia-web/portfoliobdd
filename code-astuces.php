<?php
$title = "code-astuces";
require_once 'header.php';
?>

<main>
<h1><?= $title?> </h1>
    
        
    <section class="container" href="top">
    
       
    <div class="container-intro">
            <img class="image-article1" src="images/projet5.png" alt="">  
        <p class="intro">Ce site a été conçu pour répertorier mes connaissances. </p>
        <p class="intro">Il contient des cours en HTML CSS et Javascript</p>
        
       

    

        <p class="centrer">
            <a  href="http://akia.re.sauvat.pro/blog" target="_blank">
            Voir le site  CODE ASTUCES <img src="images/export.svg" alt="" width="15"> </a>
        </p>

    <h2 class="titre">La page d'accueil</h2>
    <p>Je voulais représenter ma page d'accueil comme une bibliothèque avec des étagères et des livres <br>
        actuellement le livre de html est complet et celui de css est en cours. <br>
        j'ai aussi rajouté une animation sur le livre pour que quand l'utilisateur passe la souris dessus, celui-ci s'ouvre
    </p>
    <img class="image-article" src="images/page/code-astuce/accueil.png" alt=""> 

    <h2 class="titre">L'ouverture d'un livre</h2>

    <p>Quand on ouvre un livre, il y à une vidéo de présentation sur chaque onglets (Actuellement seulement sur la page organisation du livre html) <br>
    Chaques livres est divisé en 4 onglets qui regroupent chacuns un thème spécifique</p>

    <h2>Les objectifs d'améliorations</h2>
    <ol class="objectif">

    <li>Repenser le site, je suis bloquée avec 4 onglets par livre et j'aimerai en faire plus.</li>
    <li>Continuer à le remplir</li>
    </ol>
   

    <div class="container-button">

        <div>
            <a href="/portfolio"><button class="button-lien-site">Retour Accueil</button></a>
        </div>

        <div>
            <a href="blog.php"><button class="button-lien-site"><- Blog</button></a>
            <a href="jeu.php"><button class="button-lien-site">Jeu -></button></a>
        </div>
        
        
        <div>
            <a class="button-scroll" href="#top"><button>haut</button></a>
        </div>

</section>

</main>

<?php 
include_once 'footer.php';