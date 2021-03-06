﻿###########################################
#####         Erwan Palanque          #####
#####          15 mai 2013            #####
##### 	  Configuration des rôles 	  #####
#####        Serveur : 407PF4         #####
###########################################
Set-ExecutionPolicy unrestricted

mount-vol D: /D
mount-vol E: /D
mount-vol F: /D
Rename-Computer -NewName "407PF4"

Install-WindowsFeature -Name "ad-domain-services" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "web-server" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "web-ftp-server" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "RSAT-ADDS-Tools" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "Remote-Desktop-Services" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "RSAT-AD-PowerShell" -IncludeAllSubFeature -IncludeManagementTools
Install-WindowsFeature -Name "Hyper-V" -IncludeAllSubFeature -IncludeManagementTools -Restart