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
        self.map_x = -1300
        self.map_y = -850
        self.window_width = 1200
        self.window_height = 654
        self.map_width = 3845
        self.map_height = 2425

    #### Creation d'une liste d'objets "image" pour chaque liste d'objets "classe" ####
        self.listImgEnnemis = {"camera": [], "droneS": [], "droneA": []}
        self.listImgProjectileEnnemi = []
        self.listImgProjectileFred = []

    #### Liens vers les listes d'objets "class" ####
        self.robotList = self.controleur.modele.prison.robotList
        self.projectilList = self.controleur.modele.prison.projectilList

    #### Creation des canvas ####
        self.fenetre = pygame.display.set_mode((self.window_width, self.window_height))
        self.surfaceComplete = pygame.Surface((self.map_width, self.map_height))
        self.fond = pygame.image.load("img/fond.jpg").convert()
        self.surfaceComplete = self.fond.convert()        

    #### Creation et liaisons des objets "image" ####
        self.solo = pygame.image.load("img/han-solo75.png").convert_alpha()
        self.posSolo = self.solo.get_rect()
        self.droneS = pygame.image.load("img/droneS.png").convert_alpha()
        self.droneA = pygame.image.load("img/drone100.png").convert_alpha()
        self.camera = pygame.image.load("img/r2d100.png").convert_alpha()
        self.laserRed = pygame.image.load("img/laser-red.png").convert_alpha()
        self.laserGreen = pygame.image.load("img/laser-green.png").convert_alpha()  
        

    def initAccueil(self):
        accueil = pygame.image.load("img/accueil.png").convert()
        self.fenetre.blit(accueil, (0,0))
        pygame.display.flip()

    def pause(self):
        pause = pygame.image.load("img/pause.png").convert()
        self.fenetre.blit(pause, (0,0))
        pygame.display.flip()

    def win(self):
        pause = pygame.image.load("img/win.png").convert()
        self.fenetre.blit(pause, (0,0))
        pygame.display.flip()

    def failed(self):
        pause = pygame.image.load("img/failed.png").convert()
        self.fenetre.blit(pause, (0,0))
        pygame.display.flip()

#### Remplissage de la liste d'objet "image" a partir de la liste d'objet "class" des ennemis ####
    def initGraphJeu(self):
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
            self.listImgProjectileEnnemi.append([item, self.laserRed])
        else:
            self.listImgProjectileFred.append([item, self.laserGreen])

    def suppProjectile(self, index, color):
        if color is "red":
            del self.listImgProjectileEnnemi[index]
        else:
            del self.listImgProjectileFred[index]


#### Refresh du canvas complet ####
    def refreshJeu(self):
        #self.robotList = self.controleur.modele.prison.robotList
        #self.pause = self.controleur.pause
        if self.map_x > 0:
            self.map_x = 0
        if self.map_x < -(self.map_width-self.window_width):
            self.map_x = -(self.map_width-self.window_width)
        if self.map_y > 0:
            self.map_y = 0
        if self.map_y < -(self.map_height-self.window_height):
            self.map_y = -(self.map_height-self.window_height)

        posSolo = self.controleur.modele.fred.position
        self.surfaceComplete.blit(self.solo, (posSolo[0], posSolo[1]))

        for key in self.listImgEnnemis:
            if key == "droneA":
                for item1 in self.listImgEnnemis[key]:
                    self.projectile = item1[1].get_rect()
                    for item2 in self.robotList["droneA"]:
                        if item2[0] == item1[0]:
                            posDroneA = item2[1].position
                    self.surfaceComplete.blit(item1[1], (posDroneA[0], posDroneA[1]))
            elif key == "droneS":
                for item1 in self.listImgEnnemis[key]:
                    self.projectile = item1[1].get_rect()
                    for item2 in self.robotList["droneS"]:
                        if item2[0] == item1[0]:
                            posDroneS = item2[1].position
                    self.surfaceComplete.blit(item1[1], (posDroneS[0], posDroneS[1]))
            elif key == "camera":
                for item1 in self.listImgEnnemis[key]:
                    self.projectile = item1[1].get_rect()
                    for item2 in self.robotList["camera"]:
                        if item2[0] == item1[0]:
                            posCamera = item2[1].position
                    self.surfaceComplete.blit(item1[1], (posCamera[0], posCamera[1]))

        for item in self.listImgProjectileEnnemi:
            self.projectile = item[1].get_rect()
            posProjectile = item[0].position
            self.surfaceComplete.blit(item[1], (posProjectile[0], posProjectile[1]))

        for item in self.listImgProjectileFred:
            self.projectile = item[1].get_rect()
            posProjectile = item[0].position
            self.surfaceComplete.blit(item[1], (posProjectile[0], posProjectile[1]))
        
        
        self.fenetre.blit(self.surfaceComplete, (self.map_x, self.map_y, self.window_width, self.window_height))
        self.surfaceComplete = self.fond.convert()
        pygame.display.flip()

    """def fire(self):
            color = (255,0,0)
            posSoloX = self.controleur.modele.fred.position[0]
            posSoloY = self.controleur.modele.fred.position[1]
            pygame.draw.aaline(self.fenetre, color, (posSoloX, posSoloY), (posSoloX+50, posSoloY))
            pygame.display.flip()"""