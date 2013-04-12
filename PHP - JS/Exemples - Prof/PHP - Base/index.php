<?php
	require_once("action/indexAction.php");
	
	execute();
	
	require_once("partial/header.php");
?>

	<h1>
		Authentification nécessaire
	</h1>
	<form action="index.php" method="post" onsubmit="return valider()">
		<div class="formLabel" id="labelCourriel"><label for="courriel"> Courriel : </label></div>
		<div class="formInput"><input type="text" name="champCourriel" id="courriel" /></div>
		<div class="formSeparator"></div>
		
		<div class="formLabel" id="labelMotDePasse"><label for="pwd"> Mot de passe : </label> </div>
		<div class="formInput"><input type="password" name="champMotDePasse" id="pwd" /> <img src="images/help.png" onmouseout="hideInfo()" onmouseover="showInfo(this)" alt="Aide" /> </div>
		<div class="formSeparator"></div>
		
		<div class="formLabel">&nbsp;</div>
		<div class="formInput"><input type="image" src="images/submit.png" /></div>
		<div class="formSeparator"></div>
	</form>
</div>
<div id="informationBox">
	Le mot de passe doit contenir 6 caractères minimum
<?php
	require_once("partial/footer.php");
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	