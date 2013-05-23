new-item -path "\\407P35\C$\hClients" -itemtype directory
new-item -path "\\407P35\C$\hInventaire" -itemtype directory
new-item -path "\\407P35\C$\hPublicite" -itemtype directory
new-item -path "\\407P35\C$\hPublicite\HARCHAMBAULT" -itemtype directory
new-item -path "\\407P35\C$\hPublicite\HANDRE" -itemtype directory
new-item -path "\\407P35\C$\hPublicite\HBRASSARD" -itemtype directory
new-item -path "\\407P35\C$\hPublicite\HROY" -itemtype directory

icacls.exe "\\407P35\C$\hClients" /inheritance:r
icacls.exe "\\407P35\C$\hInventaire" /inheritance:r
icacls.exe "\\407P35\C$\hPublicite" /inheritance:r

icacls.exe "\\407P35\C$\hClients" /grant "Administrateurs:(OI)(CI)(F)" "Système:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)"
icacls.exe "\\407P35\C$\hInventaire" /grant "Administrateurs:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)" "Système:(OI)(CI)(F)"
icacls.exe "\\407P35\C$\hPublicite" /grant "Administrateurs:(OI)(CI)(F)" "Système:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)"

icacls.exe "\\407P35\C$\hPublicite\HARCHAMBAULT" /inheritance:r
icacls.exe "\\407P35\C$\hPublicite\HANDRE" /inheritance:r
icacls.exe "\\407P35\C$\hPublicite\HBRASSARD" /inheritance:r
icacls.exe "\\407P35\C$\hPublicite\HROY" /inheritance:r

icacls.exe "\\407P35\C$\hPublicite\HARCHAMBAULT" /grant "Administrateurs:(OI)(CI)(F)" "Système:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)" "HARCHAMBAULT:(OI)(CI)(F)"
icacls.exe "\\407P35\C$\hPublicite\HANDRE" /grant "Administrateurs:(OI)(CI)(F)" "Système:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)" "HANDRE:(OI)(CI)(F)"
icacls.exe "\\407P35\C$\hPublicite\HBRASSARD" /grant "Administrateurs:(OI)(CI)(F)" "Système:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)" "HBRASSARD:(OI)(CI)(F)"
icacls.exe "\\407P35\C$\hPublicite\HROY" /grant "Administrateurs:(OI)(CI)(F)" "Système:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)" "HROY:(OI)(CI)(F)"

new-smbshare -Path "C:\hClients" -Name "Haiti_Cli" -FolderEnumerationMode AccessBased -CachingMode None -CimSession 407P35 -FullAccess "Tout le monde"
new-smbshare -Path "C:\hInventaire" -Name "Haiti_InvB" -FolderEnumerationMode AccessBased -CachingMode None -CimSession 407P35 -FullAccess "Tout le monde"
new-smbshare -Path "C:\hPublicite" -Name "Haiti_Pub" -FolderEnumerationMode AccessBased -CachingMode None -CimSession 407P35 -FullAccess "Tout le monde"



#new-item -path "C:\hInventaire" -itemtype directory
#new-item -path "C:\hPub" -itemtype directory

#icacls.exe "C:\hInventaire" /inheritance:r
#icacls.exe "C:\hPub" /inheritance:r

#icacls.exe "C:\hInventaire" /grant "Administrateurs:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)" "Système:(OI)(CI)(F)"
#icacls.exe "C:\hPub" /grant "Administrateurs:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)" "Système:(OI)(CI)(F)"

#new-smbshare -name "Haiti_InvA" -path "C:\hInventaire" -FolderEnumerationMode AccessBased -CachingMode None -FullAccess "Tout le monde"
#new-smbshare -name "Haiti_WebA" -path "C:\hPub" -FolderEnumerationMode AccessBased -CachingMode None -FullAccess "Tout le monde"



#new-item -path "\\407P33\C$\hCommande" -itemtype directory

#icacls.exe "\\407P33\C$\hCommande" /inheritance:r
#icacls.exe "\\407P33\C$\hCommande" /grant "Administrateurs:(OI)(CI)(F)" "Système:(OI)(CI)(F)" "Erwan:(OI)(CI)(M)" "hDirecteurs:(OI)(CI)(M)"

#new-smbshare -Path "\\407P33\C$\hCommande" -Name "Haiti_Cmd" -FolderEnumerationMode AccessBased -CachingMode None -CimSession 407P33 -FullAccess "Tout le monde"



#new-item -path "\\407P32\C$\hProduction" -itemtype directory
#new-item -path "\\407P32\C$\hWeb" -itemtype directory

#icacls.exe "\\407P32\C$\hWeb" /inheritance:r
#icacls.exe "\\407P32\C$\hProduction" /inheritance:r

#icacls.exe "\\407P32\C$\hWeb" /grant "Système:(OI)(CI)(F)" "Administrateurs:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)"

#icacls.exe "\\407P32\C$\hProduction" /grant "Administrateurs:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)" "H_ROYCL:(OI)(CI)(M)" "Système:(OI)(CI)(F)"

#new-smbshare -Path "C:\hProduction" -Name "Haiti_Prod" -FolderEnumerationMode AccessBased -CachingMode None -CimSession 407P32 -FullAccess "Tout le monde"
#new-smbshare -Path "C:\hWeb" -Name "Haiti_WebB" -FolderEnumerationMode AccessBased -CachingMode None -CimSession 407P32 -FullAccess "Tout le monde"