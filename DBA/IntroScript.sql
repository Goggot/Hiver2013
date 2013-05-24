CLEAR SCREEN

PROMPT Voici petit tutorial faisant une petite introduction simple sur les scripts
PROMPT
PROMPT
PROMPT
PROMPT
PROMPT Appuyez sur ENTER pour poursuivre...
PAUSE
CLEAR SCREEN

PROMPT 1. Pour afficher du texte a l'ecran
PROMPT '    Commande : PROMPT
PROMPT '    Synopsis : PROMPT text
PROMPT '    Example  :
PROMPT '      PROMPT Voici du texte!
PROMPT
PROMPT
PROMPT
PROMPT
PROMPT Appuyez sur ENTER pour poursuivre...
PAUSE
CLEAR SCREEN

PROMPT 2. Pour effacer le contenu de la fenetre courante
PROMPT '    Commande : CLEAR SCREEN
PROMPT '    Synopsis : CLEAR SCREEN
PROMPT '    Example  : 
PROMPT '      CLEAR SCREEN
PROMPT
PROMPT
PROMPT
PROMPT
PROMPT Appuyez sur ENTER pour poursuivre...
PAUSE
CLEAR SCREEN

PROMPT 3. Pour obtenir de l'aide sur une fonction
PROMPT '    Commande : HELP
PROMPT '    Synopsis : HELP commande
PROMPT '    Example  : 
PROMPT '      HELP HELP
PROMPT '      ? HELP
PROMPT '      HELP INDEX
PROMPT
PROMPT
PROMPT
PROMPT
PROMPT Appuyez sur ENTER pour poursuivre...
PAUSE
CLEAR SCREEN

PROMPT 4. Pour mettre en attente l'execution du script en cours.
PROMPT '  Le script attend que la touche ENTER sois appuye
PROMPT '    Commande : PAUSE
PROMPT '    Synopsis : PAUSE
PROMPT '    Example  :
PROMPT '      PAUSE
PROMPT
PROMPT
PROMPT
PROMPT
PROMPT Appuyez sur ENTER pour poursuivre...
PAUSE
CLEAR SCREEN

PROMPT 5. Afficher la valeur d'une variable interne.
PROMPT '     Commande : SHOW
PROMPT '     Synopsis : SHOW parameter
PROMPT '     Example  :
PROMPT '       SHOW USER
PROMPT '       SHOW PAGESIZE
PROMPT '       SHOW ...
PROMPT
PROMPT
PROMPT
PROMPT
PROMPT Appuyez sur ENTER pour poursuivre...
PAUSE
CLEAR SCREEN

PROMPT 6. Modifie la valeur d'une variable interne.
PROMPT '     Commande : SET
PROMPT '     Synopsis : SET parameter value
PROMPT '     Example : 
PROMPT '       SET PAGESIZE 100
PROMPT
PROMPT
PROMPT
PROMPT
PROMPT Appuyez sur ENTER pour poursuivre...
PAUSE
CLEAR SCREEN

PROMPT 7. Demarre l'execution d'un fichier de script
PROMPT '     Commande : START 
PROMPT '     Synopsis : START path\filename
PROMPT '     Example
PROMPT '       START C:\MonDossier\MonFichierScript.SQL
PROMPT
PROMPT
PROMPT
PROMPT
PROMPT Appuyez sur ENTER pour poursuivre...
PAUSE
CLEAR SCREEN

PROMPT 8.a. Substitution de variable par demande d'information
PROMPT '    Trois approches differentes :
PROMPT '
PROMPT '  1iere approche : Substitution avec demande systematique.
PROMPT '    On utilise le caractere '&' suivi d'une variable de substitution qui sera
PROMPT '    utilisee par Oracle comme texte lors de la demande d'information a l'usager.
PROMPT '    Example :
PROMPT '    SELECT COUNT(*) FROM '&'table;    (<--- attention : il faut enlever les ')
PROMPT '
PROMPT '       Cette requete sera interrompue et la question suivante posee :
PROMPT '        - Entrez une valeur pour table :
PROMPT
PROMPT
PROMPT
PROMPT
PROMPT Appuyez sur ENTER pour poursuivre...
PAUSE
CLEAR SCREEN

PROMPT 8.b. Substitution de variable par demande d'information
PROMPT '    Trois approches differentes :
PROMPT '
PROMPT '  2iere approche : Substitution avec demande si requise.
PROMPT '    Si on utilise la meme variable a plusieurs endroits dans le script, 
PROMPT '    Oracle fera la requete d'information pour chaque element de la requete.
PROMPT '    Cette situation peut etre ennuyeuse si la meme variable est utilisee a 
PROMPT '    plusieurs endroits et que la meme question est demande a l'usager.
PROMPT '    Dans ce cas, on utilise les caracteres && pour utiliser des valeurs 
PROMPT '    deja definie.
PROMPT ' 
PROMPT '    Example :
PROMPT '    SELECT '&'col FROM '&'table ORDER BY '&'col;  
PROMPT '                                 (<--- attention : il faut enlever les ')
PROMPT '       cette requete requiert trois informations : col, table et 
PROMPT '       col (une 2ieme fois)
PROMPT '
PROMPT '    SELECT '&'col FROM '&'table ORDER BY '&&'col;
PROMPT '       cette requete requiert deux informations (col et table) si ces 
PROMPT '       informations ne sont pas disponibles.
PROMPT '
PROMPT '    Lorsque les variables sont definies, toutes les appels subsequents a la 
PROMPT '    fonction utilisera les valeurs deja definies tant que les variables sont
PROMPT '    definies.  Les variables deviendront non definies si :
PROMPT '       - l'usager se deconnecte
PROMPT '       - l'usager enleve la definition de la variable
PROMPT '            un exemple pour faire cette tache : UNDEFINE col
PROMPT
PROMPT
PROMPT
PROMPT
PROMPT Appuyez sur ENTER pour poursuivre...
PAUSE
CLEAR SCREEN

PROMPT 8.c. Substitution de variable par demande d'information
PROMPT '    Trois approches differentes :
PROMPT '
PROMPT '  3iere approche : Substitution par parametres.
PROMPT '    Il est possible de passer directement les parametres necessaires au script
PROMPT '    en passant les parametres lors de l'execution de la commande START.
PROMPT '    Il suffit d'appeler les parametres par '&', '&'2, '&'3, ... pour les 1ier, 
PROMPT '    2ieme, 3ieme parametre et ainsi de suite.
PROMPT '    Example :
PROMPT '    SELECT '&'1 FROM '&'2 ORDER BY '&'1;
PROMPT '                                  (<--- attention : il faut enlever les ')
PROMPT '    
PROMPT '    On appel ce script par : 
PROMPT '       START monscript.sql OWNER DBA_TABLES
PROMPT
PROMPT
PROMPT
PROMPT
PROMPT Appuyez sur ENTER pour poursuivre...
PAUSE
CLEAR SCREEN

PROMPT Quelques examples :
PROMPT 
PROMPT 
PROMPT L'usager actuellement connecte est : 
show user
PROMPT
PROMPT L'etat de la BD est :
SELECT STATUS FROM V$INSTANCE;
PROMPT 
PROMPT 
PROMPT 
PROMPT
PROMPT Appuyez sur ENTER pour poursuivre...
PAUSE
CLEAR SCREEN

