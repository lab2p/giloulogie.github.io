<?php

require('config.php');
require('cookie.php');

if(isset($_SESSION['id'])) {

	header('Location: ../index.php');

}

if(isset($_POST['send'])) {

	$mailconnect = htmlspecialchars($_POST['mail']);
	$mdpconnect = sha1($_POST['mdp']);

	if(!empty($mailconnect) AND !empty($mdpconnect)) {

		$requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = '$mailconnect' AND motDePasse = '$mdpconnect'");
		$requser->execute();
		$userexist = $requser->rowCount();

		if($userexist == 1) {

			if(filter_var($mailconnect, FILTER_VALIDATE_EMAIL)) {

				if(isset($_POST['rememberBox'])) {

					setcookie('mail', $mailconnect, time() + 365*24*3600, '/', null, false, true);
					setcookie('password', $mdpconnect, time() + 365*24*3600, '/', null, false, true);

				}

				$userinfo = $requser->fetch();
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['pseudo'] = $userinfo['pseudo'];
				$_SESSION['mail'] = $userinfo['mail'];
				$_SESSION['avatar'] = $userinfo['avatar'];
				header('Location: profil.php?user='.$_SESSION['pseudo']);

			} else {

				$erreur = '<font color="red" id="error">' ."Cette adresse mail n'est pas valide !". '</font>';

			}

		} else {

			$erreur = '<font color="red" id="error">' ."L'adresse mail et le mot de passe ne correspondent pas !". '</font>';

		}

	} else {

		$erreur = '<font color="red" id="error">' ."Tous les champs doivent être remplis !". '</font>';

	}

}

require('connexion.view.php');

?>