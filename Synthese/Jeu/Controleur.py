import pygame
from pygame.locals import *
from Modele import *
from Vue import *
pygame.init()


class Controleur():
    def __init__(self):
        self.modele = Modele()
        self.rep = 1

    def tick(self):
        for event in pygame.event.get():    # On parcours la liste de tous les evenements recus
            print(event)
            if event.type == QUIT:          # Si un de ces evenements est de type QUIT
                self.rep = 0                     # On arrete la boucle

            elif event.type == KEYDOWN:     # si une touche du clavier est appuyee
                if event.key == K_RIGHT:
                    Jeu().droite()
                    print("DROITE")
                elif event.key == K_LEFT:
                    Jeu().gauche()
                    print("GAUCHE")
                elif event.key == K_DOWN:
                    Jeu().bas()
                    print("BAS")
                elif event.key == K_UP:
                    Jeu().haut()
                    print("HAUT")
                elif event.key == K_SPACE:
                    Jeu().saute()
                    print("SAUT")
        return self.rep


if __name__ == '__main__':
    while 1:
        if Controleur().tick() == 0:
            exit()
        Jeu().refresh()