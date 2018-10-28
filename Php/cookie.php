<?php

if(!isset($_SESSION['id']) AND isset($_COOKIE['mail'], $_COOKIE['password']) AND !empty($_COOKIE['mail']) AND !empty($_COOKIE['password'])) {

	$requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = '$_COOKIE[mail]' AND motDePasse = '$_COOKIE[password]'");
	$requser->execute();
	$userexist = $requser->rowCount();

	if($userexist == 1) {

		$userinfo = $requser->fetch();
		$_SESSION['id'] = $userinfo['id'];
		$_SESSION['pseudo'] = $userinfo['pseudo'];
		$_SESSION['mail'] = $userinfo['mail'];
		$_SESSION['avatar'] = $userinfo['avatar'];

	}

}

?>
