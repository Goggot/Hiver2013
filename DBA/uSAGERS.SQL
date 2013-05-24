CREATE PROFILE ACME_PROFIL LIMIT SESSIONS_PER_USER 5;

DROP USER ACME_CREATEUR;
DROP USER ACME_BACKUP;
DROP USER ACME_APP;
CREATE USER ACME_CREATEUR IDENTIFIED BY AAAaaa111 PROFILE ACME_PROFIL;
CREATE USER ACME_BACKUP IDENTIFIED BY AAAaaa111 PROFILE ACME_PROFIL;
CREATE USER ACME_APP IDENTIFIED BY AAAaaa111 PROFILE ACME_PROFIL;

DROP ROLE role_acme_connect;
DROP ROLE role_acme_createur;
DROP ROLE role_acme_usager;
DROP ROLE role_acme_backup;
CREATE ROLE role_acme_connect;
CREATE ROLE role_acme_createur;
CREATE ROLE role_acme_usager;
CREATE ROLE role_acme_backup;

GRANT connect TO role_acme_connect;
GRANT role_acme_connect, create table TO role_acme_createur;
GRANT role_acme_connect TO role_acme_usager;
GRANT select ON CATEGORIES TO role_acme_usager;
GRANT select ON PRODUITS TO role_acme_usager;
GRANT select ON CLIENTS TO role_acme_usager;
GRANT select ON BACKUPLOGS TO role_acme_usager;
GRANT role_acme_connect TO role_acme_backup;
GRANT select ON 

GRANT role_acme_createur TO ACME_CREATEUR;
GRANT role_acme_backup TO ACME_BACKUP;

connect acme_createur/AAAaaa111;
start c:\Lab-usager-2.sql;
connect / as sysdba;
REVOKE role_acme_createur FROM ACME_CREATEUR;