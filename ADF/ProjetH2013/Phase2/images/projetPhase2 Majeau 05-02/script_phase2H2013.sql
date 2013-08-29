Rem     script.SQL Hiver 2013
Rem     Version complète remise à la phase 2                                                          
Rem     Créer les tables et séquences nécessaires pour «Fédération des jeunes scientifiques».
Rem     S.Beaudoin    
Rem     S.Rondeau 2013     -  à compléter
set feedback off

prompt Destruction des tables et séquences existantes
DROP TABLE p_evaluation CASCADE CONSTRAINTS;
DROP TABLE p_atelier CASCADE CONSTRAINTS;
DROP TABLE p_auditeur CASCADE CONSTRAINTS;
DROP TABLE p_ecole CASCADE CONSTRAINTS;
DROP TABLE p_exposant CASCADE CONSTRAINTS;
DROP TABLE p_local CASCADE CONSTRAINTS;
DROP TABLE p_region CASCADE CONSTRAINTS;
DROP TABLE p_type CASCADE CONSTRAINTS;
DROP TABLE p_categorie CASCADE CONSTRAINTS;
DROP TABLE p_inscription CASCADE CONSTRAINTS;
DROP TABLE p_critere CASCADE CONSTRAINTS;
DROP TABLE p_expo CASCADE CONSTRAINT;
DROP TABLE P_SUIVI_ATELIER CASCADE CONSTRAINTS;
--DROP TABLE P_EXPOSANT_ARCHIVE CASCADE CONSTRAINTS;
DROP TABLE P_INSCRIPTION_ARCHIVE CASCADE CONSTRAINTS;
DROP TABLE P_COORDONNEES CASCADE CONSTRAINTS;

DROP SEQUENCE p_SEQ_ATEL;
DROP SEQUENCE p_SEQ_AUD;
DROP SEQUENCE p_SEQ_CATEGORIE;
DROP SEQUENCE p_SEQ_CRITERE;
DROP SEQUENCE p_SEQ_ECOLE;

DROP SEQUENCE p_SEQ_EVALUATION;
DROP SEQUENCE p_SEQ_EXPO;
DROP SEQUENCE p_SEQ_EXPOSANT;
DROP SEQUENCE p_SEQ_TYPE;
--DROP SEQUENCE p_SEQ_NO_EXP_ARCH;
DROP SEQUENCE p_SEQ_SUIVI_ATEL;
DROP SEQUENCE p_SEQ_INSC_ARCH;
DROP SEQUENCE p_SEQ_COORD;


prompt Création des séquences
CREATE SEQUENCE p_SEQ_ATEL
  increment by 10
  START WITH 10;
CREATE SEQUENCE p_SEQ_AUD
  increment by 1
  START WITH 10;
CREATE SEQUENCE p_SEQ_CATEGORIE
  increment by 1
  START WITH 10;
CREATE SEQUENCE p_SEQ_CRITERE
  increment by 1
  START WITH 10;
CREATE SEQUENCE p_SEQ_ECOLE
  increment by 1
  START WITH 10;
CREATE SEQUENCE p_SEQ_EVALUATION
  increment by 1
  START WITH 10;
CREATE SEQUENCE p_SEQ_EXPO
  increment by 1
  START WITH 10;
CREATE SEQUENCE p_SEQ_EXPOSANT
  increment by 1
  START WITH 10;
CREATE SEQUENCE p_SEQ_TYPE
  increment by 1
  START WITH 10; 
/*CREATE SEQUENCE p_SEQ_NO_EXP_ARCH 
 INCREMENT BY 1 
 START WITH 10;*/
CREATE SEQUENCE p_SEQ_SUIVI_ATEL 
 INCREMENT BY 1 
 START WITH 10;
CREATE SEQUENCE p_SEQ_INSC_ARCH 
 INCREMENT BY 1 
 START WITH 10;
CREATE SEQUENCE p_SEQ_COORD
 INCREMENT BY 1 
 START WITH 10;  
prompt fin creation des sequences  


