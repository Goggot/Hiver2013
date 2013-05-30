connect / as sysdba;
CLEAR SCREEN

DROP PUBLIC SYNONYM CATEGORIES;
DROP PUBLIC SYNONYM BACKUPLOGS;
DROP PUBLIC SYNONYM CLIENTS;
DROP PUBLIC SYNONYM PRODUITS;
DROP USER ACME_APP CASCADE;
DROP USER ACME_BACKUP_U CASCADE;
DROP ROLE ACME_BACKUP;
DROP ROLE ACME_USAGER;
DROP USER ACME_CREATEUR_U CASCADE;
DROP ROLE ACME_CREATEUR;
DROP ROLE ACME_CONNECT;
DROP PROFILE ACME_PROFIL CASCADE;
DROP TABLESPACE ACME_APP INCLUDING CONTENTS AND DATAFILES;
DROP TABLESPACE ACME_ADMIN INCLUDING CONTENTS AND DATAFILES;
PAUSE ..........................appuyer sur ENTER pour continuer!
CLEAR SCREEN;

---------------------------------------------------------
PROMPT 1. Exécution du premier script - Création des tablespaces
start c:\temp\Lab-usager-1.sql
PAUSE ..........................appuyer sur ENTER pour continuer!
CLEAR SCREEN;


---------------------------------------------------------
PROMPT 2. Gestion des profils
PROMPT 2.a. Activation de la gestion des profils
ALTER SYSTEM SET RESOURCE_LIMIT=TRUE SCOPE=BOTH;
PAUSE ..........................appuyer sur ENTER pour continuer!

PROMPT 2.b. Création du profil ACME_PROFIL
CREATE PROFILE ACME_PROFIL LIMIT SESSIONS_PER_USER 5;
PAUSE ..........................appuyer sur ENTER pour continuer!
CLEAR SCREEN;


-----------------------------------------------------
PROMPT 3. Création des rôles de base
PROMPT 3.a. Création du rôle ACME_CONNECT
CREATE ROLE ACME_CONNECT;
GRANT CREATE SESSION TO ACME_CONNECT;
GRANT CREATE SYNONYM TO ACME_CONNECT;
PAUSE ..........................appuyer sur ENTER pour continuer!

PROMPT 3.b. Création du rôle ACME_CREATEUR
CREATE ROLE ACME_CREATEUR;
GRANT ACME_CONNECT TO ACME_CREATEUR;
GRANT CREATE TABLE TO ACME_CREATEUR;
GRANT CREATE ANY INDEX TO ACME_CREATEUR;  
-- ATTENTION - pour créer un index, le privilège système nécessaire est CREATE ANY INDEX
-- voir SELECT * FROM SYSTEM_PRIVILEGE_MAP WHERE NAME LIKE '%INDEX%';
PAUSE ..........................appuyer sur ENTER pour continuer!
CLEAR SCREEN;


-----------------------------------------------------
PROMPT 4. Création de l usager ACME_CREATEUR_U et des tables de son schéma
PROMPT 4.a. Création de l usager ACME_CREATEUR
CREATE USER ACME_CREATEUR_U IDENTIFIED BY AAAaaa111
  PROFILE ACME_PROFIL
  QUOTA 30M ON ACME_ADMIN
  QUOTA 30M ON ACME_APP;
GRANT ACME_CREATEUR TO ACME_CREATEUR_U;
PAUSE ..........................appuyer sur ENTER pour continuer!

PROMPT 4.b. Connexion avec ACME_CREATEUR_U pour la création des tables dans son schéma
CONNECT ACME_CREATEUR_U/AAAaaa111;
PAUSE ..........................appuyer sur ENTER pour continuer!

PROMPT 4.c. Exécution du deuxième script - Création des tables de l usager ACME_CREATEUR
start c:\temp\Lab-usager-2.sql
PAUSE ..........................appuyer sur ENTER pour continuer!

PROMPT 4.d. Connexion avec SYS pour la suite de l administration de la tâche
CONNECT / as SYSDBA;
PAUSE ..........................appuyer sur ENTER pour continuer!

PROMPT 4.e. Retrait du rôle ACME_CREATEUR à l usager
REVOKE ACME_CREATEUR FROM ACME_CREATEUR_U;
PAUSE ..........................appuyer sur ENTER pour continuer!
CLEAR SCREEN;


-----------------------------------------------------
PROMPT 5. Création des autres rôles
PROMPT 5.a. Création du rôle ACME_USAGER
CREATE ROLE ACME_USAGER;
GRANT ACME_CONNECT TO ACME_USAGER;
GRANT SELECT, INSERT, UPDATE, DELETE ON ACME_CREATEUR_U.PRODUITS TO ACME_USAGER;
GRANT SELECT, INSERT, UPDATE, DELETE ON ACME_CREATEUR_U.CLIENTS TO ACME_USAGER;
GRANT SELECT, INSERT, UPDATE, DELETE ON ACME_CREATEUR_U.BACKUPLOGS TO ACME_USAGER;
GRANT SELECT, INSERT, UPDATE, DELETE ON ACME_CREATEUR_U.CATEGORIES TO ACME_USAGER;
PAUSE ..........................appuyer sur ENTER pour continuer!

