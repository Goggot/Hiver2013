from Controleur import *
import pygame
from threading import *


class Fred():
    def __init__(self, parent):
        print("FRED")
        self.parent = parent
        self.vie = 20
        self.direction = 'G'
        self.vitesse = 3
        self.etat = 0        # 0=Debout, 1=baisse, 2=en saut
        self.position = [500, 150]
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
    def __init__(self, parent):
        print("CAMERA")
        self.parent = parent
        self.portee = 30

    def tick(self):
        return True


class droneS(Robot):
    def __init__(self, parent):
        print("DRONES")
        self.position = [950, 380]
        self.direction = "H"
        self.parent = parent
        self.vitesse = 2
        self.energie = 5
        self.posInitial = [500, 800]
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
        print("COUCOU")
        self.bouge()
        if self.detection():
            self.parent.parent.vue.jabba = pygame.image.load("img/jabba_HO100.png").convert_alpha()
            if not self.audio:
                self.audio = True
                pygame.mixer.music.load('music/jabba.mp3')
                pygame.mixer.music.play()
                Timer(6.0, self.temps).start()
        else:
            self.parent.parent.vue.jabba = pygame.image.load("img/jabba100.png").convert_alpha()


class droneA(Robot):
    def __init__(self, parent):
        print("DRONEA")
        self.parent = parent
        self.position = [460, 40]
        self.vitesse = 3
        self.energie = 10
        self.posInitial = [460, 50]
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
        self.camera = camera(self)
        self.droneS = droneS(self)
        self.droneA = droneA(self)
        self.piege = Piege(self)
        self.prison = Prison(self)

    def backToTheFuture(self):
        print("YAHOUUU ! BACK TO THE FUTUUURE !")