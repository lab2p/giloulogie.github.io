<aside>

	<div id="asideCenter" align="center">

		<br>

        	<?php if(isset($_SESSION['pseudo'])) { ?>

        		<div id="connected">

        			<?php

						if(!empty($_SESSION['avatar'])) {

							?>

							<?php if(basename($_SERVER['PHP_SELF']) == "index.php") { ?>

								<a href="Php/profil.php?user=<?php echo $_SESSION['pseudo']; ?>"><img class="avatar" src="membres/avatars/<?php echo $_SESSION['avatar']; ?>" ></a>

							<?php } else { ?>

								<a href="profil.php?user=<?php echo $_SESSION['pseudo']; ?>"><img class="avatar" src="../membres/avatars/<?php echo $_SESSION['avatar']; ?>" ></a>

							<?php } ?>

							<?php

						} else {

							?>

							<?php if(basename($_SERVER['PHP_SELF']) == "index.php") { ?>

								<a href="Php/profil.php?user=<?php echo $_SESSION['pseudo']; ?>"><img class="avatar" src="membres/avatars/default.jpg"></a>

							<?php } else { ?>

								<a href="profil.php?user=<?php echo $_SESSION['pseudo']; ?>"><img class="avatar" src="../membres/avatars/default.jpg"></a>

							<?php } ?>

							<?php

						}

					?>

					<br><br>

					<?php if(basename($_SERVER['PHP_SELF']) == "index.php") { ?>

						<a href="Php/edit.php" class="edit">Éditer mon profil</a><br><br>
						<a href="Php/deconnexion.php" class="logout">Se déconnecter</a>

					<?php } else { ?>

			            <a href="edit.php" class="edit">Éditer mon profil</a><br><br>
						<a href="deconnexion.php" class="logout">Se déconnecter</a>

					<?php } ?>

					<br><br>

				</div>

        	<?php } else { ?>

        		<div id="connect" align="center">

        			<br>

        			<?php if(basename($_SERVER['PHP_SELF']) == "index.php") { ?>

		        		<a class="cobutton" href="Php/connexion.php">Se connecter</a>

			            <br><br>

			            <a class="regbutton" href="Php/inscription.php">S'incrire</a>

			            <br><br><br>

		            <?php } else { ?>

		            	<a class="cobutton" href="connexion.php">Se connecter</a>

			            <br><br>

			            <a class="regbutton" href="inscription.php">S'incrire</a>

			            <br><br><br>

		            <?php } ?>

		        </div>

	        <?php } ?>

        <p id="date">Évènements</p>

        <?php if(basename($_SERVER['PHP_SELF']) == "index.php") { ?>

        	<img id="calendar" src="images/calendar.png">
	        
	        <br>

	        <div id="event" align="center">
	            <p>Aucun évènement à venir...</p>
	            <!--Mathilde, experte en trompe l'oeil depuis 2001 -->
	        </div>

	        <br>

	        <img id="anniv" src="images/gateau.png">

        <?php } else { ?>

	        <img id="calendar" src="../images/calendar.png">
	        
	        <br>

	        <div id="event" align="center">
	            <p>Aucun évènement à venir...</p>
	            <!--Mathilde, experte en trompe l'oeil depuis 2001 -->
	        </div>

	        <br>

	        <img id="anniv" src="../images/gateau.png">

        <?php } ?>
        
        <br><br>

        <div id="huit">

            <p> Gilou est né un 8 février !</p>

            <br>

        </div>

		</div>

</aside>