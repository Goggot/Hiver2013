
    <div class="main_frame">
        <div class="bckg_pan_login">
            <div id="login_title">
                <h1 id="them_titre_login">FACTURATION</h1>
            </div>
            <form name="login_formulaie" action="index.php" method="post" >
                <div class="grT_Login floatLeft block">
                    <label for="nomLogin" class="block pad_15">Username</label>
                    <label for="mdpLogin" class="block pad_15">Password</label>
                </div>
                <div class="grLogin floatRight block">
                    <input type="text" name="nomLogin" class="block pad_15" />
                    <input type="password" name="mdpLogin" class="block pad_15" />
                </div>
                
                <div class="block clear gr_submit">
                    <input type="submit" value="confirmation" />
                </div>

                <a href="JavaScript:void(0);" id="mdpf" onclick="recover(event)">Mot de passe oublié</a>
                <div id="reco_email">
                    <p>Votre email : </p>
                    <input type="text" id="mail">
                    <button type="button" onclick="recover(event)" id="bf">Valider</button>
                    <p id="resultat"></p>
                </div>
            </form>
        </div>
    </div>