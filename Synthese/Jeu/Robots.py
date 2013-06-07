import pygame
import random
from Projectile import *
from threading import *
print("ROBOTS")


class Robot():
    def __init__(self):
        self.id = 0
        self.direction = "H"

    def detection(self):
        alert = False
        if (self.position[0] - 120) <= (self.modele.fred.position[0] + 30) and (self.position[0] + 120) >= (self.modele.fred.position[0]-30):
            if (self.position[1] - 120) <= (self.modele.fred.position[1] + 30) and (self.position[1] + 120) >= (self.modele.fred.position[1]-30):
                alert = True
                self.etat = True
        return alert


class camera(Robot):
    def __init__(self, parent, pos):
        self.modele = parent
        self.portee = 30
        self.position = pos
        self.audio = False

    def temps(self):
        self.audio = False

    def tick(self):
        if self.detection():
            print("DETECTE")
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

    def clone(self):
        pass


class droneS(Robot):
    def __init__(self, parent, pos, direction):
        self.position = pos
        self.direction = direction
        self.modele = parent
        self.etat = 0     # Etat d'alerte -> false=RAS, true=alert
        self.energie = 5
        self.portee = 20
        self.audio = False
        self.posInitial = pos[:]
        self.vitesse = 0.2

    def bouge(self):
        if self.direction == "H":
            if self.position[1] <= (self.posInitial[1] - 50):
                self.direction = "B"
            else:
                self.position[1] -= self.vitesse
        else:
            if self.position[1] >= (self.posInitial[1] + 50):
                self.direction = "H"
            else:
                self.position[1] += self.vitesse

    def mourrir(self):
        pass

    def temps(self):
        self.audio = False

    def tick(self):
        self.bouge()
        if self.detection():
            print("DETECTE")
            if not self.audio:
                self.audio = True
                pygame.mixer.music.load('music/jabba.mp3')
                pygame.mixer.music.play()
                Timer(6.0, self.temps).start()

    def clone(self):
        dict = []
        dict.append(self.position[:])
        dict.append(self.direction[:])
        dict.append(self.etat)
        return dict


class droneA(Robot):
    def __init__(self, parent, pos, direction):
        self.modele = parent
        self.position = pos
        self.direction = direction
        self.etat = 0     # Etat d'alerte -> false=RAS, true=alert
        self.vitesse = 0.5
        self.portee = 10
        self.alert = False
        self.posInitial = pos[:]
        self.degats = 1
        self.audio = False
        self.tirer = False

    def bouge(self):        # position[0] = axe Y
        if not self.alert:
            if self.direction == "G":
                if self.position[0] <= (self.posInitial[0] - 50):
                    self.direction = "D"
                else:
                    self.position[0] -= self.vitesse
            else:
                if self.position[0] >= (self.posInitial[0] + 50):
                    self.direction = "G"
                else:
                    self.position[0] += self.vitesse

    def attaque(self):      ## Ajout d'un projectile dans la liste de projectile, ainsi que d'une image dans la liste visuelle
        index = len(self.modele.prison.projectilList)
        self.modele.prison.projectilList.append([index, ProjectileRobot(self, self.position[:], index)])
        self.modele.controleur.vue.ajoutProjectile()

    def poursuivre(self):
        if self.position[0] < self.modele.fred.position[0]:
            self.position[0] += self.vitesse
        if self.position[0] > self.modele.fred.position[0]:
            self.position[0] -= self.vitesse
        if self.position[1] < self.modele.fred.position[1]:
            self.position[1] += self.vitesse
        if self.position[1] > self.modele.fred.position[1]:
            self.position[1] -= self.vitesse

    def mourrir(self):
        pass

    def son(self):
        self.audio = False

    def tireF(self):
        self.tirer = False

    def tick(self):
        self.bouge()
        if self.detection():
            print("DETECTE")
            self.poursuivre()
            self.alert = True

            if not self.tirer:
                self.tirer = True
                self.attaque()
                Timer(2.0, self.tireF).start()

            if not self.audio:
                self.audio = True
                pygame.mixer.music.load('music/ackbar.mp3')
                pygame.mixer.music.play()
                Timer(1.0, self.son).start()
        else:
            self.alert = False

    def clone(self):
        dict = []
        dict.append(self.position[:])
        dict.append(self.direction[:])
        dict.append(self.etat)
        dict.append(self.alert)
        return dict