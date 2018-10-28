<?php

require('config.php');
require('functions_forum.php');

if(!isset($_SESSION['id'])) {

	header('Location: connexion.php');

}

if(isset($_GET['title'], $_GET['id']) AND !empty($_GET['title']) AND !empty($_GET['id'])) {

	$get_title = htmlspecialchars($_GET['title']);
	$get_id = htmlspecialchars($_GET['id']);

	$comp_title = $bdd->prepare("SELECT subject FROM F_Topics WHERE id = '$get_id'");
	$comp_title->execute();
	$comp_title = $comp_title->fetch()['subject'];

	if($get_title == url_custom_encode($comp_title)) {

		$topic = $bdd->prepare("SELECT * FROM F_Topics WHERE id = '$get_id'");
		$topic->execute();
		$topic = $topic->fetch();

		if(isset($_POST['submit_answer'], $_POST['answer'])) {

			$answer = htmlspecialchars($_POST['answer']);

			if(!empty($answer)) {
	
				$send = $bdd->prepare("INSERT INTO F_Messages(id_topic, id_posteur, contents, date_hour_post) VALUES (?, ?, ?, NOW())");
				$send->execute(array($get_id, $_SESSION['id'], $answer));

				unset($answer);

			} else {

				$msgerror = '<font color="red" id="error">' ."Votre réponse est vide !". '</font>';

			}

		}

		if(isset($_GET['page']) AND $_GET['page'] > 1) {

			$msgPerPage = 10;

		} else {

			$msgPerPage = 9;

		}

		$total_msg_req = $bdd->prepare("SELECT * FROM F_Messages WHERE id_topic = ?");
		$total_msg_req->execute(array($get_id));
		$total_msg = $total_msg_req->rowCount();
		$total_pages = ceil($total_msg/$msgPerPage);
		if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $total_pages) {
		   $_GET['page'] = intval($_GET['page']);
		   $actual_page = $_GET['page'];
		} else {
		   $actual_page = 1;
		}
		$depart = ($actual_page-1)*$msgPerPage;

		$all_answers = $bdd->prepare("SELECT * FROM F_Messages WHERE id_topic = ? LIMIT ".$depart.",".$msgPerPage);
		$all_answers->execute(array($get_id));

	} else {

		die('Erreur: le titre du topic est incorrecte !');

	}


	require('forum_show_topic.view.php');

} else {

	die('Erreur: topic introuvable !');

}

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

