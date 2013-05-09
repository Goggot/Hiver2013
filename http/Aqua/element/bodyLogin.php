
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