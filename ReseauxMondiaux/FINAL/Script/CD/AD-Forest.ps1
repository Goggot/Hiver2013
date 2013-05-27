###########################################
#####         Erwan Palanque          #####
#####          15 mai 2013            #####
##### 	  		 AD Forest 	  		  #####
#####        Serveur : 407PF4         #####
###########################################

Import-Module ADDSDeployment
Install-ADDSForest `
-CreateDnsDelegation:$false `
-DatabasePath "C:\Windows\NTDS" `
-DomainMode "Win2012" `
-DomainName "THETHRONE.PRO" `
-DomainNetbiosName "THETHRONE" `
-ForestMode "Win2012" `
-InstallDns:$true `
-LogPath "C:\Windows\NTDS" `
-NoRebootOnCompletion:$false `
-SysvolPath "C:\Windows\SYSVOL" `
-Force:$true