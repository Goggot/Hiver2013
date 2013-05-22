
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
      <script type="javascript">
          setPage("facturation")
          console.log("voici la page " + page);
      </script>
                <form method="post">
                    <div class="col_l">
                    <div class="elemP">
                        <select id="combo">
                            <option id="jcomboBox" >
                                Tous les champs
                            </option>
                              <script  type="text/javascript">
                                    var tabe= new Array();
                                    var elem = document.getElementById("jcomboBox");
                                    tabe = getInfoFactureCB(elem);
                                    console.log("LOG: création jcomboBox tab = " + tabe);
                             </script>
                        </select>
                    </div>
                        <div class="elemP" id="champRepC"></div>
                       <div> 
                        <div class=" grMenu"><input type ="button" value="OK" onclick="confirmF()" id="confirm"/></div>
                      </div>
                    </div>
                    <div class="col_PR">
                    <div class="col_r">
                        <div class="boxReponse">
                         <div class="formDebut">
                           <div class="elemP" id="chmpC1" ><h6>IDCLIENT:</h6></div>
                           <div class="elemP"><h6>NOM COMPAGNIE:</h6></div>
                           <div class="elemP" id="chmpC3" ><h6>DESCRIPTION:</h6></div>
                           <div class="elemP"><h6>ADRESSE COMPAGNIE:</h6></div>
                           <div class="elemP"><h6>TPS:</h6></div>
                           <div class="elemP"><h6>TVQ:</h6></div>
                           <div class="elemP"><h6>SOUS-TOTAL:</h6></div>
                           <div class="elemP"><h6>TOTAL:</h6></div>
                           <div class="elemP"><h6>MONTANT PAYER:</h6></div>
                       </div>
                           <div class="formAjout">
                               <div class="elemD"><input type="text" id="chmpF1" /></div>
                               <div class="elemD">   <input type="text" id="chmpF2" />   </div>
                                <div class="elemD"><input type="text" id="chmpF3" /></div>
                                 <div class="elemD"><input type="text" id="chmpF4" /></div>
                                 <div class="elemD"><input type="text" id="chmpF5" /></div>
                                 <div class="elemD"><input type="text" id="chmpF6" /></div>
                                 <div class="elemD">   <input type="text" id="chmpF7" />   </div>
                                <div class="elemD"><input type="text" id="chmpF8" /></div>
                                <div class="elemD"><input type="text" id="chmpF9" /></div>
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
                        <div class="elemTitre"><h6>Id</h6></div>
                        <div class="reponse" id="chmpID"><h6>Text goes here</h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>Username:</h6></div>
                          <div class="reponse" id="chmpUser"><h6>Text goes here</h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>Adresse:</h6></div>
                          <div class="reponse" id="chmpAdrss"><h6>Text goes here</h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>Nom de Compagnie:</h6></div>
                         <div class="reponse" id="chmpCompany"><h6>Text goes here</h6> </div>
                    </div>
                    <div class="columnFix">
                        <div class="elemTitre"><h6>Mail:</h6></div>
                        <div class="reponse" id="chmpMail"><h6>Text goes here</h6> </div>
                    </div>
                </div>
                <div class="option_CF">
                	<div class="elem_option_CF"  onclick="dialog('ajouter')"><h3>AJOUTER</h3></div>
                    <div class="elem_option_CF" onclick="dialog('modifier')"><h3>MODIFIER</h3></div>
                    <div class="elem_option_CF"   onclick="dialog('supprimer')"><h3>SUPPRIMER</h3></div>
                    <div class="groupFormFacturation">
                        <form action="facturation.php" method="post" name="formulaireFacturation">
                            <div><h6>Pour lancer une recherche</h6></div>
                            <div><h6>Entrez l' ID de la facture:</h6></div><input type="text" name="champIdFacture" />
                                <div><h6>OU</h6></div>
                            <div><h6>Le nom du client: </h6></div><input type="text" name="champIdCLient_F" />
                            <div class="grBoutonClient"><input type="submit" value="OK" id="b_FactureOK"/><input type="button" value="Retry" id="b_ClientRetry"/></div>
                        </form>
                    </div>
                </div>
                <div id="container">
                <div id="bckg_resultat_CF"></div>
            </div>
            </div>
            
       </div>
       
	</div>