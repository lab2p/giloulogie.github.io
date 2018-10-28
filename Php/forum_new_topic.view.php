<html>

<head>

	<title>Forum</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/forum_new_topic.css">
    <link rel="stylesheet" href="../Css/Header.css">
    <link rel="stylesheet" href="../Css/Aside.css">
    <link rel="stylesheet" href="../Css/REBOOT.css">
    <link rel="stylesheet" href="../scrollbar/jquery.mCustomScrollbar.min.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="../Js/javaS.js"></script>
    
</head>

<body>

	<header >

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

		<div class="box">

			<form method="POST">

			    <table>

			      	<tr>

			         	<th colspan="2" class="title">Nouveau Topic <br><br></th>

			      	</tr>

			      	<tr>

			         	<td class="text">Sujet :<br><br></td>
			         	<td><input type="text" name="tsujet" size="70" maxlength="50" placeholder="Sujet du topic" /><br><br></td>

			      	</tr>

			      	<tr>

			         	<td class="text">Catégorie :</td>
			         	<td>

			            	<?= $categorie ?>

			         	</td>

			      	</tr>

			      	<tr>

			         	<td class="text">Sous-Catégorie :<br><br></td>

			         	<td>

			            	<select name="souscategorie">

			            		<?php while($sc = $souscategories->fetch()) { ?>
			            			<option value="<?= $sc['id'] ?>"> <?= $sc['name'] ?> </option>
			            		<?php } ?>

			            	</select>

			            	<br><br>

			         	</td>

			      	</tr>

			      	<tr>

			         	<td class="text">Message :<br><br></td>
			         	<td><textarea class="textarea" name="tcontenu" class="contents" placeholder="Message..."></textarea></td>

			      	</tr>

			  		<tr>

			  			<td><p id="rememberText">Me notifier des réponses par mail<br><br></p></td>
			  			<td><input type="checkbox" id="cbx" name="tmail" style="display:none;"/><label for="cbx" class="toggle"><span></span></label><td>

			     	</tr>
			      	
			      	<tr>

			         	<td colspan="2" class="submitTopic"><input type="submit" name="tsubmit" value="Poster le Topic"/></td>

			      	</tr>

			   	</table>
			   	
			</form>

			<br>

			<?php if(isset($terror)) {

						echo $terror; ?><?php

			} ?>

		</div>

	</section>

</body>

</html>