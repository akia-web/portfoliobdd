<?php
$title = "Jeu";
require_once 'header.php';

?>
<main>
    <h1><?= $title?></h1>
    <div class="container">
        
    <section>
        <img src="images/jeu.png" alt="">
    <p>Voulant m'entrainer en Javascript et Jquery, je me suis lancé le défis de réaliser un jeu avec ces technologies</p>

    <h2>Les objectifs de développements</h2>

    <ol class="objectif">
        <li class="li-objectif">Créer une zone de jeu,</li>
        <li class="li-objectif">Créer un personnage,</li>
        <li class="li-objectif">Configurer des touches de déplacement pour le personnage,</li>
        <li class="li-objectif">Déplacement du personnage seulement dans la zone de jeu,</li>
        <li class="li-objectif">Placer des batiments,</li>
        <li class="li-objectif">Détruire les batiments placés,</li>
        <li class="li-objectif">Ajouter des colisions,</li>
        <li class="li-objectif">Ajouter un compteur d'argent,</li>
    </ol>

    <h2 class="titre"> La page de jeu</h2>

    <p>Lorsque le joueur arrive sur la page la première fois, il se retrouve avec un terrain d'herbe et un personnage <br>
    A gauche de la page il y à un menu à déplier pour réaliser plusieurs actions</p>
    
    <img src="images/page/jeu/arrive.png" alt="page d'arrivé du joueur">

    <h2 class="titre">Coloriser son personnage</h2>
    <p>Lorsque l'onglet "personnage" est déplié, la couleur du personnage peut être modifié. <br>
    le joueur va pouvoir modifier : 
    <ul class="objectif">
        <li>La couleur de peau,</li>
        <li>La couleur des chaussures,</li>
        <li>La couleur des oreilles</li>
    </ul></p>

    <img src="images/page/jeu/menu-colorisation.png" alt="option de colorisation du personnage">

    <h2 class="titre">Le déplacement du personnage</h2>
    <p>Le joueur peut déplacer son personnage avec les touches Z (haut) Q (gauche) S (bas) D (droite) ainsi qu'avec les touches directionnelles "haut" "bas" "gauche" "droite" <br>
    Lors du déplacement, le personnage change d'image pour regarder vers la direction qui lui a été indiqué.</p>


    <h2 class="titre">La construction de batiments - chemins</h2>
    <p>Dans l'onglets batiments il y à un magasin candy que l'on peux venir placer sur la carte. Pour se faire il faut : 
        <ol class="objectif">
           <li> Sélectionner le magasin avec sa souris, l'icone va alors être entouré de pointillets jaunes,</li>
           <li>Déplacer son personnage sur où le joueur souhaite le placer</li>
           <li>Appuyer sur la touche "c"</li>

        </ol>

        Le batiment se placera sous le personnage. Une fois que le joueur se sera déplacé, il ne pourra plus revenir sur cette case à cause des collisions. <br>
        Pour placer un chemin, c'est exactement le même procédé, sauf que le joueur pourra marché dessus une fois posé.
    </p>

    <h2 class="titre">Supprimer un batiment</h2>
    <p>Imaginons que le joueur se trompe en plaçant son batiment, celui-ci peut le supprimé <br>
    pour se faire il doit : 
    <ol class="objectif">
        <li>Placer le personnage devant le bâtiment avec le regard vers-celui,</li>
        <li>Appuyer sur la touche "x"</li>
        <li>Accepter de supprimer</li>
    </ol>

    Le message de la pop-up indique que le joueur perdra toutes ses améliorations du batiment, car dans le futur j'aurai aimé implémenter des améliorations de batiments. 
</p>
    </section>




    </div>

</main>

<?php
include_once 'footer.php';