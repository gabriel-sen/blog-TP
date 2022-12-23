# blog-TP
TP  création de blog


STEP 1 : 
Installez Wampserver https://www.wampserver.com/

STEP 2 : 
Placez le projet dans votre repo WWW à la racine de Wampserver 

STEP 3 : 
Crez la BDD dans Wampserver en respectant le nom de la BD qui es dans le repo : "sauvegarde_srv"

STEP 4 : 
Vous pouvez créer un premier administrateur et lui donner le droit d'administrateur via la BDD dans la table user col role.

STEP 5 : 
Vous pouvez créer un user et visiter le site.

Pour run le front : 

1 - Installer Chocolatery : 
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))

2 - Installer Sass : 
choco install sass

3 - Run le sass, commande à lancer das le repo du CSS :
sass --watch index.scss:style.css
