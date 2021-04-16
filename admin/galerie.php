<?php
$title = "Ma galerie";

require_once 'header.php';
$contenu='';
$contenu2="";
$contenu3="";
$reponseSuppression="";

if(!estConnecte()){

    header('location:../index.php');
    exit();
    }

//SUPPRIME LES PHOTOS
if(isset($_GET['id'])){
    $succes2=executeRequete("SELECT * FROM images WHERE id=:id", array(':id' => $_GET['id']));
    $donnees = $succes2->fetch(PDO::FETCH_ASSOC);

    unlink('photo/'.$donnees['nom']);  

    $succes=executeRequete("DELETE FROM images WHERE id=:id", array(':id' => $_GET['id']));
    
        if($succes -> rowCount()==1){ 
            
            $reponseSuppression .= '<div class="success">Vous  avez supprimé la categorie ! </div>';
        } else {
            $reponseSuppression .= '<div class="unSuccess">Vous n\'avez pas supprimé la categorie! </div>';
    }

   
    }
// ENREGISTRER LA PHOTO EN BDD
if(!empty($_POST['submit'])){ 
    $photo_bdd='';

    if ($_FILES['nom']['type'] != 'image/png' && $_FILES['nom']['type'] != 'image/jpg' && $_FILES['nom']['type'] != 'image/jpeg') {
        $contenu .= 'Vous devez télécharger une photo.';
    }

    if (empty($contenu)) {

    
    if (!empty($_FILES['nom']['name'])){
         // redefinit le nom de la photo
        $fichier_photo = 'ref_' . $_FILES['nom']['name'];
         //définit le chemin de la photo
        $photo_bdd =  $fichier_photo; 
         //copie de la photo dans notre dossier
        copy($_FILES['nom']['tmp_name'],'photo/'.$photo_bdd); 
        // debug($photo_bdd);
    }

    // Insertion du produit en bdd : 
    $requete= executeRequete("REPLACE INTO images 
                                     VALUES (:id,
                                            :nom)",
                                     array(
                                     ':id' =>$_POST['id'],
                                     ':nom'=>$photo_bdd            
                                     ));
}}

// AFFICHE LES PHOTOS PRINCIPALES
$afficheImage = executeRequete("SELECT DISTINCT id, image FROM articles");
while ($image = $afficheImage->fetch(PDO::FETCH_ASSOC)){   
        
        foreach ($image as $indice=>$valeur){
           

            if($indice == 'image'){
                $contenu2 .= '<div>';
                $contenu2 .= '<img class="imageGallerie" src="photo/'.$valeur.'">';
                $contenu2 .= '<p>'.$valeur.'</p>';
                $contenu2 .= '</div>';
                
                
            }
        }
       
}

$afficheImage2 = executeRequete("SELECT DISTINCT id, nom FROM images");
while ($image2 = $afficheImage2->fetch(PDO::FETCH_ASSOC)){   
        
        foreach ($image2 as $indice=>$valeur){
           

            if($indice == 'nom'){
                $contenu3 .= '<div>';
                $contenu3 .= '<img class="imageGallerie" src="photo/'.$valeur.'">';
                $contenu3 .= '<p>'.$valeur.'</p>';
                $contenu3 .= '<a href="?id='.$image2['id'].'"> <img class="icones2 iconetrash" src="../images/trash.svg" > </a>';
                $contenu3 .= '</div>';
                
                
            }

           
        }
       
}
// AFFICHE LES PHOTOS D'ARTICLES

?>
<main>
    <h1>Ma gallerie photo</h1>

    <form action="" method="post" class="form2" enctype="multipart/form-data">
        <h2>Ajouter une photo</h2>
        <input type="hidden" name="id" id="id">
       <input type="file" name="nom" id="nom"><br>
        <button  name="submit" value="envoyer">Envoyer</button>
        
    </form>

    <h2 class="titrecentrer">Photos principales</h2>
    <div class="containerphoto1">
        <?php echo $contenu2; ?>
    </div>

    <h2 class="titrecentrer">Photos d'articles</h2>
    <div class="containerphoto1">
        <?php echo $contenu3; ?>
    </div>

</main>
<?php
require_once 'footer.php';