## Infos sur l'installation et les caract�ristiques techniques du jeu ##

Le jeu � besoin d'avoir :
	python 3.2 32bit
	pygame 1.9.2

D'abord, installer python : 

	- Soit avec l'executable fournit dans le dossier

	- Soit � cette adresse : 
		http://ftp.osuosl.org/pub/portablepython/v3.2/PortablePython_3.2.5.1.exe


Ensuite, installer pygame avec l'executable fournit dans le dossier :
	
	- Si python est installer nativement, le r�pertoire d'installation de pygame devrait-�tre
		C:\python32\

	- Si python est portable, installer pygame dans :
		\Portable Python 3.2.5.1\App\

Pour lancer l'application : 

	- Utiliser l'executable python installer ci-dessus en ligne de commande sur 
		le fichier Controleur.py (et non .pyc) dans le dossier \Jeu

	- Avec Eclipse :
		Cr�er un nouveau projet G�N�RAL vide, puis IMPORTER un FILE SYSTEM dans le projet
		Dans Windows/Preferences/Pydev/Interpreter - Python, 
			faire un New vers l'executable python install� ci-dessus, 
				ne rien d�cocher au niveau des librairies
		Run sur controleur.py


Informations � propos du timer du jeu
	Le timer utilis� fonctionne tr�s bien sous linux (plateforme utilis� pour le d�velopement) mais 
	fait crasher le jeu sur Windows. C'est pourquoi j'ai inclus une autre fonction qui permet de le faire
	tourner sur windows, mais jusqu'a un certain poins... En effet, apr�s trop de tours de boucle,
	l'interpreteur plante.



Si un probl�me survient avec les ex�cutables fournit dans le dossier :

#################################
## SOURCES WEB DES EXECUTABLES ##
#################################

Python 3.2 32bit
	http://www.python.org/ftp/python/3.2.5/python-3.2.5.msi

Pygame 1.9.2
	http://pygame.org/ftp/pygame-1.9.2a0.win32-py3.2.msi