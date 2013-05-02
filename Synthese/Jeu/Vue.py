import pygame
import pygame.mixer
from pygame.locals import *

pygame.init()
pygame.mixer.init(44100)
pygame.key.set_repeat(15, 15)


class Vue():
    def __init__(self, parent):
        self.parent = parent
        self.listImgEnnemis = {"camera": [], "droneS": [], "droneA": [], "projectile": []}
        self.robotList = self.parent.modele.prison.robotList
        self.projectilList = self.parent.modele.prison.projectilList
        self.fenetre = pygame.display.set_mode((1230, 820), RESIZABLE)
        self.fond = pygame.image.load("img/falcon.jpg").convert()
        self.solo = pygame.image.load("img/han-solo75.png").convert_alpha()
        self.posSolo = self.solo.get_rect()
        self.droneS = pygame.image.load("img/jabba100.png").convert_alpha()
        self.droneA = pygame.image.load("img/ackbar70.png").convert_alpha()
        self.camera = pygame.image.load("img/r2d100.png").convert_alpha()
        self.projectile = pygame.image.load("img/energy.png").convert_alpha()

    def initGraph(self):
        for key in self.robotList:
            for item in self.robotList[key]:
                if item:
                    if key == "droneA":
                        self.listImgEnnemis.get("droneA").append([item[0], self.droneA])
                    elif key == "droneS":
                        self.listImgEnnemis.get("droneS").append([item[0], self.droneS])
                    elif key == "camera":
                        self.listImgEnnemis.get("camera").append([item[0], self.camera])

    def ajoutProjectile(self):
        for item in self.projectilList:
            self.listImgEnnemis.get("projectile").append([item[0], self.projectile])

    def refresh(self):
        print("REFRESH")
        self.fenetre.blit(self.fond, (0, 0))
        #print(self.parent.modele.fred.position)
        #posSolo = self.parent.modele.fred.position
        #self.fenetre.blit(self.solo, (posSolo[0], posSolo[1]))

        for key in self.listImgEnnemis:
            if key == "droneA":
                for item1 in self.listImgEnnemis[key]:
                    self.droneA = item1[1].get_rect()
                    for item2 in self.parent.modele.prison.robotList["droneA"]:
                        if item2[0] == item1[0]:
                            posDroneA = item2[1].position
                    self.fenetre.blit(item1[1], (posDroneA[0], posDroneA[1]))
            elif key == "droneS":
                for item1 in self.listImgEnnemis[key]:
                    self.droneS = item1[1].get_rect()
                    for item2 in self.parent.modele.prison.robotList["droneS"]:
                        if item2[0] == item1[0]:
                            posDroneS = item2[1].position
                    self.fenetre.blit(item1[1], (posDroneS[0], posDroneS[1]))
            elif key == "camera":
                for item1 in self.listImgEnnemis[key]:
                    self.camera = item1[1].get_rect()
                    for item2 in self.parent.modele.prison.robotList["camera"]:
                        if item2[0] == item1[0]:
                            posCamera = item2[1].position
                    self.fenetre.blit(item1[1], (posCamera[0], posCamera[1]))
            elif key == "projectile":
                for item1 in self.listImgEnnemis[key]:
                    self.projectile = item1[1].get_rect()
                    for item2 in self.parent.modele.prison.projectilList:
                        if item2[0] == item1[0]:
                            posProjectile = item2[1].position
                    self.fenetre.blit(item1[1], (posProjectile[0], posProjectile[1]))
                    print("PROJECTILE AFFICHE")

        pygame.display.flip()