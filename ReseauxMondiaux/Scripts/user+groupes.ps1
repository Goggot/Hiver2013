$c1 = "HaitiU1"
$c2 = "HaitiU2"
$g1 = "Haiti_grA"
$g2 = "Haiti_grB"

$passwd = convertto-securestring "AAAaaa111" -asplaintext -force

remove-aduser -identity $c1
remove-aduser -identity $c2
Remove-ADGroup -identity $g1
Remove-ADGroup -identity $g2

New-ADUser `
    -Name $c1 `
    -SamAccountName $c1 `
    -UserPrincipalName $c1@DALLAS.B64 `    -GivenName $c1 `    -Path "ou=Corpo,ou=Haiti,ou=Erwan,dc=DALLAS,dc=B64" `    -AccountPassword $passwd `
    -PasswordNeverExpires $trueNew-ADUser `
    -Name $c2 ` 
    -SamAccountName $c2 `
    -UserPrincipalName $c2@DALLAS.B64 `    -GivenName $c2 `    -Path "ou=Moron,ou=Corpo,ou=Haiti,ou=Erwan,dc=DALLAS,dc=B64" `    -AccountPassword $passwd `
    -PasswordNeverExpires $trueNew-ADGroup -GroupScope DomainLocal -Name $g1 -GroupCategory Security -path "ou=Haiti,ou=Erwan,dc=DALLAS,dc=B64"New-ADGroup -GroupScope DomainLocal -Name $g2 -GroupCategory Security -path "ou=Haiti,ou=Erwan,dc=DALLAS,dc=B64"add-ADGroupMember -Identity $g1 -Members $c1,$c2Add-ADGroupMember -Identity $g2 -Members $c2