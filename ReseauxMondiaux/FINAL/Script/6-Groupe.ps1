###########################################
#####         Erwan Palanque          #####
#####          22 mai 2013            #####
#####      Création des Groupes		  #####
#####        Serveur : 407PF4         #####
###########################################

$groupecsv = import-csv -path "C:\ReseauxMondiaux\FINAL\Script\Groupes.csv" -delimiter ";"
$count = 0

foreach($item in $groupecsv)
{
    $domaine = $item.aPath + ",DC=THETHRONE,DC=PRO"
    $nameGr = $item.aName
    $etendue = $item.aEtendue
    $type = $item.aType

    Remove-ADGroup -identity $nameGr
    
    New-ADGroup -GroupScope $etendue -Name $nameGr -GroupCategory $type -path $domaine -Description "Groupe Sécurité Artistique"
   
    write-host Création du groupe $nameGr
    $count++
}

write-host $count groupes créés.