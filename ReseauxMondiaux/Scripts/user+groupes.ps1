﻿$c1 = "HaitiU1"
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
    -UserPrincipalName $c1@DALLAS.B64 `
    -PasswordNeverExpires $true
    -Name $c2 ` 
    -SamAccountName $c2 `
    -UserPrincipalName $c2@DALLAS.B64 `
    -PasswordNeverExpires $true