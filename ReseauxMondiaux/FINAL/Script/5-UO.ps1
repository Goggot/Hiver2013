###########################################
#####         Erwan Palanque          #####
#####          22 mai 2013            #####
#####    	 Création des UO		  #####
#####        Serveur : 407PF4         #####
###########################################

$fcsv = import-csv -path "C:\Hiver2013\ReseauxMondiaux\FINAL\Script\UO.csv" -delimiter ";"

foreach($item in $fcsv)
{
    New-ADOrganizationalUnit `
        -Name $item.aOU `
        -Path $item.aPath `        -ProtectedFromAccidentalDeletion $false    Write-Host Création de $item.aOU
}