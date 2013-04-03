import os
import pygame
import pygame.mixer
from pygame.locals import *
pygame.init()
pygame.mixer.init(44100)
pygame.key.set_repeat(15, 15)


class Vue():
    def __init__(self, parent):
        self.parent = parent
        self.fenetre = pygame.display.set_mode((1280, 816), RESIZABLE)
        self.fond = pygame.image.load("img/falcon.jpg").convert()
        self.solo = pygame.image.load("img/han-solo75.png").convert_alpha()
        self.jabba = pygame.image.load("img/jabba100.png").convert_alpha()
        self.ackbar = pygame.image.load("img/ackbar70.png").convert_alpha()
        self.posSolo = self.solo.get_rect()
        self.posJabba = self.jabba.get_rect()
        self.posAckbar = self.ackbar.get_rect()

    def refresh(self):
        posSolo = self.parent.modele.fred.position
        posJabba = self.parent.modele.droneS.position
        posAckbar = self.parent.modele.droneA.position
        self.fenetre.blit(self.fond, (0, 0))
        self.fenetre.blit(self.solo, (posSolo[0], posSolo[1]))
        self.fenetre.blit(self.jabba, (posJabba[0], posJabba[1]))
        self.fenetre.blit(self.ackbar, (posAckbar[0], posAckbar[1]))
        pygame.display.flip()