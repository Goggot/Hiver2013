<?php
	require_once("action/priveAction.php");
	
	$spies = execute();

	require_once("partial/header.php");
?>
	<div>
		<a href="contact.php">Contactez-nous</a>
	</div>
	<div>
		<ul style="list-style-position:inside">
			<?php
				foreach ($spies as $spy) {
					?>
						<li>
							<?php
								echo $spy;
							?>
						</li>
					<?php
				}
			?>
		</ul>
	</div>
<?php
	require_once("partial/footer.php");
	
	
	
	
	
	
	
	
	
	
	
	