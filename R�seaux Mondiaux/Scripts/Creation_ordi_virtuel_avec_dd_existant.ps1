
$chemin = (get-vmhost).VirtualHardDiskPath
$name = "W8"
$disque = "W8_B64.vhdx"
$proc = 1
$memDebut = 1024MB
$minRAM = 512MB
$maxRAM = 1024MB

New-VM -name $name -VHDPath ($chemin+"\"+$disque) -MemoryStartupBytes $memDebut
Set-VMBios -VMName $name -EnableNumLock
Set-VMProcessor -VMName $name -Count $proc
Set-VMMemory -VMName $name -MaximumBytes $maxRAM -MinimumBytes $minRAM -DynamicMemoryEnabled $true
Add-VMNetworkAdapter -SwitchName EXTERNE -VMName $name -isLegacy $true


write-host Fin du traitement