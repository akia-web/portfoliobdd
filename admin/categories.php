<?php
$title = "Mes catégories";
require_once 'header.php';
$contenuCategorie ="";
$reponseSuppression="";
if(!estConnecte()){

    header('location:../index.php');
    exit();
    }

// SUPPRIMER UNE CATEGORIE
if(isset($_GET['categorie_id'])){
    $succes=executeRequete("DELETE FROM categories WHERE categorie_id=:categorie_id", array(':categorie_id' => $_GET['categorie_id']));
    
        if($succes -> rowCount()==1){ 
            
            $reponseSuppression .= '<div class="success">Vous  avez supprimé la categorie ! </div>';
        } else {
            $reponseSuppression .= '<div class="unSuccess">Vous n\'avez pas supprimé la categorie! </div>';
    }
    }
 // Post du formulaire des catégories
if(!empty($_POST['submit'])){
    // Insertion du produit en bdd : 
        $requete=executeRequete("REPLACE INTO   categories
                                        VALUES  (:categorie_id,
                                                 :nom)",
                                        array(
                                                ':categorie_id' =>$_POST['categorie_id'],
                                                ':nom'  =>$_POST['nom']
                                            ));
     
} 

$resultatCategorie = executeRequete("SELECT * FROM categories"); 

while ($categorie =$resultatCategorie->fetch(PDO::FETCH_ASSOC)){   
    $contenuCategorie .= '<div class="categories">';
    

        foreach ($categorie as $indice=>$valeur){
           

            if($indice == 'nom'){
                $contenuCategorie .= '<p>'.$valeur.'</p>';
                
            }
            }
    
    // ajout des liens modifier et supprimer : 
    $contenuCategorie .= '<a href="?categorie_id='.$categorie['categorie_id'].'"> <img class="icones2" src="../images/trash.svg" > </a> ';
     $contenuCategorie .='</div>';       
}
?>
<main>
<?php echo $reponseSuppression?>



<div class="formulaires-cat-sous-cat">
        <form action="" method="post" class="form2">
            <h1>Créer une nouvelle catégorie</h1>
            <input type="hidden" name="categorie_id" id="categorie_id" value="<?php echo $categorie_actuel['categorie_id']?? '';?>">
            <input type="text" placeholder="Nouvelle categorie" name="nom" id="nom" value="<?php echo $categorie_actuel['nom']?? '';?>">
            <button  name="submit" value="categorie">Enregistrer la catégorie</button>
       
        </form>


    
            <h2>Mes catégories</h2>
            <?php echo $contenuCategorie?>
    
     
 
       
     
    </div>

</main>

<?php
  
    require_once 'footer.php';
?>