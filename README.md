# Restaurant_Le_Quai_Antique

Ce projet est un site internet pour le restaurant Le Quai Antique. Restaurant savoyard implanté à Chambéry et représenté par le chef Arnaud Michant.


## Installation en local

### Prérequis

Avoir sur son ordinateur :
- composer
- PHP 8
- symfony CLI (possibilité de l'installé en local grâce à Scoop)
- yarn
- serveur local

### Installation

Pour installer le projet, tapez les commandes ci-dessous dans votre terminal :
- php bin/console check:requirements (afin de vérifier que vous êtes prêt à importer le projet) .
- composer install (afin d'installer toutes les dépendances liées au projet).
- yarn install (afin de pouvoir utiliser webpack encore).
- git clone (permet d'importer le projet sur votre ordinateur).
- Rensigner une base de données dans le .env (afin de pouvoir récupérer les données).
- php bin/console doctrine:create:database (afin de créer votre base de données).
- php bin/console doctrine:migration:migrate (afin de récupérer les données du projet).
- php bin/console doctrine:fixtures:load (afin d'importer les fixtures du projets au sein de votre base de données).

### Lancement du server

Pour lancer le server local, tapez dans votre terminal : 
- symfony server:start ou symfony serve -d
Vous pouvez maintenant vous rendre sur le lien renseigné afin d'avoir accès au projet en ligne.
(Pensez à bien démarrer Apache et MySql via le panel de configuration en amont).

Pour arrêter le server local, tapez dans votre terminal : 
- symfony server:stop

### Lancement des tests

Pour lancer les tests, tapez dans votre terminal : 
- php bin/phpunit --testdox (ajoutez --testdox afin d'avoir un rendu plus explicite).

## Comment consulter le site en ligne

Afin de consulter le site en ligne, veuillez vous rendre sur : https://lequaiantique.studio/
