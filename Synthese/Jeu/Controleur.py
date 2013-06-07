import Modele
import Vue
from Robots import *
from time import sleep
print("CONTROLEUR")


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
        self.count = 0

    def initPartie(self):
    # Ajout des ennemis
        self.robotList.get("droneA").append([0, droneA(self.modele, [500, 40], 'G')])

        self.robotList.get("droneS").append([0, droneS(self.modele, [950, 380], 'H')])
        self.robotList.get("droneS").append([1, droneS(self.modele, [650, 380], 'B')])

        self.robotList.get("camera").append([0, camera(self.modele, [600, 500])])
        self.robotList.get("camera").append([1, camera(self.modele, [450, 300])])

        self.vue.initGraph()
        self.tick()

    def partie(self):
        if self.pause:
            for event in pygame.event.get():        # On parcours la liste de tous les evenements recus
                if event.type == pygame.QUIT:              # Si un de ces evenements est de type QUIT
                    exit()                                         # On arrete la boucle
                elif event.type == pygame.KEYDOWN:
                    if event.key == 304:
                        self.pause = False

            self.modele.backToTheFuture(self.count)
            self.count -= 1
            
            if self.count == 0:
                self.pause = False
            print(self.count)

        else:
            self.modele.tickGeneral()
            if self.count < 2000:
                self.count += 1
                self.modele.maxCount = self.count
            for event in pygame.event.get():        # On parcours la liste de tous les evenements recus
                if event.type == pygame.QUIT:              # Si un de ces evenements est de type QUIT
                    exit()                          # On arrete la boucle
                elif event.type == pygame.KEYDOWN:       # si une touche du clavier est appuyee
                        if event.key == pygame.K_UP or event.key == pygame.K_SPACE or event.key == pygame.K_DOWN or event.key == pygame.K_LEFT or event.key == pygame.K_RIGHT:
                            self.modele.fred.bouge(event)
                        elif event.key == 304:
                            self.pause = True
                        elif event.key == 306:
                            self.modele.fred.attaque()
                        else:
                            print(event.key)
                        
        
    def tick(self):
        self.vue.refresh()
        self.partie()

    # LINUX :
        Timer(0.01, self.tick).start()

    # WINDOWS :
        #sleep(0.03)
        #self.tick()

if __name__ == '__main__':
    c = Controleur()
    c.initPartie()