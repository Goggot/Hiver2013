<div class="search-line">
	<form action="index.php" method="get">
		<div class="form-left">
			<input type="text" name="searchBox" value="" />
		</div>
		<div class="form-right">
			<input type="image" src="images/search-btn.png" />
		</div>
		<div class="clear"></div>
	</form>
	
	<ul>
		<?php
			if (isset($tabNom)){
				foreach($tabNom as $item){
		?>
					<li><?php echo $item; ?></li>
		<?php
				}
			}
		?>
	</ul>
</div>