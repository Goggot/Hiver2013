class Piege():
    def __init__(self, parent):
        self.parent = parent
        self.id = 0
        self.posInitial = [0, 0]

    def tick(self):
        pass


class laser(Piege):
    def __init__(self):
        self.degats = 0.5


class detecteur(Piege):
    def __init__(self):
        self.degats = 0.5
        self.portee = 15