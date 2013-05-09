
$fCsv = "C:\@ShiHui\L06A_Donnees.csv"
clear-host
$csv = Import-Csv -Path $fCsv -delimiter ";"
$fTexte = "C:\@ShiHui\users.csv"
$count = 0

    Add-Content $fTexte ("LOGIN" + ";" + "SN" + ";" + "GIVENNAME")

foreach ($line in $csv)
{
   
    $chemin = $line.Chemin + ",OU=Canada, OU=ShiHui, DC=Dallas, DC=B64"
    $displayName = ($sn + $givenName)
    $givenName = $line.givenName
    $password = ConvertTo-SecureString "AAAaaa111" -AsPlainText -force


    if($line.sn -eq "AU")
    {
        $login = ("Canada_" + $line.sn.Substring(0,2) + $line.givenName.Substring(0,2))
    }
    else
    {
        $login = ("Canada_" + $line.sn.Substring(0,3) + $line.givenName.Substring(0,2))
    }

    Remove-ADUser -Identity $login
        Write-Host Suppression de $login

    New-ADUser `
        -Name $login `
        -displayName $displayName `
        -Enabled $true `
        -givenName $givenName `        -Path $chemin `        -SamAccountName $login `        -userprincipalname $login@DALLAS.B64 `        -accountpassword $password `        -PasswordNeverExpires $true `        -Country "CA" `        -OtherAttributes @{telephoneNumber = $line.telephoneNumber; streetAddress = $line.streetAddress; l =$line.l; sn = $line.sn; co = "Canada"; countryCode = 124}    Add-Content $fTexte ($login + ";" + $line.sn + ";" + $line.givenName)    $count++    Write-host Creation de $login}

Write-Host $count utilisateurs créés.
