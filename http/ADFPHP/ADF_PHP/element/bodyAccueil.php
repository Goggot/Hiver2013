<div class="menu">
	<h1>Menu</h1>
	<a href="javascript:void(0)" onclick="fenetrePasswd()">Changer le mot de passe</a></br>
	<a href="changeInfos.php">Changer les informations nominales</a></br>
	<a href="javascript:void(0)" onclick="fenetreResearch()">Inscription aux ateliers</a></br>
	<a href="evalAteliers.php">Évaluation des ateliers</a></br>
	<a href="becomeJudge.php">Devenir juge</a></br>

	</br><a href="index.php?logout=1" class="red">Deconnection</a>
</div>

<div class="changePasswd">
	<label>Mot de passe actuel : </label>
    <input type="password" id="aMdp"/></br></br>
    <label>Nouveau mot de passe : </label>
    <input type="password" id="nMdp"/></br></br>
    <label>Retapez le nouveau mot de passe : </label>
    <input type="password" id="rMdp"/></br></br>
    <button onclick="changePassword()">Changer</button>
    <p id="reponseMDP" class="red"></p>
</div>

<div class="research">
	<label>Titre : </label>
    <input type="text" id="titre"/></br></br>
    <label>Date : </label>
    <input type="text" id="date"/></br></br>
    <label>Langue : </label>
    <input type="text" id="langue"/></br></br>
    <button onclick="research()">Changer</button>
    <p id="reponseResearch" class="red"></p>
</div>