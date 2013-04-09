# Installer Hyper-V
Install-WindowsFeature -Name Hyper-V -IncludeAllSubFeature -IncludeManagementTools -Restart

# Configurer le chemin des disques et des ordis virtuels
Set-VMHost -VirtualHardDiskPath C:\_VDISQ -VirtualMachinePath C:\_VORDI

# Créer une config réseau interne
New-VMSwitch -Name INTERNE -SwitchType Internal

# Créer une config réseau externe (doit définir la carte)
New-VMSwitch -Name EXTERNE -NetAdapterName PCI

# Détruire la config INTERNE
Remove-VMSwitch -Name INTERNE

# Créer disque virtuel
$chemin = (get-vmhost).VirtualHardDiskPath
New-VHD -Path ($chemin+"\DISQUE1.VHDX") -SizeBytes 20GB -Dynamic