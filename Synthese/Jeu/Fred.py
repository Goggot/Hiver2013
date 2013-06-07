import pygame
from pygame.locals import *
from Projectile import *
print("FRED")

class Fred():
    def __init__(self, parent):
        self.modele = parent
        self.vie = 20
        self.direction = 'D'
        self.vitesse = 3
        self.etat = 0        # 0=Debout, 1=baisse, 2=en saut
        self.position = [735, 75]
        self.objectList = []

    def bouge(self, event):
        if event.key == pygame.K_UP or event.key == K_SPACE:
            self.position[1] -= self.vitesse
            self.direction = 'H'
        elif event.key == pygame.K_DOWN:
            self.position[1] += self.vitesse
            self.direction = 'B'
        elif event.key == pygame.K_LEFT:
            self.position[0] -= self.vitesse
            self.direction = 'G'
        elif event.key == pygame.K_RIGHT:
            self.position[0] += self.vitesse
            self.direction = 'D'

    def changerEtat(self):
        pass

    def attaque(self):      ## Ajout d'un projectil dans la liste de projectile, l'image est ajouter depuis le controleur
        index = len(self.modele.prison.projectilList)
        self.modele.prison.projectilList.append([index, ProjectileFred(self, self.position[:], self.direction, index)])

    def mourrir(self):
        pass

    def tick(self):
        pass

    def clone(self):
        dict = []
        dict.append(self.position[:])
        dict.append(self.direction[:])
        dict.append(self.etat)
        dict.append(self.vie)
        dict.append(self.objectList[:])
        return dict