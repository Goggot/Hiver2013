<div class="menu">
	<h1>Menu</h1>
	<ul>
		<li><a href="javascript:void(0)" onclick="fenetrePasswd()">Changer le mot de passe</a></li>
		<li><a href="changeInfos.php">Changer les informations nominales</a></li>
		<li><a href="inscription.php">Inscription aux ateliers</a></li>
		<li><a href="evalAteliers.php">Évaluation des ateliers</a></li>
		<li><a href="becomeJudge.php">Devenir juge</a></li>
	</ul>

	</br><a href="index.php?logout=1" class="red">Deconnection</a>
</div>

<div class="changePasswd">
	<label for="mdpLogin">Mot de passe actuel : </label>
    <input type="password" name="nomLogin" id="aMdp"/></br></br>
    <label for="mdpLogin">Nouveau mot de passe : </label>
    <input type="password" name="mdpLogin" id="nMdp"/></br></br>
    <label for="mdpLogin">Retapez le nouveau mot de passe : </label>
    <input type="password" name="mdpLogin" id="rMdp"/></br></br>
    <button onclick="changePassword()">Connection</button>
    <p id="reponseMDP" class="red"></p>
</div>