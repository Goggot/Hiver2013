$ftext = import-csv -path "c:\@Erwan\Hiver2013\ReseauxMondiaux\Scripts\users.csv" -Delimiter ";"
$path = "C:\_T1Perso\"

Remove-Item -path $path
new-item -path $path -itemtype directory
icacls.exe $path /inheritance:r
write-host Heritage coupe
icacls.exe $path /setowner "Administrateurs"
icacls.exe $path /grant "Administrateurs:(OI)(CI)(F)"
write-host Affectation des droits Admin sur $item.LOGIN
icacls.exe $path /setowner "Erwan"
icacls.exe $path /grant "Erwan:(OI)(CI)(F)"
write-host Affectation des droits Erwan sur $item.LOGIN

new-smbshare -name "Haiti_T1Perso" -path "C:\_T1Perso" -description "Test1 pour les dossiers personnels" -FolderEnumerationMode AccessBased -CachingMode None

foreach($item in $ftext){
    write-host Création du dossier $item.LOGIN

    New-Item -path $path -name $item.LOGIN -itemtype directory

    icacls.exe $path -Name $item.LOGIN /inheritance:r
    write-host Heritage coupe
    icacls.exe $path -Name $item.LOGIN /setowner "Administrateurs"
    icacls.exe $path -Name $item.LOGIN /grant "Administrateurs:(OI)(CI)(F)"
    write-host Affectation des droits Admin sur $item.LOGIN
    icacls.exe $path -Name $item.LOGIN /grant "Erwan:(OI)(CI)(F)"
    write-host Affectation des droits Erwan sur $item.LOGIN
    icacls.exe $path -Name $item.LOGIN /grant $item.LOGIN":(OI)(CI)(F)"
    write-host Affectation des droits $item.LOGIN sur $item.LOGIN
}