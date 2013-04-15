<div class="site-container">
     <div class="page-container">
	  <div class="site-header">
	       <div class="page-title-section">
		    <h1>CVMAQUA - Groupe de protection de l'eau</h1>
		    <h2>Connexion</h2>
	       </div>
	       <div class="menu-section">
		    <ul>
			 <li><a href="index.php">Accueil</a></li>
			 <li><a href="images.php">Galerie photos</a></li>
			 <li><a href="contact.php">Contactez-nous</a></li>
			    <li><a href="login.php">Connexion</a></li>
		    </ul>
	       </div>
	       <div class="clear"></div>
	  </div>
	  <div class="page-content">
	       <form action="login.php" method="post">
		    <?php
			 if ($action->getResultMessage() == 2) {
		    ?>
			      <h3 style="color:red">Nom usager / mot de passe invalide</h3>
		    <?php
			 }
		    ?>
		    <div>
			 <label for="username">
			      Nom d'usager : 
			 </label>
			 <input type="text" name="username" id="username" />
		    
			 <label for="password">
			      Mot de passe : 
			 </label>
			 <input type="password" name="pwd" id="password" />
		    </div>
		    <input type="submit" value="Connexion" />
	       </form>
	  </div>
     </div>
</div>