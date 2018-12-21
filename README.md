ToDoList
========

Une application pour gérer efficacement ses tâches !

BUILD
======
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/avenir2point0/projet8/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/avenir2point0/projet8/?branch=master)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/e01e951578cf49a2869fc750dd633986)](https://www.codacy.com/app/avenir2point0/projet8?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=avenir2point0/projet8&amp;utm_campaign=Badge_Grade)

INSTALLATION
=====

Clonez ou téléchargez le projet à l'adresse 

        https://github.com/avenir2point0/projet8.git

Une fois le projet sur votre machine, utilisez composer pour initialiser l'application
Si vous n'avez pas Composer : https://getcomposer.org/

        Composer install

Créez la base de données et initialisez les fixtures

        php bin/console doctrine:database:create
        php bin/console doctrine:schema:update --force
        php bin/console doctrine:fixtures:load

Ensuite demarrez l'application avec : 

        php bin/console server:run
        
Rendez vous sur localhost:8000 dans la barre de recherche du navigateur pour profitez de l'appli !


TEST
=======

Modifiez le fichier .env et modifiez la ligne pour passer en mode test

        env=test
        
Recréez la base de données comme montré plus haut et ensuite lancez les tests avec la commande :

        php bin/phpunit tests\ --coverage-html tests/test-coverage
        
NB : il faut une base de données vide avant de lancer les fixtures, au cas où si vous avez déjà utilisé la base de données de test, lancez :

    php bin/console d:f:l --purge-with-truncate
    
Ensuite, allez dans le dossier test/test-coverage, et ouvez le fichier dashbord.html pour voir les résultats
