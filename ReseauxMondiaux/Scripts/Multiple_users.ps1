$fcsv = import-csv -path "c:\@Erwan\Hiver2013\ReseauxMondiaux\Scripts\L06A_Donnees.csv" -delimiter ";"
$ftexte = "c:\@Erwan\Hiver2013\ReseauxMondiaux\Scripts\users.csv"
$count = 0

Add-Content $fTexte ("LOGIN" + ";" + "SN" + ";" + "GIVENNAME")

foreach($item in $fcsv)
{
    $passwd = convertto-securestring "AAAaaa111" -asplaintext -force
    $path = $item.Chemin+",OU=Haiti,OU=Erwan,DC=DALLAS,DC=B64"
    
    if($item.sn -eq "AU")
    {
        $login = ("H_" + $item.sn.Substring(0,2) + $item.givenName.Substring(0,2))
    }
    else
    {
        $login = ("H_" + $item.sn.Substring(0,3) + $item.givenName.Substring(0,2))
    }
	
	$ppath = "\\407P34\Haiti_Profil\"+$login
    $hpath = "\\407P34\Haiti_Home\"+$login

    Remove-ADUser -Identity $login
    write-host Suppression de $login

    New-ADUser `
    -Name $login `
	-DisplayName ($line.sn + " " + $line.givenName) `
    -SamAccountName $login `
    -UserPrincipalName $login@DALLAS.B64 `    -GivenName $item.givenName `    -AccountPassword $passwd `    -Path $path `    -profilePath $ppath `    -Enabled $true `    -HomeDirectory $hpath `    -HomeDrive "X:" `    -PasswordNeverExpires $true `    -CannotChangePassword $true `    -Country "HA" `    -otherattributes @{telephoneNumber = $item.telephoneNumber; `
                       streetAddress = $item.streetAddress; `
                       l = $item.l; `
                       sn = $item.sn; `
                       co = "Haiti"; `
                       countryCode = 332}

    add-content $ftexte ($login + ";" + $item.sn + ";" + $item.givenName)

    $count++
    write-host Création de $login
}

write-host $count utilisateurs créés.