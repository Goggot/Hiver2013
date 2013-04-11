## Création de groupes
New-ADGroup -GroupScope DomainLocal -Name Haiti_grDomaineLocal -Description "Groupe exemple de Haiti" -GroupCategory Security

New-ADGroup -GroupScope Global -Name Haiti_grGlobal -Description "Groupe exemple de Haiti" -GroupCategory Security

New-ADGroup -GroupScope Universal -Name Haiti_grUniversel -Description "Groupe exemple de Haiti" -GroupCategory Security
