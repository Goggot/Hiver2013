Clear-Host

### Modifier et enregistrer un fichier texte en CSV ###
$fTexte = "C:\@Erwan\UO.txt"
$fcsv = "c:\@Erwan\UO.csv"

    # Définir la premiere ligne
set-content $fcsv "aParent;aOU;aDesc"

    # Prendre le fichier texte en mémoire
$collection = Get-Content $fTexte

foreach ($item in $collection)
{
    $item = $item.replace("pays","Haiti")
    $item = $item.replace("ville1","Savanette")
    $item = $item.replace("ville2","Moron")
    $item = $item.replace("ville3","Tiburon")
    $item

    Add-Content -path $fcsv -Value $item
}

write-host Fin du traitement
### Fin du traitement ###