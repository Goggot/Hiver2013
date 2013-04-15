<div class="site-container">
     <div class="page-container">
	  <div class="site-header">
	       <div class="page-title-section">
		    <h1>CVMAQUA - Groupe de protection de l'eau</h1>
		    <h2>Modification</h2>
	       </div>
	       <div class="menu-section">
		    <ul>
			 <li><a href="index.php">Accueil</a></li>
			 <li><a href="images.php">Galerie photos</a></li>
			 <li><a href="contact.php">Contactez-nous</a></li>
			 <li><a href="login.php">Connexion</a></li>
             <li><a href="produit.php">Produit</a></li>
		    </ul>
	       </div>
	       <div class="clear"></div>
	  </div>
	  <div class="page-content">
			 <?php $tab = $action->executeAction();
             	
                foreach ($tab as $ligne){
                    for ($i = 0; $i < 4; $i++){
                        echo $ligne[$i];
						?>
                        <?php
                    }
					?>
					</br>
                    <?php
                }
              ?>
          
	  </div>
     </div>
</div>