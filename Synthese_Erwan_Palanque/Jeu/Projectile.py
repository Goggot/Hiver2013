class ProjectileRobot():
    def __init__(self, parent, pos, direction, index):
        self.vitesse = 20
        self.index = index
        self.robot = parent
        self.direction = direction
        self.position = pos
        self.posInitiale = pos[:]
        self.posFred = self.robot.modele.fred.position
        self.projectilList = self.robot.modele.projectilList

    def tick(self):
        destroy = None
        if self.direction is "G":
            if self.position[0] > self.posInitiale[0]-200:
                self.position[0] -= self.vitesse
            else:
                destroy = True
        elif self.direction is "D":
            if self.position[0] < self.posInitiale[0]+200:
                self.position[0] += self.vitesse
            else:
                destroy = True

        if (self.position[0] - 15) <= (self.posFred[0] + 15) and (self.position[0] + 15) >= (self.posFred[0] - 15):
            if (self.position[1] - 30) <= (self.posFred[1] + 30) and (self.position[1] + 30) >= (self.posFred[1] - 30):
                destroy = True
                self.robot.modele.fred.vie -= 10

        if destroy is True:
            self.robot.modele.controleur.vue.suppProjectile(self.index, "red")
            del self.projectilList[self.index]
            self.robot.indexProj -= 1


class ProjectileFred():
    def __init__(self, parent, pos, direction, index):
        self.index = index
        self.vitesse = 20
        self.fred = parent
        self.posInitiale = pos[:]
        self.position = pos
        self.direction = direction
        self.projectilList = self.fred.modele.projectilList

    def tick(self):
        destroy = None
        #for ennemi in self.fred.
        if self.direction is "G":
            if self.position[0] > self.posInitiale[0]-200:
                self.position[0] -= self.vitesse
            else:
                destroy = True
        elif self.direction is "D":
            if self.position[0] < self.posInitiale[0]+200:
                self.position[0] += self.vitesse
            else:
                destroy = True

        for key in self.fred.modele.robotList:
            for item in self.fred.modele.robotList[key]:
                if (self.position[0] - 15) <= (item[1].position[0] + 15) and (self.position[0] + 15) >= (item[1].position[0] - 15):
                    if (self.position[1] - 30) <= (item[1].position[1] + 30) and (self.position[1] + 30) >= (item[1].position[1] - 30):
                        destroy = True
                        item[1].FuncZappe()

        if destroy is True:
            self.fred.modele.controleur.vue.suppProjectile(self.index, "green")
            del self.projectilList[self.index]
            self.fred.indexProj -= 1