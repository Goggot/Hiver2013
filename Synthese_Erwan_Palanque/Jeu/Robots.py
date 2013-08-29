import pygame
import random
from Projectile import *
from threading import *
print("ROBOTS")


class Robot():
    def __init__(self):
        self.id = 0
        self.direction = "H"
        self.tabLimite = self.modele.controleur.tabLimite
        self.index = index
       

    def detection(self):
        alert = False
        if (self.position[0] - self.portee) <= (self.modele.fred.position[0] + 30) and (self.position[0] + self.portee) >= (self.modele.fred.position[0]-30):
            if (self.position[1] - self.portee) <= (self.modele.fred.position[1] + 30) and (self.position[1] + self.portee) >= (self.modele.fred.position[1]-30):
                alert = True
                self.etat = True
        return alert


class camera(Robot):
    def __init__(self, parent, pos, index):
        self.modele = parent
        self.portee = 150
        self.position = pos
        self.audio = False
        self.porteeAppel = 1000

    def temps(self):
        self.audio = False

    def tick(self):
        if self.zappe is False:
            if self.detection():
                for key in self.modele.robotList:
                    for item in self.modele.robotList[key]:
                        if key is "droneA":
                            if self.position[0]+self.porteeAppel > item[1].position[0] or self.position[0]-self.porteeAppel < item[1].position[0]:
                                if self.position[1]+self.porteeAppel > item[1].position[1] or self.position[1]-self.porteeAppel < item[1].position[1]:
                                    print(item[1])
                                    item[1].help = True
                                    item[1].posHelp = self.position
                if not self.audio:
                    self.audio = True
                    song = random.randrange(1, 4)
                    if song == 1:
                        pygame.mixer.music.load('music/r2d2/1.mp3')
                    elif song == 2:
                        pygame.mixer.music.load('music/r2d2/2.mp3')
                    elif song == 3:
                        pygame.mixer.music.load('music/r2d2/3.mp3')
                    elif song == 4:
                        pygame.mixer.music.load('music/r2d2/4.mp3')
                    pygame.mixer.music.play()
                    Timer(4.0, self.temps).start()

    def zappe(self):
        print("ZAPPE")
        if self.zappe is False:
            pygame.mixer.music.load('music/shutdown.wav')
            pygame.mixer.music.play()
            self.zappe = True
            Timer(3.0, self.zappe).start()
        else:
            self.zappe = False



class droneS(Robot):
    def __init__(self, parent, pos, direction, index):
        self.position = pos
        self.direction = direction
        self.modele = parent
        self.etat = 0     # Etat d'alerte -> false=RAS, true=alert
        self.energie = 5
        self.portee = 100
        self.audio = False
        self.posInitial = pos[:]
        self.vitesse = 1
        self.porteePatrouille = 80
        self.zappe = False
        self.porteeAppel = 1000

    def bouge(self):
        if self.direction == "H":
            if self.position[1] <= (self.posInitial[1] - self.porteePatrouille):
                self.direction = "B"
            else:
                self.position[1] -= self.vitesse
        else:
            if self.position[1] >= (self.posInitial[1] + self.porteePatrouille):
                self.direction = "H"
            else:
                self.position[1] += self.vitesse

    def mourrir(self):
        pass

    def temps(self):
        self.audio = False

    def tick(self):
        if self.zappe is False:
            self.bouge()
            if self.detection():
                for key in self.modele.robotList:
                    for item in self.modele.robotList[key]:
                        if key is "droneA":
                            if self.position[0]+self.porteeAppel > item[1].position[0] or self.position[0]-self.porteeAppel < item[1].position[0]:
                                if self.position[1]+self.porteeAppel > item[1].position[1] or self.position[1]-self.porteeAppel < item[1].position[1]:
                                    print(item[1])
                                    item[1].help = True
                                    item[1].posHelp = self.position

                if not self.audio:
                    self.audio = True
                    pygame.mixer.music.load('music/alert.mp3')
                    pygame.mixer.music.play()
                    Timer(6.0, self.temps).start()

    def clone(self):
        dict = []
        dict.append(self.position[:])
        dict.append(self.direction[:])
        dict.append(self.etat)
        return dict

    def FuncZappe(self):
        print("ZAPPE")
        if self.zappe is False:
            pygame.mixer.music.load('music/shutdown.wav')
            pygame.mixer.music.play()
            self.zappe = True
            Timer(3.0, self.zappe).start()
        else:
            self.zappe = False


