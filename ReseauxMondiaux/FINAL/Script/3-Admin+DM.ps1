###########################################
#####         Erwan Palanque          #####
#####          15 mai 2013            #####
##### 	 Jonctions DM + Admin perso   #####
#####        Serveur : 407PF4         #####
###########################################

##### Cr�ation admin perso #####
$passwd = convertto-securestring "AAAaaa111" -asplaintext -force
$login = "Erwan"

New-ADUser `
    -Name $login `
    -SamAccountName $login `
    -UserPrincipalName $login@THETHRONE.PRO `    -GivenName $login `    -DisplayName $login `    -AccountPassword $passwd `    -Path "cn=Users,dc=THETHRONE,dc=PRO" `    -PasswordNeverExpires $true `    -Enabled $trueAdd-ADGroupMember -Identity "Administrateurs" -Members $loginAdd-ADGroupMember -Identity "Administrateurs de l�entreprise" -Members $loginAdd-ADGroupMember -Identity "Administrateurs du sch�ma" -Members $loginAdd-ADGroupMember -Identity "Admins du domaine" -Members $login
Add-ADGroupMember -Identity "Propri�taires cr�ateurs de la strat�gie de groupe" -Members $login

##### Rejoindre le Controleur de domaine #####
Add-Computer -DomainName THETHRONE.PRO -ComputerName 407PF4