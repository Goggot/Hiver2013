####################################################################
# Chelny Duplan
# 23 mai 2013
# Crée des usagers à partir d'un fichier CSV
# À exécuter à partir de MON serveur
# Tout les serveurs du domaine ainsi que le routeur et le CD seront modifiés 
# suite à l'éxécution de ce script
####################################################################


Clear-Host

#Creation des utilisateurs
#<#
$cheminCSV = "C:\@Chelny\CSV_Usagers\Usagers_PROG.csv"
$fCSV = Import-Csv -Path $cheminCSV -Delimiter ";"
$fTexte = "C:\@Chelny\usagers.csv"
$count = 0;

Add-Content $fTexte("Nom;Prenom;Adresse;Ville;CodePostal,Tel1,Tel2,Tel3")

#Lecture des propriétés des utilisateurs dans le fichier CSV
foreach($line in $fCSV) {
    #colonnes du fichier CSV
    $nom = $line.Nom
    $prenom = $line.Prenom
    $adresse = $line.Adresse
    $ville = $line.Ville
    $codepostal = $line.CodePostal
    $tel1 = $line.Tel1
    $tel2 = $line.Tel2
    $tel3 = $line.Tel3
    $telephone = ($tel2,$tel3)

    #nom de l'UO et le chemin
    $chemin = "OU=PROGRAMMATION,DC=THETHRONE,DC=PRO"
    $chemin3D = "OU=3D,OU=Developpeurs,OU=PROGRAMMATION,DC=THETHRONE,DC=PRO"
    $cheminNET = "OU=NET,OU=Developpeurs,OU=PROGRAMMATION,DC=THETHRONE,DC=PRO"
    $cheminMod = "OU=Modelisateurs,OU=PROGRAMMATION,DC=THETHRONE,DC=PRO"
    $cheminWeb = "OU=Web,OU=PROGRAMMATION,DC=THETHRONE,DC=PRO"
    $cheminOutils = "OU=Outils,OU=Testeurs,OU=PROGRAMMATION,DC=THETHRONE,DC=PRO"
    $cheminJeux = "OU=Jeux,OU=Testeurs,OU=PROGRAMMATION,DC=THETHRONE,DC=PRO"
    
    #propriété du mot de passe
    $password = ConvertTo-SecureString "AAAaaa111" -AsPlainText -Force

    #creation des nom de login des utilisateurs
    if($line.Nom.Length -lt 7) {
        $length = $line.Nom.Length
        $login = ("P_" + $line.Nom.Substring(0,$length) + $line.Prenom.Substring(0,2))
    }
    elseif($line.Prenom.Length -lt 2) {
        $length = $line.Prenom.Length
        $login = ("P_" + $line.Nom.Substring(0,7) + $line.Prenom.Substring(0,$length))
    }
    else {
        $login = ("P_" + $line.Nom.Substring(0,7) + $line.Prenom.Substring(0,2))
    }

    #chemin des dossiers profil et perso
    $dProfil = "\\407PF2\PROG_Profil$\"+$login
    $dPersonnel = "\\407PF2\PROG_Home$\"+$login

    #supression de l'utilisateur (si déjà existant)
    Remove-ADUser -Identity $login
    Write-Host Suppression de $login

    #creation d'un nouveau utilisateur
    if(($count -ge 0) -and ($count -lt 12)) {
    New-ADUser `
        -Name $login `
        -GivenName $prenom `
        -DisplayName ($prenom + " " + $nom) `
        -UserPrincipalName $login@THETHRONE.PRO `
        -SamAccountName $login `
        -Description "Programmeur chez SEGA" `
        -StreetAddress $adresse `
        -PostalCode $codepostal `
        -Enabled $true `
        -AccountPassword $password `
        -CannotChangePassword $false `
        -PasswordNeverExpires $true `
        -ProfilePath $dProfil `
        -HomeDirectory $dPersonnel `
        -MobilePhone $tel1 `
        -OtherAttributes @{otherMobile = $telephone;} `
        -Path $chemin3D
    }
    elseif(($count -ge 12) -and ($count -lt 21)) {
    New-ADUser `
        -Name $login `
        -GivenName $prenom `
        -DisplayName ($prenom + " " + $nom) `
        -UserPrincipalName $login@THETHRONE.PRO `
        -SamAccountName $login `
        -Description "Programmeur chez SEGA" `
        -StreetAddress $adresse `
        -PostalCode $codepostal `
        -Enabled $true `
        -AccountPassword $password `
        -CannotChangePassword $false `
        -PasswordNeverExpires $true `
        -ProfilePath $dProfil `
        -HomeDirectory $dPersonnel `
        -MobilePhone $tel1 `
        -OtherAttributes @{otherMobile = $telephone;} `
        -Path $cheminNET
    }
    elseif(($count -ge 21) -and ($count -lt 30)) {
    New-ADUser `
        -Name $login `
        -GivenName $prenom `
        -DisplayName ($prenom + " " + $nom) `
        -UserPrincipalName $login@THETHRONE.PRO `
        -SamAccountName $login `
        -Description "Programmeur chez SEGA" `
        -StreetAddress $adresse `
        -PostalCode $codepostal `
        -Enabled $true `
        -AccountPassword $password `
        -CannotChangePassword $false `
        -PasswordNeverExpires $true `
        -ProfilePath $dProfil `
        -HomeDirectory $dPersonnel `
        -MobilePhone $tel1 `
        -OtherAttributes @{otherMobile = $telephone;} `
        -Path $cheminMod
    }
    elseif(($count -ge 30) -and ($count -lt 44)) {
    New-ADUser `
        -Name $login `
        -GivenName $prenom `
        -DisplayName ($prenom + " " + $nom) `
        -UserPrincipalName $login@THETHRONE.PRO `
        -SamAccountName $login `
        -Description "Programmeur chez SEGA" `
        -StreetAddress $adresse `
        -PostalCode $codepostal `
        -Enabled $true `
        -AccountPassword $password `
        -CannotChangePassword $false `
        -PasswordNeverExpires $true `
        -ProfilePath $dProfil `
        -HomeDirectory $dPersonnel `
        -MobilePhone $tel1 `
        -OtherAttributes @{otherMobile = $telephone;} `
        -Path $cheminWeb
    }
    elseif(($count -ge 44) -and ($count -lt 60)) {
    New-ADUser `
        -Name $login `
        -GivenName $prenom `
        -DisplayName ($prenom + " " + $nom) `
        -UserPrincipalName $login@THETHRONE.PRO `
        -SamAccountName $login `
        -Description "Programmeur chez SEGA" `
        -StreetAddress $adresse `
        -PostalCode $codepostal `
        -Enabled $true `
        -AccountPassword $password `
        -CannotChangePassword $false `
        -PasswordNeverExpires $true `
        -ProfilePath $dProfil `
        -HomeDirectory $dPersonnel `
        -MobilePhone $tel1 `
        -OtherAttributes @{otherMobile = $telephone;} `
        -Path $cheminOutils
    }
    elseif(($count -ge 60) -and ($count -lt 75)) {
    New-ADUser `
        -Name $login `
        -GivenName $prenom `
        -DisplayName ($prenom + " " + $nom) `
        -UserPrincipalName $login@THETHRONE.PRO `
        -SamAccountName $login `
        -Description "Programmeur chez SEGA" `
        -StreetAddress $adresse `
        -PostalCode $codepostal `
        -Enabled $true `
        -AccountPassword $password `
        -CannotChangePassword $false `
        -PasswordNeverExpires $true `
        -ProfilePath $dProfil `
        -HomeDirectory $dPersonnel `
        -MobilePhone $tel1 `
        -OtherAttributes @{otherMobile = $telephone;} `
        -Path $cheminJeux
    }
    else {
    New-ADUser `
        -Name $login `
        -GivenName $prenom `
        -DisplayName ($prenom + " " + $nom) `
        -UserPrincipalName $login@THETHRONE.PRO `
        -SamAccountName $login `
        -Description "Programmeur chez SEGA" `
        -StreetAddress $adresse `
        -PostalCode $codepostal `
        -Enabled $true `
        -AccountPassword $password `
        -CannotChangePassword $false `
        -PasswordNeverExpires $true `
        -ProfilePath $dProfil `
        -HomeDirectory $dPersonnel `
        -MobilePhone $tel1 `
        -OtherAttributes @{otherMobile = $telephone;} `
        -Path $chemin
    }

    $count++;

    Write-Host Creation de $login
}

Write-Host --- operation terminée. creation de $count usagers ---
#>




