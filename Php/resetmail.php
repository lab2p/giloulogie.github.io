<?php

	$header="MIME-Version: 1.0\r\n";
	$header.='From:"Giloulogie"<support@giloulogie.com>'."\n";
	$header.='Content-Type:text/html; charset="uft-8"'."\n";
	$header.='Content-Transfer-Encoding: 8bit';

	$message ="

	<html>

		<head>

		<link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet'> 

			<style>

				@font-face {

					font-family: 'Roboto';
					font-style: normal;
					font-weight: 300;
					src: local('Roboto Light'), local('Roboto-Light'), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmSU5fCRc4EsA.woff2) format('woff2');
					unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;

				}

				#header {

					margin-top: 0%;
					margin-bottom: 0%;
					width: 45%;

				}

				#separate {

					margin-top: 0%;
					margin-bottom: 0%;
					width: 45%;

				}

				#box {

					width: 40%;
					margin-top: -2%;
					margin-bottom: 1%;
					margin-left: auto;
					margin-right: auto;

				}

				#title {

					font-family: 'Roboto', sans-serif;
					font-size: 2vw;
					margin-top: 1%;
					margin-bottom: 1%;
					font-weight: bold;
					text-align: center;
					color: black;

				}

				#text {

					font-family: 'Roboto', sans-serif;
					font-size: 1vw;
					text-align: left;
					color: black;

				}

				#url {

					font-family: 'Roboto', sans-serif;
					font-size: 1vw;
					text-align: left;
					color: orange;
					text-decoration: none;

				}

				#enum {

					font-family: 'Roboto', sans-serif;
					font-size: 1vw;
					margin-left: 5%;
					text-align: left;
					margin-top: 5%;
					margin-bottom: 5.25%;
					color: black;

				}

				#textEnd {

					font-family: 'Roboto', sans-serif;
					font-size: 0.75vw;
					text-align: center;
					font-weight: bold;
					margin-top: 1.5%;
					margin-bottom: 1.5%;
					color: black;

				}

			</style>

		</head>

		<body>

			<div align='center'>

				<img src='http://image.noelshack.com/fichiers/2018/43/2/1540293363-headermail.png' id='header'/>

			</div>

				<h1 id='title'> Mail de réinitialisation du mot de passe </h1>

			<div align='center'>

				<img src='http://image.noelshack.com/fichiers/2018/43/2/1540293363-separatemail.png' id='separate'/>

			</div>

			<br>

			<div id='box' align='center'>

				<p id='text' align='center'> Bonjour ".$pseudo.", </p>

				<p id='text'>Vous nous avez indiqué avoir oublié votre mot de passe. </p> 

				<br>

				<p id='text'> Voici votre code de récupération de votre compte : <b>".$passwordreset."</b></p>

				<br>

				<p id='text'> Cordialement, la Giloulogie. </p>

			</div>

			<br>

			<div align='center'>

				<img src='http://image.noelshack.com/fichiers/2018/43/2/1540293363-separatemail.png' id='separate'/>

				<p id='textEnd'> Giloulogie © 2018 • AMADE Mathilde & ARRONDEAU Bastien</p>

				<img src='http://image.noelshack.com/fichiers/2018/43/2/1540293363-separatemail.png' id='separate'/>

			</div>

		</body>

	</html>";

	mail($mailreset, 'Réinitialisation mot de passe', $message, $header);

?>