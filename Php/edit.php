<?php

require('config.php');
require('cookie.php');

if(isset($_SESSION['pseudo'])) {

	$requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE pseudo='$_SESSION[pseudo]'");
	$requser->execute();
	$user = $requser->fetch();

	if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {

		$newpseudo = htmlspecialchars($_POST['newpseudo']);
		$pseudolength = strlen($newpseudo);

		if($pseudolength >= 4 AND $pseudolength <= 14) {

			$insertpseudo = $bdd->prepare("UPDATE Utilisateur SET pseudo='$newpseudo' WHERE id='$user[id]'");
			$insertpseudo->execute();

			$requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE id = '$user[id]'");
			$requser->execute();
			$userinfo = $requser->fetch();
			$_SESSION['pseudo'] = $userinfo['pseudo'];

			header('Location: profil.php?user='.$_SESSION['pseudo']);

		} else {

			$erreur = '<font color="red" id="error">' ."Le pseudo doit être compris entre 4 et 14 caractères !". '</font>';

		}

	}

	if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND !empty($_POST['mdp'])) {

		if($_POST['newmail'] != $user['mail']) {

			if(filter_var($_POST['newmail'], FILTER_VALIDATE_EMAIL)) {

				if(!empty($_POST['mdp'])) {

					$mdp = sha1($_POST['mdp']);

					$requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = '$_SESSION[mail]' AND motDePasse = '$mdp'");
					$requser->execute();
					$userexist = $requser->rowCount();

					if($userexist == 1) {

						$newmail = htmlspecialchars($_POST['newmail']);
						$insertpseudo = $bdd->prepare("UPDATE Utilisateur SET mail='$newmail' WHERE id='$user[id]'");
						$insertpseudo->execute();

						$requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE id = '$user[id]'");
						$requser->execute();
						$userinfo = $requser->fetch();
						$_SESSION['mail'] = $userinfo['mail'];

						header('Location: profil.php?user='.$_SESSION['pseudo']);

					} else {

						$erreur = '<font color="red" id="error">' ."Le mot de passe est incorrecte !". '</font>';

					}

				} else {

					$erreur = '<font color="red" id="error">' ."Vous devez rentrer votre mot de passe afin de modifier votre adresse mail !". '</font>';

				}

			} else {

				$erreur = '<font color="red" id="error">' ."Cette adresse mail n'est pas valide !". '</font>';

			}

		} else {

			$erreur = '<font color="red" id="error">' ."La nouvelle adresse mail est la même que votre adresse mail actuelle !". '</font>';

		}

	}

	if(isset($_POST['newmdp']) AND !empty($_POST['newmdp']) AND isset($_POST['newmdpconfirm']) AND !empty($_POST['newmdpconfirm'])) {

		if(!empty($_POST['mdp2'])) {

			if($_POST['newmdp'] == $_POST['newmdpconfirm']) {

				$mdplength = strlen($_POST['newmdp']);

				if($mdplength >= 6 AND $mdplength <= 32) {

					$mdp = sha1($_POST['mdp2']);

					$requser = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = '$_SESSION[mail]' AND motDePasse = '$mdp'");
					$requser->execute();
					$userexist = $requser->rowCount();

					if($userexist == 1) {

						$newmdp = sha1($_POST['newmdp']);

						$requser2 = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = '$_SESSION[mail]' AND motDePasse = '$newmdp'");
						$requser2->execute();
						$userexist2 = $requser2->rowCount();

						if($userexist2 == 0) {

							$insertpseudo = $bdd->prepare("UPDATE Utilisateur SET motDePasse='$newmdp' WHERE id='$user[id]'");
							$insertpseudo->execute();

							header('Location: profil.php?user='.$_SESSION['pseudo']);

						} else {

							$erreur = '<font color="red" id="error">' ."Le nouveau mot de passe est le même que votre mot de passe actuel !". '</font>';

						}

					} else {

						$erreur = '<font color="red" id="error">' ."Le mot de passe est incorrecte !". '</font>';

					}

				} else {

					$erreur = '<font color="red" id="error">' ."Pour des raisons de sécurité, le mot de passe doit être comprit entre 6 et 32 caractères.". '</font>';

				}

			} else {

				$erreur = '<font color="red" id="error">' ."Vos mots de passes ne correspondent pas !". '</font>';

			}

		} else {

			$erreur = '<font color="red" id="error">' ."Vous devez rentrer votre mot de passe actuel afin de modifier votre adresse mail !". '</font>';

		}

	}

	if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {

		$maxSize = 2097152;
		$validExt = array('jpg', 'jpeg', 'png', 'gif');

		if($_FILES['avatar']['size'] <= $maxSize) {

			$extUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
			$actualAvatar = "../membres/avatars/".$_SESSION['avatar'];

			if($actualAvatar) {

				unlink($actualAvatar);

				$updateAvatar = $bdd->prepare("UPDATE Utilisateur SET avatar = :avatar WHERE id = :id");
				$updateAvatar->execute(array(

				'avatar' => "",
				'id' => $_SESSION['id']

				));

			}

			if(in_array($extUpload, $validExt)) {

				$path = "../membres/avatars/".$_SESSION['id'].".".$extUpload;
				$result = move_uploaded_file($_FILES['avatar']['tmp_name'], $path);

				if($result) {

					$updateAvatar = $bdd->prepare("UPDATE Utilisateur SET avatar = :avatar WHERE id = :id");
					$updateAvatar->execute(array(

					'avatar' => $_SESSION['id'].".".$extUpload,
					'id' => $_SESSION['id']

					));

					$_SESSION['avatar'] = $_SESSION['id'].".".$extUpload;
					
					header('Location: profil.php?user='.$_SESSION['pseudo']);

				} else {

					$erreur = '<font color="red" id="error">' ."Échec de l'importation de votre image, veuillez réessayer.". '</font>';

				}

			} else {

				$erreur = '<font color="red" id="error">' ."Format de l'image incorrecte ! L'image doit être en '.jpg', '.jpeg', '.png' ou '.gif'.". '</font>';

			}

		} else {

			$erreur = '<font color="red" id="error">' ."L'image ne doit pas dépasser 2 Mo !". '</font>';

		}
 
	}

} else {

	header('Location: index.php');

}

require('edit.view.php');

?>