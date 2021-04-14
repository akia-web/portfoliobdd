<?php

$title = "Portfolio de charline";
$contenu ="";



require_once 'header.php';

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

          
?>


<main  class="mainIndex">

    

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