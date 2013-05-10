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
        self.listeEvenement.append([0, copy.copy(self.fred)])
        self.fred.tick()
        for key in self.robotList:
            for item in self.robotList[key]:
                if item:
                    if key is not "camera":
                        self.listeEvenement.append([key, item[1].clone(), item[0]])
                    item[1].tick()
        #for item in self.projectilList:
            #self.listeEvenement.append(["projectile", item[1].clone()])
            #item[1].tick()

    def backToTheFuture(self, count):
    	### FAIRE UNE LISTE PAR CLASSE, CONTENANT UNE COPIE [:] DE TOUTES LES VARIABLES,
        ### ET LES RENVOYÉS DANS CHAQUE CLASSES DEJA PRÉSENTE DANS LA LISTE D'ENNEMIS
        ### dict {position ; direction ; etat}
        ###### Fred {vie ; objectList}
        ######### droneA {alert}

        eve = self.listeEvenement.pop(500-count)
        print(eve)

        if eve[0] == 0:
            #self.fred.vie = eve[1][3]
            #self.fred.objectList = eve[1][4]
            #self.fred.position = eve[1][0]
            #self.fred.direction = eve[1][1]
            #self.fred.etat = eve[1][2]
            pass
        else:
            self.robotList[eve[0]][eve[2]][1].position = eve[1][0][:]
            self.robotList[eve[0]][eve[2]][1].direction = eve[1][1][:]
            self.robotList[eve[0]][eve[2]][1].etat = eve[1][2]
            if eve[0] == 'droneA':
                self.robotList[eve[0]][eve[2]][1].alert = eve[1][3]

        print("YAHOUUU ! BACK TO THE FUTUUURE !")