<?php

require('config.php');
require('cookie.php');

if(isset($_SESSION['id'])) {

	header('Location: ../index.php');

}

if(isset($_POST['send'])) {

	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mail = htmlspecialchars($_POST['mail']);
	$mailconfirm = htmlspecialchars($_POST['mailconfirm']);
	$mdp = sha1($_POST['mdp']);
	$mdpconfirm = sha1($_POST['mdpconfirm']);

	if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mailconfirm']) AND !empty($_POST['mdp']) AND !empty($_POST['mdpconfirm'])) {

		$pseudolength = strlen($pseudo);

		if($pseudolength >= 4 AND $pseudolength <= 14) {

			$reqpseudo = $bdd->prepare("SELECT * FROM Utilisateur WHERE pseudo='$pseudo'");
			$reqpseudo->execute();
			$pseudoexist = $reqpseudo->rowCount();

			if($pseudoexist == 0) {

				if($mail == $mailconfirm) {

					if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {

						$reqmail = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail='$mail'");
						$reqmail->execute();
						$mailexist = $reqmail->rowCount();

						if($mailexist == 0) {

							if($mdp == $mdpconfirm) {

								$mdplength = strlen($_POST['mdp']);

								if($mdplength >= 6 AND $mdplength <= 32) {

									$insertmbr = $bdd->prepare("INSERT INTO Utilisateur(pseudo, mail, motDePasse) VALUES('$pseudo', '$mail', '$mdp')");
									$insertmbr->execute();
									$_SESSION['confirm'] = '<font color="green" id="error">' ."Votre compte a été créé !". '</font>';
									include '../mailbot/mailbot.php';

									$requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = '$mail' AND motDePasse = '$mdp'");
									$requser->execute();
									$userinfo = $requser->fetch();
									$_SESSION['id'] = $userinfo['id'];
									$_SESSION['pseudo'] = $userinfo['pseudo'];
									$_SESSION['mail'] = $userinfo['mail'];
									$_SESSION['avatar'] = $userinfo['avatar'];

									header("Location: ../index.php");

								} else {

									$erreur = '<font color="red" id="error">' ."Pour des raisons de sécurité, le mot de passe doit être comprit entre 6 et 32 caractères.". '</font>';

								}

							} else {

								$erreur = '<font color="red" id="error">' ."Vos mots de passes ne correspondent pas !". '</font>';

							}

						} else {

							$erreur = '<font color="red" id="error">' ."Cette adresse mail est déjà utilisée !". '</font>';

						}

					} else {

						$erreur = '<font color="red" id="error">' ."Cette adresse mail n'est pas valide !". '</font>';

					}

				} else {

					$erreur = '<font color="red" id="error">' ."Vos adresses mails ne correspondent pas !". '</font>';

				}

			} else {

				$erreur = '<font color="red" id="error">' ."Ce pseudo est déjà utilisé !". '</font>';

			}

		} else {

			$erreur = '<font color="red" id="error">' ."Le pseudo doit être compris entre 4 et 14 caractères !". '</font>';

		}

	} else {

		$erreur = '<font color="red" id="error">' ."Tous les champs doivent être remplis !". '</font>';

	}

}

require('inscription.view.php');

?>