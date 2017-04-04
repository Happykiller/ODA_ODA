---
title: Documentation
template: doc
text_lib_client: Librairie Cliente
text_lib_server: Librairie Servuer

---

# Mode d'exécution

> Cette partie concerne la partie cliente

## Type d'exécution

* Il existe plusieurs façon d'utiliser le FrameWork Oda.
  * Librairie simple
  * Application 
  * CMS
* Pour configurer le mode de fonctionement voulu il faut ajouter un argument à la ligne d'import du FrameWork.
{{code:modeExecution}}

## Debug

* Il est évident que le dévellopeur pouvoir débugger son travail lui facilitera la vie. 
* Le premier conseil est d'utiliser le FrameWork en version non minifié lors de l'import.
  * Avec cela vous pourrez mieux analyser ce qui se passe dans le FrameWork
{{code:importDebug}}
* Il est possible de faire apparaitre les traces avec `$.Oda.log.debug` en ajoutant à l'importation du FrameWork l'arguement `debug`
{{code:modeDebug}}

# I8n

> Cette partie concerne la partie cliente

> Cette partie traitera de l'internationalisation

* Le mécanisme est simple suivant votre configuration vous disposez de deux fichiers de contenu `vendor/oda/resources/i8n/i8n.json` dans le framework et un autre dans l'application `i8n/i8n.json`, celui de l'application surclasse celui du framework. Dans ces fichiers vous pourrez construire pour chaque langue désirée un couple tag-valeur, regrouper par groupe.

## Mèthode $.Oda.I8n.get

> C'est la méthode de base pour récupérer la valeur d'un tag pour la locale actuelle.

* Les paramètres
  * `p_group` : (chaine de caractère) Pour selectionner le groupe dans lequel la méthode ira cherger la valeur du tag
  * `p_tag` : (chaine de caractère) Le tag pour lequel la valeur est souhaité
* Le retour
  * Si le tag est trouvé sa valeur sera retourné, sinon la valeur `Not define`.


* Exemple d'appel
{{code:getI8n}}

# Securité

* Il est important de comprendre que la sécurité et les droits repose sur la notion de rang.
* Chaque rang possède un indice, l'indice sert à créer une structure de droit hierarchique.
* Lexique
  * `api_tab_rangs` La table qui contient les différents rangs avec leur indice
  * `api_tab_rang_api` La table qui définit les droits pour les api
  * `api_tab_menu_rangs_droit` La table qui définit les droits pour les menus

## Menu & Accés au page

> Cette partie concerne la partie cliente

* Le contrôle des accés aux pages se fait par le menu, si une page n'est pas dans le menu l'utilisateur n'a pas le droit de la consulter.
* Une exception si la page utilise la catégorie (Liens cachés).
* Exemple dans la table `api_tab_menu_rangs_droit` nous pourrions trouver :
{{code:tabRangsDroit}}
* Cela signifie que les utilisateurs qui ont le rang 5 (visiteur par defaut) pourront visiter les pages avec les id 1,2,3.

## Clé Oda

* Pour sécuriser les appels REST entre le client et le server, mais aussi pour assuré la SESSION, il existe une clé `keyAuthODA`.
* Grâce à cette clé, le serveur connaîtra l'utilisateur  et les droits.


* Authentification
  * Pour s'authentifier il faut appeler en GET le REST suivant :
`<server>/<vendor>/happykiller/oda/resources/api/getAuth.php`
  * L'interface demande :
    * login (String) : le code utilisateur
    * mdp (String) : le mot de passe
  * L'interface retournera :
    * keyAuthODA (String) :  la clé de votre session valable 12H
* Appel sécurisé
  * Certaine interface seront sécurisés, il faudra alors fournir en plus des paramètres de propre à l'interface, la clé oda `keyAuthODA`.
* Se déconnecter
  * Pour se déconnecter il faut appeler en GET le REST suivant :
`<server>/<vendor>/happykiller/oda/resources/api/deleteSession.php`
  * L'interface demande :
    * key (String) : La clé de la session

## Sécutité pour les interfaces

> Cette partie concerne la partie serveur

### Mode publique

* Toutes les interfaces implémentent  la class `OdaLibInterface`. Au moment de la création nous pouvons dire si l'interface sera publique ou non.
{{code:buidInterface}}
* Si l'interface est 'non' publique, il faudra fournir un clé Oda valide.

