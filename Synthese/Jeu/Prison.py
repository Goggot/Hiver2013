class Prison():
    def __init__(self, parent):
        self.parent = parent
        self.robotList = {"camera": [], "droneS": [], "droneA": []}
        self.trapList = {"laser": [], "detecteur": []}
        self.projectilList = []
        self.objectList = []
        self.niveauEnCours = 1