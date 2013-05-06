<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
		<meta http-equiv="imagetoolbar" content="no" />
        <link href="css/global.css" rel="stylesheet" type="text/css" media="screen" />
		<title>StarCVM coffees</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    </head>
    <body>
		<div class="header">
				<div class="site-title-section">
					<h1>StarCVM Coffees</h1>
				</div>
				<div class="username-section">
					Bonjour, <?php echo $action->getUsername(); ?> !
					<?php
						if ($action->isLoggedIn()) {
							?>
							[<a href="?logout=true">X</a>]
							<?php
						}
					?>
				</div>
				<div class="clear"></div>
				
				<div class="menu">
					<ul>
						<li><a href="index.php">Accueil du site</a></li>
						<?php
							if ($action->isLoggedIn()) {
								?>
								<li><a href="home.php">Mon accueil perso (privé)</a></li>
								<li><a href="profile.php">Mon profil (privé)</a></li>
								<?php
							}
							else {
								?>
								<li><a href="login.php">Se connecter</a></li>
								<?php
							}
						?>
					</ul>
				</div>
			</div>
	
		<div class="container">
		
		
		
		
		
		
		
		
			
		