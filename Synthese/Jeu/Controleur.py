import pygame
from pygame.locals import *
from Modele import *
from Vue import *
import pyglet


class Controleur():
    def __init__(self):
        print("CONTROLEUR")
            # Pour acceder aux modeles et vues,
            # utiliser ces deux variable comportant le self du controleur pour un transit dans les deux sens
        self.modele = Modele(self)
        self.vue = Vue(self)
        self.rep = 1
        self.init = True

    def initPartie(self):
        print("INITPARTIE")
        # Ajout des ennemis
        self.modele.prison.robotList.get("droneA").append(droneA(self))
        self.modele.prison.robotList.get("droneS").append(droneS(self))
        self.modele.prison.robotList.get("camera").append(camera(self))
        print(self.modele.prison.robotList)

    def tick(self):
        print("TICK")
        self.rep = self.modele.fred.tick()
        for key, item in self.modele.prison.robotList.items():
            if item:
                print(key, item)
                item.tick()
        return self.rep


if __name__ == '__main__':
    print("MAIN")
    c = Controleur()
    init = True
    if init:
        c.initPartie()
        init = False
    while 1:
        if c.tick() == 0:
            exit()
        c.vue.refresh()