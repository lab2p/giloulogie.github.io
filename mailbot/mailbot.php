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

				}

				#separate {

					margin-top: 0%;
					margin-bottom: 0%;

				}

				#box {

					width: 750px;
					height: 38%;
					margin-top: 1%;
					margin-bottom: 1.25%;

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

				<h1 id='title'> Bienvenue dans la secte privée de Gilou ! </h1>

			<div align='center'>

				<img src='http://image.noelshack.com/fichiers/2018/43/2/1540293363-separatemail.png' id='separate'/>

			</div>

			<br>

			<div align='center'>

				<div id='box' align='center'>

					<p id='text'> Quel bon choix d'avoir choisi Gilou en tant que Dieu sacré ! </p>

					<p id='text'>Avec le statut de Giloulogue, tu pourras : </p>

					<p id='enum'> • Te la péter
					<br> • Avoir du swag en continuité
					<br> • Pratiquer le Giloulogisme
					<br> • Vénerer notre Dieu
					<br> • Avoir des vêtements exclusifs de notre Dieu (500€ HTC dont 499€ revenant à moi-même, l'€ restant est envoyé dans l'entretien du site, trust me) </p>

					<p id='text'> Après, libre à toi d'utiliser ces avantages comme bon te semble, mais n'oublie pas, Gilou observe tout tes faits et gestes, alors tiens toi bien ! </p>

				</div>

			<br>

			</div>

			<div align='center'>

				<img src='http://image.noelshack.com/fichiers/2018/43/2/1540293363-separatemail.png' id='separate'/>

				<p id='textEnd'> Giloulogie © 2018 • AMADE Mathilde & ARRONDEAU Bastien</p>

				<img src='http://image.noelshack.com/fichiers/2018/43/2/1540293363-separatemail.png' id='separate'/>

			</div>

		</body>

	</html>";

	mail(/*$mail*/"kromamcyt@gmail.com", "Inscription Giloulogie", $message, $header);

?>