### Interface privé suivant le rang

* Si votre interface (ex : <monInterface>) est déclaré privé, et que dans la table `api_tab_rang_api` elle est déclaré des
restrictions seront appliqués.
* Exemple :
{{code:tabInterfaceRight}
* Dans cette exemple il est défini que l'interface qui contient le mot `exemple` (fichier `<server>/api/exemple.php`)
permet pour son mode privé que (car fermé open = `0`) pour les rangs inférieurs ou égale en indice au rang `3` (Responsable).

# Appel REST

> Cette partie concerne la partie cliente

* La gestion des appels REST se fait dans le l'extension `$.Oda.Interface`, tous les appels au serveur se feront par cette extension.

## Mèthode callRest

* Le méthode `callRest` est la méthode principale pour tous vos appels.


* Les paramètres
  * `p_url` : (chaine de caractère) Cela représente l'url de l'interface (ex : `http://domaine.com/api/interface`)
  * `p_tabSetting` : (objet) l'objet contiendra toutes les options pour l'appel, il supporte l'ensemble des paramtères de [jQuery.ajax([settings])](http://api.jquery.com/jquery.ajax/)
  * `dataType` : (String) type du data soumis (ex : 'json')
  * `...` : (autres paramètres standards)
  * `functionRetour` : (function(response)) la fonction a exéctué en cas de retour réussi, la seul présence de se paramètre suffit à déclarer l'appel **synchrone** ou **asynchrone**
  * `odaCacheOnDemande` : (Boolean) Dans le cas d'une interface avec un cache optionable
  * `p_tabInput` : (objet) l'objet contiendra tout les données nécéssaires ou optionnelles pour l'interface
* Le retour
  * Si l'appel est synchrone le retour sera du type (objet) contenant la réponse à l'appel, sinon il retourne l'exetention.


* Exemple d'appel
{{code:callExample}}

## Mode d'interface

* Pour une application il est possible de définir un scénario d'utilisation des interfaces. Quatre modes sont disponibles `cache`, `ajax`, `mokup`, `offline`.
* La définition de la stratégie se fait par le l'extention : `$.Oda.Context.modeInterface`, il faut choisir qu'elles méthodes seront utilisées et dans quel ordre.


* Exemple :
{{code:setModeInterface}}

### Cache

* Le mécanisme de mise en cache se fait suivant la configuration contenu dans `cache/cache.json`.
* Chaque interface peut être mise en cache. Pour se faire il faut déclarer un objet dans la liste.
* Le cache est gérer dans le stockage locale du navigateur (limiter suivant les navigateurs, moins de 5mo).
* Les paramètres :
  * `key` : (String) la chaine d'identification de l'interface
  * `ttl` : (Integer) C'est le temps pendant lequel le cache est valable
  * `onDemande` :  (Boolean) Optionnel, si il est positionné à vrai alors le cache n'est utilisé que si spécifié dans l'appel. Voir le paramètre `odaCacheOnDemande` de la méthode callRest.


* Exemple :
{{code:cacheSetExample}}

### Mock-up ou maquettte

* Ce mécanisme est utilisé pour simuler une interface suivant le configuration contenu dans `mokup/molup.json`
* Chaque interface peut utiliser cette fonction, pour l'utiliser il faut déclarer un objet dans la liste.
* Les paramètres :
* `interface` : (String) la chaine d'identification de l'interface
* `value` : (Objet) Il s'agit d'une liste pour conditionner les données retourner suivant les paramètres d'appel
  * `args` : (String | Objet) "default" ou l'objet contenant les paramètres
  * `return` : (Objet) L'objet attendu en réponse à l'appel


* Example :
{{code:mockupSetExample}}

### Ajax

* Il s'agit de l'appel standard.

### Offline

* Ce mode permet de renvoyer ce qui est en cache sans restrinction de temps, c'est à dire qu'il ignore le paramètre `ttl` du mode cache.

# Interface serveur

> Cette partie concerne la partie serveur

* Pour aider un exemple d'interface est disponible dans `api/exemple.php`.

## Construction

* La construction d'une interface se fait en créant un objet `Oda\OdaInterface`.
* Le constructeur attends une paramètre de type `Oda\OdaPrepareInterface`.


* Les paramètres :
  * `modeDebug` : (Boolean) (par défaut faux) à vrai des informations supplémentaires seront fournis à l'exécution.
  * `modePublic` : (Boolean) (par défaut vrai) Voir le chapitre sur la sécurité
  * `modeSortie` : (Boolean) (par défaut json) Voir le chapitre sur le mode de sortie
  * `fileName` : (String) (par défaut null) Voir le chapitre sur le mode de sortie
  * `arrayIntput` : (Array) (par défaut vide) Il s'agit du tableau des paramètres qu'attend l'interface
  * `arrayIntputOpt` : (Array) (par défaut vide) Il s'agit du tableau des paramètres optionnels pour l'interface, avec leur valeur par défaut


* Example :
{{code:buildInerface}}

## Mode de sortie

* Les interfaces peuvent être configuré pour renvoyer différent type de contenu.
* Pour paramétrer le type de sortie, soit sur l'objet interface avec l'attribut `modeSortie` soit en fournissant le paramètre `ODAFileType`.
* Les différents types de sortie :
  * `text` : simple texte
  * `json` : format standard
  * `xml` : restriction sur le format des données, un tableau
  * `csv` : restriction sur le format des données, un tableau

## Fichier de sortie

* Les interfaces peuvent être configurer pour renvoyer un fichier à la place d'afficher les données.
* Pour paramétrer le fichier de sortie, soit sur l'objet interface avec l'attribut `fileName` soit en fournissant le paramètre `ODAFileName`.

## Les paramètres à destination de l'interface

* Dans une interface tous les paramètres d'appel sont disponibles dans l'attribut sur l'interface : `inputs`


* Exemple :
{{code:getInput}}

## Les requêtes

* Les interfaces Oda permettent une implémentation intégrer pour le requêtage SQL.


* Exemple :
{{code:reqInterface}}


* Si dans la configuration du côté serveur, il a été spécifié une extension, il n'est toutefois pas nécessaire de l'indiquer dans le nom des tables.

## La sortie

* Pour établir ce que l'interface va afficher en retour de son appel, il faut utiliser des méthodes.
  * `addDataReqSQL` : (Oda\OdaRetourReqSql) Un facilitateur pour ajouter le retour des requêtes SQL.
  * `addDataObject` : (Objet) Un facilitateur pour ajouter un objet.
  * `addDataStr` : (String) Pour ajouter qu'une chaine.
  * `dieInError` :  (String) Pour retourner une erreur.

# Modal (Popup)

* Exemple d'implémentation :
{{code:implModal}}

# Template HTML

* Dans un fichier HTML (patials, template, index.html) définir un template
{{code:htmlTemplate}}
* Les élements entre `{{...}}` sont des expressions avec les variables défini dans le scope du template (voir plus bas)
* Appeler la fonction de template et définir le scope
{{code:jsTemplate}}

# Formulaire

> Cette partie concerne la partie cliente

## Widgets

### Bouton
* Le widget bouton `oda-btn` est géré par un webcomponant, il supporte les options suivantes :
  * `oda-btn-name` : Pour enregistrer l'identifiant et le nom, il y a une vérification d'unicité à la création.
  * `oda-btn-style` : Pour choisir le "style" à appliquer (`primary`, `success`, `info`, `warning`, `danger`), il prendre en compte une balise `class` déclarée.
  * `oda-btn-icon-before` et `oda-btn-icon-after` : Pour ajouter un icon au bouton ([glyphs](http://getbootstrap.com/components/#glyphicons ))
  * `oda-btn-click` : Action Javascript à faire sur le clic
  * `oda-btn-enter` : Pour conférer au bouton l'action click sur la touche "Entrée", la valeur a indiqué permet de gérer si plusieurs bouton avec cette propriétée sont affichés, la priorité la plus haute gagnera.
  * `disabled`: Pour désactiver le bouton
  * Contenu, si le contenu correspond à une recherche I8n il sera remplacé.


* Il faut savoir qu'il est possible d'activer et desactiver les boutons ainsi :
{{code:widgetButtonEnaDisa}}


* Exemple d'implémentation :
{{code:widgetButton}}


### Input text


* Le widget input text `oda-input-text` est géré par un webcomponant, il supporte les options suivantes :
  * `oda-input-text-name` : Pour enregistrer l'identifiant et le nom, il y a une vérification d'unicité à la création.
  * `oda-input-text-type` : Pour choisir le "style" à appliquer (`text`, `password`, `number`, `date`, [att_input_type](http://getbootstrap.com/components/#glyphicons ))
  * `oda-input-text-label` : Pour afficher un label en haut
  * `oda-input-text-value` : Pour initialiser une valeur
  * `oda-input-text-tips` : Pour afficher de l'information en dessous du champ (support le i8n)
  * `oda-input-text-advice` : Pour afficher un bouton d'aide, sur clic un popover affichera le text (support le i8n)
  * `oda-input-text-placeholder` : Pour afficher du text dans le champ (support le i8n)
  * `oda-input-text-check` : Vérifie la syntaxe en se bassant sur une expression régulière, on peux utliser celle déjà déclarer dans le framework
  * `oda-input-text-paste` : Pour bloquer le coller
  * `oda-input-text-debounce` : Pour activier le debounce pour la propagation automatique
  * `oda-input-text-throttle` : Pour activier le throttle pour la propagation automatique
  * `required` : Pour rendre le champ obligatoire


* Exemple d'implémentation :
{{code:widgetText}}


### Input area


* Le widget input area `oda-input-area` est géré par un webcomponant, il supporte les options suivantes :
  * `oda-input-text-name` : Pour enregistrer l'identifiant et le nom, il y a une vérification d'unicité à la création.
  * `oda-input-text-hight` : Pour choisir la hauteur du champs
  * `oda-input-text-label` : Pour afficher un label en haut
  * `oda-input-text-value` : Pour initialiser une valeur
  * `oda-input-text-tips` : Pour afficher de l'information en dessous du champ (support le i8n)
  * `oda-input-text-placeholder` : Pour afficher du text dans le champ (support le i8n)
  * `oda-input-text-check` : Vérifie la syntaxe en se bassant sur une expression régulière, on peux utliser celle déjà déclarer dans le framework
  * `oda-input-text-paste` : Pour bloquer le coller
  * `oda-input-text-debounce` : Pour activier le debounce pour la propagation automatique
  * `oda-input-text-throttle` : Pour activier le throttle pour la propagation automatique
  * `oda-input-text-rich` : Pour avoir la palette d'outil afin de créer du code html enrichie
  * `required` : Pour rendre le champ obligatoire


* Exemple d'implémentation :
{{code:widgetTextArea}}


### Checkbox


* Le widget input checkbox `oda-input-checkbox` est géré par un webcomponant, il supporte les options suivantes :
  * `oda-input-text-name` : Pour enregistrer l'identifiant et le nom, il y a une vérification d'unicité à la création.
  * `oda-input-text-label` : Pour afficher un label en haut
  * `oda-input-text-value` : Pour initialiser une valeur
  * `oda-input-text-tips` : Pour afficher de l'information en dessous du champ (support le i8n)
  * `required` : Pour rendre le champ obligatoire


* Exemple d'implémentation :
{{code:widgetCheckbox}}


### Input select
{{code:widgetSelect}}

## Gardien
* Les gardiens permettent d'écouter des changements sur des champs des formulaires
* Exemple :
{{code:gardian}}

# Tableau

> Cette partie concerne la partie cliente

* La méthode pour l'implémentation d'une table donnée avec (tri, pagination, filtre) est `$.Oda.Display.Table.createDataTable`
* Les paramètres disponibles sont
  * `target` : pour l'id du conteneur
  * `attribute` : json avec `value` et `header` obligatoires, `withFilter`, `align`, `size` sont eux optionels
  * `option`: sert à injecter des paramètres de la librarie `DataTables` comme `aaSorting`
  * `data` : pour les données formater comme : 
{{code:tableData}}

* Exemple d'implémentation :
{{code:table}}

# Web composant
* Il est possible de déclarer des web composants

## Nouveau composant
* Il s'agit de créer de nouvelle balise html


* Exemple utilisation :
{{code:htmlNewWebConponant}}


* Exemple implémentation :
{{code:jsNewWebConponant}}

## Enrichir un composant existant
* Il s'agit de créer un nouvel attribut pour une balise html


* Exemple utilisation :
{{code:htmlEditWebConponant}}


* Exemple implémentation :
{{code:jsEditWebConponant}}