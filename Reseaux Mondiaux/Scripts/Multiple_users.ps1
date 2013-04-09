$fcsv = import-csv -path "c:\@Erwan\L06A_Donnees.csv" -delimiter ";"
$ftexte = "c:\@Erwan\users.log"
$count = 0

foreach($item in $fcsv)
{
    $passwd = convertto-securestring "AAAaaa111" -asplaintext -force
    $login = "H_" + $item.sn.Substring(0,3) + $item.givenName.Substring(0,2)
    $path = $item.Chemin+",OU=Haiti,OU=Erwan,DC=DALLAS,DC=B64"

    Remove-ADUser -Identity $login
    write-host Suppression de $login

    New-ADUser `
    -Name $login `
    -SamAccountName $login `
    -UserPrincipalName $login@DALLAS.B64 `    -GivenName $item.givenName `    -AccountPassword $passwd `    -Path $path `    -profilePath $path `    -Enabled $true `    -PasswordNeverExpires $true `    -CannotChangePassword $true `    -otherattributes @{telephoneNumber = $item.telephoneNumber; `
                       streetAddress = $item.streetAddress; `
                       l = $item.l; `
                       sn = $item.sn}

    add-content $ftexte ($login + " " + $item.sn + " " + $item.givenName)

    $count++
    write-host Création de $login
}

write-host $count utilisateurs créés.