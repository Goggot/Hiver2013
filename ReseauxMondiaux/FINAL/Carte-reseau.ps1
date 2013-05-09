################ 1 ################

#Rename-NetAdapter -Name Ethernet -NewName OnBoard
#Rename-NetAdapter -Name "Ethernet 2" -NewName SEGA

#### Serveur Perso ####
#Rename-Computer -NewName 407PF4

#New-NetIPAddress -InterfaceAlias SEGA -IPAddress 172.24.51.173 -AddressFamily IPv4 -DefaultGateway 172.24.51.1 -PrefixLength 24
#Set-DnsClientServerAddress -InterfaceAlias SEGA -ServerAddresses 172.24.51.2
#Disable-NetAdapter -Name OnBoard


#### RootRoot ####
#Rename-Computer -NewName ROOTROOT
New-NetIPAddress -InterfaceAlias SEGA -IPAddress 172.24.51.1 -AddressFamily IPv4 -PrefixLength 24
Set-DnsClientServerAddress -InterfaceAlias SEGA -ServerAddresses 172.24.51.2

New-NetIPAddress -InterfaceAlias OnBoard -IPAddress 10.57.61.1 -AddressFamily IPv4 -PrefixLength 16 -DefaultGateway 10.57.1.1
Set-DnsClientServerAddress -InterfaceAlias OnBoard -ServerAddresses 10.57.4.28,10.57.4.29