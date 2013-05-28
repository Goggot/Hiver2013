#Lab06 - web pare-feu
#ajout d'un fonctionnalité : Installer la console DNS
Install-WindowsFeature -Name RSAT-DNS-Server

#Ajout de 2 adresses IP
New-NetIPAddress -InterfaceAlias PciConfig -IPAddress 172.61.61.44 -AsJob -PrefixLength 24
New-NetIPAddress -InterfaceAlias PciConfig -IPAddress 172.61.61.45 -AsJob -PrefixLength 24

#créaton des dossiers
mkdir C:\_WEB\ADR1
mkdir C:\_WEB\ADR2

#création d'un fichier
New-Item -Path C:\_WEB\ADR1 -Name index.html
type: file

#Ajout des éléments dans le fichier
Add-Content -path C:\_WEB\ADR1\index.html -Value "Shi Hui Tran, 172.61.61.44, port 80, http:\\172.61.61.44:80"

#créaton d'un nouveau site
New-Website -Name ADR2 -IPAddress 172.61.61.45 -PhysicalPath C:\_web\ADR2 -Port 80

#création d'un site par entête
New-Website -Name ENT1 -HostHeader ENT1.Canada.edu -IPAddress 172.61.61.41 -PhysicalPath C:\_web\ENT1 -Port 80
New-Website -Name ENT2 -HostHeader ENT2.Canada.edu -IPAddress 172.61.61.41 -PhysicalPath C:\_web\ENT2 -Port 80
New-Website -Name ENT3 -HostHeader CanadaENT3.cabano.b61 -IPAddress 172.61.61.41 -PhysicalPath C:\_web\ENT3 -Port 80

#voir les parametres des sites
Get-webSite

#pour avoir le status du site : Default web site
Get-webSiteState 'Default Web Site'

#savoir leur adresse ip ainsi que leur FQDN
Get-webBinding

#mode, LastWriteTime, Length, Name des sites (C:\_web et c:\inetpub)
Get-webFilePath 'IIS:\Sites\*'

#afficher pour tous vos sites web, seulement leur nom et leur état
Get-webSite | Select-Object name, state

#afficher la configuration de web
Get-webConfiguration *

#IIS:
dir
cd

#Donner toutes les sections du premier niveau
Get-ItemProperty *

#donne tous les configrations au niveau «IIS:\Sites»
Get-Item 'Default Web Site' | Select-Object *