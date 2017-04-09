---
title: Tutorials
template: tuto

---

# Installation

> !Attention! : il est bon de savoir que le framework Oda peut être utiliser de plusieurs manières

* En tant que simple librairie de méthode
* En tant que framework avec une initiatialisation minimal (i8n, notification, message d'acceuil)
* En tant que framework avec une initiatialisation application (comme précèdament + éléments propre à l'application ses i8n, sa configuration, ses styles, gestion des routes et sa classe)
* En tant que framework avec une initiatialisation application complètement prise en charge par Oda (comme précèdament + mise en place de la scène, menu, thème)

> Ce tutoriel a pour objectif de vous aider à créer une application à partir de zéro.

## Scènario utilisation en tant que simple librairie

* Créer un fichier bower.json à la racine de votre projet avec en contenu : 
{{code:bowerjson}}
* Avec bower lancer la commande :
  * Pour installer bower (Gestionnaire de dépendance pour client web) : [ici](http://bower.io/#install-bower){{code:bowerupdate}}
* Pré-requis :
  * Oda client est une extension de jQuery il est donc nécéssaire de l'importer aussi 
{{code:bowerlinkJquery}}
* La librairie est prête à être utilisé
  * Dans le header de votre source html : 
{{code:bowerlinkOda}}
* Scope utilisable
  * Oda client étant sans contexte, seul les méthodes statiques seront utilisables, typiquement comme celle de `$.Oda.Tooling`


* Exemple : $.Oda.Tooling.getLangBrowser();

## Scènario de deployement du client avec initiatialisation minimal, application, application complètement prise en charge par Oda

* Créer un fichier `bower.json` à la racine de votre projet avec en contenu : 
{{code:bowerjson}}
* Avec bower lancer la commande :
  * Pour installer bower (Gestionnaire de dépendance pour client web) : [ici](http://bower.io/#install-bower) 
{{code:bowerupdate}}
* Pour aider à la création du projet, Oda met à disposition des scripts Gulp, il va donc falloir avoir installer NodeJs.
  * Pour installer Node Js (permet d'executer du javascript sur la machine, et gestionnaire de dépendance) : [ici](https://nodejs.org/en/)
* Importer les dépendances nécéssaire au scripts de deployement
  * Aller dans `<bower_components>/Oda/deploy/`
  * exécuter la commande pour installer toutes les dépendances {{code:npmUpdate}}
* Script de déploiement à executer suivant vos besoin

{{code:npmDeployMini}}

Ou

{{code:npmDeployApp}}

Ou 

{{code:npmDeployFull}}


* Dans les cas app et full éditer le fichier de configuration `config/config.js`

## Scènario de deployement du serveur

* Dans la racine de votre projet serveur (peu-être /server/ sur le même environement que le client)
* Nous aurons besoin de composer (gestionaire de dépendance pour PHP)
  * Pour installer composer : [ici](https://getcomposer.org/)
* Créer un fichier `composer.json` {{code:composerJson}}
* Exécuter la commande pour mettre à jour les dépendances PHP avec Oda 
{{code:composerUpdate}}
* Aller dans le dossier `<vendor>/happykiller/oda/deploy/` et lancer la commande 
{{code:phpInstall}}
* Editer le fichier de configuration `<vendor>/include/config.php`

# Ajouter une route

> Ce tutoriel a pour objectif de créer une nouvelle route.

* Dans l'application 
{{code:addRoute}}
*Ajouter *manuellement* le **droit** `$.Oda.Router.routesAllowed` 
{{code:routesAllowed}}
* Gestion des droits par $.Oda.Security.loadRight()
  * Rajouter le menu dans la table `api_tab_menu` 
{{code:addRouteMenu}}
  * La liste des categories par défaut : 
{{code:listMenuCate}}
* Rajouter l'id du menu dans la table `menu_rangs_droit` pour le ou les rangs voulu 
{{code:addRouteMenuRight}}
  * La liste des rangs par défaut: 
{{code:listRank}}

# Ajouter de la guidance

![Image of Yaktocat](../assets/img/tuto.gif)

> Ce tutoriel a pour objectif de créer de l'aide visuel pour guider les utilisateurs

* Déclarer le contenu de vos bulles d'aide
  * Rajouter des div avec la balise `oda-tuto-content` dans les parties voulues 
{{code:tutoContent}}    
* Décider de l'endroit où accrocher
  *  Rajouter la balise `oda-tuto` dans le code des éléments
  * id (obligatoire)
  * locaction (optionel) : pour positionner
  * bt-next (optionel) : pour conditionner son affichage à la séquence globale 
{{code:tutoAdd}}