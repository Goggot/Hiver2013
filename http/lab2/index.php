<?php
    require_once("action/indexAction.php");
    execute();
    
    require_once("element/header.php");
?>

    <h1>
	    Authentification nécessaire
    </h1>
    <form action="index.php" method="post" onsubmit="return valider()">
	    <div class="formLabel" id="divCourriel"><label for="courriel"> Courriel : </label></div>
	    <div class="formInput"><input type="text" name="champCourriel" id="courriel" /></div>
	    <div class="formSeparator"></div>
	    
	    <div class="formLabel" id="divMDP"><label for="pwd"> Mot de passe : </label> </div>
	    <div class="formInput"><input type="password" name="champMotDePasse" id="pwd" /> <img src="images/help.png" id="help" alt="Aide" /> </div>
	    <div class="formSeparator"></div>
	    
	    <div class="formLabel">&nbsp;</div>
	    <div class="formInput"><input type="image" src="images/submit.png" /></div>
	    <div class="formSeparator"></div>
    </form>

    <div id="informationBox">
	    Le mot de passe doit contenir 6 caractères minimum
    </div>

<?php
    require_once("element/footer.php");