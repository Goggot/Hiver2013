##### 2 - Réseau et DM serveur perso #####

##### Renommer les cartes réseau #####
Rename-NetAdapter -Name Ethernet -NewName OnBoard
Rename-NetAdapter -Name "Ethernet 2" -NewName SEGA

##### Attribuer les adresses #####
New-NetIPAddress -InterfaceAlias SEGA -IPAddress 172.24.48.173 -AddressFamily IPv4 -DefaultGateway 172.24.48.1 -PrefixLength 24
Set-DnsClientServerAddress -InterfaceAlias SEGA -ServerAddresses 172.24.48.2
Disable-NetAdapter -Name OnBoard

##### Ajouter les adresses supplémentaires #####
