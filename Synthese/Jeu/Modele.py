import Fred
import Prison
import copy


class Modele():
    def __init__(self, parent):
        self.parent = parent
        self.listeEvenement = [500 * [2]]
        self.fred = Fred.Fred(self)
        self.prison = Prison.Prison(self)
        self.robotList = self.prison.robotList
        self.projectilList = self.prison.projectilList

    def tickGeneral(self):
        self.listeEvenement.append([0, copy.deepcopy(self.fred)])
        self.fred.tick()
        for key in self.robotList:
            for item in self.robotList[key]:
                if item:
                    self.listeEvenement.append([key, item[0], copy.deepcopy(item[1])])
                    item[1].tick()
        for item in self.projectilList:
            self.listeEvenement.append(["projectile", copy.deepcopy(item[1])])
            item[1].tick()

    def backToTheFuture(self, count):
        self.parent.vue.refresh()
        eve = self.listeEvenement.pop(count)
        if eve[0] == 0:
            self.fred = eve[1]
        else:
            ### FAIRE UNE LISTE PAR CLASSE, CONTENANT UNE COPIE [:] DE TOUTES LES VARIABLES,
            ### ET LES RENVOYÉS DANS CHAQUE CLASSES DEJA PRÉSENTE DANS LA LISTE D'ENNEMIS
            self.robotList[eve[0]][eve[1]][1] = eve[2]
        print("YAHOUUU ! BACK TO THE FUTUUURE !")