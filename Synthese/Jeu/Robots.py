import pygame
import random
import copy
from Projectile import *
from threading import *


class Robot():
    def __init__(self):
        self.id = 0
        self.direction = "H"
        self.etat = 0     # Etat d'alerte -> false=RAS, true=alert

    def detection(self):
        alert = False
        if (self.position[0] - 120) <= (self.parent.fred.position[0]+30) and (self.position[0] + 120) >= (self.parent.fred.position[0]-30):
            if (self.position[1] - 120) <= (self.parent.fred.position[1]+30) and (self.position[1] + 120) >= (self.parent.fred.position[1]-30):
                alert = True
                self.etat = True
        return alert

    def clone(self):
        class Clone(object):
            pass

        return copy.deepcopy(Clone)


class camera(Robot):
    def __init__(self, parent, pos):
        self.parent = parent
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
        return False


class droneS(Robot):
    def __init__(self, parent, pos, direction):
        self.position = pos
        self.direction = direction
        self.parent = parent
        self.energie = 5
        self.portee = 20
        self.audio = False
        self.posInitial = pos[:]
        self.vitesse = 0.2

    def bouge(self):
        pos = self.position[:]
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
        object = [pos, self.position[:]]
        return object

    def mourrir(self):
        pass

    def temps(self):
        self.audio = False

    def tick(self):
        object = self.bouge()
        if self.detection():
            print("DETECTE")
            if not self.audio:
                self.audio = True
                pygame.mixer.music.load('music/jabba.mp3')
                pygame.mixer.music.play()
                Timer(6.0, self.temps).start()
        return object


class droneA(Robot):
    def __init__(self, parent, pos, direction):
        self.parent = parent
        self.position = pos
        self.direction = direction
        self.vitesse = 0.5
        self.energie = 10
        self.portee = 10
        self.alert = False
        self.posInitial = pos[:]
        self.degats = 1
        self.audio = False
        self.tirer = False

    def bouge(self):        # position[0] = axe Y
        pos = self.position[:]
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
        object = [pos, self.position[:]]
        return object

    def attaque(self):
        taille = len(self.parent.prison.projectilList) + 1
        self.parent.prison.projectilList.append([taille, Projectile(self, self.position[:])])

    def poursuivre(self):
        if self.position[0] < self.parent.fred.position[0]:
            self.position[0] += self.vitesse
        if self.position[0] > self.parent.fred.position[0]:
            self.position[0] -= self.vitesse
        if self.position[1] < self.parent.fred.position[1]:
            self.position[1] += self.vitesse
        if self.position[1] > self.parent.fred.position[1]:
            self.position[1] -= self.vitesse

    def mourrir(self):
        pass

    def son(self):
        self.audio = False

    def tireF(self):
        self.tirer = False

    def tick(self):
        object = self.bouge()
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
        return object
