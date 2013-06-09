import pygame
from pygame.locals import *
from Projectile import *
print("FRED")

class Fred():
    def __init__(self, parent):
        self.modele = parent
        self.vie = 20
        self.direction = 'D'
        self.etat = 0        # 0=Debout, 1=baisse, 2=en saut
        self.position = [1900, 1212]
        self.posTemp = []
        self.objectList = []
        self.indexProj = 0
        self.saut = False
        self.Xfactor = 15
        self.Yfactor = 15
        self.hauteurImage = 37
        self.largeurImage = 15

    def bouge(self, event):
        if event.key == pygame.K_SPACE:
            self.saut = True
        elif event.key == pygame.K_a:
            self.direction = 'G'
            if self.verifLimites() is True:
                self.position[0] -= self.Xfactor
                self.modele.controleur.vue.map_x -= -self.Xfactor
        elif event.key == pygame.K_d:
            self.direction = 'D'
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

    def changerEtat(self):
        pass

    def attaque(self):      ## Ajout d'un projectil dans la liste de projectile, l'image est ajouter depuis le controleur
        pos = [self.position[0], self.position[1]+30]
        newProj = ProjectileFred(self, pos, self.direction, self.indexProj)
        self.modele.prison.projectilList.append([self.indexProj, newProj])
        self.modele.controleur.vue.ajoutProjectile(newProj, "green")
        self.indexProj +=1

    def mourrir(self):
        pass#

    def tick(self):
        if (self.vie <= 0):
            mourrir()

        limite = 1
        if self.saut is True:
            self.position[1] -= self.Yfactor
            self.Yfactor -= 0.05

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

        if self.position[0] >= 1300 and self.position[0] <= 2400 and self.position[1] <= 700:
            self.tabLimite = self.modele.controleur.tabLimiteHC
            print("CENTRE HAUT")
        elif self.position[0] >= 1300 and self.position[0] <= 2400 and self.position[1] >= 700 and self.position[1] <= 1450:
            self.tabLimite = self.modele.controleur.tabLimiteCentre
            print("CENTRE")
        elif self.position[0] >= 1300 and self.position[0] <= 2400 and self.position[1] >= 1450:
            self.tabLimite = self.modele.controleur.tabLimiteMB
            print("CENTRE BAS")

        elif self.position[0] <= 1300 and self.position[1] <= 700:
            self.tabLimite = self.modele.controleur.tabLimiteHG
            print("GAUCHE HAUT")
        elif self.position[0] <= 1300 and self.position[1] <= 1450 and self.position[1] >= 700:
            self.tabLimite = self.modele.controleur.tabLimiteCG
            print("CENTRE GAUCHE")
        elif self.position[0] <= 1300 and self.position[1] >= 1450:
            self.tabLimite = self.modele.controleur.tabLimiteGB
            print("GAUCHE BAS")

        elif self.position[0] >= 2400 and self.position[1] <= 650:
            self.tabLimite = self.modele.controleur.tabLimiteHD
            print("DROITE HAUT")
        elif self.position[0] >= 1300 and self.position[1] <= 1450 and self.position[1] >= 650:
            self.tabLimite = self.modele.controleur.tabLimiteCD
            print("DROITE MILIEU")
        elif self.position[0] >= 2400 and self.position[1] >= 1450:
            self.tabLimite = self.modele.controleur.tabLimiteBD
            print("DROITE BAS")


        for p1, p2 in self.tabLimite:
            #print self.position, p1, p2
            if self.direction is 'G':                                   # Si Fred va vers la gauche
                if self.position[1] >= p1[1] and self.position[1] <= p2[1] and self.position[0]-self.largeurImage >= p1[0]:   # S'il se trouve en face de CE mur
                    if self.position[0]-self.largeurImage-self.Xfactor <= p1[0]:                   # Si un pas de plus lui fait franchir le mur
                        print "Mur a gauche a moins de 5 px", self.position, p1, p2
                        valid = False

            elif self.direction is 'D':                                 # Si Fred va vers la droite
                if self.position[1] >= p1[1] and self.position[1] <= p2[1] and self.position[0]+self.largeurImage <= p1[0]:
                    if self.position[0]+self.largeurImage+self.Xfactor >= p1[0]:
                        print "Mur a droite a moins de 5 px"
                        valid = False

            elif self.direction is 'H':                                 # Si Fred va vers le haut
                if self.position[0] >= p1[0] and self.position[0] <= p2[0]  and self.position[1]-self.hauteurImage >= p1[1]:
                    if self.position[1]-self.hauteurImage-self.Yfactor <= p1[1]:
                        print "Mur en haut a moins de 5 px"
                        valid = False

            elif self.direction is 'B':                                 # Si Fred va vers le bas
                if self.position[0] >= p1[0] and self.position[0] <= p2[0] and self.position[1]+self.hauteurImage <= p1[1]:
                    if self.position[1]+self.hauteurImage+self.Yfactor >= p1[1]:
                        print "Mur en bas a moins de 5 px"
                        valid = False
        return valid