import pygame
from pygame.locals import *
print("FRED")

class Fred():
    def __init__(self, parent):
        self.parent = parent
        self.vie = 20
        self.direction = 'G'
        self.vitesse = 3
        self.etat = 0        # 0=Debout, 1=baisse, 2=en saut
        self.position = [735, 75]
        self.objectList = []

    def bouge(self, event):
        if event.key == pygame.K_UP or event.key == K_SPACE:
            self.position[1] -= self.vitesse
        elif event.key == pygame.K_DOWN:
            self.position[1] += self.vitesse
        elif event.key == pygame.K_LEFT:
            self.position[0] -= self.vitesse
        elif event.key == pygame.K_RIGHT:
            self.position[0] += self.vitesse
        elif event.key == pygame.ALT:
            attaque()

    def changerEtat(self):
        pass

    def attaque(self):
        for key, item in parent.robotList:
            if (self.item.position[0] - 120) <= (self.position[0] + 30) and (self.item.position[0] + 120) >= (self.position[0]-30):
                if (self.item.position[1] - 120) <= (self.position[1] + 30) and (self.item.position[1] + 120) >= (self.position[1]-30):
                    pass
        if self.direction == 'G':
            pass
        elif self.direction == 'D':
            pass
        elif self.direction == 'H':
            pass
        elif self.direction == 'B':
            pass

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