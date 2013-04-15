  DROP TABLE PRODUIT_PHP;
  
	CREATE TABLE PRODUIT_PHP (
		ID NUMBER PRIMARY KEY,
		NOM VARCHAR2(40) NOT NULL,
		DESCRIPTION VARCHAR2(100) NOT NULL,
		PRIX NUMBER NOT NULL
	);

	insert into PRODUIT_PHP(id, nom, description, prix) values 
					 (1, 'ASUS', '8Core', 1500);
	insert into PRODUIT_PHP(id, nom, description, prix) values 
					 (2, 'ADF', 'Nul', 0);

	commit;