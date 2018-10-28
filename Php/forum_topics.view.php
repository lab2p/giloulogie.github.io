<html>

<head>

	<title>Forum</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/forum_topics.css">
    <link rel="stylesheet" href="../Css/Header.css">
    <link rel="stylesheet" href="../Css/Aside.css">
    <link rel="stylesheet" href="../Css/REBOOT.css">
    <link rel="stylesheet" href="../scrollbar/jquery.mCustomScrollbar.min.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="../Js/javaS.js"></script>
    
</head>

<body>

	<header>

		<a href="index.php"><img src="../images/LOGO.PNG" class="logo" ></a>
		<p class="gilou">La Giloulogie</p>

		<nav>

			<ul>

				<li class="item"><a href="video_library.php">Vidéothèque</a></li>
				<li class="actual">Forum</li>
				<li class="item"><a href="gallery.php">Galerie</a></li>
				<li class="item"><a href="biography.php">Biographie</a></li>

			</ul>

		</nav>

	</header>

	<?php require('aside.php'); ?>

	<section>

		<div align="center">

			<table class="forum" >

				<tr class="headerForum">

					<th class="main">Sujets</th>
					<th class="subInfo">Messages</th>
					<th class="subInfo">Dernière activité</th>
					<th class="subInfo">Créateur</th>

				</tr>

				<?php 

				while($t = $topics->fetch()) { ?>

					<tr class="bodyForum">

						<td class="sec">

							<h4 class="t"> <a href="forum_show_topic.php?title=<?= url_custom_encode($t['subject']) ?>&id=<?= $t['topic_id'] ?>" class="tRedirect"> <?= $t['subject'] ?> </a> </h4>

						</td>

						<td class="tSubInfo">Messages</td>
						<td class="tSubInfo">Dernière activité</td>
						<td class="tSubInfo"> <?= $t['date_hour_creation'] ?> <br> <p style="font-size: 0.85vw;"> par <?= $t['pseudo'] ?> </p> </td>

					</tr>

				<?php } ?>

			</table>

			<br><br>

			<a href="forum_new_topic.php?categorie=<?= $id_categorie ?>" class="newtopic">Créer un nouveau topic</a>

		</div>

	</section>

</body>

</html>