SET SQLBLANKLINES ON
ALTER TABLE AE_ATELIERS 
DROP CONSTRAINT P_ATELIERS_FK;

ALTER TABLE AE_ATELIERS 
DROP CONSTRAINT P_ATELIERS_P_JURY_FK;

ALTER TABLE AE_ATELIERS 
DROP CONSTRAINT P_ATELIERS_P_TYPE_ATELIER_FK;

ALTER TABLE AE_AUDITEURS 
DROP CONSTRAINT P_AUDITEURS_P_JURY_FK;

ALTER TABLE AE_CRITERES 
DROP CONSTRAINT P_CRITERES_P_ATELIERS_FK;

ALTER TABLE AE_ECOLES 
DROP CONSTRAINT P_ECOLES_P_EXPOSITIONS_FK;

ALTER TABLE AE_EXPOSANTS 
DROP CONSTRAINT P_EXPOSANTS_P_ATELIERS_FK;

ALTER TABLE AE_EXPOSANTS 
DROP CONSTRAINT P_EXPOSANTS_P_ECOLES_FK;

ALTER TABLE AE_EXPOSITIONS 
DROP CONSTRAINT P_EXPOSITIONS_P_ECOLES_FK;

ALTER TABLE AE_INSCRIPTION 
DROP CONSTRAINT P_INSCRIPTION_P_ATELIERS_FK;

ALTER TABLE AE_INSCRIPTION 
DROP CONSTRAINT P_INSCRIPTION_P_AUDITEURS_FK;

ALTER TABLE AE_INSCRIPTION_ARCHIVE 
DROP CONSTRAINT AE_INSCRIPTION_ARCHIVE_FK;

ALTER TABLE AE_SUIVI_ECOLE 
DROP CONSTRAINT AE_SUIVI_ECOLE_P_ECOLES_FK;

DROP TABLE AE_ATELIERS CASCADE CONSTRAINTS;

DROP SEQUENCE AE_ATELIERS_SEQ;

DROP TABLE AE_AUDITEURS CASCADE CONSTRAINTS;

DROP SEQUENCE AE_AUDITEURS_SEQ;

DROP TABLE AE_CATEGORIE_ATELIER CASCADE CONSTRAINTS;

DROP SEQUENCE AE_CATEGORIE_ATELIER_SEQ;

DROP TABLE AE_CRITERES CASCADE CONSTRAINTS;

DROP SEQUENCE AE_CRITERES_SEQ;

DROP TABLE AE_ECOLES CASCADE CONSTRAINTS;

DROP SEQUENCE AE_ECOLES_SEQ;

DROP TABLE AE_EXPOSANTS CASCADE CONSTRAINTS;

DROP SEQUENCE AE_EXPOSANTS_SEQ;

DROP TABLE AE_EXPOSITIONS CASCADE CONSTRAINTS;

DROP SEQUENCE AE_EXPOSITIONS_SEQ;

DROP TABLE AE_INSCRIPTION CASCADE CONSTRAINTS;

DROP TABLE AE_INSCRIPTION_ARCHIVE CASCADE CONSTRAINTS;

DROP SEQUENCE AE_INSCRIPTION_SEQ;

DROP TABLE AE_JURY CASCADE CONSTRAINTS;

DROP SEQUENCE AE_JURY_SEQ;

DROP TABLE AE_SUIVI_ECOLE CASCADE CONSTRAINTS;

DROP TABLE AE_TYPE_ATELIER CASCADE CONSTRAINTS;

DROP SEQUENCE AE_TYPE_ATELIER_SEQ;

DROP SEQUENCE SEQ_INSC_ARCH;

CREATE TABLE AE_ATELIERS 
(
  ID_ATELIER NUMBER NOT NULL 
, LANGUE CHAR NOT NULL 
, NOM_ATELIER VARCHAR2(20) NOT NULL 
, ID_JURY NUMBER NOT NULL 
, ID_TYPE NUMBER NOT NULL 
, ID_CATEGORIE NUMBER NOT NULL 
, DUREE NUMBER 
, PORTABLE NUMBER 
, ACETATE_ELEC NUMBER 
, CONSTRAINT P_ATELIERS_PK PRIMARY KEY 
  (
    ID_ATELIER 
  )
  ENABLE 
);

