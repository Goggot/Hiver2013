
	CREATE TABLE USERS (
		ID NUMBER PRIMARY KEY,
		USERNAME VARCHAR2(40) NOT NULL,
		FIRST_NAME VARCHAR2(40) NOT NULL,
		LAST_NAME VARCHAR2(40) NOT NULL,
		PASSWORD VARCHAR2(65) NOT NULL,
		VISIBILITY NUMBER(1) NOT NULL
	);

	insert into users(id, username, first_name, last_name, password, visibility) values 
					 (1, 'ftheriault', 'Fred', 'Theriault', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1);
	insert into users(id, username, first_name, last_name, password, visibility) values 
					 (2, 'arthax', 'Arthax', 'GhostInTheMachines', ' a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1);

	commit;
	
	-- Les mots de passe sont tous "test"
