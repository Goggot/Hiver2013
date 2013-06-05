import Modele
import Vue
from Robots import *
print("CONTROLEUR")


class Controleur():
    def __init__(self):
        self.clock = pygame.time.Clock()
            # Pour acceder aux modeles et vues,
            # utiliser ces deux variable comportant le self du controleur pour un transit dans les deux sens
        self.modele = Modele.Modele(self)
        self.robotList = self.modele.prison.robotList
        self.vue = Vue.Vue(self)
        self.rep = 1
        self.init = True
        self.pause = False
        self.count = 0

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
            self.modele.backToTheFuture(self.count)
            self.count -= 1
            if self.count == 0:
                self.pause = False
            print(self.count)
        else:
            self.modele.tickGeneral()
            if self.count < 500:
                self.count += 1
        self.clock.tick(60)
        self.vue.refresh()
        self.partie()


if __name__ == '__main__':
    c = Controleur()
    c.initPartie()