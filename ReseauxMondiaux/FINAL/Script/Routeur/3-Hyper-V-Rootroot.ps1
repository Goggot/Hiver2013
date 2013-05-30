##### 3 - Hyper-V ROOTROOT #####

## Configurer le chemin des disques et des ordis virtuels
Set-VMHost -VirtualHardDiskPath C:\_VirDisque -VirtualMachinePath C:\_VirOrdi

## Créer une config réseau externe (doit définir la carte)
New-VMSwitch -Name WAN_CONFIG -NetAdapterName OnBoard
Rename-NetAdapter -Name "vEthernet (WAN_CONFIG)" -NewName WAN_CONFIG

$chemin = (get-vmhost).VirtualHardDiskPath
$name = "WinServeur"
$disque = "Windows Serveur 2012.vhdx"
$proc = 1
$memDebut = 1024MB
$minRAM = 1024MB
$maxRAM = 2048MB

New-VM -name $name -VHDPath ($chemin+"\Windows Serveur 2012\"+$disque) -MemoryStartupBytes $memDebut -BootDevice IDE
Set-VMBios -VMName $name -EnableNumLock
Set-VMProcessor -VMName $name -Count $proc
Set-VMMemory -VMName $name -MaximumBytes $maxRAM -MinimumBytes $minRAM -DynamicMemoryEnabled $true
Add-VMNetworkAdapter -SwitchName WAN_CONFIG -VMName $name -isLegacy $true