$domaine = get-addomain | Select-Object DistinguishedName
new-gpo -name GPO_ACCES -Domain $domaine