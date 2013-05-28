###########################################
#####         Erwan Palanque          #####
#####          22 mai 2013            #####
#####      Création des Usagers		  #####
#####        Serveur : 407PF4         #####
###########################################

################ Ordre d'apparition des donnees ###############
## Nom; Prenom; Adresse; Ville; CodePostal; Tel1; Tel2; Tel3 ##
###############################################################

$fcsv = import-csv -path "C:\Hiver2013\ReseauxMondiaux\FINAL\Script\Usagers_ART.csv" -delimiter ";"
$count = 0;
$gest = 0;
$var = $Null;

foreach($item in $fcsv)
{
    $DOM = ",OU=ARTISTIQUE,DC=FUCKING,DC=WINDOWS"
    $g1 = $g2 = $Null
	$nom = $item.Nom
    $prenom = $item.Prenom
    $adresse = $item.Adresse
    $ville = $item.Ville
    $codepostal = $item.CodePostal
    $tel1 = $item.Tel1
    $tel2 = $item.Tel2
    $tel3 = $item.Tel3
    $telephone = ($tel2,$tel3)
    $passwd = convertto-securestring "AAAaaa111" -asplaintext -force
    
    if($item.Nom.Length -lt 5) {
        $length = $item.Nom.Length
        $login = ("A_" + $item.Nom.Substring(0,$length) + $item.Prenom.Substring(0,4))
    }
    elseif($item.Prenom.Length -lt 4) {
        $length = $item.Prenom.Length
        $login = ("A_" + $item.Nom.Substring(0,5) + $item.Prenom.Substring(0,$length))
    }
    else {
        $login = ("A_" + $item.Nom.Substring(0,5) + $item.Prenom.Substring(0,4))
    }

	
	if(($count -ge 0) -and ($count -lt 13)){
		$chemin = "OU=PRODUCTION,OU=DIRECTEURS"+$DOM
        $g1 = "ART_DIRECTEURS"
        $g2 = "ART_PRODUCTION"
		if ($var -eq $Null){
			$gest = 3
			$var = "prod"
		}
		elseif ($gest -gt 0 -And $var -eq "prod"){
			$gest--
		}
    }
	elseif (($count -ge 13) -and ($count -lt 25)){
		$chemin = "OU=GRAPHIQUE,OU=DIRECTEURS"+$DOM
        $g1 = "ART_DIRECTEURS"
        $g2 = "ART_GRAPHIQUE"
		if ($var -eq "prod"){
			$gest = 3
			$var = "graph"
		}
		elseif ($gest -gt 0 -And $var -eq "graph"){
			$gest--
		}
    }
	elseif(($count -ge 25) -and ($count -lt 33)){
		$chemin = "OU=SFX"+$DOM
        $g1 = "ART_SFX"
    }
	elseif(($count -ge 33) -and ($count -lt 44)){
		$chemin = "OU=SCENARIOS"+$DOM
        $g1 = "ART_SCENARIOS"
		if ($var -eq "graph"){
			$gest = 4
			$var = "scenar"
		}
		elseif ($gest -gt 0 -And $var -eq "scenar"){
			$gest--
		}
    }
	elseif(($count -ge 44) -and ($count -lt 58)){
		$chemin = "OU=TEXTURE,OU=DESIGNERS"+$DOM
        $g1 = "ART_DESIGNERS"
        $g2 = "ART_TEXTURE"
		if ($var -eq "scenar"){
			$gest = 3
			$var = "text"
		}
		elseif ($gest -gt 0 -And $var -eq "text"){
			$gest--
		}
    }
	elseif(($count -ge 58) -and ($count -lt 75)){
		$chemin = "OU=AUDIO,OU=DESIGNERS"+$DOM
        $g1 = "ART_DESIGNERS"
        $g2 = "ART_AUDIO"
    }
	else {
		$chemin = "OU=ARTISTIQUE,DC=FUCKING,DC=WINDOWS"
    }
    
    $User = Get-ADUser -Filter {SamAccountName -eq $login}
    if ($User -eq $Null){
        write-host GOOD
    }
    else{
        write-host DOUBLON
        $login = $login+"_bis"
    }


	#chemin des dossiers profil et perso
    $dProfil = "c:\_SEGA_ART\Profil$\"+$login
    $dPersonnel = "c:\_SEGA_ART\Home$\"+$login
	
	New-ADUser `
        -Name $login `
        -GivenName $prenom `
        -Surname $nom `
        -DisplayName ($prenom + " " + $nom) `
        -UserPrincipalName $login@THETHRONE.PRO `
        -SamAccountName $login `
        -Description "Artiste chez SEGA" `
        -StreetAddress $adresse `
        -PostalCode $codepostal `
        -Enabled $true `
        -Homedrive "R:" `
        -AccountPassword $passwd `
        -CannotChangePassword $false `
        -PasswordNeverExpires $true `
        -ProfilePath $dProfil `
        -HomeDirectory $dPersonnel `
        -MobilePhone $tel1 `
        -OtherAttributes @{otherMobile = $telephone;} `
        -Path $chemin

    Add-ADGroupMember -Identity "ARTISTIQUE" -Members $login

    if ($g1){
        Add-ADGroupMember -Identity $g1 -Members $login
    }

    if ($g2){
        Add-ADGroupMember -Identity $g2 -Members $login
    }
	
	if ($gest -gt 0){
		Add-ADGroupMember -Identity "ART_GESTIONNAIRE" -Members $login
	}

	$count++
    Write-Host Création de $login
}

$count++
Write-Host $count usager créer