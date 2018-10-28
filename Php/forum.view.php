<html>

<head>

	<title>Forum</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/forum.css">
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

		<a href="../index.php"><img src="../images/LOGO.PNG" class="logo" ></a>
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

					<th class="main">Catégories</th>
					<th class="subInfo">Réponses</th>
					<th class="subInfo">Dernière activité</th>

				</tr>

				<?php 

				while($c = $categories->fetch()) { 

					$subcat->execute(array($c['id']));

					$sousCategories = '';

					while($sc = $subcat->fetch()) {

						$sousCategories .= '<a href="forum_topics.php?categorie='.url_custom_encode($c['name']).'&souscategorie='.url_custom_encode($sc['name']).'" class="scRedirect">'.($sc['name']).'</a> | ';
										
					}

					$sousCategories = substr($sousCategories, 0, -3);

				?>

					<tr class="bodyForum">

						<td class="sec">

							<h4 class="c"> <a href="forum_topics.php?categorie=<?= url_custom_encode($c['name']); ?>" class="cRedirect"> <?= $c['name'] ?> </a> </h4>
							<p class="sc">

								<?= $sousCategories ?>

							</p>

						</td>

						<td class="cSubInfo"><?= get_msg_categories($c['id']) ?></td>
						<td class="cSubInfo"><?= get_last_answer($c['id']) ?></td>

					</tr>

				<?php } ?>

			</table>

		</div>

	</section>

</body>

</html>

<?php

function url_custom_encode($titre) {
	$titre = htmlspecialchars($titre);
	$find = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', 'Œ', 'œ', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', 'Š', 'š', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', 'Ÿ', '?', '?', '?', '?', 'Ž', 'ž', '?', 'ƒ', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
	 $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
	$titre = str_replace($find, $replace, $titre);
	$titre = strtolower($titre);
	$mots = preg_split('/[^A-Z^a-z^0-9]+/', $titre);
	$encoded = "";

	foreach($mots as $mot) {

	  if(strlen($mot) >= 3 OR str_replace(['0','1','2','3','4','5','6','7','8','9'], '', $mot) != $mot) {

	     $encoded .= $mot.'-';

	  }

	}

	$encoded = substr($encoded, 0, -1);
	return $encoded;
}

?>