$ftext = import-csv -path "C:\@Erwan\users.csv" -Delimiter ";"

foreach($item in $ftext){
    write-host Création du dossier $item.login
    $path = "c:\UtilisateursAD\"+$item.login
    New-Item -path $path -type directory
}