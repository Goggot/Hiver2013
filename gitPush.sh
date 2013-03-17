#!/bin/bash
cd ./Cegep/Hiver2013/
cp -R /srv/http/ /home/pouet/Cegep/Hiver2013/
git add *
git commit -a -m "Mises à jour auto!"
git push https://github.com/Goggot/Hiver2013.git
echo
echo "				Pouet !"
read
exit
