import pygame
from pygame.locals import *
from Projectile import *
from threading import *
print("FRED")

class Fred():
    def __init__(self, parent):
        self.modele = parent
        self.vie = 20
        self.direction = 'D'
        self.directionLaser = 'D'
        self.etat = 0        # 0=Debout, 1=baisse, 2=en saut
        self.position = [1790, 1150]
        self.posTemp = []
        self.objectList = []
        self.indexProj = 0
        self.saut = False
        self.fire = 0
        self.Xfactor = 5
        self.Yfactor = 5
        self.hauteurImage = 37
        self.largeurImage = 15
        self.mourru = False

    def bouge(self, event):
        if self.vie > 0:
            if event.key == pygame.K_a:
                self.direction = 'G'
                self.directionLaser = 'G'
                if self.verifLimites() is True:
                    self.position[0] -= self.Xfactor
                    self.modele.controleur.vue.map_x -= -self.Xfactor
            elif event.key == pygame.K_d:
                self.direction = 'D'
                self.directionLaser = 'D'
                if self.verifLimites() is True:
                    self.position[0] += self.Xfactor
                    self.modele.controleur.vue.map_x -= self.Xfactor
            elif event.key == pygame.K_w:
                self.direction = 'H'
                if self.verifLimites() is True:
                    self.position[1] -= self.Yfactor
                    self.modele.controleur.vue.map_y -= -self.Yfactor
            elif event.key == pygame.K_s:
                self.direction = 'B'
                if self.verifLimites() is True:
                    self.position[1] += self.Yfactor
                    self.modele.controleur.vue.map_y -= self.Yfactor
            elif event.key == pygame.K_SPACE:
                if self.fire >= 0.5:
                    self.attaque()
                    self.fire = 0

    def changerEtat(self):
        pass

    def attaque(self):      ## Ajout d'un projectil dans la liste de projectile, l'image est ajouter depuis le controleur
        pos = [self.position[0], self.position[1]+30]
        newProj = ProjectileFred(self, pos, self.directionLaser, self.indexProj)
        self.modele.prison.projectilList.append([self.indexProj, newProj])
        self.modele.controleur.vue.ajoutProjectile(newProj, "green")
        self.indexProj +=1

    def mourrir(self):
        print("MEURT!")
        if self.mourru is True:
            if self.vie <= 0:
                print("MOURRU... looser")
                self.modele.controleur.fin = True
            else:
                print("REVIVE !")
                self.mourru = False
        else:
            print("MAIS PAS ENCORE MOURRU! USE YOUR POWA!!")
            pygame.mixer.music.load('music/countdown.wav')
            pygame.mixer.music.play()
            self.mourru = True
            Timer(5.0, self.mourrir).start()

    def tick(self):
        if self.mourru is False:
            if (self.vie <= 0):
                self.mourrir()
            if self.position[0] >= 3845:
                if self.position[1] >= 750 and self.position[1] <= 1650:
                    self.modele.controleur.win = True
            if self.fire < 0.5:
                self.fire += 0.030

    def clone(self):
        dict = []
        dict.append(self.position[:])
        dict.append(self.direction[:])
        dict.append(self.etat)
        dict.append(self.vie)
        dict.append(self.objectList[:])
        return dict

    def verifLimites(self):
        valid = True

            ### CENTRE HAUT ###
        if self.position[0] >= 1300 and self.position[0] <= 2400 and self.position[1] <= 700:
            self.tabLimite = self.modele.tabLimiteHC
            ### CENTRE ###
        elif self.position[0] >= 1300 and self.position[0] <= 2400 and self.position[1] >= 700 and self.position[1] <= 1450:
            self.tabLimite = self.modele.tabLimiteCentre
            ### CENTRE BAS ###
        elif self.position[0] >= 1300 and self.position[0] <= 2400 and self.position[1] >= 1450:
            self.tabLimite = self.modele.tabLimiteMB

            ### GAUCHE HAUT ###
        elif self.position[0] <= 1300 and self.position[1] <= 700:
            self.tabLimite = self.modele.tabLimiteHG
            ### CENTRE GAUCHE ###
        elif self.position[0] <= 1300 and self.position[1] <= 1450 and self.position[1] >= 700:
            self.tabLimite = self.modele.tabLimiteCG
            ### GAUCHE BAS ###
        elif self.position[0] <= 1300 and self.position[1] >= 1450:
            self.tabLimite = self.modele.tabLimiteGB

            ### DROITE HAUT ###
        elif self.position[0] >= 2400 and self.position[1] <= 650:
            self.tabLimite = self.modele.tabLimiteHD
            ### CENTRE DROITE ###
        elif self.position[0] >= 1300 and self.position[1] <= 1450 and self.position[1] >= 650:
            self.tabLimite = self.modele.tabLimiteCD
            ### DROITE BAS
        elif self.position[0] >= 2400 and self.position[1] >= 1450:
            self.tabLimite = self.modele.tabLimiteBD


        for p1, p2 in self.tabLimite:
            if self.direction is 'G':                                   # Si Fred va vers la gauche
                if self.position[1] >= p1[1] and self.position[1] <= p2[1] and self.position[0]-self.largeurImage >= p1[0]:   # S'il se trouve en face de CE mur
                    if self.position[0]-self.largeurImage-self.Xfactor <= p1[0]:                   # Si un pas de plus lui fait franchir le mur
                        valid = False

            elif self.direction is 'D':                                 # Si Fred va vers la droite
                if self.position[1] >= p1[1] and self.position[1] <= p2[1] and self.position[0]+self.largeurImage <= p1[0]:
                    if self.position[0]+self.largeurImage+self.Xfactor >= p1[0]:
                        valid = False

            elif self.direction is 'H':                                 # Si Fred va vers le haut
                if self.position[0] >= p1[0] and self.position[0] <= p2[0]  and self.position[1]-self.hauteurImage >= p1[1]:
                    if self.position[1]-self.hauteurImage-self.Yfactor <= p1[1]:
                        valid = False

            elif self.direction is 'B':                                 # Si Fred va vers le bas
                if self.position[0] >= p1[0] and self.position[0] <= p2[0] and self.position[1]+self.hauteurImage <= p1[1]:
                    if self.position[1]+self.hauteurImage+self.Yfactor >= p1[1]:
                        valid = False
        return valid