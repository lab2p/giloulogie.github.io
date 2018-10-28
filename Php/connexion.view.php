<html>

<head>

	<title>Connexion</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/REBOOT.css">
    <link rel="stylesheet" href="../Css/Header.css">
    <link rel="stylesheet" href="../Css/connexion.css">
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

<h1 id="h" align="center">Espace membre</h1>

<h1 id="co" align="center">Connexion</h1>

<div id="box" align="center">

<form method="POST" action="">

	<div id="secbox" align="center">

		<td><input type="email" placeholder="Mail" id="mail" name="mail" value="<?php if(isset($mailconnect)) { echo $mailconnect; }?>"/></td></tr><br><br>

		<td><input type="password" placeholder="Mot de passe" id="mdp" name="mdp"/></td></tr>

		<br><br><br>

		<div class="center" align="center">

			<input type="checkbox" id="cbx" name="rememberBox" style="display:none;"/><label for="cbx" class="toggle"><span></span></label>

			<br>

			<p id="rememberText"> Se souvenir de moi : </p>

		</div>

		<?php

			if(isset($erreur)) {

				echo $erreur;

			}

		?>

		<br><br>

		<input type="submit" name="send" value="Confirmer">

		<p id="text">Pas encore de compte ? Cliquez <a href="inscription.php" class="redirect">ici</a> pour en créer un !</p>
		<p id="text">Mot de passe oublié ? Cliquez <a href="reset-password.php" class="redirect">ici</a> pour envoyer un mail de réinitialisation du mot de passe !</p>

	</div>

</form>

</div>

</body>

</html>