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

foreach($item in $fcsv)
{
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

    ##$user = get-aduser -Identity $login
	
	if(($count -ge 0) -and ($count -lt 13)){
		$chemin = "OU=PRODUCTION;OU=DIRECTEURS,OU=ARTISTIQUE,DC=THETHRONE,DC=PRO"
    }
	elseif (($count -ge 13) -and ($count -lt 25)){
		$chemin = "OU=GRAPHIQUE;OU=DIRECTEURS,OU=ARTISTIQUE,DC=THETHRONE,DC=PRO"
    }
	elseif(($count -ge 25) -and ($count -lt 33)){
		$chemin = "OU=SFX,OU=ARTISTIQUE,DC=THETHRONE,DC=PRO"
    }
	elseif(($count -ge 33) -and ($count -lt 44)){
		$chemin = "OU=SCENARIOS,OU=ARTISTIQUE,DC=THETHRONE,DC=PRO"
    }
	elseif(($count -ge 44) -and ($count -lt 58)){
		$chemin = "OU=TEXTURE,OU=DESIGNERS,OU=ARTISTIQUE,DC=THETHRONE,DC=PRO"
    }
	elseif(($count -ge 58) -and ($count -lt 75)){
		$chemin = "OU=AUDIO,OU=DESIGNERS,OU=ARTISTIQUE,DC=THETHRONE,DC=PRO"
    }
	else {
		$chemin = "OU=ARTISTIQUE,DC=THETHRONE,DC=PRO"
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
		
	$count++

    Write-Host Création de $login
}

$count++
Write-Host $count usager créer