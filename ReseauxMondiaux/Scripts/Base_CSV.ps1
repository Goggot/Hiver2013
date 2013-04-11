clear-host

#Transfert de fichier
$ftexte = "c:\@Erwan\afaf\test.txt"
$fcsv = "c:\@Erwan\output.csv"

#Creation csv
set-content $fcsv "Prenom;Nom"
Get-Content $ftexte | add-content $fcsv

get-content $fcsv | Write-Output

write-host fin du traitement