
	<script> setPage("facturation");
  console.log("LOG: valeur de page: "+page);
  </script>
  <div class="frame_bck1">
	   <div class="mainTitre them_titre_template"><h1>FACTURATION</h1></div>
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
                        <div class=" grMenu"><input type ="button" value="OK" onclick="confirmC()" id="confirm"/></div>
                        <h6 id="repConfirm"></h6>
                      </div>
                    </div>
                    <div id="col_PR">
                    <div id="col_r">
                        <div class="boxReponse">
                         <div id="formDebut">
                           <div class="elemP" ><h6>IDCLIENT:</h6></div>
                           <div class="elemP"><h6>NOM COMPAGNIE:</h6></div>
                           <div class="elemP" ><h6>ADRESSE COMPAGNIE:</h6></div>
                           <div class="elemP"><h6>DESCRIPTION:</h6></div>
                           <div class="elemP"><h6>DATE:</h6></div>
                           <div class="elemP"><h6>TPS:</h6></div>
                           <div class="elemP"><h6>TVQ:</h6></div>
                           <div class="elemP"><h6>SOUS-TOTAL:</h6></div>
                           <div class="elemP"><h6>TOTAL:</h6></div>
                       </div>
                           <div id="formAjout">
                               <div class="elemD"><input type="text" id="chmpF1" /></div>
                               <div class="elemD"><input type="text" id="chmpF2" />   </div>
                                <div class="elemD"><input type="text" id="chmpF3" /></div>
                                 <div class="elemD"><input type="text" id="chmpF4" /></div>
                                 <div class="elemD"><input type="text" id="chmpF5" class="datepicker" /></div>
                                 <div class="elemD"><input type="text" id="chmpF6" /></div>
                                 <div class="elemD"><input type="text" id="chmpF7" />   </div>
                                <div class="elemD"><input type="text" id="chmpF8" /></div>
                                <div class="elemD"><input type="text" id="chmpF9" /></div>
                                 <div><input type ="button" value="OK" onclick="confirmC()"/></div>
                         </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
       		<div class="iPad_titre_CF"><h1>FACTURATION</h1></div>
            <div>
            	<div class="bckg_info_Clients">
                    <div class="columnFix">
                        <div class="elemTitre"><h6>ID CLIENT</h6></div>
                        <div class="reponse" id="chmpFF1"><h6></h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>NOM DE COMPAGNIE:</h6></div>
                          <div class="reponse" id="chmpFF2"><h6></h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>ADRESSE COMPAGNIE:</h6></div>
                          <div class="reponse" id="chmpFF3"><h6></h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>DESCRIPTION</h6></div>
                         <div class="reponse" id="chmpFF4"><h6></h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>DATE DE CRÉATION:</h6></div>
                        <div class="reponse" id="chmpFF5"><h6></h6> </div>
                    </div>
                     <div class="columnFix">
                        <div class="elemTitre"><h6>TPS:</h6></div>
                        <div class="reponse" id="chmpFF6"><h6></h6> </div>
                    </div>
                     <div class="columnFix">
                        <div class="elemTitre"><h6>TVQ:</h6></div>
                        <div class="reponse" id="chmpFF7"><h6></h6> </div>
                    </div>
                     <div class="columnFix">
                        <div class="elemTitre"><h6>SOUS-TOTAL:</h6></div>
                        <div class="reponse" id="chmpFF8"><h6></h6> </div>
                    </div>
                     <div class="columnFix">
                        <div class="elemTitre"><h6>TOTAL:</h6></div>
                        <div class="reponse" id="chmpFF9"><h6></h6> </div>
                    </div>
                     <div class="columnFix">
                        <div class="elemTitre"><h6>MONTANT:</h6></div>
                        <div class="reponse" id="chmpFF10"><h6></h6> </div>
                    </div>
                </div>
                <div class="option_CF">
                	<div class="elem_option_CF"  onclick="dialog('ajouter','facturation')"><h3>AJOUTER</h3></div>
                    <div class="elem_option_CF" onclick="dialog('modifier','facturation')"><h3>MODIFIER</h3></div>
                    <div class="elem_option_CF"   onclick="dialog('supprimer','facturation')"><h3>SUPPRIMER</h3></div>
                    <div class="groupFormFacturation">
                        <form action="facturation.php" method="post" name="formulaireFacturation">
                            <div><h6>Pour lancer une recherche</h6></div>
                            <div><h6>Entrez l' ID de la facture:</h6></div><input type="text" id="champR1" />
                                <div><h6>OU</h6></div>
                            <div><h6>Le nom du client: </h6></div><input type="text" id="champR2" />
                             <div><h6 id="reply"> </h6></div>
                            <div class="grBoutonClient"><input type="button" value="OK" id="b_FactureOK" onclick="champVide(event)" /><input type="button" value="Retry" id="b_ClientRetry"/></div>
                        </form>
                    </div>
                </div>
                <div id="container">
                <div id="bckg_resultat_CF"></div>
            </div>
            </div>
            
       </div>
       
	</div>