CREATE TABLE AE_AUDITEURS 
(
  ID_AUDITEUR NUMBER NOT NULL 
, CAT_AGE VARCHAR2(20) 
, NOM VARCHAR2(20) 
, ID_JURY NUMBER NOT NULL 
, CONSTRAINT P_AUDITEURS_PK PRIMARY KEY 
  (
    ID_AUDITEUR 
  )
  ENABLE 
);

CREATE TABLE AE_CATEGORIE_ATELIER 
(
  ID_CATEGORIE NUMBER NOT NULL 
, CONSTRAINT P_CATEGORIES_PK PRIMARY KEY 
  (
    ID_CATEGORIE 
  )
  ENABLE 
);

CREATE TABLE AE_CRITERES 
(
  C1 VARCHAR2(20) 
, C2 VARCHAR2(20) 
, C3 VARCHAR2(20) 
, C4 VARCHAR2(20) 
, C5 VARCHAR2(20) 
, ID_ATELIER NUMBER NOT NULL 
);

CREATE TABLE AE_ECOLES 
(
  ID_ECOLE NUMBER NOT NULL 
, NOM_EXPO VARCHAR2(50) NOT NULL 
, NOM VARCHAR2(20) 
, RESPONSABLE VARCHAR2(35) 
, CONSTRAINT P_ECOLES_PK PRIMARY KEY 
  (
    ID_ECOLE 
  )
  ENABLE 
);

CREATE TABLE AE_EXPOSANTS 
(
  ID_EXPOSANT NUMBER NOT NULL 
, NOM VARCHAR2(20) 
, ID_ATELIER NUMBER NOT NULL 
, ID_ECOLE NUMBER NOT NULL 
, CODEETUDIANT VARCHAR2(15) 
, PRENOM VARCHAR2(20) 
, CONSTRAINT P_EXPOSANTS_PK PRIMARY KEY 
  (
    ID_EXPOSANT 
  )
  ENABLE 
);

CREATE TABLE AE_EXPOSITIONS 
(
  NOM_EXPO VARCHAR2(50) NOT NULL 
, DATE_EXPO DATE 
, LIEU_EXPO VARCHAR2(20) 
, ID_ECOLE NUMBER NOT NULL 
, CONSTRAINT P_EXPOSITIONS_PK PRIMARY KEY 
  (
    NOM_EXPO 
  )
  ENABLE 
);

CREATE TABLE AE_INSCRIPTION 
(
  ID_AUDITEUR NUMBER NOT NULL 
, ID_ATELIER NUMBER NOT NULL 
, CONSTRAINT AE_INSCRIPTION_PK PRIMARY KEY 
  (
    ID_AUDITEUR 
  , ID_ATELIER 
  )
  ENABLE 
);

CREATE TABLE AE_INSCRIPTION_ARCHIVE 
(
  NO_INS_ARCH VARCHAR2(20) NOT NULL 
, ID_AUDITEUR NUMBER NOT NULL 
, ID_ATELIER NUMBER NOT NULL 
, EVENEMENT VARCHAR2(15) 
, DATEMODIF DATE 
, CONSTRAINT AE_INSCRIPTION_ARCHIVE_PK PRIMARY KEY 
  (
    NO_INS_ARCH 
  )
  ENABLE 
);

CREATE TABLE AE_JURY 
(
  ID_JURY NUMBER NOT NULL 
, CONSTRAINT P_JURY_PK PRIMARY KEY 
  (
    ID_JURY 
  )
  ENABLE 
);

CREATE TABLE AE_SUIVI_ECOLE 
(
  NO_SUIVI_ECOLE NUMBER(4) 
, ID_ECOLE NUMBER NOT NULL 
, ANCIEN_NOM VARCHAR2(35) 
);

