Clear-Host

# Création d'UO
$nomDom="dc=DALLAS,dc=B64"
$nomUO="UberUO"
New-ADOrganizationalUnit `
    -Name $nomUO `
    -Path $nomDom `
    -Description "UO Powershell" `    -ProtectedFromAccidentalDeletion $falseWrite-Host Création de $nomUO# Création d'UO sous la premièreNew-ADOrganizationalUnit `    -Name "UberSousUO" `    -Path "ou=UberUO,$nomDom" `    -Description "Uber Sous UO" `    -ProtectedFromAccidentalDeletion $falseWrite-Host Création de UberSousUO# Suppression d'UORemove-ADOrganizationalUnit `    -Identity ("ou=UberSousUO,ou=UberUO,"+$nomDom) `    -Confirm:$false `    -Recursive