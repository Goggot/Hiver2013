class ProjectileRobot():
    def __init__(self, parent, pos, index):
        self.vitesse = 5
        self.index = index
        self.robot = parent
        self.position = pos
        self.posFred = self.robot.modele.fred.position
        self.projectilList = self.robot.modele.projectilList

    def tick(self):
        if self.position[0] < self.posFred[0]:
            self.position[0] += self.vitesse
        if self.position[0] > self.posFred[0]:
            self.position[0] -= self.vitesse
        if self.position[1] < self.posFred[1]:
            self.position[1] += self.vitesse
        if self.position[1] > self.posFred[1]:
            self.position[1] -= self.vitesse

        if self.position[0] == self.posFred[0] and self.position[1] == self.posFred[1]:
            self.robot.modele.controleur.vue.suppProjectile(self.index)
            del self.projectilList[self.index]

    def clone(self):
        return self.position


class ProjectileFred():
    def __init__(self, parent, pos, direction, index):
        self.index = index
        self.vitesse = 5
        self.fred = parent
        self.posInitiale = pos[:]
        self.position = pos
        self.direction = direction
        self.projectilList = self.fred.modele.projectilList

    def tick(self):
        destroy = None
        if self.direction is "G":
            if self.position[0] > self.posInitiale[0]-100:
                self.position[0] -= self.vitesse
            else:
                destroy = True
        elif self.direction is "D":
            if self.position[0] < self.posInitiale[0]+100:
                self.position[0] += self.vitesse
            else:
                destroy = True

        if destroy is True:
            self.fred.modele.controleur.vue.suppProjectile(self.index)
            del self.projectilList[self.index]

    def clone(self):
        return self.position