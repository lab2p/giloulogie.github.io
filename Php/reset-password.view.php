<html>

<head>

	<title>Réinitialisation du mot de passe</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/REBOOT.css">
    <link rel="stylesheet" href="../Css/Header.css">
    <link rel="stylesheet" href="../Css/reset-password.css">
    <script type="text/javascript" src="../Js/javaS.js"></script>

</head>

<body>

<header>

	<a href="index.php"><img src="../images/LOGO.PNG" class="logo"></a>
	<p class="gilou">La Giloulogie</p>

	<nav>

		<ul>
			
			<li class="item"><a href="video_library.php">Vidéothèque</a></li>
			<li class="item"><a href="forum.php">Forum</a></li>
			<li class="item"><a href="gallery.php">Galerie</a></li>
			<li class="item"><a href="biography.php">Biographie</a></li>

		</ul>

	</nav>

</header>

<h1 id="h" align="center">Réinitialisation du mot de passe</h1>

<?php if($section == 'code') { ?>

	<div align="center">

		<h1 id="co" align="center"> Le code de vérification a bien été envoyé à "<?= $_SESSION['mailreset'] ?>". Veuillez le rentrer ci-dessous afin de récupérer votre compte :</h1>

	</div>

	<br>

	<div id="box" align="center">

		<form method="POST" action="">

			<div id="secbox" align="center">

				<td><input type="text" placeholder="Code de vérification" id="password" name="coderecup" value="<?php if(isset($mailreset)) { echo $mailreset; }?>"/></td></tr><br><br>

				<?php

					if(isset($erreur)) {

						echo $erreur;

					}

				?>

				<br><br>

				<input type="submit" name="send" value="Confirmer">

			</div>

		</form>

	</div>

<?php } else if($section == 'changepassword') { ?>

	<div align="center">

		<h1 id="co" align="center">Changement du mot de passe pour le compte de "<?= $_SESSION['mailreset'] ?>" :</h1>

	</div>

	<br>

	<div id="box" align="center">

		<form method="POST" action="">

			<div id="secbox" align="center">

				<tr><td><label for="newmdp" id="boxtext">Nouveau mot de passe :</label></td>
				<td><input type="password" name="newmdp" placeholder="Nouveau MDP" class="newmdp"/></td></tr><br><br><br>

				<tr><td><label for="newmdpconfirm" id="boxtext">Confirmation du nouveau MDP :</label></td>
				<td><input type="password" name="newmdpconfirm" placeholder="Confirmer le nouveau MDP" class="newmdpconfirm"/></td></tr><br><br><br>

				<?php

					if(isset($erreur)) {

						echo $erreur;

					}

				?>

				<br><br>

				<input type="submit" name="send" value="Confirmer les modifications">

			</div>

		</form>

	</div>

<?php } else { ?>

	<div align="center">

		<h1 id="co" align="center">Veuillez indiquer l'adresse mail de votre compte, un mail de réinitialisation du mot de passe vous sera envoyé :</h1>

	</div>

	<br>

	<div id="box" align="center">

		<form method="POST" action="">

			<div id="secbox" align="center">

				<td><input type="email" placeholder="Mail" id="mail" name="mail" value="<?php if(isset($mailreset)) { echo $mailreset; }?>"/></td></tr><br><br>

				<?php

					if(isset($erreur)) {

						echo $erreur;

					}

				?>

				<br><br>

				<input type="submit" name="send" value="Envoyer le mail">

			</div>

		</form>

	</div>

<?php } ?>

</body>

</html>