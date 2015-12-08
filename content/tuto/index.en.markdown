---
title: Tutorials
template: default
---

# Installation

> !Attention! : il est bon de savoir que le framework Oda peut être utiliser de plusieurs manières

- En tant que simple librairie de méthode
- En tant que framework avec une initiatialisation minimal (i8n, notification, message d'acceuil)
- En tant que framework avec une initiatialisation application (comme précèdament + éléments propre à l'application ses i8n, sa configuration, ses styles, gestion des routes et sa classe)
- En tant que framework avec une initiatialisation application complètement prise en charge par Oda (comme précèdament + mise en place de la scène, menu, thème)

> Ce tutoriel a pour objectif de vous aider à créer une application à partir de zéro.

## Scènario utilisation en tant que simple librairie

1. Créer un fichier bower.json à la racine de votre projet avec en contenu :
```
{
	"name": "appli",
	"version": "0.0.1",
	"homepage": "votre home page",
	"authors": ["Prénom Nom <votreMail>"],
	"description": "une description",
	"keywords": ["keywork"],
	"license": "MIT",
	"private": true,
	"ignore": [
		"**/.*",
		"node_modules"
	],
	"dependencies": {
	  "Oda" : "*"
	}
}
```
2. Avec bower lancer la commande :
* Pour installer bower (Gestionaire de dépendance pour client web) : [ici](http://bower.io/#install-bower)
```
bower update
```
3. Pré-requis :
* Oda client est une exetention de jQuery il est donc nécéssaire de l'importer aussi ;
```
<script src="<bower_components>/jquery/dist/jquery.min.js"></script>
```
4. La librairie est prête à être utilisé
* Dans le header de votre source html :
```
<script src="<bower_components>/Oda/dist/Oda.js"></script>
```
5. Scope utilisable
* Oda client étant sans contexte, seul les méthodes statiques seront utilisables, typiquement comme celle de `$.Oda.Tooling`
> ex : $.Oda.Tooling.getLangBrowser();

## Scènario de deployement du client avec initiatialisation minimal, application, application complètement prise en charge par Oda

1. Créer un fichier `bower.json` à la racine de votre projet avec en contenu :
```
{
  "name": "appli",
  "version": "0.0.1",
  "homepage": "votre home page",
  "authors": ["Prénom Nom <votreMail>"],
  "description": "une description",
  "keywords": ["keywork"],
  "license": "MIT",
  "private": true,
  "ignore": [
    "**/.*",
    "node_modules"
  ],
  "dependencies": {
    "Oda" : "*"
  }
}
```
2. Avec bower lancer la commande :
* Pour installer bower (Gestionaire de dépendance pour client web) : [ici](http://bower.io/#install-bower)
```
bower update
```
3. Pour aider à la création du projet, Oda met à disposition des scripts Gulp, il va donc falloir avoir installer NodeJs.
* Pour installer Node Js (permet d'executer du javascript sur la machine, et gestionnaire de dépendance) : [ici](https://nodejs.org/en/)
4. Importer les dépendances nécéssaire au scripts de deployement
* Aller dans `<bower_components>/Oda/deploy/`
* exécuter la commande pour installer toutes les dépendances
```
npm update
```
5. Script de deployement à executer suivant vos besoin
```
npm run deploy-mini
```
Ou
```
npm run deploy-app
```
Ou
```
npm run deploy-full
```
6. Dans les cas app et full éditer le fichier de configuration `config/config.js`

## Scènario de deployement du serveur

1. Dans la racine de votre projet serveur (peu-être /server/ sur le même environement que le client)
2. Nous aurons besoin de composer (gestionaire de dépendance pour PHP)
* Pour installer composer : [ici](https://getcomposer.org/)
3. Créer un fichier `composer.json`
```
{
  "name": "vendor_name/package_name",
  "description": "description_text",
  "minimum-stability": "stable",
  "license": "proprietary",
  "authors": [
    {
      "name": "author's name",
      "email": "email@example.com"
    }
  ],
  "require": {
    "happykiller/oda": "@dev"
  },
  "autoload": {
    "psr-4": { "Projet\\": "class" }
  }
}
```
4. Exécuter la commande pour mettre à jour les dépendances PHP avec Oda
```
composer update
```
5. Allez dans le dossier `<vendor>/happykiller/oda/deploy/` et lancer la commande
```
php installer.php
```
6. Editer le fichier de configuration `<vendor>/include/config.php`

# Ajouter une route

> Ce tutoriel a pour objectif de créer une nouvelle route.

1. Dans l'application
```
$.Oda.Router.addRoute("chargesContest", {
  "path" : "partials/chargesContest.html",
  "title" : "chargesContest.title",
  "urls" : ["chargesContest"],
  "middleWares" : ["support","auth"]
});
```
2. Ajouter *manuelement* le **droit** `$.Oda.Router.routesAllowed`
```
$.Oda.Router.routesAllowed.push('chargesContest')
```
3. Gestion des droits par $.Oda.Security.loadRight()
  * Rajouter le menu dans la table `api_tab_menu`
```
INSERT INTO `@prefix@api_tab_menu` (`id`, `Description`, `Description_courte`, `id_categorie`, `Lien`) VALUES (NULL, 'Contest charges', 'Contest charges', '98', 'chargesContest');
```
4. Rajouter l'id du menu dans la table `menu_rangs_droit` pour le ou les rangs voulu
```
UPDATE `@prefix@api_tab_menu_rangs_droit` a
INNER JOIN `@prefix@api_tab_menu` b
ON b.`Lien` = 'chargesContest'
INNER JOIN `@prefix@api_tab_rangs` c
ON c.`id` = a.`id_rang`
AND c.`indice` in (1,10)
SET `id_menu` = concat(`id_menu`,b.`id`,';');
```