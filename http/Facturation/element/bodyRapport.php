<div class="frame_bck1">
	<div class="mainTitre them_titre_template"><h1>FACTURATION</h1></div>  
    <div id="bandeMenu">
      <div class="elem_menuR iPad_1menu floatLeft"><a href="accueil.php"><h5>Accueil</h5></a></div>
      <div class="elem_menuR iPad_menuL block floatLeft"><a href="client.php"><h5>Client</h5></a></div>
      <div class="elem_menuR iPad_menuL block floatLeft"><a href="facturation.php"><h5>Facturation</h5></a></div>
      <div class="elem_menuR iPad_menuL block floatLeft"><a href="rapport.php"><h5>Rapport</h5></a></div>
      <div class="elem_menuR iPad_menuL block floatLeft"><a href="profil.php"><h5>Profil</h5></a></div>
    </div>        
    <div class="box_rapport">
    	<div id="bande_rapport">
          <div class="iPad_Rapport">				
            <div class="grDate floatLeft block">
            	<div><h3>Entrez une date ou un numero de facture:</h3></div>
              <div class="floatLeft">
                <p>DATE:<input type="text" id="datepicker"/></p></div>
            </div>
            <div class="iPad_BR"><label for="champNoFacture" class="iPad_L_Rapport">No. Facture</label> <input type="text" name="champNoFacture" id="champNoFacture"/></div>
          </div>
          <button type="button" onclick="infosRapport()"> Recherche </button>
        </div>
        <div id="boxR"></div>     
        <div id="ligneR"></div> 
    </div>
    <div class="bandeDuBas iPad_Bas200"></div>
</div>