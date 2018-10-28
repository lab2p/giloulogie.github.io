<?php

require('config.php');



if(isset($_SESSION['id'])) {

	if(isset($_GET['categorie'])) {

		$get_categorie = htmlspecialchars($_GET['categorie']);
		$categorie = $bdd->prepare('SELECT * FROM F_Categories WHERE id = ?');
		$categorie->execute(array($get_categorie));
		$cat_exist = $categorie->rowCount();

		if($cat_exist == 1) {

			$categorie = $categorie->fetch();
			$categorie = $categorie['name'];

			$souscategories = $bdd->prepare('SELECT * FROM F_SousCategories WHERE id_categorie = ? ORDER BY name');
			$souscategories->execute(array($get_categorie));

			if(isset($_POST['tsubmit'])) {

				$subject = htmlspecialchars($_POST['tsujet']);
				$contents = htmlspecialchars($_POST['tcontenu']);
				$souscategorie = htmlspecialchars($_POST['souscategorie']);

				$verify_sc = $bdd->prepare('SELECT id FROM F_SousCategories WHERE id = ? AND id_categorie = ?');
				$verify_sc->execute(array($souscategorie, $get_categorie));
				$verify_sc = $verify_sc->rowCount();

				if($verify_sc == 1) {

					if(!empty($subject) AND !empty($contents)) {

						if(strlen($subject) <= 50) {

							if(isset($_POST['tmail'])) {

								$notif_mail = 1;

							} else {

								$notif_mail = 0;

							}

							$send = $bdd->prepare("INSERT INTO F_Topics(id_creator, subject, contents, notif_creator, date_hour_creation) VALUES('$_SESSION[id]', '$subject', '$contents', '$notif_mail', NOW())");
							$send->execute();

							$lt = $bdd->query('SELECT id FROM F_Topics ORDER BY id DESC LIMIT 0,1');
							$lt = $lt->fetch();
							$id_topic = $lt['id'];

							$send = $bdd->prepare("INSERT INTO F_Topics_categories(id_topic, id_categorie, id_souscategorie) VALUES('$id_topic', '$get_categorie', '$souscategorie')");
							$send->execute();

						} else {

							$terror = '<font color="red" id="error">' ."Le sujet doit être inférieur à 50 caractères !". '</font>';

						}

					} else {

						$terror = '<font color="red" id="error">' ."Vous devez remplir tous les champs !". '</font>';

					}

				} else {

					$terror = '<font color="red" id="error">' ."Sous-catégorie invalide !". '</font>';

				}

			}

		} else {

			$terror = '<font color="red" id="error">' ."Catégorie invalide !". '</font>';

		}
	
	} else {

		die('Erreur: catégorie introuvable !');

	}

} else {

	header('Location: connexion.php');

}

require('forum_new_topic.view.php');

?>