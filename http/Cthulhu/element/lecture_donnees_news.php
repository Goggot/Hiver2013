<div id="txt">	
	<?php
		try
		{
			// On récupère tout le contenu de la table
			$reponse = $bdd->query('SELECT * FROM News');
		    
			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch())
			{
			?>
				<p>
				<strong><?php echo $donnees['titre']; ?></strong><br />
				<?php echo $donnees['contenu']; ?><p align="center">----------</p>
				</p>
				<?php
			}

		    $reponse->closeCursor(); // Termine le traitement de la requête
				
		}
		catch(Exception $e)
		{
			// En cas d'erreur précédemment, on affiche un message et on arrête tout
			die('Erreur : '.$e->getMessage());
		}
			
		?>
		
</div>