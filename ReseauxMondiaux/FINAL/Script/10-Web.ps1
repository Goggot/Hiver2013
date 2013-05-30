New-Website -Name ARTISTIQUE -IPAddress 172.24.48.173 -PhysicalPath C:\_SEGA_ART\WEB -Port 80
New-Website -Name SECART -IPAddress 172.24.48.174 -PhysicalPath C:\_SEGA_ART\WEBSEC -SSL -Port 443
New-WebFtpsite -Name FART -IPAddress 172.24.48.2 -PhysicalPath C:\_SEGA_ART\FTP -Port 21