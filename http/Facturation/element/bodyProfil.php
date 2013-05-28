<div class="frame_bck1">
	<div class="mainTitre them_titre_template">
		<h1>PROFIL </h1>
	</div>
	<div class="menuG">
	     <div class="elem_menuR iPad_1menu floatLeft"><div><a href="accueil.php"><h5>Accueil</h5></a></div></div>
	     <div class="elem_menuR iPad_menuL block floatLeft"><a href="client.php"><h5>Client</h5></a></div>
	     <div class="elem_menuR iPad_menuL block floatLeft"><a href="facturation.php"><h5>Facturation</h5></a></div>
	     <div class="elem_menuR iPad_menuL block floatLeft"><a href="rapport.php"><h5>Rapport</h5></a></div>
	     <div class="elem_menuR iPad_menuL block floatLeft"><a href="profil.php"><h5>Profil</h5></a></div>
	</div>
	<div class="replika1">
		<div class="ka1">
			<div class="ka2"></div>
		</div>
	</div>
	<div class="menuProfil" onclick="afficherProfil(event)">
		<div class="elementPfile" id="elementPfile">
			<div class="themeProfil" >
				<h2>CHANGER MOT DE PASSE</h2>
			</div>
		</div>
		<div class="elementPfile" id="elementPfile1" onclick="afficherProfil(event)">
			<div class="themeProfil" >
				<h2>CHANGER DE USERNAME</h2>
			</div>
		</div>
		<div class="elementPfile" id="elementPfile2" onclick="afficherProfil(event)">
			<div class="themeProfil" >
				<h2>TOUS CONFIGURER</h2>
			</div>
		</div>
	</div>

	<div class="changePass">
		<p>Mot de passe actuel : </p><input type="password" id="actualPass"/></br>
		<p>Nouveau mot de passe : </p><input type="password" id="newPass"/></br>
		<p>Retapez le mot de passe : </p><input type="password" id="reNewPass"/></br></br>
		<button onclick="changePass()">Valider</button>
	</div>

	<div class="changeUsername">
		<p>Nouveau nom d'usager : </p><input type="text" id="newUsername"/></br></br>
		<button onclick="changeUsername()">Valider</button>
	</div>

	<div class="configAll">
		<p>Nouveau nom d'usager : </p><input type="text" id="newUsername"/></br></br>
		<p>Nouveau * : </p><input type="text" id="newPass"/></br></br>
		<p>Nouveau * : </p><input type="text" id="newPass"/></br></br>
		<p>Nouveau * : </p><input type="text" id="newPass"/></br></br>
		<button onclick="changeUsername()">Valider</button>
	</div>
</div>