####################################################################
# sHI hui Tran
# 23 mai 2013
# Crée des dossiers partagés à partir d'un fichier CSV
# À exécuter à partir de MON serveur
# Tout les serveurs du domaine ainsi que le routeur et le CD seront modifiés 
# suite à l'éxécution de ce script
####################################################################


#----------------------------------------CONTROLEUR DOMAINE------------------------------------
#Cree dossier
New-Item \\407PF5\C$\_SEGA_ART\ART_SCENARIO -ItemType directory 
#Creer partage
New-SmbShare -name ART_SCENARIO -Path C:\_SEGA_ART\ART_SCENARIO -CimSession 407PF5 -FolderEnumerationMode AccessBased
Grant-SmbShareAccess -Name ART_SCENARIO -AccountName "Tout le monde" -CimSession 407PF5 -AccessRight Full -Force 

icacls.exe \\407PF5\C$\_SEGA_ART\ART_SCENARIO /inheritance:r
icacls.exe \\407PF5\C$\_SEGA_ART\ART_SCENARIO /grant "Erwan:(OI)(CI)(F)" "Administrateurs:(OI)(CI)(F)" "SYSTÈME:(OI)(CI)(F)" "ART_SCENARIOS:(OI)(CI)(M)" "ART_SFX:(OI)(CI)(M)" "ART_GESTIONNAIRE:(OI)(CI)(M)" "ART_DIRECTEURS:(OI)(CI)(RX)"


#--------------------------------------------SERVEUR 1 : Chelny------------------------------------------
#Cree dossier
New-Item \\407PF2\C$\_SEGA_ART\ART_SFX -ItemType directory
#Creer partage
New-SmbShare -name ART_SFX -Path C:\_SEGA_ART\ART_SFX -CimSession 407PF2 -FolderEnumerationMode AccessBased
Grant-SmbShareAccess -Name ART_SFX -AccountName "Tout le monde" -CimSession 407PF2 -AccessRight Full -Force 

icacls.exe \\407PF2\C$\_SEGA_ART\ART_SFX /inheritance:r
icacls.exe \\407PF2\C$\_SEGA_ART\ART_SFX /grant "Erwan:(OI)(CI)(F)" "Administrateurs:(OI)(CI)(F)" "SYSTÈME:(OI)(CI)(F)" "ART_SFX:(OI)(CI)(M)" "ART_GESTIONNAIRE:(OI)(CI)(M)" "ART_SCENARIOS:(OI)(CI)(RX)"


#---------------------------------------------SERVEUR 2 : Shi Hui------------------------------------------
#Cree dossier
New-Item \\407PF3\C$\_SEGA_ART\ART_DOCDESIGN -ItemType directory
#Creer partage
New-SmbShare -name ART_DOCDESIGN -Path C:\_SEGA_ART\ART_DOCDESIGN -CimSession 407PF3 -FolderEnumerationMode AccessBased
Grant-SmbShareAccess -Name ART_DOCDESIGN -AccountName "Tout le monde" -CimSession 407PF3 -AccessRight Full -Force

icacls.exe \\407PF3\C$\_SEGA_ART\ART_DOCDESIGN /inheritance:r
icacls.exe \\407PF3\C$\_SEGA_ART\ART_DOCDESIGN /grant "Erwan:(OI)(CI)(F)" "Administrateurs:(OI)(CI)(F)" "SYSTÈME:(OI)(CI)(F)" "ART_DESIGNERS:(OI)(CI)(M)" "ART_SFX:(OI)(CI)(M)" "ART_GESTIONNAIRE:(OI)(CI)(M)"


#-------------------------------------------SERVEUR 3: ERWAN-------------------------------------------
#Cree dossier
New-Item C:\_SEGA_ART\ART_GESTION -ItemType directory
New-Item C:\_SEGA_ART\Home -ItemType directory
New-Item C:\_SEGA_ART\Profil -ItemType directory
New-Item C:\_SEGA_ART\TELE -ItemType directory
New-Item C:\_SEGA_ART\DFSROOT -ItemType directory
New-Item C:\_SEGA_ART\WEB -ItemType directory
New-Item C:\_SEGA_ART\WEBSEC -ItemType directory
New-Item C:\_SEGA_ART\FTP -ItemType directory

