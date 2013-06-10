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
        self.retour = False
        self.pause = False
        self.fin = False
        self.win = False
        self.count = 0
        self.camXfactor = 20
        self.camYfactor = 20

    def initPartie(self):
    # Ajout des ennemis, les index doivent etre unique

    ### 1ere reserve de garde ### Drone 1 a 16 ###
        self.robotList.get("droneA").append([1, droneA(self.modele, [1940, 350], 'G', False, 1)])
        self.robotList.get("droneA").append([2, droneA(self.modele, [2030, 350], 'G', False, 2)])
        self.robotList.get("droneA").append([3, droneA(self.modele, [2120, 350], 'G', False, 3)])
        self.robotList.get("droneA").append([4, droneA(self.modele, [2210, 350], 'G', False, 4)])
        self.robotList.get("droneA").append([5, droneA(self.modele, [1940, 450], 'G', False, 5)])
        self.robotList.get("droneA").append([6, droneA(self.modele, [2030, 450], 'G', False, 6)])
        self.robotList.get("droneA").append([7, droneA(self.modele, [2120, 450], 'G', False, 7)])
        self.robotList.get("droneA").append([8, droneA(self.modele, [2210, 450], 'G', False, 8)])
        self.robotList.get("droneA").append([9, droneA(self.modele, [1940, 550], 'G', False, 9)])
        self.robotList.get("droneA").append([10, droneA(self.modele, [2030, 550], 'G', False, 10)])
        self.robotList.get("droneA").append([11, droneA(self.modele, [2120, 550], 'G', False, 11)])
        self.robotList.get("droneA").append([12, droneA(self.modele, [2210, 550], 'G', False, 12)])
        self.robotList.get("droneA").append([13, droneA(self.modele, [1940, 650], 'G', False, 13)])
        self.robotList.get("droneA").append([14, droneA(self.modele, [2030, 650], 'G', False, 14)])
        self.robotList.get("droneA").append([15, droneA(self.modele, [2120, 650], 'G', False, 15)])
        self.robotList.get("droneA").append([16, droneA(self.modele, [2210, 650], 'G', False, 16)])
    ###############################################

    ### 2eme reserve de garde ### Drone 17 a 32 ###
        self.robotList.get("droneA").append([17, droneA(self.modele, [1730, 2050], 'G', False, 17)])
        self.robotList.get("droneA").append([18, droneA(self.modele, [1840, 2050], 'G', False, 18)])
        self.robotList.get("droneA").append([19, droneA(self.modele, [1950, 2050], 'G', False, 19)])
        self.robotList.get("droneA").append([20, droneA(self.modele, [1730, 1950], 'G', False, 20)])
        self.robotList.get("droneA").append([21, droneA(self.modele, [1840, 1950], 'G', False, 21)])
        self.robotList.get("droneA").append([22, droneA(self.modele, [1950, 1950], 'G', False, 22)])
        self.robotList.get("droneA").append([23, droneA(self.modele, [1730, 1850], 'G', False, 23)])
        self.robotList.get("droneA").append([24, droneA(self.modele, [1840, 1850], 'G', False, 24)])
        self.robotList.get("droneA").append([25, droneA(self.modele, [1950, 1850], 'G', False, 25)])
        self.robotList.get("droneA").append([26, droneA(self.modele, [1730, 1750], 'G', False, 26)])
        self.robotList.get("droneA").append([27, droneA(self.modele, [1840, 1750], 'G', False, 27)])
        self.robotList.get("droneA").append([28, droneA(self.modele, [1950, 1750], 'G', False, 28)])
        self.robotList.get("droneA").append([29, droneA(self.modele, [1730, 1650], 'G', False, 29)])
        self.robotList.get("droneA").append([30, droneA(self.modele, [1840, 1650], 'G', False, 30)])
        self.robotList.get("droneA").append([31, droneA(self.modele, [1950, 1650], 'G', False, 31)])
    ###############################################

    ### Gardes en fonction ###
        self.robotList.get("droneA").append([0, droneA(self.modele, [1170, 400], 'G', True, 0)])
        self.robotList.get("droneA").append([32, droneA(self.modele, [1600, 850], 'D', True, 32)])
        self.robotList.get("droneA").append([33, droneA(self.modele, [2070, 1450], 'G', True, 33)])
        self.robotList.get("droneA").append([34, droneA(self.modele, [2760, 2230], 'D', True, 34)])
        self.robotList.get("droneA").append([35, droneA(self.modele, [2800, 550], 'G', True, 35)])

        self.robotList.get("droneS").append([0, droneS(self.modele, [1730, 450], 'H', 36)])
        self.robotList.get("droneS").append([1, droneS(self.modele, [2470, 1650], 'B', 37)])
        self.robotList.get("droneS").append([2, droneS(self.modele, [3000, 1750], 'H', 38)])
        self.robotList.get("droneS").append([3, droneS(self.modele, [1150, 1200], 'B', 39)])
        self.robotList.get("droneS").append([4, droneS(self.modele, [1000, 1700], 'H', 40)])
        self.robotList.get("droneS").append([5, droneS(self.modele, [2700, 300], 'B', 41)])
        self.robotList.get("droneS").append([6, droneS(self.modele, [2620, 900], 'H', 42)])
        self.robotList.get("droneS").append([7, droneS(self.modele, [3710, 1200], 'B', 43)])
        self.robotList.get("droneS").append([8, droneS(self.modele, [350, 1150], 'H', 44)])

        self.robotList.get("camera").append([0, camera(self.modele, [1210, 40], 45)])
        self.robotList.get("camera").append([1, camera(self.modele, [120, 2290], 46)])
    ##########################

        self.vue.initGraphJeu()
        self.tick()

    def partie(self):
        if self.retour:
            self.modele.backToTheFuture(self.count)
            self.count -= 1
            if self.count == 0:
                self.retour = False
        else:
            if self.count < 2000:
                self.count += 1
                self.modele.maxCount = self.count
            self.modele.tickGeneral()
        
    def tick(self):
        for event in pygame.event.get():        # On parcours la liste de tous les evenements recus
            if event.type == pygame.QUIT:
                exit()
            elif event.type == pygame.KEYDOWN:
                if event.key == pygame.K_ESCAPE:
                    if self.pause is False:
                        self.pause = True
                    else:
                        self.pause = False

                ## Action Fred
                elif event.key == pygame.K_a or event.key == pygame.K_d or event.key == pygame.K_w or event.key == pygame.K_s or event.key == pygame.K_SPACE:
                    self.modele.fred.bouge(event)
                elif event.key == pygame.K_LSHIFT:
                    self.retour = True

                ## Deplacement de la camera sur la carte ##
                if event.key == pygame.K_LEFT:
                    self.vue.map_x -= -self.camXfactor
                elif event.key == pygame.K_RIGHT:
                    self.vue.map_x -= self.camXfactor
                elif event.key == pygame.K_UP:
                    self.vue.map_y -= -self.camYfactor
                elif event.key == pygame.K_DOWN:
                    self.vue.map_y -= self.camYfactor
                           
        if self.fin is False and self.win is False and self.pause is False:
            self.vue.refreshJeu()
            self.partie()

        elif self.pause:
            self.vue.pause()

        elif self.fin:
            self.vue.failed()

        elif self.win:
            self.vue.win()

    # LINUX :
        #Timer(0.01, self.tick).start()

    # WINDOWS :
        sleep(0.01)
        self.tick()

if __name__ == '__main__':
    c = Controleur()
    start = False
    while start is False:
        c.vue.initAccueil()
        for event in pygame.event.get(): 
            if event.type == pygame.QUIT:
                exit()
            elif event.type == pygame.KEYDOWN:
                if event.key == pygame.K_RETURN:
                    start = True
                    c.initPartie()