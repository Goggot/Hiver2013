﻿clear-host

$fcsv = import-csv -path "c:\@Erwan\UO.csv" -delimiter ";"

New-ADOrganizationalUnit `
        -Name "Haiti" `
        -Path "ou=Erwan,dc=DALLAS,dc=B64" `
        -Description "Erwan" `

foreach($item in $fcsv)
{
    New-ADOrganizationalUnit `
        -Name $item.aOU `
        -Path $item.aParent `
        -Description $item.aDesc `
}