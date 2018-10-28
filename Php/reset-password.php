<?php

require('config.php');
require('cookie.php');

if(isset($_SESSION['id'])) {

	header('Location: ../index.php');

}

if(isset($_GET['section'])) {

	$section = htmlspecialchars($_GET['section']);

} else {

	$section = "";

}

if(isset($_POST['send']) AND isset($_POST['mail'])) {

	if(!empty($_POST['mail'])) {

		$mailreset = htmlspecialchars($_POST['mail']);

		if(filter_var($mailreset, FILTER_VALIDATE_EMAIL)) {

			$requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = '$mailreset'");
			$requser->execute();
			$userexist = $requser->rowCount();

			if($userexist == 1) {

				$userinfo = $requser->fetch();
				$pseudo = $userinfo['pseudo'];
				$_SESSION['mailreset'] = $mailreset;
				$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ$&*%,?!#";
				$passwordreset = "";

				for($i=0; $i < 10 ; $i++) { 

					$passwordreset .= $characters[rand(0, strlen($characters))];

				}

				$mailreset_exist = $bdd->prepare("SELECT * FROM Reinitialisation WHERE mail = '$_SESSION[mailreset]'");
				$mailreset_exist->execute();
				$mailreset_exist = $mailreset_exist->rowCount();

				if($mailreset_exist == 1) {

					$insertreset = $bdd->prepare("UPDATE Reinitialisation SET password = ? WHERE mail = ?");
					$insertreset->execute(array($passwordreset, $_SESSION['mailreset']));

					include 'resetmail.php';
					header('Location: reset-password.php?section=code');

				} else {

					$insertreset = $bdd->prepare("INSERT INTO Reinitialisation(mail, password) VALUES (?, ?)");
					$insertreset->execute(array($_SESSION['mailreset'], $passwordreset));

					include 'resetmail.php';
					header('Location: reset-password.php?section=code');

				}

			} else {
				
				$erreur = '<font color="red" id="error">' ."Cette adresse mail n'est pas utilisée sur le site !". '</font>';

			}

		} else {

			$erreur = '<font color="red" id="error">' ."Cette adresse mail n'est pas valide !". '</font>';

		}

	} else {

		$erreur = '<font color="red" id="error">' ."Veuillez indiquer l'adresse mail de votre compte !". '</font>';

	}

} 

if(isset($_POST['send']) AND isset($_POST['coderecup'])) {

	if(!empty($_POST['coderecup'])) {

		$code_recup = htmlspecialchars($_POST['coderecup']);
		$codereq = $bdd->prepare("SELECT * FROM Reinitialisation WHERE mail = '$_SESSION[mailreset]' AND password = '$code_recup'");
		$codereq->execute();
		$code_exist = $codereq->rowCount();

		if($code_exist == 1) {

			$up_confirmed = $bdd->prepare("UPDATE Reinitialisation SET confirmed = 1 WHERE mail = '$_SESSION[mailreset]'");
			$up_confirmed->execute();

			header('Location: reset-password.php?section=changepassword');

		} else {

			$erreur = '<font color="red" id="error">' ."Le code de vérification que vous rentré est incorrecte !". '</font>';

		}

	} else {

		$erreur = '<font color="red" id="error">' ."Veuillez rentrer le code de vérification que vous avez reçu !". '</font>';

	}

}

if(isset($_POST['send']) AND isset($_POST['newmdp']) AND isset($_POST['newmdpconfirm'])) {

	$confirmed = $bdd->prepare("SELECT confirmed FROM Reinitialisation WHERE mail = '$_SESSION[mailreset]'");
	$confirmed->execute();
	$verif_confirmed = $confirmed->fetch();
	$verif_confirmed = $verif_confirmed['confirmed'];

	if($verif_confirmed == 1) {

		if(!empty($_POST['newmdp']) AND !empty($_POST['newmdpconfirm'])) {

			if($_POST['newmdp'] == $_POST['newmdpconfirm']) {

				$mdplength = strlen($_POST['newmdp']);

				if($mdplength >= 6 AND $mdplength <= 32) {

					$newmdp = sha1($_POST['newmdp']);
					$insertpseudo = $bdd->prepare("UPDATE Utilisateur SET motDePasse='$newmdp' WHERE mail='$_SESSION[mailreset]'");
					$insertpseudo->execute();

					$del_code = $bdd->prepare("DELETE FROM Reinitialisation WHERE mail = '$_SESSION[mailreset]'");
					$del_code->execute();

					header('Location: connexion.php');

				} else {

					$erreur = '<font color="red" id="error">' ."Pour des raisons de sécurité, le mot de passe doit être comprit entre 6 et 32 caractères.". '</font>';

				}

			} else {

				$erreur = '<font color="red" id="error">' ."Vos mots de passes ne correspondent pas !". '</font>';

			}

		} else {

			$erreur = '<font color="red" id="error">' ."Veuillez remplir tous les champs !". '</font>';

		}

	} else {

		$erreur = '<font color="red" id="error">' ."Veuillez d'abord valider votre mail avec le code de vérification envoyé par mail précédemment !". '</font>';

	}

}

require('reset-password.view.php');

?>