<?php
require_once 'fonctions.php';

if(isset($_GET['id'])){ // si le detail d'un produit est demandé
    $resultat = executeRequete("SELECT * FROM articles WHERE id = :id", array(':id' => $_GET['id'])); // on met un marqueur dans la requete quand la variable contient des données qui proviennent de l'internaute ($_GET; $_POST, $_COOKIE, $_FILES...)

    if($resultat -> rowCount() == 0){ // si le select ne retourne pas de ligne c'est que le produit n'existe pas ou plus
            header('location:index.php'); 
            exit();
    }

//2 preparation des données du produit sélectionné : 

$produit = $resultat -> fetch(PDO::FETCH_ASSOC);
extract($produit); // créer des variables au nom des indices avec dedans la valeur correspondante

}else{ // si l'internaute accède directement à la page ou que l'url est altérée
header('location:index.php'); 
exit();

}
$title = $titre;
include_once 'header.php';
?>

<body>
<h4><?php echo $titre;?></h4>
<?php
echo $contenu;
include_once 'footer.php';
?>




</body>
