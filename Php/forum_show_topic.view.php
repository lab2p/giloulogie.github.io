<html>

<head>

	<title>Forum</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/forum_show_topic.css">
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

			<table class="forum">

				<tr class="headerForum">

					<th class="main">Auteur</th>
					<th class="subInfo">Sujet : <?= $topic['subject'] ?></th>

				</tr>

				<?php if($actual_page == 1) { ?>

				<tr class="bodyForum">

					<td class="mainInfo">

						<h4 class="t"> <?= get_pseudo($topic['id_creator']) ?> </h4>

					</td>

					<td class="tSubInfo"> <?= $topic['contents'] ?> </td>

				</tr>

				<?php } ?>

				<?php while($a = $all_answers->fetch()) { ?>

					<tr class="bodyForum">

						<td class="sec">

							<h4 class="t"> <?= get_pseudo($a['id_posteur']) ?> </h4>

						</td>

						<td class="tSubInfo"> <?= $a['contents'] ?> </td>

					</tr>

				<?php } ?>

			</table>

			<?php

				for($i=1;$i<=$total_pages;$i++) {

					if($i == $actual_page) {

						echo $i.' ';

					} else {

						echo '<a href="forum_show_topic.php?title='.$get_title.'&id='.$get_id.'&page='.$i.'">'.$i.'</a> ';

					}

				}

			?>

			<br>

			<?php if(isset($_SESSION['id'])) { ?>

				<form method="POST">

					<textarea placeholder="Réponse..." name="answer" style="width: 60%;"><?php if(isset($answer)) { echo $answer; } ?></textarea>

					<br>

					<input type="submit" name="submit_answer" value="Poster votre réponse"></input>

				</form>

			<?php } ?>

		</div>

		<?php if(isset($msgerror)) {

			echo $msgerror;

		} ?>

	</section>

</body>

</html>