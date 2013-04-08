import pygame
from pygame.locals import *
from Modele import *
from Vue import *


class Controleur():
    def __init__(self):
        print("CONTROLEUR")
            # Pour acceder aux modeles et vues,
            # utiliser ces deux variable comportant le self du controleur pour un transit dans les deux sens
        self.modele = Modele(self)
        self.robotList = self.modele.prison.robotList
        self.vue = Vue(self)
        self.rep = 1
        self.init = True

    def initPartie(self):
        print("INITPARTIE")
        # Ajout des ennemis
        self.robotList.get("droneA").append(droneA(self.modele))
        self.robotList.get("droneS").append(droneS(self.modele))
        self.robotList.get("camera").append(camera(self.modele))

    def tick(self):
        print("TICK")
        self.rep = self.modele.fred.tick()
        for key in self.robotList:
            for item in self.robotList[key]:
                if item:
                    item.tick()
        return self.rep


if __name__ == '__main__':
    print("MAIN")
    c = Controleur()
    c.modele.droneS.tick()
    init = True
    if init:
        c.initPartie()
        init = False
    while 1:
        if c.tick() == 0:
            exit()
        c.vue.refresh()