-- creation p_atelier
prompt Création table p_atelier

 CREATE TABLE p_ATELIER
  (
  noatel                NUMBER(4), 
  noexpo                NUMBER(4),
  titre                 VARCHAR2(30),
  langue		CHAR(1),-- F: francais, A: anglais
  acetate_elec       	NUMBER(1),-- 0: non, 1:oui 
  portable           	NUMBER(1),--0:  non, 1:oui
  duree                 NUMBER(3),-- minutes
  nbmaximum            	NUMBER(3),
  noexposant            NUMBER(4), -- voir table exposant
  nocategorie          	NUMBER(4),   -- voir table p_categorie 
  notype                 NUMBER(1),  -- voir table p_type 1: intéractif, 2:séminaire, 3: plénière
  nolocal               VARCHAR2(10),
  dateatel		DATE,
  creepar           VARCHAR2(30),  -- nom de l'usager qui a crée l'atelier 
  datecreation         DATE,     -- date entrée dans le système
  coutetudiant          NUMBER(5,2),
  coutregulier           	NUMBER(5,2),
	CONSTRAINT p_ateliers_no_pk PRIMARY KEY (NOATEL));
	
CREATE TABLE p_SUIVI_ATELIER 
(
  no_suivi_atel NUMBER(4), 
  no_atel NUMBER(4),
  no_ancien_local VARCHAR2(10), 
 CONSTRAINT P_SUIVI_ATELIER_PK PRIMARY KEY (no_suivi_atel));

CREATE TABLE p_auditeur
  (
  noauditeur            NUMBER(4),
  codeauditeur          VARCHAR2(7),
  motdepasse            VARCHAR2(7),
  nom                   VARCHAR2(60),
  prenom                VARCHAR2(40),
  nocoord                NUMBER(5),
  juge		  DATE,
  statut                VARCHAR2(1),  --R: régulier, E:étudiant:
  candidatjuge	DATE,
  admin NUMBER(1),
	CONSTRAINT p_auditeur_no_pk PRIMARY KEY (noauditeur));
        
-- Représente la liste des catégories des ateliers 
-- Une catégorie classifie les ateliers par catégorie.

prompt  Création table p_categorie

CREATE TABLE p_categorie(
  nocategorie			NUMBER(4),
  nom			VARCHAR2(25),
  description		VARCHAR2(40),
	CONSTRAINT p_categorie_pk PRIMARY KEY (nocategorie));
  
prompt Création table p_coordonnees 

 CREATE TABLE p_coordonnees( 
  nocoord                NUMBER(5),
  rue                   VARCHAR2(45),
  ville                 VARCHAR2(40),
  code_postal           VARCHAR2(6),
  noregion		NUMBER(3),
  telephone             VARCHAR2(10),
  cell                  VARCHAR2(10),
  courriel		VARCHAR2(25),  
 CONSTRAINT p_coordonnées_pk PRIMARY KEY (nocoord)); 
  

prompt Création de la table p_critere

-- Décrit la liste des critères d'évaluation des ateliers
CREATE TABLE p_critere
  (
  nocritere		 NUMBER(2),
  nomcritere		 VARCHAR2(25),
 	CONSTRAINT p_critere_PK PRIMARY KEY (nocritere));  

INSERT INTO p_critere VALUES (1,'prestation orale');
INSERT INTO p_critere VALUES (2,'contenu scientifique');
INSERT INTO p_critere VALUES (3,'documentation écrite');
INSERT INTO p_critere VALUES (4,'originalité');
INSERT INTO p_critere VALUES (5,'sujet d''actualité');

prompt Création table p_region
CREATE TABLE p_region
  (
  noregion              NUMBER(3),
  nomregion             VARCHAR2(100),
	CONSTRAINT p_region_pk PRIMARY KEY (Noregion));

prompt Création table p_ecole
CREATE TABLE p_ECOLE
  (
  noecole              	NUMBER(4),
  nomecole              VARCHAR2(100),
   tuteur                VARCHAR2(50), ---nom de l'enseignant de science dédié par l'école
  nocoord         NUMBER(5),
	CONSTRAINT p_Ecole_noecole_pk PRIMARY KEY (Noecole));

prompt Création de la table p_expo

