import pygame
from pygame.locals import *
from Modele import *
from Vue import *
import pyglet


class Controleur():
    def __init__(self):
            # Pour acceder aux modeles et vues,
            # utiliser ces deux variable comportant le self du controleur pour un transit dans les deux sens
        self.modele = Modele(self)
        self.vue = Vue(self)
        self.rep = 1

    def tick(self):
        self.rep = self.modele.fred.tick()
        self.modele.droneS.tick()
        self.modele.droneA.tick()
        return self.rep


if __name__ == '__main__':
    c = Controleur()
    while 1:
        if c.tick() == 0:
            exit()
        c.vue.refresh()