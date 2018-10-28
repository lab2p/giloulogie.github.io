<?php

require('config.php');

if(!isset($_SESSION['id'])) {

	header('Location: connexion.php');

}

if(isset($_GET['categorie']) AND !empty($_GET['categorie'])) {

	$get_categorie = htmlspecialchars($_GET['categorie']);	
	$categories = array();
	$req_categories = $bdd->query('SELECT * FROM F_Categories');

	while($c = $req_categories->fetch()) {

		array_push($categories, array($c['id'], url_custom_encode($c['name'])));

	}

	foreach($categories as $cat) {

		if(in_array($get_categorie, $cat)) {

			$id_categorie = intval($cat[0]);

		}

	}

	if(@$id_categorie) {

		if(isset($_GET['souscategorie']) AND !empty($_GET['souscategorie'])) {

			$get_souscategorie = htmlspecialchars($_GET['souscategorie']);
			$souscategories = array();
			$req_souscategories = $bdd->prepare('SELECT * FROM F_SousCategories WHERE id_categorie = ?');
			$req_souscategories->execute(array($id_categorie));	

			while($c = $req_souscategories->fetch()) {

				array_push($souscategories, array($c['id'], url_custom_encode($c['name'])));

			}

			foreach($souscategories as $souscat) {

				if(in_array($get_souscategorie, $souscat)) {

					$id_souscategorie = intval($souscat[0]);

				}

			}

		}

		$req = "SELECT *, F_Topics.id AS topic_id FROM F_Topics
				LEFT JOIN F_Topics_categories ON F_Topics.id = F_Topics_categories.id_topic
				LEFT JOIN F_Categories ON F_Topics_categories.id_categorie = F_Categories.id
				LEFT JOIN F_SousCategories ON F_Topics_categories.id_souscategorie = F_SousCategories.id
				LEFT JOIN Utilisateur ON F_Topics.id_creator = Utilisateur.id
				WHERE F_Categories.id = ?
				ORDER BY F_Topics.id DESC";

		if(@$id_souscategorie) {

			$req .=  " AND F_SousCategories.id = ?";
			$exec_array = array($id_categorie, $id_souscategorie);

		} else {

			$exec_array = array($id_categorie);

		}

		$topics = $bdd->prepare($req);
		$topics->execute($exec_array);

	} else {

		die('Erreur: catégorie introuvable !');

	}

} else {

	die('Erreur: aucune catégorie selectionnée !');

}

require('forum_topics.view.php');

function url_custom_encode($titre) {
	$titre = htmlspecialchars($titre);
	$find = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', 'Œ', 'œ', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', 'Š', 'š', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', 'Ÿ', '?', '?', '?', '?', 'Ž', 'ž', '?', 'ƒ', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
	 $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
	$titre = str_replace($find, $replace, $titre);
	$titre = strtolower($titre);
	$mots = preg_split('/[^A-Z^a-z^0-9]+/', $titre);
	$encoded = "";

	foreach($mots as $mot) {

	  if(strlen($mot) >= 3 OR str_replace(['0','1','2','3','4','5','6','7','8','9'], '', $mot) != $mot) {

	     $encoded .= $mot.'-';

	  }

	}

	$encoded = substr($encoded, 0, -1);
	return $encoded;
}

?>