CREATE TABLE p_EXPO
  (
  noexpo            	 NUMBER(4),
  date_debut             DATE,
  date_fin            	 DATE,
  nomhotel		        VARCHAR2(30),
  nocoord             NUMBER(5),
  creepar             VARCHAR2(30),
	CONSTRAINT p_EXPO_NOEXPO_pk PRIMARY KEY (NOEXPO));

CREATE TABLE p_EXPOSANT
  (
  noexposant             NUMBER(4),
  nom                    VARCHAR2(60) NOT NULL,
  prenom                 VARCHAR(30) NOT NULL, 
  codeetu                VARCHAR(15),
  nocoequipier           NUMBER(4),
  noecole		           NUMBER(4),
  nocoord              NUMBER(5),
  creepar               VARCHAR2(30),
	CONSTRAINT p_EXPOSANT_noEXPOSANT_pk PRIMARY KEY (NOEXPOSANT));


prompt creation table p_inscription
CREATE TABLE p_inscription
  (
  noauditeur         NUMBER(4),
  noatel                NUMBER(4),
  dateinscription  DATE,
  mode_paiement        CHAR(1), 
  no_carte              VARCHAR2(20),
  no_cheque             NUMBER(7),
  date_expire           DATE,
  acquitter		NUMBER(1),
  confirmationenvoyee	NUMBER(1),
  creepar  VARCHAR2(60),
	CONSTRAINT p_inscription_pk PRIMARY KEY (noauditeur,noatel));

CREATE TABLE P_INSCRIPTION_ARCHIVE 
(
  NO_INS_ARCH NUMBER(4) NOT NULL 
, NOAUDITEUR NUMBER(4) 
, NOATEL NUMBER(4) 
, DATEINSCRIPTION DATE 
, MODE_PAIEMENT CHAR(1) 
, NO_CARTE VARCHAR2(20) 
, NO_CHEQUE NUMBER(7) 
, DATE_EXPIRE DATE 
, ACQUITTER NUMBER(1) 
, CONFIRMATIONENVOYEE NUMBER(1) 
, EVENEMENT VARCHAR2(15) 
, DATEMODIF DATE 
, CREEPAR VARCHAR2(30) 
, CONSTRAINT P_INSCRIPTION_ARCHIVE_PK PRIMARY KEY 
  (
    NO_INS_ARCH 
  )
  ENABLE 
);

prompt Création de la table p_evaluation
CREATE TABLE p_evaluation
  (
  noeval		 NUMBER(4),
  noauditeur		 NUMBER(4),
  noatel                 NUMBER(4),
  nocritere		 NUMBER(2),-- no. critere d'évaluation
  cote              	 NUMBER(1), -- 1 à 5 dont 5:cote la plus haute et 1: moins haute
 	CONSTRAINT p_evaluation_PK PRIMARY KEY (noeval)); 
   
prompt Création table p_local
CREATE TABLE p_local
  (
  nolocal                VARCHAR2(10),
  noexpo                NUMBER(4), 
  capacite              NUMBER(3),
 CONSTRAINT p_local_pk PRIMARY KEY (nolocal,noexpo)); 



prompt Création table p_type
CREATE TABLE p_type
  (
  notype     NUMBER(2), 
  nomtype    VARCHAR2(10),
	CONSTRAINT p_type_pk PRIMARY KEY (notype));


COMMIT;

prompt Création des contraintes de référence

ALTER TABLE p_inscription
	ADD CONSTRAINT p_inscription_atelier_fk
	FOREIGN KEY (noatel) REFERENCES p_atelier (noatel);
  
ALTER TABLE p_inscription
	ADD CONSTRAINT p_inscription_auditeur_fk
	FOREIGN KEY (noauditeur) REFERENCES p_auditeur (noauditeur);  
	
ALTER TABLE p_atelier 
	ADD CONSTRAINT p_atelier_expo_fk
	FOREIGN KEY (noexpo) REFERENCES p_expo (noexpo);	
  
ALTER TABLE p_atelier 
	ADD CONSTRAINT p_atelier_categorie_fk
	FOREIGN KEY (nocategorie) REFERENCES p_categorie (nocategorie);	

