import Modele
import Vue
from Robots import *


class Controleur():
    def __init__(self):
            # Pour acceder aux modeles et vues,
            # utiliser ces deux variable comportant le self du controleur pour un transit dans les deux sens
        self.modele = Modele.Modele(self)
        self.robotList = self.modele.prison.robotList
        self.vue = Vue.Vue(self)
        self.rep = 1
        self.init = True
        self.pause = False

    def initPartie(self):
        # Ajout des ennemis
        self.robotList.get("droneA").append([1, droneA(self.modele, [500, 40], 'G')])
        self.robotList.get("droneS").append([2, droneS(self.modele, [950, 380], 'H')])
        self.robotList.get("camera").append([3, camera(self.modele, [600, 500])])
        self.robotList.get("camera").append([4, camera(self.modele, [450, 300])])
        self.robotList.get("droneS").append([6, droneS(self.modele, [650, 380], 'B')])
        c.vue.initGraph()


if __name__ == '__main__':
    c = Controleur()
    init = True
    if init:
        c.initPartie()
        init = False
    while 1:
        if c.pause:
            c.modele.backToTheFuture()
        else:
            c.modele.tickGeneral()
        c.vue.refresh()