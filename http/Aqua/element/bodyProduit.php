	<div class="page-content">
		<?php $tab = $action->getListe();
			foreach ($tab as $ligne){
		?>		<div id="sup" onclick='window.location.href="produit.php?supprimer_id=<?php echo $ligne[0];?>";'></div>
				<div id="modif" onclick='window.location.href="modif.php?modif_id=<?php echo $ligne[0];?>";'></div>
		<?php	for ($i = 0; $i < 4; $i++){
					echo $ligne[$i];
		?>	<!-- SPAAAAAACE! -->
		<?php } ?>
				</br></br>
		<?php } ?>
		<div id="inscription">
			<form method="post" action="produit.php" name="formule"> 
				<div style="padding-top:45px;">
					<label for="champNomProduit">Nom du Produit:</label><input type="text" name="champNomProduit" />
				</div>
				<div>
					<label for="champDesc">Description </label><input type="text" name="champDesc" />
				</div>
				<div>
					<label for="champPrix">Prix: </label><input type="text" name="champPrix" /><input type="submit" name="Confirm" value="Nouvelle insertion" />
				</div>
			</form>
		</div>
		</div>
	</div>
</div>