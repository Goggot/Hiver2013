import os
import pygame
import pygame.mixer
from pygame.locals import *
pygame.init()
pygame.mixer.init(44100)
pygame.key.set_repeat(15, 15)


class Vue():
    def __init__(self, parent):
        print("VUE")
        self.parent = parent
        self.listeEnnemis = {"camera": [], "droneS": [], "droneA": []}
        self.robotList = self.parent.modele.prison.robotList
        self.fenetre = pygame.display.set_mode((1230, 820), RESIZABLE)
        self.fond = pygame.image.load("img/falcon.jpg").convert()
        self.solo = pygame.image.load("img/han-solo75.png").convert_alpha()
        self.posSolo = self.solo.get_rect()
        self.droneS = pygame.image.load("img/jabba100.png").convert_alpha()
        self.droneA = pygame.image.load("img/ackbar70.png").convert_alpha()
        self.camera = pygame.image.load("img/r2d100.png").convert_alpha()

    def initGraph(self):
        for key in self.robotList:
            for item in self.robotList[key]:
                if item:
                    if key == "droneA":
                        self.listeEnnemis.get("droneA").append(self.droneA)
                    elif key == "droneS":
                        self.listeEnnemis.get("droneS").append(self.droneS)
                    elif key == "camera":
                        self.listeEnnemis.get("camera").append(self.camera)

    def refresh(self):
        print("REFRESH")
        self.fenetre.blit(self.fond, (0, 0))
        posSolo = self.parent.modele.fred.position
        self.fenetre.blit(self.solo, (posSolo[0], posSolo[1]))

        for key in self.listeEnnemis:
            if key == "droneA":
                for item1 in self.listeEnnemis[key]:
                    print("ACKBAR")
                    self.droneA = item1.get_rect()
                    for item2 in self.parent.modele.prison.robotList["droneA"]:
                        posDroneA = item2.position
                    self.fenetre.blit(item1, (posDroneA[0], posDroneA[1]))
            elif key == "droneS":
                for item1 in self.listeEnnemis[key]:
                    print("JABBA")
                    self.droneS = item1.get_rect()
                    for item2 in self.parent.modele.prison.robotList["droneS"]:
                        posDroneS = item2.position
                    self.fenetre.blit(item1, (posDroneS[0], posDroneS[1]))
            elif key == "camera":
                for item1 in self.listeEnnemis[key]:
                    print("R2D2")
                    self.camera = item1.get_rect()
                    for item2 in self.parent.modele.prison.robotList["camera"]:
                        posCamera = item2.position
                    self.fenetre.blit(item1, (posCamera[0], posCamera[1]))

        pygame.display.flip()