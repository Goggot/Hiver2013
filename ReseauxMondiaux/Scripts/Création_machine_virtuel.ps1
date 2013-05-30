$fcsv = import-csv -Path c:\@Erwan\Hyper-V.csv -Delimiter ";"
$chemin = (get-vmhost).VirtualMachinePath

foreach ($ligne in $fcsv)
{
    $name = ($ligne.VMNom)
    write-host $name
    $disque = ($ligne.DisqueNom)
    write-host $disque
    $proc = [int64]($ligne.Processeur)
    write-host $proc
    $memDebut = [int64]($ligne.StartupRam)*1MB
    write-host $memDebut
    $memDyn = ($ligne.MemoireDynamique)
    write-host $memDyn
    $minRAM = [int64]($ligne.MinRAM)*1MB
    write-host $minRAM
    $maxRAM = [int64]($ligne.MaxRAM)*1MB
    write-host $maxRAM

    New-VM -name $name -NewVHDPath ($chemin+"\"+$disque) -MemoryStartupBytes $memDebut -NewVHDSizeBytes 20GB
    Set-VMBios -VMName $name -EnableNumLock
    Set-VMProcessor -VMName $name -Maximum $proc
    Set-VMMemory -VMName $name -MaximumBytes $maxRAM -MinimumBytes $minRAM -DynamicMemoryEnabled $true
    Connect-VMNetworkAdapter -SwitchName EXTERNE -VMName $name
}

write-host Fin du traitement