To Do App
===

Contribuez au projet
===

Premièrement
===

Vous allez devoir récuperez le projet sur votre dossier github à vous, pour cela utilisez la fonction fork disponible sur le panneau

![option fork](https://user.oc-static.com/upload/2016/09/19/14742902701046_fork_project.png)

Une fois le "fork" effectué, vous pouvez installer l'application sur votre machine.
Un doute ? Regardez le README.md pour plus d'infos à ce sujet.

Deuxiemement
===

Vous voulez contribuer au projet ? Voici la marche à suivre.
Par exemple si vous modifiez le readme.md faites : 

Avant les modifications, créez une branche.

        git checkout -b readme-modifs

Faites les modifications voulues, puis faites un commit.

        git commit -m "I changed readme.md because i found a mistake"
        
Et de là vous pouvez faire votre push sur votre branche.

        git push origin readme-modifs
        
Proposer les modifications
===

Fini avec les modifications ? Faites une pull request pour apporter les modifications.

![image d'une pull request](https://user.oc-static.com/upload/2016/09/19/14742929911757_PR.png)

Vous avez l'occasion de mettre un message pour expliquer les changements.

Pré-requis
===

Veuillez svp être sûrs de vos changements en analysant votre code.

Suivez les différents PSR : https://www.php-fig.org/psr/
Vous pouvez vous aider d'outils comme Scrutinizer/Codacy ou encore phpcs pour y parvenir.

Réalisez des test unitaires ou fonctionnelles si besoin avec phpunit : https://phpunit.readthedocs.io/fr/latest/


Merci de votre contribution !

