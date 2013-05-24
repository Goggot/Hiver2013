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
        if event.key == K_UP or event.key == K_SPACE:
            self.position[1] -= self.vitesse
        elif event.key == K_DOWN:
            self.position[1] += self.vitesse
        elif event.key == K_LEFT:
            self.position[0] -= self.vitesse
        elif event.key == K_RIGHT:
            self.position[0] += self.vitesse

    def changerEtat(self):
        pass

    def attaque(self):
        pass

    def mourrir(self):
        pass

    def tick(self):
        self.ev = 0
        for event in pygame.event.get():        # On parcours la liste de tous les evenements recus
            if event.type == QUIT:              # Si un de ces evenements est de type QUIT
                exit()                          # On arrete la boucle
            else:
                if event.type == KEYDOWN:       # si une touche du clavier est appuyee
                    #print(event.key)
                    if event.key == K_UP or event.key == K_SPACE or event.key == K_DOWN or event.key == K_LEFT or event.key == K_RIGHT:
                        self.bouge(event)
                    elif event.key == 304:
                        self.parent.parent.pause = True

    def clone(self):
        dict = []
        dict.append(self.position[:])
        dict.append(self.direction[:])
        dict.append(self.etat)
        dict.append(self.vie)
        dict.append(self.objectList[:])
        return dict