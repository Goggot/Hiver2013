<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>CMVAqua</title>
        <link href="css/global.css" rel="stylesheet" type="text/css" media="screen" />   
        <link href="css/jquery.lightbox-0.5.css" rel="stylesheet" type="text/css" media="screen" />     
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.lightbox-0.5.min.js"></script>
    </head>
    <body>
	<div class="site-container">
		<div class="page-container">
			<div class="site-header">
				<div class="page-title-section">
					<h1>CVMAQUA - Groupe de protection de l'eau</h1>
				</div>
				<div>
					<a href="?lang=en">English</a> | 
					<a href="?lang=fr">Francais</a>
				</div>
			<div class="menu-section">
				<ul>
					<li><a href="index.php"><?php echo $action->translate("index", "menu1") ?></a></li>
					<li><a href="images.php"><?php echo $action->translate("index", "menu2") ?></a></li>
					<li><a href="contact.php"><?php echo $action->translate("index", "menu3") ?></a></li>
					<?php if ($action->isLoggedIn()){ ?>
							<li><a href="produit.php"><?php echo $action->translate("index", "menu4") ?></a></li>
							<li><a href="index.php?logout=true"><?php echo $action->translate("index", "menu5") ?></a></li>
					<?php } else { ?>
							<li><a href="login.php"><?php echo $action->translate("index", "menu6") ?></a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="clear"></div>
	  </div>