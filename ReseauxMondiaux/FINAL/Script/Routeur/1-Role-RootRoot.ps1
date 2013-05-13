##### 1 - Rôles et services ROOTROOT #####

Rename-Computer -NewName "ROOTROOT"

Install-WindowsFeature -Name "ad-domain-services" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "RSAT-ADDS-Tools" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "RSAT-AD-PowerShell" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "Routing" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "Hyper-V" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "Remote-Desktop-Services" -IncludeAllSubFeature -IncludeManagementTools -Restart