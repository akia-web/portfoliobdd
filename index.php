<?php
require_once 'fonctions.php'; 
$title = "Portfolio de charline";
$contenu ="";





$resultatArticles = executeRequete("SELECT image, titre, commentaire, id, categorie_id FROM articles WHERE categorie_id = 26"); 


    while ($articles =$resultatArticles->fetch(PDO::FETCH_ASSOC)){   

        $contenu.= '<div class="container-card">';
   

        foreach ($articles as $indice=>$valeur){
            
           
            if($indice == 'image'){
                $contenu.= '<div class="card">';
              
                $contenu .= '<img src="admin/photo/'.$valeur.'" class="photo-card">';
                $contenu .='</div>';
                
            }
            if($indice == 'titre'){
                $contenu .='<div class="description">';
               
                $contenu .= '<h4>'.$valeur.'</h4>';
            }
            if($indice == 'commentaire'){
                $contenu .= $valeur;
                $contenu .= '<a class="lien-Gauche" href="article.php?id='.$articles["id"].'"> 
                voir l\'article
                </a>';
                $contenu .= '</div>';
               
               
            }             
        } 
        $contenu .= '</div>';

}   

require_once 'header.php';       
?>


<main  class="mainIndex">

    
<section class="haut">
        <h1>Charline Royer</h1>
        <p> Développeuse... Web</p>

        <a href="#projets"><img class="icones icones3" src="images/arrow-down.svg" alt="Icone de fleche qui descent"></a>
    </section>
    
    <p class="annonce">Passionnée depuis un peu plus d'un an au développement web, je cherche toujours à apprendre. Je préfère le côté back car j'aime l'automatisation. Cependant j'aime aussi le front s'il y a une maquette. Il n'y a pas un seul jour où je ne regarde pas de vidéos pour m'améliorer dans mon code.
    </p>

    <a class="lien-Gauche lien-Gauche2" href="about.php"> En lire plus</a>

    <section class="container-bas">

         

        <div class="section-title titre" id="projets">
            <img class="icones" src="images/web.svg" alt="Icone représentant le code">
            <h3> Projets personnels</h3>
        </div>

       <?php 
       echo $contenu;
       ?> 
         </section>
</main>

<?php

require_once 'footer.php';