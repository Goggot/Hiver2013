###########################################
#####         Erwan Palanque          #####
#####          22 mai 2013            #####
#####      Création des Groupes		  #####
#####        Serveur : 407PF4         #####
###########################################

$groupecsv = import-csv -path "C:\Hiver2013\ReseauxMondiaux\FINAL\Script\Groupes.csv" -delimiter ":"

foreach($item in $groupecsv)
{
    $nameGr = $item.aName
    $domaine = $item.aPath
    $etendue = $item.aEtendue
    $type = $item.aType
    Remove-ADGroup -identity $nameGr

    New-ADGroup -GroupScope $etendue -Name $nameGr -GroupCategory $type -path $domaine -Description "Groupe Sécurité Artistique"
    write-host Création du groupe $nameGr
}