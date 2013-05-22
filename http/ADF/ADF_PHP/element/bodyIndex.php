    <div class="connexion">
        <h1 id="them_titre_login">Connexion</h1>
        <form name="login_formulaire" action="index.php" method="post" >
            <label for="nomLogin">Username</label>
            <input type="text" name="nomLogin"/></br></br>
            <label for="mdpLogin">Password</label>
            <input type="password" name="mdpLogin"/></br></br>
            <input type="submit" value="Connection"/></br></br>
        </form>
        <a href="javascript:void(0)" onclick="fenetreRegister()">S'enregistrer</a>
    </div>

    <div class="register">
        <label>Code Auditeur</label>
        <input type="text" id="codeauditeur"/></br></br>

        <label>Nom</label>
        <input type="text" id="nom"/></br></br>

        <label>Prenom</label>
        <input type="text" id="prenom"/></br></br>

        <label>Mot de passe</label>
        <input type="password" id="passwordRe"/></br></br>

        <label>No Coordonnée</label>
        <input type="text" id="nocoordonnees"/></br></br>

        <label>Statut</label>
        <input type="text" id="statut"/></br></br>

        <label>Candidat juge</label>
        <input type="text" id="candidatjuge"/></br></br>

        <label>Admin ?</label>
        <input type="text" id="admin"/></br></br>

        <label>Rue</label>
        <input type="text" id="rue"/></br></br>

        <label>Ville</label>
        <input type="text" id="ville"/></br></br>

        <label>Code postal</label>
        <input type="text" id="codepostal"/></br></br>

        <label>No région</label>
        <input type="text" id="noregion"/></br></br>

        <label>Telephone</label>
        <input type="text" id="telephone"/></br></br>

        <label>Cellulaire</label>
        <input type="text" id="cell"/></br></br>

        <label>Mail</label>
        <input type="text" id="courriel"/></br></br>

        <button onclick="register()"/>Enregistrer</button></br>
        <p id="reponseRegister" class="red"></p>
    </div>