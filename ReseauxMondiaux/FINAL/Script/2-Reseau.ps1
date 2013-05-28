###########################################
#####         Erwan Palanque          #####
#####          15 mai 2013            #####
##### Configuration des cartes réseau #####
#####        Serveur : 407PF4         #####
###########################################

$ipPrincipal = "172.24.48.173"
$ipSup = "172.24.48.175"
$ipCD = "172.24.48.2"
$ipRoot = "172.24.48.1"
$pref = 20
$p = "IPv4"
$c1 = "SEGA"
$c2 = "OnBoard"
$n1 = "Ethernet"
$n2 = "Ethernet 2"

##### Renommer les cartes réseau #####
Rename-NetAdapter -Name $n1 -NewName $c1
Rename-NetAdapter -Name $n2 -NewName $c2

##### Attribuer les adresses #####
New-NetIPAddress -InterfaceAlias $c1 -IPAddress $ipPrincipal -AddressFamily $p -DefaultGateway $ipRoot -PrefixLength $pref
Set-DnsClientServerAddress -InterfaceAlias $c1 -ServerAddresses $ipCD
Disable-NetAdapter -Name $c2

##### Ajouter les adresses supplémentaires #####
New-NetIPAddress -InterfaceAlias $c1 -IPAddress $ipSup -AddressFamily $p -PrefixLength $pref