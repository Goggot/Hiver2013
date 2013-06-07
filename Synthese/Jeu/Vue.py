import pygame
import pygame.mixer
from pygame.locals import *
print("VUE")

pygame.init()
pygame.mixer.init(44100)
pygame.key.set_repeat(15, 15)


class Vue():
    def __init__(self, parent):
        self.controleur = parent

    #### Creation d'une liste d'objets "image" pour chaque liste d'objets "classe" ####
        self.listImgEnnemis = {"camera": [], "droneS": [], "droneA": []}
        self.listImgProjectile = []

    #### Liens vers les listes d'objets "class" ####
        self.robotList = self.controleur.modele.prison.robotList
        self.projectilList = self.controleur.modele.prison.projectilList

    #### Creation du canvas ####
        self.fenetre = pygame.display.set_mode((1230, 820), RESIZABLE)
        self.fond = pygame.image.load("img/falcon.jpg").convert()

    #### Creation et liaisons des objets "image" ####
        self.solo = pygame.image.load("img/han-solo75.png").convert_alpha()
        self.posSolo = self.solo.get_rect()
        self.droneS = pygame.image.load("img/jabba100.png").convert_alpha()
        self.droneA = pygame.image.load("img/ackbar70.png").convert_alpha()
        self.camera = pygame.image.load("img/r2d100.png").convert_alpha()
        self.laserRed = pygame.image.load("img/laser-red.png").convert_alpha()
        self.laserGreen = pygame.image.load("img/laser-green.png").convert_alpha()

#### Remplissage de la liste d'objet "image" a partir de la liste d'objet "class" des ennemis ####
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


#### Remplissage de la liste d'objet "image" a partir de la liste d'objet "class" des projectiles ####
    def ajoutProjectile(self, item, color):
        if color is "red":
            self.listImgProjectile.append([item, self.laserRed])
        else:
            self.listImgProjectile.append([item, self.laserGreen])

    def suppProjectile(self, index):
        print("TAILLE LISTE IMAGE : ", index)
        del self.listImgProjectile[index]


#### Refresh du canvas complet ####
    def refresh(self):
        #self.robotList = self.controleur.modele.prison.robotList
        #self.pause = self.controleur.pause
        self.fenetre.blit(self.fond, (0, 0))
        posSolo = self.controleur.modele.fred.position
        self.fenetre.blit(self.solo, (posSolo[0], posSolo[1]))
        for key in self.listImgEnnemis:
            if key == "droneA":
                for item1 in self.listImgEnnemis[key]:
                    self.projectile = item1[1].get_rect()
                    for item2 in self.robotList["droneA"]:
                        if item2[0] == item1[0]:
                            posDroneA = item2[1].position
                    self.fenetre.blit(item1[1], (posDroneA[0], posDroneA[1]))
            elif key == "droneS":
                for item1 in self.listImgEnnemis[key]:
                    self.projectile = item1[1].get_rect()
                    for item2 in self.robotList["droneS"]:
                        if item2[0] == item1[0]:
                            posDroneS = item2[1].position
                    self.fenetre.blit(item1[1], (posDroneS[0], posDroneS[1]))
            elif key == "camera":
                for item1 in self.listImgEnnemis[key]:
                    self.projectile = item1[1].get_rect()
                    for item2 in self.robotList["camera"]:
                        if item2[0] == item1[0]:
                            posCamera = item2[1].position
                    self.fenetre.blit(item1[1], (posCamera[0], posCamera[1]))

        for item in self.listImgProjectile:
            self.projectile = item[1].get_rect()
            posProjectile = item[0].position
            self.fenetre.blit(item[1], (posProjectile[0], posProjectile[1]))

        pygame.display.flip()

    """def fire(self):
            color = (255,0,0)
            posSoloX = self.controleur.modele.fred.position[0]
            posSoloY = self.controleur.modele.fred.position[1]
            pygame.draw.aaline(self.fenetre, color, (posSoloX, posSoloY), (posSoloX+50, posSoloY))
            pygame.display.flip()"""