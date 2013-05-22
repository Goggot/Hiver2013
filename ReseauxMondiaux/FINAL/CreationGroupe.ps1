$groupecsv = import-csv -path "D:\@ShiHui\FINALE\SCRIPTS\Groupe.csv" -delimiter ":"
$domaine = "ou=SYSTEME,"+(get-addomain).distinguishedname

foreach($item in $groupecsv)
{
    $nameGr = $item.Nom
    Remove-ADGroup -identity $nameGr

    write-host Création du groupe $nameGr
    New-ADGroup -GroupScope $item.Etendue -Name $nameGr -GroupCategory $item.Type -path $domaine -Description "Groupe Securite Système" 
}
