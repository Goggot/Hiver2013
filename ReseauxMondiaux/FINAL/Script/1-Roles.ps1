##### 1 - Rôles et services serveur perso #####

Rename-Computer -NewName "407PF4"

Install-WindowsFeature -Name "ad-domain-services" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "dns" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "web-server" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "web-ftp-server" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "smtp-server" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "RSAT-ADDS-Tools" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "Remote-Desktop-Services" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "RSAT-AD-PowerShell" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "Hyper-V" -IncludeAllSubFeature -IncludeManagementTools -Restart