CREATE TABLE AE_TYPE_ATELIER 
(
  ID_TYPE NUMBER NOT NULL 
, CONSTRAINT TABLE1_PK PRIMARY KEY 
  (
    ID_TYPE 
  )
  ENABLE 
);

ALTER TABLE AE_ATELIERS
ADD CONSTRAINT P_ATELIERS_FK FOREIGN KEY
(
  ID_CATEGORIE 
)
REFERENCES AE_CATEGORIE_ATELIER
(
  ID_CATEGORIE 
)
ENABLE;

ALTER TABLE AE_ATELIERS
ADD CONSTRAINT P_ATELIERS_P_JURY_FK FOREIGN KEY
(
  ID_JURY 
)
REFERENCES AE_JURY
(
  ID_JURY 
)
ENABLE;

ALTER TABLE AE_ATELIERS
ADD CONSTRAINT P_ATELIERS_P_TYPE_ATELIER_FK FOREIGN KEY
(
  ID_TYPE 
)
REFERENCES AE_TYPE_ATELIER
(
  ID_TYPE 
)
ENABLE;

ALTER TABLE AE_AUDITEURS
ADD CONSTRAINT P_AUDITEURS_P_JURY_FK FOREIGN KEY
(
  ID_JURY 
)
REFERENCES AE_JURY
(
  ID_JURY 
)
ENABLE;

ALTER TABLE AE_CRITERES
ADD CONSTRAINT P_CRITERES_P_ATELIERS_FK FOREIGN KEY
(
  ID_ATELIER 
)
REFERENCES AE_ATELIERS
(
  ID_ATELIER 
)
ENABLE;

ALTER TABLE AE_ECOLES
ADD CONSTRAINT P_ECOLES_P_EXPOSITIONS_FK FOREIGN KEY
(
  NOM_EXPO 
)
REFERENCES AE_EXPOSITIONS
(
  NOM_EXPO 
)
ENABLE;

ALTER TABLE AE_EXPOSANTS
ADD CONSTRAINT P_EXPOSANTS_P_ATELIERS_FK FOREIGN KEY
(
  ID_ATELIER 
)
REFERENCES AE_ATELIERS
(
  ID_ATELIER 
)
ENABLE;

ALTER TABLE AE_EXPOSANTS
ADD CONSTRAINT P_EXPOSANTS_P_ECOLES_FK FOREIGN KEY
(
  ID_ECOLE 
)
REFERENCES AE_ECOLES
(
  ID_ECOLE 
)
ENABLE;

ALTER TABLE AE_EXPOSITIONS
ADD CONSTRAINT P_EXPOSITIONS_P_ECOLES_FK FOREIGN KEY
(
  ID_ECOLE 
)
REFERENCES AE_ECOLES
(
  ID_ECOLE 
)
ENABLE;

ALTER TABLE AE_INSCRIPTION
ADD CONSTRAINT P_INSCRIPTION_P_ATELIERS_FK FOREIGN KEY
(
  ID_ATELIER 
)
REFERENCES AE_ATELIERS
(
  ID_ATELIER 
)
ENABLE;

ALTER TABLE AE_INSCRIPTION
ADD CONSTRAINT P_INSCRIPTION_P_AUDITEURS_FK FOREIGN KEY
(
  ID_AUDITEUR 
)
REFERENCES AE_AUDITEURS
(
  ID_AUDITEUR 
)
ENABLE;

ALTER TABLE AE_INSCRIPTION_ARCHIVE
ADD CONSTRAINT AE_INSCRIPTION_ARCHIVE_FK FOREIGN KEY
(
  ID_AUDITEUR 
, ID_ATELIER 
)
REFERENCES AE_INSCRIPTION
(
  ID_AUDITEUR 
, ID_ATELIER 
)
ENABLE;

ALTER TABLE AE_SUIVI_ECOLE
ADD CONSTRAINT AE_SUIVI_ECOLE_P_ECOLES_FK FOREIGN KEY
(
  ID_ECOLE 
)
REFERENCES AE_ECOLES
(
  ID_ECOLE 
)
ENABLE;

