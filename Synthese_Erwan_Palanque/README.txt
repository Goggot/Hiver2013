## Infos sur l'installation et les caractéristiques techniques du jeu ##

Le jeu à besoin d'avoir :
	python 3.2 32bit
	pygame 1.9.2

D'abord, installer python : 

	- Soit avec l'executable fournit dans le dossier

	- Soit à cette adresse : 
		http://ftp.osuosl.org/pub/portablepython/v3.2/PortablePython_3.2.5.1.exe


Ensuite, installer pygame avec l'executable fournit dans le dossier :
	
	- Si python est installer nativement, le répertoire d'installation de pygame devrait-être
		C:\python32\

	- Si python est portable, installer pygame dans :
		\Portable Python 3.2.5.1\App\

Pour lancer l'application : 

	- Utiliser l'executable python installer ci-dessus en ligne de commande sur 
		le fichier Controleur.py (et non .pyc) dans le dossier \Jeu

	- Avec Eclipse :
		Créer un nouveau projet GÉNÉRAL vide, puis IMPORTER un FILE SYSTEM dans le projet
		Dans Windows/Preferences/Pydev/Interpreter - Python, 
			faire un New vers l'executable python installé ci-dessus, 
				ne rien décocher au niveau des librairies
		Run sur controleur.py


Informations à propos du timer du jeu
	Le timer utilisé fonctionne très bien sous linux (plateforme utilisé pour le dévelopement) mais 
	fait crasher le jeu sur Windows. C'est pourquoi j'ai inclus une autre fonction qui permet de le faire
	tourner sur windows, mais jusqu'a un certain poins... En effet, après trop de tours de boucle,
	l'interpreteur plante.



Si un problème survient avec les exécutables fournit dans le dossier :

#################################
## SOURCES WEB DES EXECUTABLES ##
#################################

Python 3.2 32bit
	http://www.python.org/ftp/python/3.2.5/python-3.2.5.msi

Pygame 1.9.2
	http://pygame.org/ftp/pygame-1.9.2a0.win32-py3.2.msi