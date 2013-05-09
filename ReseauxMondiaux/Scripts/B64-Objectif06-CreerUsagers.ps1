#GPO creation d'un utilisateur (Correction)

Clear-Host

$cheminCSV = "C:\@Chelny\L06A_Donnees.csv"
$fCSV = Import-Csv -Path $cheminCSV -Delimiter ";"
$fTexte = "C:\@Chelny\users.csv"
$count = 0;

Add-Content $fTexte("Login;SN;GivenName")

foreach($line in $fCSV) {
    $chemin = $line.Chemin + ",OU=Etats-Unis,OU=Chelny,DC=DALLAS,DC=B64"
    $sn = $line.sn
    $givenName = $line.givenName
    $telephoneNumber = $line.telephoneNumber
    $streetAddress =$line.streetAddress
    $l = $line.l
  
    $password = ConvertTo-SecureString "AAAaaa111" -AsPlainText -Force

    if($line.sn -eq "AU") {
        $login = ("Etats-Unis_" + $line.sn.Substring(0,2) + $line.givenName.Substring(0,2))
    }
    else {
        $login = ("Etats-Unis_" + $line.sn.Substring(0,3) + $line.givenName.Substring(0,2))
    }

    $p1 = "\\407p32\Etats-Unis_Profil$\"+$login
    $p2 = "\\407p32\Etats-Unis_Home$\"+$login

    Remove-ADUser -Identity $login
    Write-Host Suppression de $login

    New-ADUser `
        -Name $login `
        -DisplayName ($sn + " " + $givenName) `
        -Enabled $true `
        -GivenName $givenName `
        -HomePhone $telephoneNumber `
        -Path $chemin `
        -HomeDrive "J:" `
        -ProfilePath $p1 `
        -HomeDirectory $p2 `
        -SamAccountName $login `
        -UserPrincipalName $login@DALLAS.B64 `
        -AccountPassword $password `
        -PasswordNeverExpires $true `
        -Country "USA" `
        -OtherAttributes @{telephoneNumber = $telephoneNumber; streetAddress = $streetAddress; l = $l; sn = $sn; co = "Etats-Unis"; countryCode = "840";} 

    Add-Content $fTexte ($login + ";" + $line.sn + ";" + $line.givenName)

    $count++;

    Write-Host Creation de $login
}

Write-Host --- operation terminée,. creation de $count usagers ---