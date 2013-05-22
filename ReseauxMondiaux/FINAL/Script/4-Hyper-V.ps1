###########################################
#####         Erwan Palanque          #####
#####          15 mai 2013            #####
##### 	  		 Hyper-V 	  		  #####
#####        Serveur : 407PF4         #####
###########################################

## Configurer le chemin des disques et des ordis virtuels
Set-VMHost -VirtualHardDiskPath C:\_VirDisque -VirtualMachinePath C:\_VirOrdi

## Créer une config réseau externe (doit définir la carte)
New-VMSwitch -Name SEGA_CONFIG -NetAdapterName SEGA
Rename-NetAdapter -Name "vEthernet (SEGA_CONFIG)" -NewName SEGACONFIG

$chemin = (get-vmhost).VirtualHardDiskPath
$name = "Win8"
$disque = "Windows 8.vhdx"
$proc = 1
$memDebut = 1024MB
$minRAM = 1024MB
$maxRAM = 1024MB

New-VM -name $name -VHDPath ($chemin+"\Windows 8\"+$disque) -MemoryStartupBytes $memDebut -BootDevice IDE
Set-VMBios -VMName $name -EnableNumLock
Set-VMProcessor -VMName $name -Count $proc
Set-VMMemory -VMName $name -MaximumBytes $maxRAM -MinimumBytes $minRAM -DynamicMemoryEnabled $true
Add-VMNetworkAdapter -SwitchName SEGA_CONFIG -VMName $name -isLegacy $true