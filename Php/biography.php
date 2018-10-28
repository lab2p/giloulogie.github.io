<?php

session_start();

$bdd = new PDO('mysql:host=sql2.freemysqlhosting.net;dbname=sql2262056', 'sql2262056', 'uX3*aM2*');

?>

<html>

<head>
	<title>Biographie</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/biography.css">
    <link rel="stylesheet" href="../Css/Header.css">
    <link rel="stylesheet" href="../Css/Aside.css">
    <script type="text/javascript" src="../Js/javaS.js"></script>

    <link rel="stylesheet" href="../scrollbar/jquery.mCustomScrollbar.min.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

	<script>

	    (function($){
	        $(window).load(function(){
	            $("body").mCustomScrollbar({

	            	theme:'rounded-dots-dark',
	            	scrollInertia:1000,
	            	mouseWheel: {scrollAmount: 150},
	            	keyboard: {scrollAmount: 15}

	            });
	        });
	    })(jQuery);

	</script>

</head>

<body>
	<header>
		<a href="index.php"><img src="../images/LOGO.PNG" class="logo" ></a>
		<p class="gilou">La Giloulogie</p>

		<nav>

			<ul>

				<li class="item"><a href="video_library.php">Vidéothèque</a></li>
				<li class="item"><a href="forum.php">Forum</a></li>
				<li class="item"><a href="gallery.php">Galerie</a></li>	
				<li class="actual">Biographie</a></li>

			</ul>

		</nav>

	</header>

	<?php include_once('aside.php'); ?>

</body>

</html>