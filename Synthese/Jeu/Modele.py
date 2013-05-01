import Fred
import Prison


class Modele():
    def __init__(self, parent):
        self.parent = parent
        self.listeEvenement = [50 * [2]]
        self.fred = Fred.Fred(self)
        self.prison = Prison.Prison(self)
        self.robotList = self.prison.robotList
        self.projectilList = self.prison.projectilList

    def tickGeneral(self):
        self.listeEvenement.append(["fred", self.fred.tick()])
        for key in self.robotList:
            for item in self.robotList[key]:
                if item:
                    self.listeEvenement.append([item[0], item[1], item[1].tick()])
        for item in self.projectilList:
            print(item[0], item[1])
            self.listeEvenement.append(["projectile", item[1], item[1].tick()])

    def backToTheFuture(self):
        self.count = 50
        while self.count > 0:
            eve = self.listeEvenement.pop(self.count)
            print(eve)

            self.count -= 1
        self.parent.pause = False

        print("YAHOUUU ! BACK TO THE FUTUUURE !")