class droneA(Robot):
    def __init__(self, parent, pos, direction, actif, index):
        self.modele = parent
        self.position = pos
        self.direction = direction
        self.etat = 0     # Etat d'alerte -> false=RAS, true=alert
        self.portee = 170
        self.alert = False
        self.posInitial = pos[:]
        self.degats = 1
        self.audio = False
        self.tirer = False
        self.Xfactor = 1
        self.Yfactor = 1
        self.hauteurImage = 20
        self.largeurImage = 20
        self.indexProj = 0
        self.actif = actif
        self.porteePatrouille = 100
        self.help = False
        self.posHelp = []
        self.directionPoursuite = 'D'
        self.zappe = False

    def FuncZappe(self):
        if self.zappe is False:
            pygame.mixer.music.load('music/shutdown.wav')
            pygame.mixer.music.play()
            self.zappe = True
            Timer(3.0, self.FuncZappe).start()
        else:
            self.zappe = False

    def bouge(self):        # position[0] = axe Y
        if not self.alert:
            if self.direction == "G":
                if self.position[0] <= (self.posInitial[0] - self.porteePatrouille):
                    self.direction = "D"
                else:
                    self.position[0] -= self.Xfactor
            else:
                if self.position[0] >= (self.posInitial[0] + self.porteePatrouille):
                    self.direction = "G"
                else:
                    self.position[0] += self.Xfactor

    def attaque(self):      ## Ajout d'un projectile dans la liste de projectile, ainsi que d'une image dans la liste visuelle
        if (self.modele.fred.vie > 0):
            pos = [self.position[0], self.position[1]+50]
            newProj = ProjectileRobot(self, pos, self.direction, self.indexProj)
            self.modele.prison.projectilList.append([self.indexProj, newProj])
            self.modele.controleur.vue.ajoutProjectile(newProj, "red")
            self.indexProj+=1

    def rejoindre(self, posPerso):
        if self.position[0] < posPerso[0]-125:
            self.directionPoursuite = 'D'
            if self.verifLimites() is True:
                self.position[0] += self.Xfactor
        if self.position[0] > posPerso[0]+125:
            self.directionPoursuite = 'G'
            if self.verifLimites() is True:
                self.position[0] -= self.Xfactor
        if self.position[1] < posPerso[1]-125:
            self.directionPoursuite = 'B'
            if self.verifLimites() is True:
                self.position[1] += self.Yfactor
        if self.position[1] > posPerso[1]+125:
            self.directionPoursuite = 'H'
            if self.verifLimites() is True:
                self.position[1] -= self.Yfactor

    def son(self):
        if self.modele.fred.mourru is False:
            self.audio = False

    def tireF(self):
        self.tirer = False

    def tick(self):
        if self.actif is True and self.zappe is False:
            self.bouge()
            if self.detection():
                self.Xfactor = self.Yfactor = 3
                self.rejoindre(self.modele.fred.position)
                self.alert = True

                if not self.tirer:
                    self.tirer = True
                    self.attaque()
                    Timer(2.0, self.tireF).start()

                if not self.audio:
                    self.audio = True
                    pygame.mixer.music.load('music/find.mp3')
                    pygame.mixer.music.play()
                    Timer(5.0, self.son).start()
            else:
                self.alert = False
                self.Xfactor = self.Yfactor = 1

            if self.help is True:
                self.rejoindre(self.posHelp)

    def clone(self):
        dict = []
        dict.append(self.position[:])
        dict.append(self.direction[:])
        dict.append(self.etat)
        dict.append(self.alert)
        return dict

    def verifLimites(self):
        valid = True

            ### CENTRE HAUT ###
        if self.position[0] >= 1300 and self.position[0] <= 2400 and self.position[1] <= 700:
            self.tabLimite = self.modele.tabLimiteHC
            ### CENTRE ###
        elif self.position[0] >= 1300 and self.position[0] <= 2400 and self.position[1] >= 700 and self.position[1] <= 1450:
            self.tabLimite = self.modele.tabLimiteCentre
            ### CENTRE BAS ###
        elif self.position[0] >= 1300 and self.position[0] <= 2400 and self.position[1] >= 1450:
            self.tabLimite = self.modele.tabLimiteMB

            ### GAUCHE HAUT ###
        elif self.position[0] <= 1300 and self.position[1] <= 700:
            self.tabLimite = self.modele.tabLimiteHG
            ### CENTRE GAUCHE ###
        elif self.position[0] <= 1300 and self.position[1] <= 1450 and self.position[1] >= 700:
            self.tabLimite = self.modele.tabLimiteCG
            ### GAUCHE BAS ###
        elif self.position[0] <= 1300 and self.position[1] >= 1450:
            self.tabLimite = self.modele.tabLimiteGB

            ### DROITE HAUT ###
        elif self.position[0] >= 2400 and self.position[1] <= 650:
            self.tabLimite = self.modele.tabLimiteHD
            ### CENTRE DROITE ###
        elif self.position[0] >= 1300 and self.position[1] <= 1450 and self.position[1] >= 650:
            self.tabLimite = self.modele.tabLimiteCD
            ### DROITE BAS ###
        elif self.position[0] >= 2400 and self.position[1] >= 1450:
            self.tabLimite = self.modele.tabLimiteBD


        for p1, p2 in self.tabLimite:
            if self.directionPoursuite is 'G':                                   # Si le drone va vers la gauche
                if self.position[1] >= p1[1] and self.position[1] <= p2[1] and self.position[0]-self.largeurImage >= p1[0]:
                    if self.position[0]-self.largeurImage-self.Xfactor <= p1[0]: # S'il se trouve en face de CE mur
                        valid = False                                               #  et qu'un pas de plus lui fait franchir le mur

            elif self.directionPoursuite is 'D':                                 # Si le drone va vers la droite
                if self.position[1] >= p1[1] and self.position[1] <= p2[1] and self.position[0]+self.largeurImage <= p1[0]:
                    if self.position[0]+self.largeurImage+self.Xfactor >= p1[0]:
                        valid = False

            elif self.directionPoursuite is 'H':                                 # Si le drone va vers le haut
                if self.position[0] >= p1[0] and self.position[0] <= p2[0]  and self.position[1]-self.hauteurImage >= p1[1]:
                    if self.position[1]-self.hauteurImage-self.Yfactor <= p1[1]:
                        valid = False

            elif self.directionPoursuite is 'B':                                 # Si le drone va vers le bas
                if self.position[0] >= p1[0] and self.position[0] <= p2[0] and self.position[1]+self.hauteurImage <= p1[1]:
                    if self.position[1]+self.hauteurImage+self.Yfactor >= p1[1]:
                        valid = False
        return valid