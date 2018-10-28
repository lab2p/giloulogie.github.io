<html>

<head>

	<title>Inscription</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/REBOOT.css">
    <link rel="stylesheet" href="../Css/Header.css">
    <link rel="stylesheet" href="../Css/inscription.css">

</head>

<body>

<header>

	<a href="../index.php"><img src="../images/LOGO.PNG" class="logo"></a>
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

<div id="box" align="center">

	<h1 id="co" align="center">Inscription</h1>

	<div id="secbox" align="center">

		<form method="POST" action="">

				<tr><td><label for="pseudo" id="boxtext">Pseudo :</label></td>
				<td><input type="text" placeholder="Pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; }?>"/></td></tr><br><br><br>

				<tr><td><label for="mail" id="boxtext">Mail :</label></td>
				<td><input type="email" placeholder="Mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; }?>"/></td></tr><br><br><br>

				<tr><td><label for="mailconfirm" id="boxtext">Confirmer le mail :</label></td>
				<td><input type="email" placeholder="Confirmer le mail" id="mailconfirm" name="mailconfirm" value="<?php if(isset($mailconfirm)) { echo $mailconfirm; }?>"/></td></tr><br><br><br>

				<tr><td><label for="mdp" id="boxtext">Mot de passe :</label></td>
				<td><input type="password" placeholder="Mot de passe" id="mdp" name="mdp"/></td></tr><br><br><br>

				<tr><td><label for="mdpconfirm" id="boxtext">Confirmer le MDP :</label></td>
				<td><input type="password" placeholder="Confirmer le MDP" id="mdpconfirm" name="mdpconfirm"/></td></tr><br><br><br><br>

			<input type="submit" name="send" value="Créer le compte">

		</form>

	</div>

	<?php

		if(isset($erreur)) {

			echo $erreur;

		}

	?>

</div>

</body>

</html>