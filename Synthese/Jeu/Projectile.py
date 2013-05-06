class Projectile():
    def __init__(self, parent, pos):
        self.vitesse = 1
        self.robot = parent
        self.position = pos

    def tick(self):
        if self.position[0] < self.robot.parent.fred.position[0]:
            self.position[0] += self.vitesse
        if self.position[0] > self.robot.parent.fred.position[0]:
            self.position[0] -= self.vitesse
        if self.position[1] < self.robot.parent.fred.position[1]:
            self.position[1] += self.vitesse
        if self.position[1] > self.robot.parent.fred.position[1]:
            self.position[1] -= self.vitesse

    def reverseTick(self, pos):
        self.position = pos
