# oKanban

Cette saison, nous allons coder **oKanban**, un gestionnaire de tâches et listes similaire à Trello.

## Description

"Kanban" (pour la prononciation : カンバン ou 看板 8) ) est un terme japonais qui signifie "panneau" ou "étiquette". Mais assez de langue étrangère pour aujourd'hui !

On voudrait développer notre propre système de kanban parce qu'on ne veut pas utiliser Trello !  
Du coup on souhaite poser la première pierre à l'édifice en créant les _user stories_ et les wireframes de l'application.

> On souhaite produire une application de type Kanban où il est possible de créer des post-it à l'intérieur de listes (comme sur Trello)  
> L'utilisateur peut créer autant de listes qu'il désire et mettre autant de post-it à l'intérieur de ces listes  
> Chaque liste dispose d'un nom
> Chaque post-it dispose d'un titre, d'une position au sein de la liste, d'une couleur (optionnelle) et d'un label (optionnel).

## Front vs Back

Nous allons avoir 2 repo distinct dans ce projet :
- **frontend** en HTML, CSS et Javascript
- **backend** en PHP

La partie _backend_ sera une API permettant au code Javascript de venir interroger ou modifier la base de données sans recharger la page (frontend).

Le code Javascript, grâce à la technologie _Ajax_, va exécuter une requête HTTP (comme le font les navigateurs) sur l'URL d'un _endpoint_ de l'API.

Un _endpoint_ étant une URL, côté PHP, nous lui attribuons une route, un _Controller_ et une méthode de ce _Controller_.

## Challenge

- utiliser le framework codé aujourd'hui en cours comme base pour le développement de la partie backend de cette saison
- compléter le [fichier des users stories](docs/user_stories.md) du projet
- compléter la [documentation de l'API fournie](docs/api_documentation.md) à partir de la description du projet (remplir les cases avec "?")

## Bonus

- coder les routes définies dans la [documentation de l'API](docs/api_documentation.md)
