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
        self.robotList.get("droneA").append([0, droneA(self.modele, [500, 40], 'G')])

        self.robotList.get("droneS").append([0, droneS(self.modele, [950, 380], 'H')])
        self.robotList.get("droneS").append([1, droneS(self.modele, [650, 380], 'B')])

        self.robotList.get("camera").append([0, camera(self.modele, [600, 500])])
        self.robotList.get("camera").append([1, camera(self.modele, [450, 300])])

        self.vue.initGraph()
        self.partie()

    def partie(self):
        if self.pause:
            self.modele.backToTheFuture()
        else:
            self.modele.tickGeneral()
        self.vue.refresh()
        Timer(0.0030, self.partie).start()


if __name__ == '__main__':
    c = Controleur()
    c.initPartie()