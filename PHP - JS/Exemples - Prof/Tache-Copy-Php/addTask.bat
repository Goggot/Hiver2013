::Par Jean-Sebastien Fauteux
schtasks /create /tn php_copy /tr C:\Travail\copy.vbs /sc MINUTE /mo 10 /F
mkdir C:\Travail\htdocs
mkdir J:\Web-copy
echo xcopy C:\Travail\htdocs J:\Web-copy /E /Y > C:\Travail\copy_php.bat
xcopy J:\copy.vbs C:\Travail /Y