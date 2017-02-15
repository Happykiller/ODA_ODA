---
title: Documentation
template: doc
text_lib_client: Library client
text_lib_server: Library server

---

# I8n

> This part concerns the client part

> This section discusses the internationalization

> The mechanism is simple depending on your configuration you have two content files
 `vendor/oda/resources/i8n/i8n.json` in the framework and another in the application `i8n/i8n.json`, that of
   the application that outperforms the framework. In these files you can build for each desired language
   a torque-value tag, group by group.

## Method $.Oda.I8n.get

> This is the basic way to get the value of a tag to the current locale.

1. The settings
* `p_group`: (String) To select the group in which the method will cherger the tag value
* `p_tag`: (String) The tag for which the value is desired
2. The return
* If the tag is found its value will be returned, otherwise the value `Not define`.
3. Example call
```
var tagValue = $.Oda.I8n.get('oda-project','userLabel');
```

# Security

* It is important to understand that the security and human rights based on the concept of rank.
* Each row has an index, the index is used to create a hierarchical structure right.
* Lexicon
- `api_tab_rangs` The table that contains the different ranks with their index
- `api_tab_rang_api` The table that defines the rights for api
- `api_tab_menu_rangs_droit` The table that defines the rights for menus

## Menu & Access to page

> This part concerns the client part

Control access to pages is via the menu, if a page is not on the menu the user has no right to consult.

An exception if the page uses the category (Hidden Links).

Example in the table `api_tab_menu_rangs_droit` we can find:
{{code:tabRangsDroit}}

This means that users who have the rank 5 (visitor by default) can visit the pages with id 1,2,3.

## Key Oda

To secure REST calls between the client and the server, but also ensured SESSION, there is a key `keyAuthODA`.

With this key, the server will know the user and rights.

1. Authentication

To authenticate must be called in the following REST GET:

`<server>/<vendor>/happykiller/oda/resources/api/getAuth.php`

The interface needs:

- login (String): the user code
- mdp (String): the password

The interface will return:

- keyAuthODA (String):  the key to your valid session 12H

2. Secure call

Some interface will be secure, it will then provide more clean settings interface, the key oda `keyAuthODA`.

3. Sign out

To log out you must call the following REST GET:

`<server>/<vendor>/happykiller/oda/resources/api/deleteSession.php`

The interface needs:

- key (String): The session key

## Interface

> This section relates to the server part

### Public mode

All interfaces implemented the class `OdaLibInterface`. At the time of creation we can say that the interface will be public or not.
{{code:buidInterface}}

If the interface is non-public, it will provide a valid Oda key.

### Private interface according to rank

If your interface (eg <myInterface>) is declared private, and in the `api_tab_rang_api` table is reported
restrictions will apply.

