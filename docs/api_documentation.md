# Documentation de l'API

| Endpoint | Méthode HTTP | Donnée(s) | Description |
|--|--|--|--|
| `/lists` | GET | - | Récupération des données de toutes les listes |
| `/lists/add` | POST | listName | Ajout d'une liste |
| `/lists/[id]` | GET | - | Récupération des données de la liste dont l'id est fourni |
| `/lists/[id]/update` | POST | listName, pageOrder | Modification des données de la liste dont l'id est fourni |
| `/lists/[id]/delete` | POST | - | Supprimer la liste dont l'id est fourni |
| `/lists/[id]/cards/add` | POST | cardName | Ajout d'un post-it dans la liste dont l'id est fourni |
| `/lists/[id]/cards` | GET | - | Récupération de tous les post-it de la liste dont l'id est fourni |
| `/cards/[id]/update` | POST | cardName, listOrder | Modification des données du post-it dont l'id est fourni |
| `/cards/[id]/delete` | POST | - | Suppression du post-it dont l'id est fourni |
| `/labels` | GET | - | Récupération des données de tous les labels |
| `/labels/add` | POST | labelName | Ajout d'un label |
| `/labels/[id]` | GET | - | Récupération des données du label dont l'id est fourni |
| `/labels/[id]/update` | POST | labelName | Modification des données du label dont l'id est fourni |
| `/labels/[id]/delete` | POST | - | Suppression du label dont l'id est fourni |
| `/cards/[id]/labels` | GET | - | Récupération des labels affectés au post-it dont l'id est fourni |
| `/cards/[id]/labels/add` | POST | labelId | Affectation d'un label au post-it dont l'id est fourni |
| `/cards/[id]/labels/[id]/delete` | POST | - | Désaffectation du label dont l'id est fourni au post-it dont l'id est fourni |