

<?php
$title="tableau de bord";
require_once('header.php');

$contenu = "";
$reponseSuppression = "";
if(!estConnecte()){

    header('location:index.php');
    exit();
    }


//SUPPRIMER UN ARTICLE
if(isset($_GET['id'])){
    $succes2=executeRequete("SELECT * FROM articles WHERE id=:id", array(':id' => $_GET['id']));
    $donnees = $succes2->fetch(PDO::FETCH_ASSOC);

    unlink('photo/'.$donnees['image']);  
    $succes=executeRequete("DELETE FROM articles WHERE id=:id", array(':id' => $_GET['id']));
    
        if($succes -> rowCount()==1){ 
    
            $reponseSuppression .= '<div class="success">Vous  avez supprimé l\'article ! </div>';
        } else {
            $reponseSuppression .= '<div class="unSuccess">Vous n\'avez pas supprimé l\'article! </div>';
    }
    }

// affiche tous les articles : 
$resultat = executeRequete("SELECT * FROM articles, categories
WHERE articles.categorie_id=categories.categorie_id;"); 


$contenu .='<p class="nbArticle"> Nombre d\'articles : ' .$resultat->rowCOUNT() . '</p>';

$contenu .= '<table class="recap">';
    $contenu .= '<th> Titre </th>';

    $contenu .= '<th> image </th>';
    $contenu .= '<th> categorie </th>';
    $contenu .= '<th> action </th>';
    
  

while ($article =$resultat->fetch(PDO::FETCH_ASSOC)){   
    
   

    $contenu .= '<tr>';

        foreach ($article as $indice=>$valeur){
           

            if($indice == 'titre'){
                $contenu .= '<td>' . $valeur . '</td>';
            }elseif($indice == 'image'){
                $contenu .= '<td><img style="width:90px;"  src="photo/'.$valeur.'"></td>';          
            }elseif($indice == 'nom'){
                $contenu .='<td>' . $valeur. '</td>';
            
                }
            }

    // ajout des liens modifier et supprimer : 
    $contenu .= '<td><a href="newArticle.php?id='. $article['id'].'">  <img class="icones2" src="../images/pen.svg" > </a> 
                 <a href="?id='.$article['id'].'"> <img class="icones2" src="../images/trash.svg" > </a> </div>';
     $contenu .='</td>';  
     $contenu .= '</tr>';
    
}

$contenu .= '</table>';
?>

<main>
<?php 
echo $reponseSuppression;
echo $contenu; ?>
<a href="galerie.php"><img src="../images/image-gallery.svg" alt="" width="100"></a>
</main>

<?php
  
    require_once 'footer.php';
?>





