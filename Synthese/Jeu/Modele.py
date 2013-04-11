from Controleur import *
import pygame
import random
from threading import *


class Fred():
    def __init__(self, parent):
        print("FRED")
        self.parent = parent
        self.vie = 20
        self.direction = 'G'
        self.vitesse = 3
        self.etat = 0        # 0=Debout, 1=baisse, 2=en saut
        self.position = [735, 75]
        self.objectList = []

    def bouge(self, event):
        if event.key == K_UP or event.key == K_SPACE:
            self.position[1] -= 3
        elif event.key == K_DOWN:
            self.position[1] += 3
        elif event.key == K_LEFT:
            self.position[0] -= 3
        elif event.key == K_RIGHT:
            self.position[0] += 3

    def changerEtat(self):
        pass

    def attaque(self):
        pass

    def mourrir(self):
        pass

    def tick(self):
        self.rep = 1
        for event in pygame.event.get():        # On parcours la liste de tous les evenements recus
            if event.type == QUIT:              # Si un de ces evenements est de type QUIT
                self.rep = 0                    # On arrete la boucle
            else:
                self.parent.listeEvenement.append(event)
                if event.type == KEYDOWN:       # si une touche du clavier est appuyee
                    #print(event.key)
                    if event.key == K_UP or event.key == K_SPACE or event.key == K_DOWN or event.key == K_LEFT or event.key == K_RIGHT:
                        self.bouge(event)
                    elif event.key == 304:
                        self.parent.backToTheFuture()
        return self.rep


class Robot():
    def __init__(self):
        print("ROBOT")
        self.id = 0
        self.direction = "H"
        self.etat = 0     # Etat d'alerte -> 0=RAS, 1=Suspect, 2=Alerte

    def detection(self):
        alert = False
        if (self.position[0] - 25) <= (self.parent.fred.position[0]) and (self.position[0] + 25) >= (self.parent.fred.position[0]):
            if (self.position[1] - 25) <= (self.parent.fred.position[1]) and (self.position[1] + 25) >= (self.parent.fred.position[1]):
                alert = True
        return alert


class camera(Robot):
    def __init__(self, parent, pos):
        print("CAMERA")
        self.parent = parent
        self.portee = 30
        self.position = pos
        self.audio = False

    def temps(self):
        self.audio = False

    def tick(self):
        if self.detection():
            if not self.audio:
                self.audio = True
                song = random.randrange(1, 4)
                if song == 1:
                    pygame.mixer.music.load('music/r2d2/1.mp3')
                elif song == 2:
                    pygame.mixer.music.load('music/r2d2/2.mp3')
                elif song == 3:
                    pygame.mixer.music.load('music/r2d2/3.mp3')
                elif song == 4:
                    pygame.mixer.music.load('music/r2d2/4.mp3')
                pygame.mixer.music.play()
                Timer(4.0, self.temps).start()


class droneS(Robot):
    def __init__(self, parent, pos):
        print("DRONES")
        self.position = pos
        self.direction = "H"
        self.parent = parent
        self.vitesse = 2
        self.energie = 5
        self.posInitial = pos
        self.portee = 20
        self.audio = False

    def bouge(self):
        if self.direction == "H":
            if self.position[1] <= 250:
                self.direction = "B"
            else:
                self.position[1] -= 0.2
        else:
            if self.position[1] >= 450:
                self.direction = "H"
            else:
                self.position[1] += 0.2

    def mourrir(self):
        pass

    def temps(self):
        self.audio = False

    def tick(self):
        self.bouge()
        if self.detection():
            if not self.audio:
                self.audio = True
                pygame.mixer.music.load('music/jabba.mp3')
                pygame.mixer.music.play()
                Timer(6.0, self.temps).start()


class droneA(Robot):
    def __init__(self, parent, pos):
        print("DRONEA")
        self.parent = parent
        self.position = pos
        self.vitesse = 3
        self.energie = 10
        self.posInitial = pos
        self.portee = 10
        self.degats = 1
        self.audio = False

    def bouge(self):
        pass

    def attaque(self):
        pass

    def mourrir(self):
        pass

    def temps(self):
        self.audio = False

    def tick(self):
        self.bouge()
        if self.detection():
            if not self.audio:
                self.audio = True
                pygame.mixer.music.load('music/ackbar.mp3')
                pygame.mixer.music.play()
                Timer(1.0, self.temps).start()


class Piege():
    def __init__(self, parent):
        print("PIEGE")
        self.parent = parent
        self.id = 0
        self.posInitial = [0, 0]

    def tick(self):
        pass


class laser(Piege):
    def __init__(self):
        print("LASER")
        self.degats = 0.5


class detecteur(Piege):
    def __init__(self):
        print("DETECTEUR")
        self.degats = 0.5
        self.portee = 15


class Prison():
    def __init__(self, parent):
        print("PRISON")
        self.parent = parent
        self.robotList = {"camera": [], "droneS": [], "droneA": []}
        self.trapList = {"laser": [], "detecteur": []}
        self.objectList = []
        self.niveauEnCours = 1


class Modele():
    def __init__(self, parent):
        print("MODELE")
        self.parent = parent
        self.listeEvenement = []
        self.fred = Fred(self)
        self.prison = Prison(self)

    def backToTheFuture(self):
        print("YAHOUUU ! BACK TO THE FUTUUURE !")