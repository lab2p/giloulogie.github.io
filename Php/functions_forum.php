<?php

	function get_pseudo($id) {

		global $bdd;

		$pseudo = $bdd->prepare("SELECT pseudo FROM Utilisateur WHERE id = '$id'");
		$pseudo->execute();
		$pseudo = $pseudo->fetch()['pseudo'];

		return $pseudo;

	}

	function get_msg_categories($id_category) {

		global $bdd;

		$nbr = $bdd->prepare("SELECT F_Messages.id FROM F_Messages 
							LEFT JOIN F_Topics_categories ON F_Topics_categories.id_topic = F_Messages.id_topic
							WHERE F_Topics_categories.id_categorie = ?");
		$nbr->execute(array($id_category));

		return $nbr->rowCount();

	}

	function get_last_answer($id_category) {

		global $bdd;

		$last = $bdd->prepare("SELECT F_Messages.* FROM F_Messages 
							LEFT JOIN F_Topics_categories ON F_Topics_categories.id_topic = F_Messages.id_topic
							WHERE F_Topics_categories.id_categorie = ? ORDER BY F_Messages.date_hour_post DESC LIMIT 0,1");
		$last->execute(array($id_category));
		$last = $last->fetch();
		$show = $last['date_hour_post'];
		$show .= '<br> de '.get_pseudo($last['id_posteur']);

		return $show;

	}

?>