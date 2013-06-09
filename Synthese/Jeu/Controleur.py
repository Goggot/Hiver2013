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
        self.Xfactor = 20
        self.Yfactor = 20

##### Tableaux de limites de niveaux
##### 2 niveaux : le premier contient tous les murs
#####             le deuxieme les coordonnees X,Y des deux points du mur
#####  Les coordonnees doivent etres prises de gauche a droite sur mur horizontal et de haut en bas sur un mur vertical

##### Tableau des limites au centre
        self.tabLimiteCentre = [ [ [1680,1000],[1680,1370] ] , [ [1680,1370],[2100,1370] ] , [ [1680,1000],[1837,1000] ] , [ [1950,1000],[2097,1000] ] , [ [2097,1000],[2100,1370] ] , [ [1300,950],[1300,1450] ] , [ [1300,770],[2315,770] ] , [ [2315,770],[2320,1130] ] , [ [2315,1230],[2315,1450] ] , [ [2315,1130],[2400,1130] ] ]

##### Tableau des limites en bas au milieu
        self.tabLimiteMB = [ [ [1620,1540],[2120,1540] ] , [ [1570,2190],[1750,2190] ] , [ [1980,2190],[2160,2190] ] , [ [2120,1500],[2120,2190] ] , [ [1620,1500],[1620,2190] ] , [ [1375,1450],[1375,2025] ] , [ [2300,1540],[2300,2100] ] , [ [2300,2100],[2400,2100] ] ,  [ [2300,1550],[2400,1550] ] ]

##### Tableau des limites en bas a gauche
        self.tabLimiteGB = [ [ [1220,2020],[1375,2020] ] , [ [1220,2020],[1220,2200] ] , [ [1000,2200],[1220,2200] ] , [ [1000,2130],[1000,2200] ] , [ [1000,2130],[1140,2130] ] , [ [1140,1975],[1140,2130] ] , [ [1140,1000],[1280,1000] ] , [ [1280,1400],[1280,2080] ] , [ [900,1615],[940,1615] ] , [ [940,1615],[940,1800] ] , [ [640,1800],[940,1800] ] , [ [640,1400],[640,1800] ] , [ [900,1615],[900,1720] ] , [ [700,1720],[900,1720] ] , [ [690,1400],[700,1720] ] , [ [900,1400],[900,1290] ] , [ [900,1290],[940,1290] ] , [ [940,1400],[940,1290] ] , [ [210,1910],[450,1910] ] , [ [450,1420],[450,1910] ] , [ [210,1850],[210,1910] ] , [ [210,1850],[400,1850] ] , [ [400,1490],[400,1850] ] , [ [275,1490],[400,1490] ] , [ [275,1490],[275,1785] ] , [ [210,1785],[275,1785] ] , [ [210,1420],[210,1785] ] , [ [210,1420],[450,1420] ] ]

##### Tableau des limites au milieu a gauche
        self.tabLimiteCG = [ [ [650,700],[650,1200] ] , [ [1280,1000],[1280,1400] ] , [ [1140,950],[1140,1000] ] , [ [1140,930],[1300,950] ] , [ [640,1310],[640,1400] ] , [ [640,1310],[890, 1310] ] , [ [890,690],[890,1310] ] , [ [890,690],[1300,690] ] , [ [700,1390],[700,1400] ] , [ [700,1390],[890,1390] ] , [ [890,1390],[890,1400] ] , [ [890,700],[1300,650] ] , [ [450,700],[450,890] ] , [ [220,890],[450,890] ] , [ [220,700],[220,890] ] , [ [260,700],[260,830] ] , [ [260,830],[400,830] ] , [ [400,450],[400,700] ]]

##### Tableau des limites en haut a gauche
        self.tabLimiteHG = [ [ [880,700],[1300,700] ] , [ [660,530],[660,700] ] , [ [400,700],[400,830] ] , [ [660,530],[1300,530] ] , [ [220,390],[450,390] ] , [ [450,390],[450,700] ] , [ [220,520],[220,700] ] , [ [220,550],[270,550] ] , [ [260,520],[260,700] ] , [ [220,450],[400,450] ] , [ [220,390],[220,450] ] , [ [670,200],[670,390] ] , [ [670,200],[1140,200] ] ]

