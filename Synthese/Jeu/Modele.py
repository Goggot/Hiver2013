import Fred
import Prison
print("MODELE")

class Modele():
    def __init__(self, parent):
        self.parent = parent
        self.maxCount = 0
        self.listeEvenement = [self.maxCount * [2]]
        self.fred = Fred.Fred(self)
        self.prison = Prison.Prison(self)
        self.robotList = self.prison.robotList
        self.projectilList = self.prison.projectilList

    def tickGeneral(self):
        self.fred.tick()
        self.count = 0
        for key in self.robotList:
            for item in self.robotList[key]:
                if item:
                    if key is not "camera":
                        self.listeEvenement.insert(self.count, [key, item[1].clone(), item[0]])
                    item[1].tick()
                    self.count+=1
                    print(self.count)
        #for item in self.projectilList:
        #    self.listeEvenement.insert(0, ["projectile", item[1].clone()])
        #    item[1].tick()
        self.listeEvenement.insert(0, ['F', self.fred.clone()])
        print(self.listeEvenement[0]+self.listeEvenement[1]+self.listeEvenement[2]+self.listeEvenement[3]+self.listeEvenement[4])

    def backToTheFuture(self, count):
        eve = self.listeEvenement.pop(self.maxCount - count)
        print(eve[0])

        if eve[0] == 'F':
            print("FRED")
            self.fred.vie = eve[1][3]
            self.fred.objectList = eve[1][4]
            self.fred.position = eve[1][0]
            self.fred.direction = eve[1][1]
            self.fred.etat = eve[1][2]
        else:
            self.robotList[eve[0]][eve[2]][1].position = eve[1][0]
            self.robotList[eve[0]][eve[2]][1].direction = eve[1][1]
            self.robotList[eve[0]][eve[2]][1].etat = eve[1][2]
            if eve[0] == 'droneA':
                self.robotList[eve[0]][eve[2]][1].alert = eve[1][3]

        if count == 0:
            self.listeEvenement = None;

        count-=1;

        print("YAHOUUU ! BACK TO THE FUTUUURE !")