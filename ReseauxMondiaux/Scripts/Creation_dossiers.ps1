$ftext = import-csv -path "c:\@Erwan\Hiver2013\ReseauxMondiaux\Scripts\users.csv" -Delimiter ";"
$path1 = "C:\Haiti_Profil\"
$path2 = "C:\Haiti_Home\"

#Remove-Item -path $path1
#Remove-Item -path $path2
new-item -path $path1 -itemtype directory
new-item -path $path2 -itemtype directory
icacls.exe $path1 /inheritance:r
icacls.exe $path2 /inheritance:r
write-host Heritage coupe
icacls.exe $path1 /grant "Administrateurs:(OI)(CI)(F)"
icacls.exe $path2 /grant "Administrateurs:(OI)(CI)(F)"
icacls.exe $path1 /grant "Système:(OI)(CI)(F)"
icacls.exe $path2 /grant "Système:(OI)(CI)(F)"
icacls.exe $path1 /grant "Utilisateurs authentifiés:(OI)(CI)(Rx)"
icacls.exe $path2 /grant "Utilisateurs authentifiés:(OI)(CI)(RX)"
write-host Affectation des droits Admin, Systeme et utilisateurs authentifies sur $item.LOGIN
icacls.exe $path1 /setowner "Erwan"
icacls.exe $path2 /setowner "Erwan"
icacls.exe $path1 /grant "Erwan:(OI)(CI)(F)"
icacls.exe $path2 /grant "Erwan:(OI)(CI)(F)"
write-host Affectation des droits Erwan sur $item.LOGIN

new-smbshare -name "Haiti_Profil$" -path "C:\Haiti_Profil" -description "Test1 pour les dossiers personnels" -FolderEnumerationMode AccessBased -CachingMode None -FullAccess "Tout le monde"
new-smbshare -name "Haiti_Home$" -path "C:\Haiti_Home" -description "Test1 pour les dossiers personnels" -FolderEnumerationMode AccessBased -CachingMode None -FullAccess "Tout le monde"

foreach($item in $ftext){
    $l = $item.LOGIN
    $nom = $l+".v2"

    New-Item -path $path1 -name $nom -itemtype directory
    New-Item -path $path2 -name $nom -itemtype directory
    write-host Création du dossier $nom
    
    $p1 = $path1+$nom
    $p2 = $path2+$nom

    icacls.exe $p1 /inheritance:r
    icacls.exe $p2 /inheritance:r
    write-host Heritage coupe 2
    icacls.exe $p1 /grant "Administrateurs:(OI)(CI)(F)"
    icacls.exe $p2 /grant "Administrateurs:(OI)(CI)(F)"
    icacls.exe $p1 /grant "Système:(OI)(CI)(F)"
    icacls.exe $p2 /grant "Système:(OI)(CI)(F)"
    icacls.exe $p1 /grant "Utilisateurs authentifiés:(OI)(CI)(F)"
    icacls.exe $p2 /grant "Utilisateurs authentifiés:(OI)(CI)(F)"
    write-host Affectation des droits Admin sur $l
    icacls.exe $p1 /grant "Erwan:(OI)(CI)(F)"
    icacls.exe $p2 /grant "Erwan:(OI)(CI)(F)"
    write-host Affectation des droits Erwan sur $l
    icacls.exe $p1 /grant $l":(OI)(CI)(F)"
    icacls.exe $p2 /grant $l":(OI)(CI)(F)"
    write-host Affectation des droits $l sur $l
}