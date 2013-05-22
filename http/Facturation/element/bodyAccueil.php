
<?php 
	$nbClient = OperationsDAO::getNbClient() ;
	$nbFacture = OperationsDAO::getNbFacture();
	//$nbProjet = OperationsDAO::getNbProjets() ;
	$comptRecevoir = OperationsDAO::getCompteRecevoir() ;
?>


<div class="frame_bck1">
	<div class="mainTitre them_titre_template">
		<h1>FACTURATION</h1>
	</div>
	<div class="frame_bck2">
		<div class="frame_bck3">
		<div class="floatLeft">
			<div class="iPad_L50" ><h3 class="statsAccueil">Nombre de facture</h3></div>
			<div class="iPad_10T"><h3 class="statsAccueil">Nombre de clients</h3></div>
			<div class="iPad_10T"><h3 class="statsAccueil">Nombre de projet</h3></div>
			<div class="iPad_10T"><h3 class="statsAccueil">Compte à recevoir</h3></div>
	   </div>
		<div class="floatRight">
			<div class="iPad_Top65 "><h3 class="stats"><?php echo $nbFacture[0]; ?></h3></div>
			<div class="iPad_10T2"><h3 class="stats"><?php echo $nbClient[0]; ?></h3></div>
			<div class="iPad_10T2"><h3 class="stats"><?php echo $nbFacture[0]; ?></h3></div>
			<div class="iPad_10T2"><h3 class="stats"><?php echo $comptRecevoir[0]; ?></h3></div>
		</div>
	</div>
   </div>
	<div class="menuAccueil">
		<ul>
			<a href="accueil.php"><div class="elementMenu"><h2>ACCUEIL</h2></div></a>
			<a href="client.php"><div class="elementMenu"><h2>CLIENT</h2></div></a>
			<a href="facturation.php"><div class="elementMenu"><h2>FACTURE</h2></div></a>
			<a href="rapport.php"><div class="elementMenu"><h2>RAPPORT</h2></div></a>
		</ul>
	</div>
</div>
