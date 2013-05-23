$groupecsv = import-csv -path "c:\@Erwan\Hiver2013\ReseauxMondiaux\Scripts\L7DGroupe.csv" -delimiter ":"
$utilcsv = import-csv -path "c:\@Erwan\Hiver2013\ReseauxMondiaux\Scripts\L7DUtilisateurs.csv" -delimiter ";"
$domaine = "OU=Haiti,OU=Erwan,"+(get-addomain).distinguishedname

foreach($item in $groupecsv)
{
    $nameGr = "H"+$item.Nom
    Remove-ADGroup -identity $nameGr

    write-host Création du groupe $nameGr
    New-ADGroup -GroupScope $item.Etendue -Name $nameGr -GroupCategory $item.Type -path $domaine
}

foreach($item in $utilcsv)
{
    $nameUser = "H"+$item.Prenom
    $upn = $item.Prenom+"@DALLAS.B64"
    $passwd = convertto-securestring "AAAaaa111" -asplaintext -force
    #Remove-ADUser -identity $nameUser

    New-ADUser `
    -Name $nameUser `
    -SamAccountName $nameUser `
    -UserPrincipalName $nameUser `    -GivenName $item.Nom `    -Path $domaine `
    -AccountPassword $passwd `
    -PasswordNeverExpires $true

    $groupe = $item.Groupe.Split(",")
    write-host $groupe

    foreach ($item in $groupe)
    {
        $nameGr = "H"+$group
        add-ADGroupMember -Identity $nameUser -Members $group
    }
}