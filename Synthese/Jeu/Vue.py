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
        self.fenetre = pygame.display.set_mode((1280, 860), RESIZABLE)
        self.fond = pygame.image.load("img/falcon.jpg").convert()
        self.solo = pygame.image.load("img/han-solo75.png").convert_alpha()
        self.posSolo = self.solo.get_rect()

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

        for item in self.listeDrA:
            self.droneA = item.get_rect()
            for item in self.parent.modele.prison.robotList["droneA"]:
                posDroneA = item.position
            self.fenetre.blit(self.droneA, (posDroneA[0], posDroneA[1]))

        for item in self.listeDrS:
            self.droneS = item.get_rect()
            print(self.droneS)
            for item in self.parent.modele.prison.robotList["droneA"]:
                posDroneS = item.position
            self.fenetre.blit(self.droneS, (posDroneS[0], posDroneS[1]))

        pygame.display.flip()