###########################################
#####         Erwan Palanque          #####
#####          22 mai 2013            #####
#####    	 Création des UO		  #####
#####        Serveur : 407PF4         #####
###########################################

$fcsv = import-csv -path "C:\ReseauxMondiaux\FINAL\Script\UO.csv" -delimiter ";"
$count = 0

foreach($item in $fcsv)
{
    if ($count -eq 0){
        $path = "DC=THETHRONE,DC=PRO"
    }
    else{
        $path = $item.aPath + ",DC=THETHRONE,DC=PRO"
    }
    New-ADOrganizationalUnit `
        -Name $item.aOU `
        -Path $path `        -ProtectedFromAccidentalDeletion $false    $count++    Write-Host Création de $item.aOU
}
Write-host $count UO créé.