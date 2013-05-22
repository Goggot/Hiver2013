
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
                 <script type="javascript">
                        setPage("client");
                         console.log("voici la page " + page);
                 </script>
                <form method="post">
                    <div class="col_l">
                    <div class="elemP">
                        <select id="combo">
                            <option id="jcomboBox" >
                                Tous les champs
                            </option>
                        </select>
                    </div>
                        <div class="elemP" id="champRepC"></div>
                       <div> 
                        <div class=" grMenu"><input type ="button" value="OK" onclick="confirmC()" id="confirm"/>
                            <h6 id="repConfirm"></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col_PR">
                    <div class="col_r">
                        <div class="boxReponse">
                         <div class="formDebut">
                           <div class="elemP" id="chmpC1" ><h6>ID:</h6></div>
                           <div class="elemP"><h6>NOM:</h6></div>
                           <div class="elemP" id="chmpC3" ><h6>PRÉNOM:</h6></div>
                           <div class="elemP"><h6>USERNAME:</h6></div>
                           <div class="elemP"><h6>ADRESSE:</h6></div>
                           <div class="elemP"><h6>NOM DE COMPAGNIE:</h6></div>
                       </div>
                           <div class="formAjout">
                               <div class="elemD"><input type="text" id="chmpC1" /></div>
                               <div class="elemD"><input type="text" id="chmpC2" /></div>
                                <div class="elemD"><input type="text" id="chmpC3" /></div>
                                 <div class="elemD"><input type="text" id="chmpC4" /></div>
                                 <div class="elemD"><input type="text" id="chmpC5" /></div>
                                 <div class="elemD"><input type="text" id="chmpC6" /></div>
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
                        <div class="elemTitre"><h6>Id</h6></div>
                        <div class="reponse" ><h6 id="chmp1"></h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>Nom:</h6></div>
                          <div class="reponse" ><h6 id="chmp2"></h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>Username:</h6></div>
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
                </div>
                <div class="option_CF">
                	<div class="elem_option_CF" onclick="dialog('ajouter')"><h3>AJOUTER</h3></div>
                    <div class="elem_option_CF" onclick="dialog('modifier')"><h3>MODIFIER</h3></div>
                    <div class="elem_option_CF"  onclick="dialog('supprimer')"><h3>SUPPRIMER</h3></div>
                    <div class="groupFormClient">
                        <form action="client.php" method="post" name="formulaireClient">
                             <div><h6>Pour lancer une recherche</h6></div>
                            <div><h6>Entrez l' ID du client désiré:</h6></div><input type="text" id="champIdClient" />
                                <div><h6>OU</h6></div>
                            <div><h6>Le nom du client désiré: </h6></div><input type="text" id="champNomClient" />
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