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
        self.listeDrA = []
        self.listeDrS = []
        self.robotList = self.parent.modele.prison.robotList
        self.fenetre = pygame.display.set_mode((1024, 768), RESIZABLE)
        self.fond = pygame.image.load("img/falcon.jpg").convert()
        self.solo = pygame.image.load("img/han-solo75.png").convert_alpha()
        self.posSolo = self.solo.get_rect()

    def initGraph(self):
        for key in self.robotList:
            for item in self.robotList[key]:
                if item:
                    if key == "droneA":
                        self.listeDrA.append(pygame.image.load("img/ackbar70.png").convert_alpha())
                    elif key == "droneS":
                        self.listeDrS.append(pygame.image.load("img/jabba100.png").convert_alpha())
        #self.posJabba = self.jabba.get_rect()
        #self.posAckbar = self.ackbar.get_rect()

    def refresh(self):
        print("REFRESH")
        self.fenetre.blit(self.fond, (0, 0))
        posSolo = self.parent.modele.fred.position
        self.fenetre.blit(self.solo, (posSolo[0], posSolo[1]))

        for item1 in self.listeDrA:
            self.droneA = item1.get_rect()
            for item2 in self.parent.modele.prison.robotList["droneA"]:
                posDroneA = item2.position
            self.fenetre.blit(item1, (posDroneA[0], posDroneA[1]))

        for item1 in self.listeDrS:
            self.droneS = item1.get_rect()
            for item2 in self.parent.modele.prison.robotList["droneS"]:
                posDroneS = item2.position
            self.fenetre.blit(item1, (posDroneS[0], posDroneS[1]))

        pygame.display.flip()