ALTER TABLE AE_ATELIERS
ADD CONSTRAINT P_ATELIERS_CHK_ACETATE_ELEC CHECK 
(ACETATE_ELEC = 0 OR ACETATE_ELEC = 1)
DEFERRABLE INITIALLY IMMEDIATE
ENABLE;

ALTER TABLE AE_ATELIERS
ADD CONSTRAINT P_ATELIERS_CHK_DUREE CHECK 
(DUREE = 30 OR DUREE = 45 OR DUREE = 60 OR DUREE = 90)
DEFERRABLE INITIALLY IMMEDIATE
ENABLE;

ALTER TABLE AE_ATELIERS
ADD CONSTRAINT P_ATELIERS_CHK_LANGUE CHECK 
(LANGUE = 'F' OR LANGUE = 'A')
DEFERRABLE INITIALLY IMMEDIATE
ENABLE;

ALTER TABLE AE_ATELIERS
ADD CONSTRAINT P_ATELIERS_CHK_PORTABLE CHECK 
(PORTABLE = 0 OR PORTABLE = 1)
DEFERRABLE INITIALLY IMMEDIATE
ENABLE;

ALTER TABLE AE_INSCRIPTION_ARCHIVE
ADD CONSTRAINT AE_INSCRIPTION_EVENEMENT_CHK CHECK 
(EVENEMENT = 'suppression' OR EVENEMENT = 'insertion' OR EVENEMENT = 'modification')
ENABLE;

COMMENT ON COLUMN AE_INSCRIPTION_ARCHIVE.EVENEMENT IS 'insertion / modification / suppression';

CREATE SEQUENCE AE_ATELIERS_SEQ INCREMENT BY 1 START WITH 1 NOCACHE;

CREATE SEQUENCE AE_AUDITEURS_SEQ INCREMENT BY 1 START WITH 1 NOCACHE;

CREATE SEQUENCE AE_CATEGORIE_ATELIER_SEQ INCREMENT BY 1 START WITH 1 NOCACHE;

CREATE SEQUENCE AE_CRITERES_SEQ INCREMENT BY 1 START WITH 1 NOCACHE;

CREATE SEQUENCE AE_ECOLES_SEQ INCREMENT BY 1 START WITH 1 NOCACHE;

CREATE SEQUENCE AE_EXPOSANTS_SEQ INCREMENT BY 1 START WITH 1 NOCACHE;

CREATE SEQUENCE AE_EXPOSITIONS_SEQ INCREMENT BY 1 START WITH 1 NOCACHE;

CREATE SEQUENCE AE_INSCRIPTION_SEQ INCREMENT BY 1 START WITH 1 NOCACHE;

CREATE SEQUENCE AE_JURY_SEQ INCREMENT BY 1 START WITH 1 NOCACHE;

CREATE SEQUENCE AE_TYPE_ATELIER_SEQ INCREMENT BY 1 START WITH 1 NOCACHE;

CREATE SEQUENCE SEQ_INSC_ARCH NOCACHE;

CREATE OR REPLACE TRIGGER AE_ATELIERS_TRG 
BEFORE INSERT ON AE_ATELIERS 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF :NEW.ID_ATELIER IS NULL THEN
      SELECT AE_ATELIERS_SEQ.NEXTVAL INTO :NEW.ID_ATELIER FROM DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/

CREATE OR REPLACE TRIGGER AE_AUDITEURS_TRG 
BEFORE INSERT ON AE_AUDITEURS 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF :NEW.ID_AUDITEUR IS NULL THEN
      SELECT AE_AUDITEURS_SEQ.NEXTVAL INTO :NEW.ID_AUDITEUR FROM DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/

CREATE OR REPLACE TRIGGER AE_CATEGORIE_ATELIER_TRG 
BEFORE INSERT ON AE_CATEGORIE_ATELIER 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF :NEW.ID_CATEGORIE IS NULL THEN
      SELECT AE_CATEGORIE_ATELIER_SEQ.NEXTVAL INTO :NEW.ID_CATEGORIE FROM DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/

