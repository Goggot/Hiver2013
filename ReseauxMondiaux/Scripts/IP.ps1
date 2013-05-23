$i = 1
while ($i -eq 12){
    $ip=10.57.61.+$i
    New-NetIPAddress -InterfaceAlias OnBoardConfig -IPAddress $ip -AddressFamily IPv4 -PrefixLength 16
    write-host Ajout de $ip
    $i++
}