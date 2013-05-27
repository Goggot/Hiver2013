##### 2 -  Reseau ROOTROOT #####

##### Renommer les cartes réseau #####
Rename-NetAdapter -Name Ethernet -NewName OnBoard
Rename-NetAdapter -Name "Ethernet 2" -NewName WAN

##### Attribuer les adresses #####
New-NetIPAddress -InterfaceAlias WAN -IPAddress 172.24.48.1 -AddressFamily IPv4 -PrefixLength 24
Set-DnsClientServerAddress -InterfaceAlias WAN -ServerAddresses 172.24.48.2

New-NetIPAddress -InterfaceAlias OnBoard -IPAddress 10.57.61.1 -AddressFamily IPv4 -PrefixLength 16 -DefaultGateway 10.57.1.1
Set-DnsClientServerAddress -InterfaceAlias OnBoard -ServerAddresses 10.57.4.28,10.57.4.29

##### Rejoindre le CD #####
Add-Computer -DomainName thethrone.pro -ComputerName ROOTROOT