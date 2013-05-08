#Install-WindowsFeature -Name "ad-domain-services" -IncludeAllSubFeature -IncludeManagementTools -Restart
#Install-WindowsFeature -Name "dns" -IncludeAllSubFeature -IncludeManagementTools -Restart
#Install-WindowsFeature -Name "web-server" -IncludeAllSubFeature -IncludeManagementTools -Restart
#Install-WindowsFeature -Name "web-ftp-server" -IncludeAllSubFeature -IncludeManagementTools -Restart
#Install-WindowsFeature -Name "smtp-server" -IncludeAllSubFeature -IncludeManagementTools -Restart

##### Installation des programmes de controle du Controleur de Domaine ######
#Install-WindowsFeature -Name "RSAT-ADDS-Tools" -IncludeAllSubFeature -IncludeManagementTools -Restart
#Install-WindowsFeature -Name "RSAT-AD-PowerShell" -IncludeAllSubFeature -IncludeManagementTools -Restart

### Rejoindre le Controleur de domaine ###
#Add-Computer -DomainName thethrone.pro -ComputerName rootroot

Install-WindowsFeature -Name "Routing" -IncludeAllSubFeature -IncludeManagementTools -Restart