<html>

<head>

	<title>Profil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/REBOOT.css">
    <link rel="stylesheet" href="../Css/Header.css">
    <link rel="stylesheet" href="../Css/edit.css">
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

<div id="box" align="center">

	<h1 id="h">Édition de mon profil</h1><br>

	<div id="secbox" align="center">

		<form method="POST" action="" enctype="multipart/form-data">

			<tr><td><label for="newpseudo" id="boxtext">Modifier le pseudo :</label></td>
			<td><input type="text" name="newpseudo" placeholder="<?php echo $user['pseudo']; ?>" class="newpseudo" value="<?php echo $user['pseudo']; ?>"/></td></tr><br><br><br><br>
			

			<tr><td><label for="newmail" id="boxtext">Nouvelle adresse mail :</label></td>
			<td><input type="email" name="newmail" placeholder="<?php echo $user['mail']; ?>" class="newmail" value="<?php echo $user['mail']; ?>"/></td></tr><br><br>

			<tr><td><label for="mdp" id="boxtext">Mot de passe actuel :</label></td>
			<td><input type="password" name="mdp" placeholder="MDP actuel" class="mdp"/></td></tr><br><br><br><br>


			<tr><td><label for="newmdp" id="boxtext">Nouveau mot de passe :</label></td>
			<td><input type="password" name="newmdp" placeholder="Nouveau MDP" class="newmdp"/></td></tr><br><br>

			<tr><td><label for="newmdpconfirm" id="boxtext">Confirmation du nouveau MDP :</label></td>
			<td><input type="password" name="newmdpconfirm" placeholder="Confirmer le nouveau MDP" class="newmdpconfirm"/></td></tr><br><br>

			<tr><td><label for="mdp2" id="boxtext">Mot de passe actuel :</label></td>
			<td><input type="password" name="mdp2" placeholder="MDP actuel" class="mdp"/></td></tr></td></tr><br><br><br><br>

			<tr><td><label for="avatar" id="boxtext" class="avatarText">Photo de profil (la modification peut prendre un certain temps) :</label></td>
				<img class="avatar" src="../membres/avatars/<?= $user['avatar']; ?>">
			<td><input type="file" name="avatar" class="inputfile"/></td></tr></td></tr><br><br><br><br><br><br><br><br>
		
			<input type="submit" name="send" value="Confirmer les modifications">

		</form>

	</div>

	<br>

	<?php

		if(isset($erreur)) {

			echo $erreur;

		}

	?>

</div>

</body>

</html>