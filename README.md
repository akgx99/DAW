# DAW
Projet L3 Développement d'applications web

## Dépendances

* PHP >= 7.4
* composer (https://getcomposer.org/)

## Quick start 

* Démarrer votre serveur Apache
* Créer un fichier `.env` en se basant sur `example.env` avec **vos** informations de connexion
* Dans un terminal à la racine du projet faire un `composer update`
* Rendez-vous sur `localhost/DAW`
* `localhost/DAW/test` devrait vous afficher un jeu de données issu de la table Test de la base de données
* *It just Work !*

## Fonctionalités 

* Réécriture d'URL
* Architecture MVC
* Gestion des erreurs (page 404, 403)
* Cours en ligne
* Quiz avec correction, score et niveau utilisateur
* Forum
* Inscription & et connexion des utilisateurs
* Panel d'administrateur pour gérer les cours, quiz, utilisateurs et catégories des cours
* Deux thèmes

## Problèmes connus

* Le fichier .env ne fonctionne pas sur MAMP (Mac OS) ce qui empêche d'accéder à la base de données. Nous n'avons pas réussi à régler le problème. Cependant il fonctionne très sur Windows avec XAMP, nous l'avons utilisé tout le long du projet sans soucis.

## Ressources 

* https://nouvelle-techno.fr/actualites/live-coding-introduction-au-mvc-en-php
* https://github.com/devcoder-xyz/php-dotenv
