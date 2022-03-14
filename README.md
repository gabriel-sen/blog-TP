# blog-TP
TP  création de blog

Pour run le front : 

1 - Installer Chocolatery : 
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))

2 - Installer Sass : 
choco install sass

3 - Run le sass, commande à lancer das le repo du CSS :
sass --watch index.scss:style.css
