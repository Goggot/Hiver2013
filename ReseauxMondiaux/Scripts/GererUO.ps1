﻿Clear-Host

# Création d'UO
$nomDom="dc=DALLAS,dc=B64"
$nomUO="UberUO"
New-ADOrganizationalUnit `
    -Name $nomUO `
    -Path $nomDom `
    -Description "UO Powershell" `