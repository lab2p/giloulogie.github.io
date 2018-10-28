<?php

require('config.php');
require('cookie.php');

if(isset($_GET['user'])) {

	$getpseudo = htmlspecialchars($_GET['user']);
	$requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE pseudo = ?");
	$requser->execute(array($getpseudo));
	$userexist = $requser->rowCount();

	if($userexist == 1) {

		$userinfo = $requser->fetch();

	} else {

		$erreur = "Désolé, ce compte n'existe pas...";
		$erreur = '<font id="error">' .$erreur. '</font>';

	}

} else {

	header('Location: index.php');

}

require('profil.view.php');

?>