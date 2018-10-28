<aside>

	<div id="asideCenter" align="center">

		<br>

        	<?php if(isset($_SESSION['pseudo'])) { ?>

        		<div id="connected">

        			<?php

						if(!empty($_SESSION['avatar'])) {

							?>

							<a href="profil.php?user=<?php echo $_SESSION['pseudo']; ?>"><img class="avatar" src="../membres/avatars/<?php echo $_SESSION['avatar']; ?>" ></a>

							<?php

						} else {

							?>

							<a href="profil.php?user=<?php echo $_SESSION['pseudo']; ?>"><img class="avatar" src="../membres/avatars/default.jpg"></a>

							<?php

						}

					?>

					<br><br>

		            <a href="edit.php" class="edit">Éditer mon profil</a><br><br>
					<a href="deconnexion.php" class="logout">Se déconnecter</a>

					<br><br>

				</div>

        	<?php } else { ?>

        		<div id="connect" align="center">

        			<br>

	        		<a class="cobutton" href="connexion.php">Se connecter</a>

		            <br><br>

		            <a class="regbutton" href="inscription.php">S'incrire</a>

		            <br><br><br>

		        </div>

	        <?php } ?>

        <p id="date">Évènements</p>

        <img id="calendar" src="../images/calendar.png">
        
        <br>

        <div id="event" align="center">
            <p>Aucun évènement à venir...</p>
            <!--Mathilde, experte en trompe l'oeil depuis 2001 -->
        </div>

        <br>

        <img id="anniv" src="../images/gateau.png">
        
        <br><br>

        <div id="huit">

            <p> Gilou est né un 8 février !</p>

            <br>

        </div>

		</div>

</aside>