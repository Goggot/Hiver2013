import pygame
import random
from threading import *


class Robot():
    def __init__(self):
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
        return


class droneS(Robot):
    def __init__(self, parent, pos, direction):
        self.position = pos
        self.direction = direction
        self.parent = parent
        self.energie = 5
        self.posInitial = pos
        self.portee = 20
        self.audio = False
        self.vitesse = 0.2

    def bouge(self):
        if self.direction == "H":
            if self.position[1] <= (self.posInitial[1] - 50):
                self.direction = "B"
            else:
                self.position[1] -= self.vitesse
            if self.position[1] <= 0:
                self.direction = "B"
        else:
            if self.position[1] >= (self.posInitial[1] + 50):
                self.direction = "H"
            else:
                self.position[1] += self.vitesse
            if self.position[1] >= 1230:
                self.direction = "H"

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
        return self.direction


class droneA(Robot):
    def __init__(self, parent, pos, direction):
        self.parent = parent
        self.position = pos
        self.direction = direction
        self.vitesse = 0.5
        self.energie = 10
        self.posInitial = pos
        self.portee = 10
        self.degats = 1
        self.audio = False

    def bouge(self):
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
        return self.direction