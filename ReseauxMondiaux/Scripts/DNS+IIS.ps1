# Installer console DNS
Install-WindowsFeature -name RSAT-DNS-Server -IncludeManagementTools -Restart

# Ajouter adresse IP
New-NetIPAddress -InterfaceAlias PciConfig -IPAddress 172.61.61.63 -AddressFamily IPv4 -PrefixLength 24

# Créer site web par adresse
New-Website -Name ADR1 -IPAddress 172.61.61.62 -PhysicalPath C:\_WEB\ADR1\ -Port 80

# Créer site web par entete
New-Website -Name ENT1 -HostHeader ENT1.Mexique.edu -IPAddress 172.61.61.61 -PhysicalPath C:\_WEB\ENT1\ -Port 80

# Vérifier paramètre sites web
Get-Website