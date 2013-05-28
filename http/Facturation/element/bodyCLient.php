
        <script> setPage("client");
            console.log("LOG: valeur de page" + page);
        </script>
	<div class="frame_bck1">
	   <div class="mainTitre them_titre_template"><h1>CLIENT</h1></div>
     <div class="menuG">
         <div class="elem_menuR iPad_1menu floatLeft"><a href="accueil.php"><h5>Accueil</h5></a></div>
         <div class="elem_menuR iPad_menuL block floatLeft"><a href="client.php"><h5>Client</h5></a></div>
         <div class="elem_menuR iPad_menuL block floatLeft"><a href="facturation.php"><h5>Facturation</h5></a></div>
         <div class="elem_menuR iPad_menuL block floatLeft"><a href="rapport.php"><h5>Rapport</h5></a></div>
         <div class="elem_menuR iPad_menuL block floatLeft"><a href="profil.php"><h5>Profil</h5></a></div>
     </div>
       <div class="bckg_CF">
            <div id="boxA"> 
                <form method="post">
                    <div id="col_l">
                    <div class="elemP" id="jcombo">
                        <select id="combo">
                            <option id="jcomboBox" >
                                Tous les champs
                            </option>
                        </select>
                    </div>
                        <div class="elemR" id="champRepC"></div>
                       <div> 
                        <div class=" grMenu"><input type ="button" value="OK" onclick="confirmC()"/>
                            <h6 id="repConfirm"></h6>
                        </div>
                      </div>
                    </div>
                    <div id="col_PR">
                    <div id="col_r">
                        <div class="boxReponse">
                         <div id="formDebut">
                           <div class="elemP"><h6>USERNAME:</h6></div>
                           <div class="elemP"><h6>NOM:</h6></div>
                           <div class="elemP"><h6>PRENOM:</h6></div>
                           <div class="elemP"><h6>ADRESSE:</h6></div>
                           <div class="elemP"><h6>NOM DE COMPAGNIE:</h6></div>
                           <div class="elemP"><h6>MAIL:</h6></div>
                       </div>
                           <div id="formAjout">
                               <div class="elemD"><input type="text" id="chmpC1" /></div>
                               <div class="elemD"><input type="text" id="chmpC2" /></div>
                                <div class="elemD"><input type="text" id="chmpC3" /></div>
                                 <div class="elemD"><input type="text" id="chmpC4" /></div>
                                 <div class="elemD"><input type="text" id="chmpC5" /></div>
                                 <div class="elemD"><input type="text" id="chmpC6" /></div>
                                <div><input type ="button" value="OK" onclick="confirmC()"/></div>
                         </div>

                        </div>
                    </div>
                    </div>
                </form>
            </div>
       		<div class="iPad_titre_CF"><h1>CLIENTS</h1></div>
            <div>
            	<div class="bckg_info_Clients">
                    <div class="columnFix">
                        <div class="elemTitre"><h6>Username</h6></div>
                        <div class="reponse" ><h6 id="chmp1"></h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>Nom:</h6></div>
                          <div class="reponse" ><h6 id="chmp2"></h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>Prénom:</h6></div>
                          <div class="reponse" ><h6 id="chmp3"></h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>Adresse:</h6></div>
                         <div class="reponse" ><h6 id="chmp4"></h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>Nom de compagnie:</h6></div>
                        <div class="reponse" ><h6 id="chmp5"></h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>Mail:</h6></div>
                        <div class="reponse" ><h6 id="chmp6"></h6> </div>
                    </div>
                </div>
                <div class="option_CF">
                	<div class="elem_option_CF" onclick="dialog('ajouter','client')"><h3>AJOUTER</h3></div>
                    <div class="elem_option_CF" onclick="dialog('modifier','client')"><h3>MODIFIER</h3></div>
                    <div class="elem_option_CF"  onclick="dialog('supprimer','client')"><h3>SUPPRIMER</h3></div>
                    <div class="groupFormClient">
                        <form action="client.php" method="post" name="formulaireClient">
                             <div><h6>Pour lancer une recherche</h6></div>
                            <div><h6>Entrez l' ID du client désiré:</h6></div><input type="text" id="champR1" />
                                <div><h6>OU</h6></div>
                            <div><h6>Le nom du client désiré: </h6></div><input type="text" id="champR2" />
                             <div><h6 id="reply"> </h6></div>
                            <div class="grBoutonClient"><input type="button" value="OK" id="b_ClientOK" onclick="champVide(event)"/><input type="button" value="Retry" id="b_ClientRetry" onclick="retry(event)"   /></div>
                        </form>
                    </div>
                </div>
                
            </div>
            <div id="container">
                <div id="bckg_resultat_CF"></div>
            </div>
       </div>
       
	</div>