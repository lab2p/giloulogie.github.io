<?php

require('config.php');
require('functions_forum.php');

if(!isset($_SESSION['id'])) {

	header('Location: connexion.php');

}

$categories = $bdd->query('SELECT * FROM F_Categories ORDER BY name');
$subcat = $bdd->prepare('SELECT * FROM F_SousCategories WHERE id_categorie = ? ORDER BY name');

require('forum.view.php');

?>