ALTER TABLE p_atelier 
	ADD CONSTRAINT p_atelier_NOEXPOSANT_fk
	FOREIGN KEY (noexposant) REFERENCES p_EXPOSANT (noexposant);

ALTER TABLE p_atelier 
	ADD CONSTRAINT p_atelier_type_fk
	FOREIGN KEY(notype) REFERENCES p_type (notype);
 
ALTER TABLE p_exposant
	ADD CONSTRAINT p_exposant_ecole_fk
	FOREIGN KEY (noecole) REFERENCES p_ecole (noecole);


ALTER TABLE p_evaluation
	ADD CONSTRAINT p_evaluation_audjuge_fk
	FOREIGN KEY (noauditeur) REFERENCES p_auditeur (noauditeur);

ALTER TABLE p_evaluation
	ADD CONSTRAINT p_evaluation_critere_fk
	FOREIGN KEY (nocritere) REFERENCES p_critere(nocritere);

ALTER TABLE p_evaluation
	ADD CONSTRAINT p_evaluation_atelier_fk
	FOREIGN KEY (Noatel) REFERENCES p_atelier (noatel);

ALTER TABLE p_coordonnees
	ADD CONSTRAINT p_coordonnees_region_fk
	FOREIGN KEY (noregion) REFERENCES p_region (noregion);
  
ALTER TABLE p_local
	ADD CONSTRAINT p_local_region_fk
	FOREIGN KEY (noexpo) REFERENCES p_expo (noexpo);  

 ALTER TABLE p_exposant
	ADD CONSTRAINT p_exposant_coordonnees_fk
	FOREIGN KEY (nocoord) REFERENCES p_coordonnees(nocoord);
  
ALTER TABLE p_auditeur
	ADD CONSTRAINT p_auditeur_coordonnees_fk
	FOREIGN KEY (nocoord) REFERENCES p_coordonnees(nocoord);

ALTER TABLE p_ecole
	ADD CONSTRAINT p_ecole_coordonnees_fk
	FOREIGN KEY (nocoord) REFERENCES p_coordonnees(nocoord);
  
ALTER TABLE p_expo
	ADD CONSTRAINT p_expo_coordonnees_fk
	FOREIGN KEY (nocoord) REFERENCES  p_coordonnees(nocoord);  

COMMIT;
prompt Les tables et séquences ont été créées.
/
create or replace trigger p_expo_trg
before insert on p_expo 
for each row 
begin 
select p_seq_expo.nextval into :new.noexpo from dual; 
end;
/
create or replace trigger p_atelier_trg
before insert on p_atelier
for each row 
begin 
select p_seq_atel.nextval into :new.noatel from dual; 
end;
/
create or replace trigger p_auditeur_trg
before insert on p_auditeur
for each row 
begin 
select p_seq_aud.nextval into :new.noauditeur from dual; 
end;
/
create or replace trigger p_categorie_trg
before insert on p_categorie
for each row 
begin 
select p_seq_categorie.nextval into :new.nocategorie from dual; 
end;
/
create or replace trigger p_critere_trg
before insert on p_critere
for each row 
begin 
select p_seq_critere.nextval into :new.nocritere from dual; 
end;
/
create or replace trigger p_ecole_trg
before insert on p_ecole
for each row 
begin 
select p_seq_ecole.nextval into :new.noecole from dual; 
end;
/
create or replace trigger p_evaluation_trg
before insert on p_evaluation
for each row 
begin 
select p_seq_evaluation.nextval into :new.noeval from dual; 
end;
/
create or replace trigger p_exposant_trg
before insert on p_exposant
for each row 
begin 
select p_seq_exposant.nextval into :new.noexposant from dual; 
end;
/
create or replace trigger p_type_trg
before insert on p_type
for each row 
begin 
select p_seq_type.nextval into :new.notype from dual; 
end;
/
create or replace trigger p_coord_trg
before insert on p_coordonnees
for each row 
begin 
select p_seq_coord.nextval into :new.nocoord from dual; 
end;

/
Rem prompt Les triggers ont été créés.
set feedback on