﻿$passwd = convertto-securestring "AAAaaa111" -asplaintext -force
$login = "Palanque"
New-ADUser `
    -Name $login `
    -SamAccountName $login `
    -UserPrincipalName $login@DALLAS.B64 `
    -Description "Premier usager du pays Haiti" `