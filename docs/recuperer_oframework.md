# Etapes à suivre

- me rendre sur le repo GitHub du Framework : https://github.com/O-clock-Lunar/S06-E01-okanban-benoclock
- cloner le repo dans un dossier à part
- copier les sources dans votre projet
    - se placer dans le répertoire du framework cloné
    - `cp -Rf * ../sous-dossier/dossier-projet/`
    - `cp -f .gitignore ../sous-dossier/dossier-projet/`
- se déplacer dans le répertoire du projet
- `composer install`
- créer `app/config.conf` à partir de `app/config.dist.conf`


## Dossiers non affichés par Apache

- Ce problème arrive lorsqu'on dézippe par le logiciel de Linux Mint
- Ouvrir un terminal dans le répertoire du projet
- `chmod -Rf 755 .`