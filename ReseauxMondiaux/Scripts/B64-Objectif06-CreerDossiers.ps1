
Clear-Host

$fCSV = Import-Csv "C:\@Chelny\users1.csv" -Delimiter ";"

#Création du dossier racine
New-Item -Path "C:\" -Name "_Home" -ItemType directory

#Création d'un partage et droits sur le partage (droits = FullAccess et Catching Mode) sur le dossier racine:
New-SmbShare -Name "Etats-Unis_Home$" -Path "C:\_Home\" -FullAccess "Tout le monde" -CachingMode None


foreach($line in $fCSV) {
    
    $path = "C:\_Home\" + $line.login

    $user = $line.login

    #Création d'un répertoire:
    #New-Item -Path $path -Name $line.GivenName -ItemType directory
    New-Item -Path $path -ItemType directory

    #Couper l'héritage:
    icacls.exe $path /inheritance:r
    #Autorisations NTFS:
    icacls.exe $path /grant "Administrateurs:(OI)(CI)(F)"
    icacls.exe $path /grant "Chelny:(OI)(CI)(F)"
    icacls.exe $path /grant $user":(OI)(CI)(F)"

    Write-Host Creation de $line.login
}


Write-Host --- Opération terminée ---


Clear-Host

$fCSV = Import-Csv "C:\@Chelny\users1.csv" -Delimiter ";"

#Création du dossier racine
New-Item -Path "C:\" -Name "_Profil" -ItemType directory

#Création d'un partage et droits sur le partage (droits = FullAccess et Catching Mode) sur le dossier racine:
New-SmbShare -Name "Etats-Unis_Profil$" -Path "C:\_Profil\" -FullAccess "Tout le monde" -CachingMode None


foreach($line in $fCSV) {
    
    $path = "C:\_Profil\" + $line.login

    $user = $line.login

    #Création d'un répertoire:
    #New-Item -Path $path -Name $line.GivenName -ItemType directory
    New-Item -Path $path -ItemType directory

    #Couper l'héritage:
    icacls.exe $path /inheritance:r
    #Autorisations NTFS:
    icacls.exe $path /grant "Administrateurs:(OI)(CI)(F)"
    icacls.exe $path /grant "Chelny:(OI)(CI)(F)"
    icacls.exe $path /grant $user":(OI)(CI)(F)"
    #Définir le propriétaire du dossier
    icacls.exe $path /setowner "Chelny"

    Write-Host Creation de $line.login
}


Write-Host --- Opération terminée ---