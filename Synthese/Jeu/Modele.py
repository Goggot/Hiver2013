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
        self.count = 500

    def tickGeneral(self):
        self.listeEvenement.append([0, self.fred.clone, self.fred.position, self.fred.tick()])
        for key in self.robotList:
            for item in self.robotList[key]:
                if item:
                    self.listeEvenement.append([key, item[0], item[1].clone, item[1].tick()])
        #for item in self.projectilList:
            #print(item[0], item[1])
            #self.listeEvenement.append(["projectile", item[1][:], item[1].tick()])

    def backToTheFuture(self):
        if self.count > 0:
            eve = self.listeEvenement.pop(self.count)
            print(eve)
            if eve[0] == 0:
                self.fred = eve[1]
            else:
                aa = self.robotList[eve[0]][eve[1]][1]
                print(aa)
                self.robotList[eve[0]][eve[1]][1] = copy.deepcopy(eve[2])
            self.count -= 1
            self.parent.vue.initGraph()
        else:
            self.parent.pause = False
        print("YAHOUUU ! BACK TO THE FUTUUURE !")