Example:
{{code:tabInterfaceRight}

Dans cette exemple il est défini que l'interface qui contient le mot `exemple` (fichier `<server>/api/exemple.php`)
permet pour son mode privé que (car fermé open = `0`) pour les rangs inférieurs ou égale en indice au rang `3` (Responsable).

# Appel REST

> This part concerns the client part

La gestion des appels REST se fait dans le l'extension `$.Oda.Interface`, tout les appels au serveur se feront par cette extension.

## Mèthode callRest

Le méthode `callRest` est la méthode principale pour tout vos appels.

1. Les paramètres
* `p_url`: (chaine de caractère) Cela représente l'url de l'interface (ex: `http://domaine.com/api/interface`)
* `p_tabSetting`: (objet) l'objet contiendra tout les options pour l'appel, il supporte l'ensemble des paramtères de [jQuery.ajax([settings])](http://api.jquery.com/jquery.ajax/)
<ul>
  <li>
     <code>dataType</code>: (String) type du data soumis (ex: 'json')
  </li>
  <li>
     ... (autres paramètres standards)
  </li>
  <li>
     <code>functionRetour</code>: (function(response)) la fonction a exectué en cas de retour réussi, la seul présence de se paramètre suffit à déclarer l'appel <b>synchrone</b> ou <b>asynchrone</b>
  </li>
  <li>
     <code>odaCacheOnDemande</code>: (Boolean) Dans le cas d'une interface avec un cache optionable
  </li>
</ul>
* `p_tabInput`: (objet) l'objet contiendra tout les données nécéssaires ou optionelles pour l'interface

2. Le retour

Si l'appel est synchrone le retour sera du type (objet) contenant la réponse à l'appel, sinon il retourne l'exetention.

3. Exemple d'appel
{{code:callExample}}

## Mode d'interface

Pour une application il est possible de définir un scénario d'utilisation des interfaces. Quatre modes sont disponibles `cache`, `ajax`, `mokup`, `offline`.

La définition de la stratégie se fait par le l'extention: `$.Oda.Context.modeInterface`, il faut choisir qu'elles méthodes seront utilisées et dans quel ordre.

Exemple:
{{code:setModeInterface}}

### Cache

Le mécanisme de mise en cache se fait suivant la configuration contenu dans `cache/cache.json`.

Chaque interface peut être mise en cache. Pour se faire il faut déclarer un objet dans la liste.

Le cache est gérer dans le stockage locale du navigateur (limiter suivant les navigateurs, moins de 5mo).

Les paramètres:
* `key`: (String) la chaine d'identification de l'interface
* `ttl`: (Integer) C'est le temps pendant lequel le cache est valable
* `onDemande`:  (Boolean) Optionel, si il est positioné à vrai alors le cache n'est utilisé que si spécifié dans l'appel. Voir le paramètre `odaCacheOnDemande` de la méthode callRest.

Example:
{{code:cacheSetExample}}

### Mock-up ou maquettte

Ce mécanisme est utilisé pour simuler une interface suivant le configuration contenu dans `mokup/molup.json`

Chaque interface peut utiliser cette fonction, pour l'utiliser il faut déclarer un objet dans la liste.

Les paramètres:
* `interface`: (String) la chaine d'identification de l'interface
* `value`: (Objet) Il s'agit d'une liste pour conditioner les données retourner suivant les paramètres d'appel
<ul>
  <li>
     <code>args</code>: (String | Objet) "default" ou l'objet contenant les paramètres
  </li>
  <li>
     <code>return</code>: (Objet) L'objet attendu en réponse à l'appel
  </li>
</ul>

Example:
{{code:mockupSetExample}}

### Ajax

Il s'agit de l'appel standard.

### Offline

Ce mode permet de renvoyer ce qui est en cache sans restrinction de temps, c'est à dire qu'il ignore le paramètre `ttl` du mode cache.

# Interface

> Cette partie concerne la partie serveur

Pour aider un exemple d'interface est diponible dans `api/exemple.php`.

## Construction

La construction d'une interface se fait en créant un objet `Oda\OdaInterface`.

Le constructeur attends une paramètre de type `Oda\OdaPrepareInterface`.

Les paramètres:
* `modeDebug`: (Boolean) (par défaut faux) à vrai des informations supplémentaires seront fournis à l'exécution.
* `modePublic`: (Boolean) (par défaut vrai) Voir le chapitre sur la sécurité
* `modeSortie`: (Boolean) (par défaut json) Voir le capitre sur le mode de sortie
* `fileName`: (String) (par défaut null) Voir le capitre sur le mode de sortie
* `arrayIntput`: (Array) (par défaut vide) Il s'agit du tableau des paramètres qu'attend l'interface
* `arrayIntputOpt`: (Array) (par défaut vide) Il s'agit du tableau des paramètres optionels pour l'interface, avec leur valeur par défaut

Example:
{{code:buildInerface}}

## Mode de sortie

Les interfaces peuvent être configurer pour renvoyer différent type de contenu.

Pour paramétrer le type de sortie, soit sur l'objet interface avec l'attribut `modeSortie` soit en fournissant le paramètre `ODAFileType`.

Les différents types de sortie:
* `text`: simple texte
* `json`: format standard
* `xml`: restriction sur le format des données, un tableau
* `csv`: restriction sur le format des données, un tableau

## Fichier de sortie

Les interfaces peuvent être configurer pour renvoyer un fichier à la place d'afficher les données.

Pour paramétrer le fichier de sortie, soit sur l'objet interface avec l'attribut `fileName` soit en fournissant le paramètre `ODAFileName`.

## Les paramètres à destination de l'interface

Dans une interface tous les paramètres d'appel sont disponibles dans l'attribut sur l'interface: `inputs`

Exemple:
{{code:getInput}}

## Les reqêtes

Les interfaces Oda permettent une implémentation intégrer pour le requêtage SQL.

Exemple:
{{code:reqInterface}}

* Si dans la configuration du côté serveur, il a été spécifié une extension, il n'est toutefois pas nécessaire de l'indiquer dans le nom des tables.

## La sortie

Pour établir ce que l'interface va afficher en retour de son appel, il faut utiliser des méthodes.

* `addDataReqSQL`: (Oda\OdaRetourReqSql) Un facilitateur pour ajouter le retour des requêtes SQL.
* `addDataObject`: (Objet) Un facilitateur pour ajouter un objet.
* `addDataStr`: (String) Pour ajouter qu'une chaine.
* `dieInError`:  (String) Pour retourner une erreur.

# Modal (Popup)

* Exemple d'implémentation
{{code:implModal}}

# Template HTML

* Dans un fichier HTML (patials, template, index.html) définir un template
{{code:htmlTemplate}}

* The elements between `{{...}}` Are expressions with variables defined in the scope of the template (see below)
* Call the template function and define the scope
{{code:jsTemplate}}

# Formulaire

> This part concerns the client part

## Widgets

### Button
{{code:widgetButton}}

### Checkbox
{{code:widgetCheckbox}}

### Input text
{{code:widgetText}}

### Input select
{{code:widgetSelect}}

## Gardian
* Guards allow you to listen to changes on form fields

Example:
{{code:gardian}}

# Web component
* It is possible to declare web components

## New web component
* This is to create a new html tag

Example utilisation:
{{code:htmlNewWebConponant}}

Example implementation:
{{code:jsNewWebConponant}}

## Enriching an existing component
* This is to create a new attribute for an html tag

Example utilisation :
{{code:htmlEditWebConponant}}

Example implementation
{{code:jsEditWebConponant}}