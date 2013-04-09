$passwd = convertto-securestring "AAAaaa111" -asplaintext -force
$login = "Palanque"
New-ADUser `
    -Name $login `
    -SamAccountName $login `
    -UserPrincipalName $login@DALLAS.B64 `
    -Description "Premier usager du pays Haiti" `    -GivenName $login `    -AccountPassword $passwd `    -fax "514-982-0000" `    -mobilephone "514-222-3333" `    -department "420-B64" `    -Path "ou=Haiti,ou=Erwan,dc=DALLAS,dc=B64" `    -profilePath "ou=Haiti,ou=Erwan,dc=DALLAS,dc=B64" `    -PasswordNeverExpires $true `    -otherattributes @{pager = "7070"; `                       wWWHomePage = "www.dallas.b64"; `                       c = "HA"; `                       co = "Haiti"; `                       title = "Gestionnaire de pays Haiti"; `                       mail = "erwan@gmail.com"; `                       otherTelephone = @('514-982-3437';'514-982-7000';'514-982-9999')}