PROMPT 5.b. Création du rôle ACME_BACKUP
CREATE ROLE ACME_BACKUP;
GRANT ACME_CONNECT TO ACME_BACKUP;
GRANT SELECT ON ACME_CREATEUR_U.PRODUITS TO ACME_BACKUP;
GRANT SELECT ON ACME_CREATEUR_U.CLIENTS TO ACME_BACKUP;
GRANT SELECT, INSERT ON ACME_CREATEUR_U.BACKUPLOGS TO ACME_BACKUP;
GRANT SELECT ON ACME_CREATEUR_U.CATEGORIES TO ACME_BACKUP;
PAUSE ..........................appuyer sur ENTER pour continuer!
CLEAR SCREEN;


-----------------------------------------------------
PROMPT 6. Création des autres usagers
PROMPT 6.a. Création de l usager ACME_BACKUP_U
CREATE USER ACME_BACKUP_U IDENTIFIED BY AAAaaa111 
 PROFILE ACME_PROFIL;
GRANT ACME_BACKUP TO ACME_BACKUP_U;
PAUSE ..........................appuyer sur ENTER pour continuer!

PROMPT 6.b. Création de l usager ACME_APP
CREATE USER ACME_APP IDENTIFIED BY AAAaaa111
 PROFILE ACME_PROFIL;
GRANT ACME_USAGER TO ACME_APP;
PAUSE ..........................appuyer sur ENTER pour continuer!
CLEAR SCREEN;


-----------------------------------------------------
PROMPT 7. Création des synonymes pour les tables
CREATE PUBLIC SYNONYM PRODUITS FOR ACME_CREATEUR_U.PRODUITS;
CREATE PUBLIC SYNONYM CLIENTS FOR ACME_CREATEUR_U.CLIENTS;
CREATE PUBLIC SYNONYM BACKUPLOGS FOR ACME_CREATEUR_U.BACKUPLOGS;
CREATE PUBLIC SYNONYM CATEGORIES FOR ACME_CREATEUR_U.CATEGORIES;
PAUSE ..........................appuyer sur ENTER pour continuer!
CLEAR SCREEN;


-----------------------------------------------------
PROMPT 8. Réalisation des tests
PROMPT 8.a. Tentative de connexion avec l usager ACME_CREATEUR.  IMPOSSIBLE!
CONNECT ACME_CREATEUR_U/AAAaaa111;
PAUSE ..........................appuyer sur ENTER pour continuer!

PROMPT 8.b. Capacité à ACME_BACKUP d ajouter des données dans la table BACKUPLOGS.  POSSIBLE!
CONNECT ACME_BACKUP_U/AAAaaa111;
INSERT INTO BACKUPLOGS(ID, LOG_DATE) VALUES(2, SYSDATE);
PAUSE ..........................appuyer sur ENTER pour continuer!

PROMPT 8.c. Incapacité à ACME_BACKUP d ajouter des données dans les autres table.  IMPOSSIBLE!
INSERT INTO CATEGORIES(ID, NOM) VALUES(3, 'Catégorie 3');
INSERT INTO PRODUITS(ID, IDCATEGORIE, NOM) VALUES(4, 3, 'Produit 4');
INSERT INTO CLIENTS(ID, NOM) VALUES(5, 'Client 5');
PAUSE ..........................appuyer sur ENTER pour continuer!

PROMPT 8.d. Capacité à ACME_APP d ajouter, modifier et supprimer des lignes de données des tables.   POSSIBLE!
CONNECT ACME_APP/AAAaaa111;
PROMPT 8.d.1. Table CATEGORIES
INSERT INTO CATEGORIES(ID, NOM) VALUES(13, 'Catégorie 3');
UPDATE CATEGORIES set NOM = 'Catégorie 13' WHERE ID = 13;
DELETE FROM CATEGORIES WHERE NOM = 'Catégorie 13';

PROMPT 8.d.2. Table PRODUITS
INSERT INTO CATEGORIES(ID, NOM) VALUES(3, 'Catégorie 3');
INSERT INTO PRODUITS(ID, IDCATEGORIE, NOM) VALUES(14, 3, 'Produit 4');
UPDATE PRODUITS set NOM = 'Produit 14' WHERE ID = 14;
DELETE FROM PRODUITS WHERE NOM = 'Produit 14';
DELETE FROM CATEGORIES WHERE NOM = 'Catégorie 3';

PROMPT 8.d.3. Table CLIENTS
INSERT INTO CLIENTS(ID, NOM) VALUES(15, 'Client 5');
UPDATE CLIENTS set NOM = 'Client 15' WHERE ID = 15;
DELETE FROM CLIENTS WHERE NOM = 'Client 15';

PROMPT 8.d.4. Table BACKUPLOGS
INSERT INTO BACKUPLOGS(ID, LOG_DATE) VALUES(16, SYSDATE);
UPDATE BACKUPLOGS set LOG_DATE = SYSDATE WHERE ID = 16;
DELETE FROM BACKUPLOGS WHERE ID = 16;
PAUSE ..........................appuyer sur ENTER pour continuer!

PROMPT 8.e. Les synonymes fonctionnent bien!!!  Déjà validés précédemment.
PROMPT
PROMPT
PROMPT
PROMPT Fin du script...
PAUSE ..........................appuyer sur ENTER pour terminer!