CREATE OR REPLACE TRIGGER AE_CODEETUDIANT_TRG 
BEFORE INSERT ON AE_EXPOSANTS 
FOR EACH ROW
BEGIN
    CODEETUDIANT = SUBSTRING(NOM,1,4)+SUBSTRING(PRENOM,1,4)+ID_EXPOSANT
END;
/

CREATE OR REPLACE TRIGGER AE_CRITERES_TRG 
BEFORE INSERT ON AE_CRITERES 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF :NEW.C1 IS NULL THEN
      SELECT AE_CRITERES_SEQ.NEXTVAL INTO :NEW.C1 FROM DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/

CREATE OR REPLACE TRIGGER AE_ECOLES_TRG 
BEFORE INSERT ON AE_ECOLES 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF :NEW.ID_ECOLE IS NULL THEN
      SELECT AE_ECOLES_SEQ.NEXTVAL INTO :NEW.ID_ECOLE FROM DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/

CREATE OR REPLACE TRIGGER AE_EVENEMENT_TRG 
BEFORE INSERT OR DELETE OR UPDATE ON AE_INSCRIPTION_ARCHIVE
FOR EACH ROW
BEGIN
  IF INSERTING THEN 
    EVENEMENT := 'insertion'
  ELSE IF UPDATING THEN
    EVENEMENT := 'modification'
  ELSE IF DELETING THEN
    EVENEMENT := 'suppression'
  END IF;
END;
/

CREATE OR REPLACE TRIGGER AE_EXPOSANTS_TRG 
BEFORE INSERT ON AE_EXPOSANTS 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF :NEW.ID_EXPOSANT IS NULL THEN
      SELECT AE_EXPOSANTS_SEQ.NEXTVAL INTO :NEW.ID_EXPOSANT FROM DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/

CREATE OR REPLACE TRIGGER AE_EXPOSITIONS_TRG 
BEFORE INSERT ON AE_EXPOSITIONS 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF :NEW.NOM_EXPO IS NULL THEN
      SELECT AE_EXPOSITIONS_SEQ.NEXTVAL INTO :NEW.NOM_EXPO FROM DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/

CREATE OR REPLACE TRIGGER AE_INSCRIPTION_ARCHIVE_TRG 
BEFORE INSERT ON AE_INSCRIPTION_ARCHIVE 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF :NEW.NO_INS_ARCH IS NULL THEN
      SELECT AE_INSCRIPTION_ARCHIVE_SEQ.NEXTVAL INTO :NEW.NO_INS_ARCH FROM DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/

CREATE OR REPLACE TRIGGER AE_INSCRIPTION_TRG 
BEFORE INSERT ON AE_INSCRIPTION 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF :NEW.ID_AUDITEUR IS NULL THEN
      SELECT AE_INSCRIPTION_SEQ.NEXTVAL INTO :NEW.ID_AUDITEUR FROM DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/

CREATE OR REPLACE TRIGGER AE_JURY_TRG 
BEFORE INSERT ON AE_JURY 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF :NEW.ID_JURY IS NULL THEN
      SELECT AE_JURY_SEQ.NEXTVAL INTO :NEW.ID_JURY FROM DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/

CREATE OR REPLACE TRIGGER AE_RESPONSABLE 
BEFORE UPDATE ON AE_ECOLES 
FOR EACH ROW
BEGIN
  UPDATE AE_SUIVI_ECOLE
  SET ANCIEN_NOM = :OLD.RESPONSABLE;
END;
/

CREATE OR REPLACE TRIGGER AE_TYPE_ATELIER_TRG 
BEFORE INSERT ON AE_TYPE_ATELIER 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF :NEW.ID_TYPE IS NULL THEN
      SELECT AE_TYPE_ATELIER_SEQ.NEXTVAL INTO :NEW.ID_TYPE FROM DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/

CREATE OR REPLACE TRIGGER P_RESPONSABLE 
BEFORE UPDATE ON P_ECOLES 
FOR EACH ROW
BEGIN
  UPDATE P_SUIVI_ECOLE
  SET ANCIEN_NOM = :OLD.RESPONSABLE;
END;
/
