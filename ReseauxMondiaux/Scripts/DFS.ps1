## Afficher tous les espaces de nom
get-dfsnroot | format-list

## Afficher un espace de nom en particulier
get-dfsnroottarget -path \\DALLAS.B64\Haiti_DFSMarketing | format-list

$path = "C:\DFSRoots\Erwan_admin"

## Création du dossier, du partage et de l'espace de nom
#New-Item -itemType dir -path $path
#New-SmbShare -name Erwan_admin -path $path -FullAccess "Tout le monde"
#New-DfsnRoot -TargetPath \\407P34\Erwan_Admin -Type DomainV2 -Path \\DALLAS.B64\Erwan_Admin -EnableAccessBasedEnumeration $true

## Ajouter des dossiers aux espaces de noms
#New-DfsnFolderTarget -path \\DALLAS.B64\Erwan_Admin\Netlogon -TargetPath \\DALLAS.B64\NETLOGON
#New-DfsnFolderTarget -path \\DALLAS.B64\Erwan_Admin\"Disque C sur CD" -TargetPath \\407P35\C$\
#New-DfsnFolderTarget -path \\DALLAS.B64\Erwan_Admin\"Disque C sur Chelny" -TargetPath \\407P32\C$\
#New-DfsnFolderTarget -path \\DALLAS.B64\Erwan_Admin\"Disque C sur ShiHui" -TargetPath \\407P33\C$\

## Afficher tous les dossiers du DFS
get-dfsnFolder -path \\DALLAS.B64\Erwan_Admin\* | select-object path, targetpath