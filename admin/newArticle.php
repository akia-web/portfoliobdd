<?php 
$title ="Créer un nouvel article";
require_once 'header.php';
$contenu = '';
$contenu2 = '';
$contenu3 = '';
// debug($_FILES);

// Post du formulaire des articles
if(!empty($_POST['submit'])&& $_POST['submit'] == 'article'){ 

    if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg') {
        $contenu .= 'Vous devez télécharger une photo.';
    }

    if (empty($contenu)) {

    $photo_bdd=''; // par defaut il n'y a pas de photo sur le produit
    
    // 9- suite : modification de la photo
    if (isset($_POST['photo_actuelle'])){
      
    $photo_bdd = $_POST['photo_actuelle']; // on prends la photo du formulaire actuelle et on la remet en BDD
    }
    
    if (!empty($_FILES['image']['name'])){
         // redefinit le nom de la photo
        $fichier_photo = 'ref_' . $_POST['titre'] . '_' .$_FILES['image']['name'];
         //définit le chemin de la photo
        $photo_bdd = $fichier_photo; 
         //copie de la photo dans notre dossier
        copy($_FILES['image']['tmp_name'],'photo/'. $photo_bdd); 
        // debug($photo_bdd);
    }

    // Insertion du produit en bdd : 
    $requete= executeRequete("REPLACE INTO articles 
                                     VALUES (:id,
                                            :titre,
                                            :contenu,
                                            :categorie_id,
                                            :image,
                                            :commentaire)",
                                     array(
                                     ':id' =>$_POST['id'],
                                     ':titre'  =>$_POST['titre'],
                                     ':contenu'  =>$_POST['contenu'],
                                     ':categorie_id' => $_POST['categorie_id'],
                                     ':image'      => $photo_bdd,
                                     ':commentaire' => $_POST['commentaire']            
                                     ));
                                   
//  header('location:tableau.php');
}}





// remplissage du formulaire de modification d'un article
if(isset($_GET['id'])){ 
    
    
   $resultat = executeRequete("SELECT * FROM articles, categories
                            WHERE articles.categorie_id=categories.categorie_id
                           
                         
                            AND id = :id", array('id' => $_GET['id']));
   $article_actuel = $resultat->fetch(PDO::FETCH_ASSOC); 

}


$afficheImage = executeRequete("SELECT DISTINCT image FROM articles");
while ($image = $afficheImage->fetch(PDO::FETCH_ASSOC)){   
        
        foreach ($image as $indice=>$valeur){
           

            if($indice == 'image'){
                $contenu2 .= '<div>';
                $contenu2 .= '<img class="wrap-tag3 imageGallerie2" data-tag="'.$valeur.'" src="photo/'.$valeur.'">';
                $contenu2 .= '<p>'.$valeur.'</p>';
                $contenu2 .= '</div>';
                
            }
        }
       
}

$afficheImage3 = executeRequete("SELECT DISTINCT nom FROM images");
while ($image2 = $afficheImage3->fetch(PDO::FETCH_ASSOC)){   
        
        foreach ($image2 as $indice=>$valeur){
           

            if($indice == 'nom'){
                $contenu3 .= '<div>';
                $contenu3 .= '<img class="wrap-tag3 imageGallerie2" data-tag="'.$valeur.'" src="photo/'.$valeur.'">';
                $contenu3 .= '<p>'.$valeur.'</p>';
                $contenu3 .= '</div>';
                
            }
        }
       
}



// savoir si l'on est connecté
if(!estConnecte()){

    header('location:index.php');
    exit();
}
  
      
?>
   
<!-- Formulaire des articles -->


<section class="container">
    <div>
        <?php echo $contenu ?>
    </div>

    <h1>Créer un nouvel article</h1>
    
    <form class="form1" method="post" action="" enctype="multipart/form-data"> 
    
        <input type="hidden" name="id" id="id" value="<?php echo $article_actuel['id']?? '';?>">

        <input type="text" placeholder="Titre de l'article"name="titre" id="titre" value="<?php echo $article_actuel['titre']?? '';?>">
        <div class="container-textarea">
      
            <div class="container-button">
                <p class="wrap-tag tag" data-tag="h1">h1</p>
                <p class="wrap-tag tag" data-tag="h2">h2</p>
                <p class="wrap-tag tag" data-tag="h3">h3</p>
                <p class="wrap-tag tag" data-tag="section">section</p>
                <p class="wrap-tag tag" data-tag="div">div</p>
                <p class="wrap-tag tag" data-tag="ul">ul</p>
                <p class="wrap-tag tag" data-tag="li">li</p>
            
                <p class="wrap-tag tag" data-tag="p">p</p>
                <p class="tag img">img</p>
                <p class="wrap-tag2 tag" data-tag="br">br</p>
            </div>

            <div class="container-photoArticle-textarea" id="3">
                <span class="close">x</span>

                    <div class="containerphoto1 containerphoto2">
                        <?php   echo $contenu2; ?>
                        <p>blabla</p>
                    </div>

                    <div class="containerphoto1 containerphoto2">
                        <?php   echo $contenu3; ?>
                    </div>

                
            
            </div>
            <textarea name="contenu" placeholder="Contenu de l'article" id="contenu" cols="30" rows="10"><?php echo $article_actuel['contenu']?? '';?></textarea>
        </div>    

        <div>
            <label for="categorie_id">Catégorie</label>
       
            <SELECT name="categorie_id" size="1">
                <?php

                    $categorie = executeRequete("SELECT  * FROM categories");

                    while($cat = $categorie->fetch(PDO::FETCH_ASSOC)){
                    
                        $selectCat .= '<option';
                        if(isset($article_actuel['categorie_id'])&&$article_actuel['categorie_id'] == $cat['categorie_id']) echo 'selected';
                        
                        $selectCat .=  ' value="'.$cat['categorie_id'].'">'.$cat['nom'] .'</option>'; // on met la première lettre en majuscule avec la fonction prédéfinie ucfirst();  
                
        
                    }
                    echo $selectCat;
                ?>
            </SELECT>
        </div>

        <textarea name="commentaire" placeholder="commentaire de l'article" id="commentaire" cols="30" rows="10"><?php echo $article_actuel['commentaire']?? '';?></textarea>
      
        <div class="container-envoie">
            <label for="image">Photo</label>
       
            <input type="file" name="image" id="image"><br>
           
        

            <!-- Modification de la photo -->
            <?php
                if(isset($article_actuel['image'])){ // si on est dans modification, on affiche la photo actuelle
                echo '<p> Photo actuelle : </p>';
                echo '<img src="'.$article_actuel['image'].'" style="width:80px;">';
                echo '<p><input type="hidden" name="photo_actuelle" value="' . $article_actuel['image']. '"></p>'; 
                }
            ?>
        </div>

     
        <button  name="submit" value="article">Enregistrer l'article</button>
    </form> <!-- fin formulaire de la création d'un article-->

  


</section>


  
<?php
  
    require_once 'footer.php';
?>