DROP TABLE PRODUIT_PHP;
CREATE TABLE PRODUIT_PHP
  (
    "ID"          NUMBER,
    "NOM"         VARCHAR2(40) NOT NULL ENABLE,
    "DESCRIPTION" VARCHAR2(100) NOT NULL ENABLE,
    "PRIX"        NUMBER NOT NULL ENABLE,
    PRIMARY KEY ("ID")
  );