##### Tableau des limites au milieu en haut
        self.tabLimiteHC = [ [ [1300,570],[1650,570] ] , [ [1300,200],[1650,200] ] , [ [1650,200],[1650,570] ] , [ [1300,720],[2400,720] ] , [ [1850,250],[1850,720] ] , [ [1850,250],[2000,250] ] , [ [2250,250],[2400,250] ] , [ [2400,250],[2400,700] ] ]

##### Tableau des limites au milieu a droite
        self.tabLimiteCD = [ [ [2400,700],[2400,1050] ] , [ [2400,1050],[2940,1050] ] , [ [2950,880],[2950,930] ] , [ [2950,1020],[2950,1130] ] , [ [2950,880],[3000,890] ] , [ [3090,890],[3230,890] ] , [ [3230,700],[3230,1130] ] , [ [2400,1130],[3230,1130] ] , [ [2400,1250],[2890,1250] ] , [ [2890,1250],[2890,1320] ] , [ [2770,1320],[2890,1320] ] , [ [2770,1320],[2770,1450] ] , [ [2770,1450],[2810,1450] ] , [ [2850,1450],[3100,1450] ] , [ [3100,1320],[3100,1450] ] , [ [3000,1320],[3100,1320] ] , [ [3000,1250],[3000,1320] ] , [ [3000,1250],[3240,1250] ] , [ [3240,1250],[3240,1250] ] , [ [3450,700],[3450,1450] ] , [ [3610,700],[3610,1450] ] ]

##### Tableau des limites en haut a droite
        self.tabLimiteHD = [ [ [3150,230],[3150,700] ] , [ [3150,230],[3230,230] ] , [ [3230,230],[3230,700] ] , [ [3450,190],[3450,700] ] , [ [3450,190],[3610,190] ] , [ [3610,190],[3610,700] ] , [ [2400,250],[2400,700] ] ]

##### Tableau des limites en bas a droite
        self.tabLimiteBD = [ [ [2400,2100],[3240,2100] ] , [ [3240,1450],[3240,2100] ] , [ [2400,1550],[2450,1550] ] , [ [2570,1450],[2570,1750] ] , [ [2450,1550],[2450,1870] ] , [ [2450,1870],[2910,1870] ] , [ [2910,1870],[2910,2000] ] , [ [2910,2000],[2120,2000] ] , [ [3130,1500],[3130,2000] ] , [ [2910,1500],[2910,1750] ] , [ [2570,1730],[2920,1730] ] , [ [2910,1500],[3130,1500] ] , [ [2910,2000],[3130,2000] ] , [ [2650,1470],[2650,1580] ] , [ [2650,1470],[2810,1470] ] , [ [2850,1470],[2870,1470] ] , [ [2650,1580],[2870,1580] ] , [ [2810,1440],[2810,1470] ] , [ [2850,1440],[2850,1470] ] , [ [3440,1450],[3440,2180] ] , [ [3440,2180],[3610,2180] ] , [ [3610,1450],[3610,2180] ] ]


    def initPartie(self):
    # Ajout des ennemis
        self.robotList.get("droneA").append([0, droneA(self.modele, [1500, 40], 'G')])

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
                    if event.key == pygame.K_a or event.key == pygame.K_SPACE or event.key == pygame.K_w or event.key == pygame.K_d or event.key == pygame.K_s:
                        self.modele.fred.bouge(event)

                ## YAHOUUU ! BACK TO THE FUTUUURE !
                    elif event.key == pygame.K_LSHIFT:
                        self.pause = True

                ## Deplacement de la camera sur la carte ##
                    elif event.key == pygame.K_LCTRL:
                        self.modele.fred.attaque()
                    elif event.key == pygame.K_LEFT:
                        self.vue.map_x -= -self.Xfactor
                    elif event.key == pygame.K_RIGHT:
                        self.vue.map_x -= self.Xfactor
                    elif event.key == pygame.K_UP:
                        self.vue.map_y -= -self.Yfactor
                    elif event.key == pygame.K_DOWN:
                        self.vue.map_y -= self.Yfactor

                ## Impression de la touche si elle n'est pas utilise
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