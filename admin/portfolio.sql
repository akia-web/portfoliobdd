-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 15 avr. 2021 à 01:57
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `contenu` text NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `categorie_id`, `image`, `commentaire`) VALUES
(18, 'Blog', '<section class=\"container\" href=\"top\">\r\n    \r\n        <div class=\"container-intro\">\r\n            <img src=\"admin/photo/ref_hibou.png\"  alt=\"hibou\" class=\"image-article1\">\r\n            <p class=\"intro\">N\'ayant eu que deux semaines de cours sur le langage PHP, j\'ai voulu m\'entrainer en réalisant un blog. </p>\r\n            <p class=\"intro\">Lors de nos cours nous avions réalisé un site e-commerce. </p>\r\n            <p class=\"intro\"> Lorsque j\'ai réfléchi à  comment faire, je me suis rendu compte qu\'il fonctionnait à peu prêt pareil. </p>\r\n            <p class=\"intro\"> Je me suis donc inspiré du code du site de e-commerce pour l\'adapter à mon site de blog.</p>\r\n\r\n    \r\n\r\n            <p class=\"centrer\">\r\n              <a  href=\"http://akia.re.sauvat.pro/blog\" target=\"_blank\"> Voir le site  BLOG <img src=\"images/export.svg\" alt=\"\" width=\"15\"> </a>\r\n            </p>\r\n\r\n        </div>\r\n\r\n        <h2>Les objectifs de développements</h2>\r\n\r\n        <ol class=\"objectif\">\r\n            <li class=\"li-objectif\">Créer une base de données,</li>\r\n            <li class=\"li-objectif\">Relier la base de données au site</li>\r\n            <li class=\"li-objectif\">Créer une page d\'accueil avec toutes les images d\'articles</li>\r\n            <li class=\"li-objectif\">Créer un systeme de navigation par catégories et sous catégories</li>\r\n            <li class=\"li-objectif\">Créer une page de connexion</li>\r\n            <li class=\"li-objectif\">Créer une page : vue d\'ensemble des articles, catégories, sous catégories</li>\r\n            <li class=\"li-objectif\">Créer la fonction : modifier et supprimer un article</li>\r\n            <li class=\"li-objectif\">Créer la fonction : supprimer une catégorie et sous-categorie</li>\r\n            <li class=\"li-objectif\">Créer une page : Ajout d\'articles</li>\r\n            <li class=\"li-objectif\">Créer un ajout de catégories et sous-catégories</li>\r\n        </ol>\r\n</section>\r\n\r\n\r\n<section class=\"section-contenu-article\">\r\n        <h2 class=\"titre\">La page d\'accueil</h2> \r\n        <h3>1. L\'élement central de la page.</h3>\r\n        <p>La page d\'accueil se compose d\'une partie avec à droite toutes les photos des différents articles sous forme de galerie, et à gauche un menu de navigation organisé par \r\n         catégorie. <br> <br>\r\n\r\n        Chaque photo mène à la page de l\'article en question. <br><br>\r\n        Les images des articles sont affiché dynamiquement grâce à une requête depuis la base de données.\r\n        </p> \r\n\r\n         <img class=\"image-article\" src=\"admin/photo/ref_accueil-pc.png\"  alt=\"page d\'accueil du blog\">\r\n\r\n        <h3>2. Le menu de navigation</h3>\r\n        <p>Lors de la création des articles, il y est prévu de rajouter une catégorie et une sous catégorie à l\'article. \r\n        Le menu de navigation contient donc toutes les catégories et sous catégories que les articles publiés possèdent. <br>  <br>\r\n        Il est de base replié et s\'anime en slidant vers le bas lorsque l\'on click sur une catégorie. <br>\r\n        Une animation au survol de la souris sur les liens à été créer pour les afficher en rose. <br> <br>\r\n        Les catégories et sous catégories sont générées dynamiquement grâce à une requete depuis la base de données.</p> \r\n\r\n       <img class=\"image-article\" src=\"admin/photo/ref_navigation2-pc.png\"  alt=\"menu de navigation\">\r\n\r\n        <h2 class=\"titre\">La page article</h2>\r\n\r\n        <p> Lorsque image est cliquée, elle renvoie sur l\'article en question grâce à un $_GET <br> <br>\r\n        La page est créer dynamiquement et dedans les requêtes affichent : <br>\r\n        - A gauche la photo de l\'article. <br>\r\n        - A droite le titre de l\'article, son contenu et la date de publication. <br> <br>\r\n        Tout en haut de l\'article il y a une petite croix qui permets de revenir à la page d\'accueil du blog.</p> \r\n\r\n        <h2 class=\"titre\">La page catégorie</h2>\r\n\r\n        <p> Lorsque qu\'un lien vers une catégorie est cliqué, celui-ci renvois vers une page où seulement les articles de cette même catégorie apparaissent. <br> <br>\r\n        Grâce à une requête, les nouveaux articles qui contiennent la sous-catégorie en question s\'affichent automatiquement. <br> <br>\r\n        Le nombre d\'articles de la sous-catégorie est lui aussi généré automatiquement grâce à un compte de lignes sur la reqête. </p> \r\n\r\n        <img class=\"image-article\" src=\"admin/photo/ref_navigation2-pc.png\"  alt=\"La page des catégories d\'articless\">\r\n\r\n        <h2 class=\"titre\">La page récapitulative d\'articles</h2>\r\n        <p> Lorsque que la connexion à la page d\'administration à été réalisé, la redirection se fait sur un tableau de bord. Tous les éléments affichés sont générés dynamiquement grâce à \r\n            des requêtes et des $_GET pour les boutons de suppressions/modifications<br> <br> Cette pages est composée de plusieurs parties. Elle se décompose comme ceci : </p>\r\n        \r\n        <ul class=\"objectif\">\r\n          <li>un bouton de deconnexion,</li>\r\n          <li>Le nombre d\'articles total</li>\r\n          <li>Les catégories</li>\r\n          <li>Les sous-catégories</li>\r\n        </ul>\r\n\r\n        <p> Les articles sont colorisés un sur deux d\'une couleur différentes. Ils sont classés du plus ancien au plus récent. <br> Chaque \"carte\" affiche : </p>\r\n            \r\n        <ul class=\"objectif\">\r\n          <li>Le titre,</li>\r\n          <li>un extrait du contenu,</li>\r\n          <li>l\'image,</li>\r\n          <li>la catégorie</li>\r\n          <li>la sous catégorie,</li>\r\n          <li>un bouton pour le modifier,</li>\r\n          <li>un bouton pour le supprimer</li>\r\n         </ul>\r\n    \r\n         <img class=\"image-article\" src=\"admin/photo/ref_recap-article-pc.png\"  alt=\"Page tableau de bord\">\r\n\r\n         <h2 class=\"titre\">Démonstration de la création d\'un article</h2>\r\n         <h3>1. Rédaction de l\'article</h3>\r\n        <p>Voici un article que j\'ai créé pour le test avec un titre, un contenu, une image, une nouvelle catégorie et une sous-catégorie. <br> Chaque champs ira s\'enregistrer dans la base \r\n           de données pour pouvoir générer l\'affichage dynamiquement.</p> \r\n\r\n        <img class=\"image-article\" src=\"admin/photo/ref_creer-nouvel-article-pc.png\"  alt=\"Ecriture du nouvel article\">\r\n\r\n        <h3>2. Enregistrement de l\'article et redirection vers la page d\'accueil</h3>\r\n        <p> Une fois l\'article enregistré, la redirection se faire sur la page d\'accueil et on y voit l\'image du nouvel article. <br>\r\n        Celui-ci ce place en dernier à cause du tri effectué sur la requête.</p> \r\n        <p> La nouvelle catégorie et sous-catégorie s\'affiche bien automatiquement.</p> \r\n\r\n       <img class=\"image-article\" src=\"admin/photo/ref_creer-nouvel-article3-pc.png\"  alt=\"Affichage de la nouvelle catégorie et sous catégorie\">\r\n\r\n       <h3>4. Ouverture de l\'article</h3>\r\n\r\n        <p> Lorsque l\'on clic sur l\'image du chat, on a bien accès à son contenu.</p> \r\n\r\n      <img class=\"image-article\" src=\"admin/photo/ref_creer-nouvel-article4-pc.png\"  alt=\"Ouverture du nouvel article\">\r\n\r\n      <h2>Responsive</h2>\r\n      <p>Ci-dessous, les images du site affichées sur le téléphone.</p>\r\n\r\n      <div class=\"container-img-articles-tel\">\r\n\r\n         <div class=\"carte-article-tel\">\r\n                <p>La page d\'accueil</p>\r\n                <img class=\"image-article imagetel\" src=\"admin/photo/ref_accueil-tel.png\"  alt=\"Page d\'accueil adapté sur téléphone\">\r\n         </div>\r\n\r\n\r\n          <div class=\"carte-article-tel\">\r\n                <p>Ouverture d\'un article</p>\r\n                <img class=\"image-article imagetel\" src=\"admin/photo/ref_creer-article-tel.png\"  alt=\"page ouverture d\'un article adapté sur\">\r\n           </div>\r\n\r\n            <div class=\"carte-article-tel\">\r\n                <p>Page récap</p>\r\n               <img class=\"image-article imagetel\" src=\"admin/photo/ref_ouverture-article-tel.png\"  alt=\"page tableau de bord adapté sur téléphone\">\r\n            </div>\r\n\r\n            <div class=\"carte-article-tel\">\r\n                <p>Page créer un nouvel article</p>\r\n                <img class=\"image-article imagetel\" src=\"admin/photo/ref_recap-article-tel.png\"  alt=\"page créer un nouvel article adapté sur téléphone\">\r\n            </div>\r\n        \r\n        </div>\r\n\r\n\r\n        <h2>Les objectifs d\'améliorations</h2>\r\n        <ol class=\"objectif\">\r\n            <li>Rajouter des padding sur le texte pour les téléphones</li> <br>\r\n            <li>Inculure un éditeur de texte pour la création d\'articles</li><br>\r\n            <li>Transformer la structure du code en model MVC</li><br>\r\n            <li>Changer completement le design de la page de récap des articles</li><br>\r\n        </ol>\r\n\r\n        </section>', 26, 'ref_Blog_pc-blog.png', '       <p>  Réalisation d\'un blog pour mes différents projets de cours en design. <br>\r\n                    Ce site à été réalisé en php. \r\n                    automatisations des articles \r\n                    automatisation des catégories d\'articles\r\n                    </p>\r\n\r\n                    <h5>Les technologies utilisées</h5>\r\n                    <img src=\"images/php.svg\" alt=\"icone du langage Php\" class=\"icones2\">\r\n\r\n <a class=\"liendesite\" href=\"http://akia.re.sauvat.pro/blog\" target=\"_blank\">Aller sur le site Blog </a> \r\n\r\n                   '),
(20, 'Code astuces', '<section class=\"container\" href=\"top\">\r\n    <div class=\"container-intro\">\r\n      <img class=\"image-article1\" src=\"admin/photo/ref_code-astuce.png\"  alt=\"logo du site code astuce\">\r\n      <p class=\"intro\">Ce site a été conçu pour répertorier mes connaissances ainsi que d\'aider mes amis. </p>\r\n      <p class=\"intro\">Actuellement, il contient des cours en HTML. La partie en CSS est en cours, la partie Javascript n\'est pas encore disponible.</p>\r\n    \r\n        <p class=\"centrer\">\r\n            <a  href=\"http://akia.re.sauvat.pro/blog\" target=\"_blank\">\r\n            Voir le site  CODE ASTUCES <img src=\"images/export.svg\" alt=\"\" width=\"15\"> </a>\r\n        </p>\r\n\r\n        <h2 class=\"titre\">La page d\'accueil</h2>\r\n        <p>Je voulais représenter ma page d\'accueil comme une bibliothèque avec des étagères et des livres <br>\r\n        actuellement le livre de html est complet et celui de css n\'est pas encore fini. <br>\r\n        j\'ai aussi rajouté une animation sur le livre pour que quand l\'utilisateur passe la souris dessus, celui-ci s\'ouvre\r\n        </p>\r\n\r\n       <img class=\"image-article\" src=\"admin/photo/ref_accueil.png\"  alt=\"page d\'accueil du site code astuce\">\r\n       <img class=\"image-article\" src=\"admin/photo/ref_livre-ouvert.png\"  alt=\"page d\'accueil avec un livre ouvert du site code astuce\">\r\n\r\n        <h2 class=\"titre\">L\'ouverture du livre Html</h2>\r\n\r\n        <p>Quand on ouvre un livre, il y à une vidéo de présentation sur chaque onglets (Actuellement seulement sur la page organisation du livre html) <br>\r\n        Chaque livres est divisé en 4 onglets qui regroupent chacun un thème spécifique</p>\r\n        <h3>Image du livre html, premier onglet.</h3>\r\n\r\n        <img class=\"image-article\" src=\"admin/photo/ref_cd-article-html.png\"  alt=\"contenu du premier livre\">\r\n\r\n        <h3>Ouverture du menu burger</h3>\r\n        <p>Même si le menu n\'est pas très esthétique, il a le mérite d\'exister. </p>\r\n        <p>Si l\'on clique sur un des liens, cela scroll jusqu\'à arriver au chapitre en question.</p>\r\n\r\n        <img class=\"image-article\" src=\"admin/photo/ref_cd-menu.png\"  alt=\"Le menu de navigation dans un livre\">\r\n\r\n        <h2 class=\"titre\">L\'ouverture du livre CSS</h2>\r\n        <img class=\"image-article\" src=\"admin/photo/ref_cd-article-css.png\"  alt=\"Contenu du livre Css\">\r\n\r\n        <h2>Responsive</h2>\r\n\r\n        <div class=\"container-img-articles-tel\">\r\n          <div class=\"carte-article-tel imagetel\">\r\n             <p> La page d\'accueil</p>\r\n             <img class=\"image-article\" src=\"admin/photo/ref_cd-accueil-tel.png\"  alt=\"Page d\'accueil adapté au téléphone\">\r\n          </div>\r\n\r\n          <div class=\"carte-article-tel\">\r\n             <p> Le contenu d\'un livre ouvert</p>\r\n             <img class=\"image-article imagetel\" src=\"admin/photo/ref_cd-article-tel.png\"  alt=\"contenu de livre adapté au téléphone\">\r\n          </div>\r\n\r\n          <div class=\"carte-article-tel\">\r\n             <p> Le menu de liens chapitres</p>\r\n             <img class=\"image-article imagetel\" src=\"admin/photo/ref_cd-menu-tel.png\"  alt=\"\">\r\n          </div>\r\n        </div>\r\n\r\n        <h2>Les objectifs d\'améliorations</h2>\r\n\r\n        <ol class=\"objectif\">\r\n\r\n          <li>Repenser le site, je suis bloquée avec 4 onglets par livre et j\'aimerai en faire plus,</li>\r\n          <li>Continuer à le remplir,</li>\r\n          <li> Faire toutes les vidéos.</li>\r\n       </ol>\r\n\r\n</section>', 26, 'ref_Code astuces_pc-code.png', '<p>  Réalisation d\'un site sur mes connaissances en code. <br>\r\n                    Site réalisé avec html / CSS / Javascript <br>\r\n                    Vidéo et cours html et css <br> \r\n                    </p>\r\n                    <h5>Les technologies utilisées</h5>\r\n                    <div>\r\n                        <img src=\"images/js.svg\" alt=\"icones\" class=\"icones2\"> \r\n                        <img src=\"images/jquery.svg\" alt=\"icones\" class=\"icones2\">\r\n                    </div>\r\n\r\n<a class=\"liendesite\" href=\"https://code-astuces.netlify.app/\" target=\"_blank\"> Lien vers le site </a>'),
(21, 'heu', '<section></section>', 20, 'ref_heu_pc-jeu.png', '<p>  Réalisation d\'un jeu <br>\r\n                        Javascript et Jquery ont été utilisé pour faire fonctionner le site. <br>\r\n                        Déplacement avec des touches <br>\r\n                        Construction de chemins et de batiments.\r\n                    </p>\r\n                    <h5>Les technologies utilisées</h5>\r\n                    <div>\r\n                        <img src=\"images/js.svg\" alt=\"icones\" class=\"icones2\"> \r\n                        <img src=\"images/jquery.svg\" alt=\"icones\" class=\"icones2\">\r\n\r\n<a href=\"http://akia.re.sauvat.pro/jeu\" target=\"_blank\">site</a>');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `categorie_id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categorie_id`, `nom`) VALUES
(20, 'une categorie'),
(26, 'projets');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `nom`) VALUES
(17, 'ref_hibou.png'),
(18, 'ref_accueil-pc.png'),
(19, 'ref_creer-article-pc.png'),
(20, 'ref_creer-categorie-pc.png'),
(21, 'ref_creer-nouvel-article2-pc.png'),
(22, 'ref_creer-nouvel-article3-pc.png'),
(23, 'ref_creer-nouvel-article4-pc.png'),
(24, 'ref_creer-nouvel-article-pc.png'),
(25, 'ref_navigation2-pc.png'),
(26, 'ref_recap-article-pc.png'),
(27, 'ref_accueil-tel.png'),
(28, 'ref_creer-article-tel.png'),
(29, 'ref_ouverture-article-tel.png'),
(30, 'ref_recap-article-tel.png'),
(33, 'ref_code-astuce.png'),
(34, 'ref_accueil.png'),
(35, 'ref_cd-accueil-tel.png'),
(36, 'ref_cd-article-css.png'),
(37, 'ref_cd-article-html.png'),
(38, 'ref_cd-article-tel.png'),
(39, 'ref_cd-menu.png'),
(40, 'ref_cd-menu-tel.png'),
(41, 'ref_livre-ouvert.png');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(250) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `mdp`, `statut`) VALUES
(1, 'Akia', 'Kyara123', 1),
(2, 'Nws', 'NormandieWebSchool', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`categorie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
