<div id="connection">
    <form action="index.php" method="post">
            <p>
               <label for="login">Pseudo : </label><input type="text" name="login" /></br></br>
               <label for="pass">Mot de passe : </label><input type="password" name="passwd" /></br></br>
               <input type="submit" value="Valider" onclick=""/>
            </p>
    </form>
	<a href="javascript:void(0)" onclick="fenetreMembre(0)">S'enregistrer</a>
</div>

<div id="anim">
	<img class="spanim" id="animLeftAccueil1" src="images/sp2.png" />
    <img class="spanim" id="animRightAccueil1" src="images/sp2.png" />
    <img class="spanim" id="animLeftAccueil2" src="images/sp3.png" />
    <img class="spanim" id="animRightAccueil2" src="images/sp3.png" />
    <img class="spanim" id="animLeftAccueil3" src="images/sp4.png" />
    <img class="spanim" id="animRightAccueil3" src="images/sp4.png" />
    <img class="spanim" id="animLeftAccueil4" src="images/sp3.png" />
    <img class="spanim" id="animRightAccueil4" src="images/sp3.png" />
    <img class="spanim" id="animLeftAccueil5" src="images/sp4.png" />
    <img class="spanim" id="animRightAccueil5" src="images/sp4.png" />
    <img class="spanim" id="animLeftAccueil6" src="images/sp2.png" />
    <img class="spanim" id="animRightAccueil6" src="images/sp2.png" />
</div>

<div class="register">
	Pseudo : <input type="text" id="pseudo"/></br></br>
	Mot de passe : <input type="password" id="password"/></br></br>
	Prenom : <input type="text" id="prenom"/></br></br>
	Nom : <input type="text" id="nom"/></br></br>
	Matricule : <input type="text" id="matricule"/></br></br>
	<button onclick="register()">Valider</button></br></br>
	<p id="reponseRegister"></p>
</div>