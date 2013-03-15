import pygame
from pygame.locals import *

continuer = True
pygame.init()

fenetre = pygame.display.set_mode((750, 770), RESIZABLE)

fond = pygame.image.load("background.jpg").convert()
fenetre.blit(fond, (0, 0))

perso = pygame.image.load("perso.png").convert_alpha()
pos = perso.get_rect()
fenetre.blit(perso, pos)

pygame.key.set_repeat(15, 15)
pygame.display.flip()

while continuer:
    validX = True;
    for event in pygame.event.get():   #On parcours la liste de tous les événements reçus
        if event.type == QUIT:     #Si un de ces événements est de type QUIT
            continuer = False      #On arrête la boucle

        elif event.type == KEYDOWN:     # si une touche du clavier est appuyée
            if event.key == K_RIGHT:
                pos = pos.move(3, 0)
            elif event.key == K_LEFT:
                pos = pos.move(-3, 0)
            elif event.key == K_DOWN:
                if (validX):
                    pos = pos.move(0, +3)
            elif event.key == K_UP:
                pos = pos.move(0,-3)
            elif event.key == K_SPACE:
                pos = pos.move(0, -3)
            print(pos)

            if pos[0] == 340:
                validX = False


#Re-collage
    fenetre.blit(fond, (0,0))
    fenetre.blit(perso, pos)

#Rafraichissement
    pygame.display.flip()