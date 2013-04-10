$fcsv = import-csv -path "c:\@Erwan\L06A_Donnees.csv" -delimiter ";"
$ftexte = "c:\@Erwan\users.log"

foreach($item in $fcsv)
{
    $login = "H_"+$item.sn.Substring(0,3)+$item.givenName.Substring(0,2)
    write-host $login

    add-content $ftexte ($login + " " + $item.sn + " " + $item.givenName)
}