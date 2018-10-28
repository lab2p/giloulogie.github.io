<html>

<head>

	<?php if($userexist == 1) { ?>

		<title>Profil de <?= $userinfo['pseudo']; ?></title>

	<?php } else { ?>

		<title>Profil introuvable</title>

	<?php } ?>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/REBOOT.css">
    <link rel="stylesheet" href="../Css/Header.css">
    <link rel="stylesheet" href="../Css/profil.css">
    <script type="text/javascript" src="../Js/javaS.js"></script>

</head>

<body>

<header>

	<a href="index.php"><img src="../images/LOGO.PNG" class="logo"></a>
	<p class="gilou">La Giloulogie</p>

	<nav>

		<ul>

			<li class="item"><a href="video_library.php">Vidéothèque</a></li>
			<li class="item"><a href="forum/forum.php">Forum</a></li>
			<li class="item"><a href="gallery.php">Galerie</a></li>
			<li class="item"><a href="biography.php">Biographie</a></li>

		</ul>

	</nav>

</header>

<div id="box" align="center">

	<?php 

	if(isset($erreur)) {

		?>

		<img src="../images/profilenotfound.gif" id="gif"></img>
		<br>

		<?php

		echo $erreur;

	} else {

	?>

		<h1 id="h">Profil de <?php echo $userinfo['pseudo']; ?></h1>

		<div id="info">

			<?php

			if(!empty($userinfo['avatar'])) {

				?>

				<img class="avatar" src="../membres/avatars/<?php echo $userinfo['avatar']; ?>">

				<?php

			} else {

				?>

				<img class="avatar" src="../membres/avatars/default.jpg">

				<?php

			}

			?>
			<br><br>

			<p> Pseudo : <?php echo $userinfo['pseudo']; ?> </p>
			<p> Mail :  <?php echo $userinfo['mail']; ?> </p><br>

		</div>

		<?php

		if(isset($_SESSION['id']) AND $userinfo['pseudo'] == $_SESSION['pseudo']) {

			?>

				<br><br><a href="edit.php" class="edit">Éditer mon profil</a>
				<a href="deconnexion.php" class="logout">Se déconnecter</a>

			<?php

		}

		?>

	<?php

	}

	?>

</div>

</body>

</html>