#Creer partage
New-SmbShare -name ART_GESTION -Path C:\_SEGA_ART\ART_GESTION -FolderEnumerationMode AccessBased
New-SmbShare -name ART_HOME$ -Path C:\_SEGA_ART\Home -FolderEnumerationMode AccessBased
New-SmbShare -name ART_PROFILE$ -Path C:\_SEGA_ART\Profil -FolderEnumerationMode AccessBased
New-SmbShare -name ART_TELE -Path C:\_SEGA_ART\TELE -FolderEnumerationMode AccessBased

Grant-SmbShareAccess -Name ART_GESTION -AccountName "Tout le monde"  -AccessRight Full -Force
Grant-SmbShareAccess -Name ART_HOME$ -AccountName "Tout le monde"  -AccessRight Full -Force
Grant-SmbShareAccess -Name ART_PROFILE$ -AccountName "Tout le monde"  -AccessRight Full -Force
Grant-SmbShareAccess -Name ART_TELE -AccountName "Tout le monde"  -AccessRight Full -Force

icacls.exe C:\_SEGA_ART\ART_GESTION /inheritance:r
icacls.exe C:\_SEGA_ART\Home /inheritance:r
icacls.exe C:\_SEGA_ART\Profil /inheritance:r
icacls.exe C:\_SEGA_ART\TELE /inheritance:r
icacls.exe C:\_SEGA_ART\WEB /inheritance:r
icacls.exe C:\_SEGA_ART\WEBSEC /inheritance:r
icacls.exe C:\_SEGA_ART\FTP /inheritance:r

icacls.exe C:\_SEGA_ART\Doc_Architecte /grant "Administrateurs:(OI)(CI)(F)" "SYSTÈME:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)" "ART_DIRECTEURS:(OI)(CI)(M)" "ARTISTIQUE:(OI)(CI)(RX)" "ART_GESTIONNAIRE:(OI)(CI)(M)"
icacls.exe C:\_SEGA_ART\Home /grant "Administrateurs:(OI)(CI)(F)" "SYSTÈME:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)" "ARTISTIQUE:(OI)(CI)(R)" 
icacls.exe C:\_SEGA_ART\Profil /grant "Administrateurs:(OI)(CI)(F)" "SYSTÈME:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)" "ARTISTIQUE:(OI)(CI)(R)" 
icacls.exe C:\_SEGA_ART\TELE /grant "Administrateurs:(OI)(CI)(F)" "SYSTÈME:(OI)(CI)(F)" "Erwan:(OI)(CI)(F)" "ART_GESTIONNAIRE:(OI)(CI)(M)"
icacls.exe C:\_SEGA_ART\WEB /grant "Administrateurs:(OI)(CI)(F)" "SYSTÈME:(OI)(CI)(F)" "ART_GESTIONNAIRE:(OI)(CI)(M)"
icacls.exe C:\_SEGA_ART\WEBSEC /grant "Administrateurs:(OI)(CI)(F)" "SYSTÈME:(OI)(CI)(F)" "ART_GESTIONNAIRE:(OI)(CI)(M)"
icacls.exe C:\_SEGA_ART\FTP /grant "Administrateurs:(OI)(CI)(F)" "SYSTÈME:(OI)(CI)(F)" "ART_GESTIONNAIRE:(OI)(CI)(M)"

#---------------------------------------------ROUTEUR---------------------------------------------------
#Cree dossier
New-Item \\rootroot\C$\_SEGA_ART\ART_SCENARISATION -ItemType directory
#Creer partage
New-SmbShare -name ART_SCENARISATIONbis -Path C:\_SEGA_ART\ART_SCENARISATION -CimSession rootroot -FolderEnumerationMode AccessBased
Grant-SmbShareAccess -Name ART_SCENARISATIONbis -AccountName "Tout le monde" -CimSession rootroot -AccessRight Full -Force

icacls.exe \\rootroot\C$\_SEGA_ART\ART_SCENARISATION /inheritance:r
icacls.exe \\rootroot\C$\_SEGA_ART\ART_SCENARISATION /grant "Erwan:(OI)(CI)(F)" "Administrateurs:(OI)(CI)(F)" "SYSTÈME:(OI)(CI)(F)" "ART_SCENARIOS:(OI)(CI)(M)" "ART_SFX:(OI)(CI)(M)" "ART_GESTIONNAIRE:(OI)(CI)(M)" "ART_DIRECTEURS:(OI)(CI)(RX)"