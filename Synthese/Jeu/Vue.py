import pygame
from pygame.locals import *
from Controleur import *
pygame.init()


class Jeu():
    def __init__(self):
        self.controleur = Controleur()
        self.modele = self.controleur.modele

        self.fenetre = pygame.display.set_mode((750, 770), RESIZABLE)
        self.fond = pygame.image.load("img/background.jpg").convert()

        self.fred = pygame.image.load("img/perso.png").convert_alpha()
        self.pos = self.fred.get_rect()

        self.fenetre.blit(self.fond, (0, 0))
        self.fenetre.blit(self.fred, self.pos)

        pygame.key.set_repeat(15, 15)
        pygame.display.flip()

    def haut(self):
        self.pos = self.pos.move(0, -3)

    def bas(self):
        self.pos = self.pos.move(0, +3)

    def gauche(self):
        self.pos = self.pos.move(-3, 0)

    def droite(self):
        self.pos = self.pos.move(3, 0)

    def saute(self):
        self.pos = self.pos.move(0, -3)

    def refresh(self):
        #Re-collage
        self.fenetre.blit(self.fond, (0, 0))
        self.fenetre.blit(self.fred, self.pos)

        #Rafraichissement
        pygame.display.flip()