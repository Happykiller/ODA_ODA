---
title: Documentation
template: default
---
# I8n

> Cette partie concerne la partie cliente

> Cette partie traitera de l'internationalisation

> Le mécanisme est simple suivant votre configuration vous disposez de deux fichiers de contenu
 `vendor/oda/resources/i8n/i8n.json` dans le framework et un autre dans l'application `i8n/i8n.json`, celui de
  l'application surclasse celui du framework. Dans ces fichiers vous pourrez construire pour chaque langue désirée
  un couple tag-valeur, regrouper par groupe.

## Mèthode $.Oda.I8n.get

> C'est la méthode de base pour récupérer la valeur d'un tag pour la locale actuelle.

1. Les paramètres
* `p_group` : (chaine de caractère) Pour selectioner le groupe dans lequel la méthode ira cherger la valeur du tag
* `p_tag` : (chaine de caractère) Le tag pour lequel la valeur est souhaité
2. Le retour
* Si le tag est trouvé sa valeur sera retourné, sinon la valeur `Not define`.
3. Exemple d'appel
```
var tagValue = $.Oda.I8n.get('oda-project','userLabel');
```

# Securité

* Il est important de comprendre que la sécurité et les droits repose sur la notion de rang.
* Chaque rang possède un indice, l'indice sert à créer une structure de droit hierarchique.
* Lexique
- `api_tab_rangs` La table qui contient les différents rangs avec leur indice
- `api_tab_rang_api` La table qui défini les droits pour les api
- `api_tab_menu_rangs_droit` La table qui défini les droits pour les menus

## Menu & Accés au page

> Cette partie concerne la partie cliente

Le contrôle des accés aux pages se fait par le menu, si une page n'est pas dans le menu l'utilisateur n'a pas le droit de la consulter.

Une exeption si la page utilise la catégorie (Liens chachés).

Exemple dans la table `api_tab_menu_rangs_droit` nous pourrions trouver :
```
| id_rang       | id_menu       |
| ------------- | ------------- |
| 5             | ;1;2;3;       |
```

Cela signifie que les utilisateurs qui ont le rang 5 (visiteur par defaut) pourront visiter les pages avec les id 1,2,3.

## Clé Oda

Pour sécurisé les appels REST entre le client et le server, mais aussi pour assuré la SESSION, il existe une clé `keyAuthODA`.

Grâce à cette clé, le serveur connaîtra l'utilsateur et les droits.

1. Authentification

Pour s'authentifier il faut appeler en GET le REST suivant :

`<server>/<vendor>/happykiller/oda/resources/api/getAuth.php`

L'interface demande :

- login (String) : le code utilisateur
- mdp (String) : le mot de passe

L'interface retournera :

- keyAuthODA (String) :  la clé de votre session valable 12H

2. Appel sécurisé

Certaine interface seront sécurisés, il faudra alors fournir en plus des paramètres de propre à l'interface, la clé oda `keyAuthODA`.

3. Se déconnecter

Pour se déconnecter il faut appeler en GET le REST suivant :

`<server>/<vendor>/happykiller/oda/resources/api/deleteSession.php`

L'interface demande :

- key (String) : La clé de la session

## Interface

> Cette partie concerne la partie server

### Mode publique

Toutes les interfaces implémentes la class `OdaLibInterface`. Au moment de la création nous pouvons dire si l'interface sera publique ou non.

```
//Build the interface
$params = new OdaPrepareInterface();
$params->modePublic = false;
$INTERFACE = new OdaLibInterface($params);
```

Si l'interface est 'non' pulique, il faudra fournir un clé Oda valide.

### Interface privé suivant le rang

Si votre interface (ex : <monInterface>) est déclaré privé, et que dans la table `api_tab_rang_api` elle est déclaré des
restrictions seront appliqués.

Exemple :
```
| interface     | id_rang       | open          |
| ------------- | ------------- | ------------- |
| exemple       | 3             | 0             |
```

Dans cette exemple il est défini que l'interface qui contient le mot `exemple` (fichier `<server>/api/exemple.php`)
permet pour son mode privé que (car fermé open = `0`) pour les rangs inférieurs ou égale en indice au rang `3` (Responsable).

# Appel REST

> Cette partie concerne la partie cliente

La gestion des appels REST se fait dans le l'extension `$.Oda.Interface`, tout les appels au serveur se feront par cette extension.

## Mèthode callRest

Le méthode `callRest` est la méthode principale pour tout vos appels.

1. Les paramètres
* `p_url` : (chaine de caractère) Cela représente l'url de l'interface (ex : `http://domaine.com/api/interface`)
* `p_tabSetting` : (objet) l'objet contiendra tout les options pour l'appel, il supporte l'ensemble des paramtères de [jQuery.ajax([settings])](http://api.jquery.com/jquery.ajax/)
<ul>
  <li>
     <code>dataType</code> : (String) type du data soumis (ex : 'json')
  </li>
  <li>
     ... (autres paramètres standards)
  </li>
  <li>
     <code>functionRetour</code> : (function(response)) la fonction a exectué en cas de retour réussi, la seul présence de se paramètre suffit à déclarer l'appel <b>synchrone</b> ou <b>asynchrone</b>
  </li>
  <li>
     <code>odaCacheOnDemande</code> : (Boolean) Dans le cas d'une interface avec un cache optionable
  </li>
</ul>
* `p_tabInput` : (objet) l'objet contiendra tout les données nécéssaires ou optionelles pour l'interface

2. Le retour

Si l'appel est synchrone le retour sera du type (objet) contenant la réponse à l'appel, sinon il retourne l'exetention.

3. Exemple d'appel
```
var tabInput = { "data1" : "valeur1" };
$.Oda.Interface.callRest("domaine/api/interface", {functionRetour : function(response) {
    $.Oda.Log.trace(response);
}}, tabInput);
```

## Mode d'interface

Pour une application il est possible de définir un scénario d'utilisation des interfaces. Quatre modes sont disponibles `cache`, `ajax`, `mokup`, `offline`.

La définition de la stratégie se fait par le l'extention : `$.Oda.Context.modeInterface`, il faut choisir qu'elles méthodes seront utilisées et dans quel ordre.

Exemple :
```
$.Oda.Context.modeInterface = ["cache","ajax","mokup","offline"]
```

### Cache

Le mécanisme de mise en cache se fait suivant la configuration contenu dans `cache/cache.json`.

Chaque interface peut être mise en cache. Pour se faire il faut déclarer un objet dans la liste.

Le cache est gérer dans le stockage locale du navigateur (limiter suivant les navigateurs, moins de 5mo).

Les paramètres :
* `key` : (String) la chaine d'identification de l'interface
* `ttl` : (Integer) C'est le temps pendant lequel le cache est valable
* `onDemande` :  (Boolean) Optionel, si il est positioné à vrai alors le cache n'est utilisé que si spécifié dans l'appel. Voir le paramètre `odaCacheOnDemande` de la méthode callRest.

Example :
```
{
  "key" : "api/interface",
  "ttl" : 60,
  "onDemande" : true
}
```

### Mock-up ou maquettte

Ce mécanisme est utilisé pour simuler une interface suivant le configuration contenu dans `mokup/molup.json`

Chaque interface peut utiliser cette fonction, pour l'utiliser il faut déclarer un objet dans la liste.

Les paramètres :
* `interface` : (String) la chaine d'identification de l'interface
* `value` : (Objet) Il s'agit d'une liste pour conditioner les données retourner suivant les paramètres d'appel
<ul>
  <li>
     <code>args</code> : (String | Objet) "default" ou l'objet contenant les paramètres
  </li>
  <li>
     <code>return</code> : (Objet) L'objet attendu en réponse à l'appel
  </li>
</ul>

Example :
```
{
  "interface" : "api/interface",
  "value" : [
    {
      "args" : {"param1" : "value1"},
      "return" : {"attr1":1}
    },
    {
      "args" : "default",
      "return" : {"attr1":1}
    }
  ]
}
```

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

Les paramètres :
* `modeDebug` : (Boolean) (par défaut faux) à vrai des informations supplémentaires seront fournis à l'exécution.
* `modePublic` : (Boolean) (par défaut vrai) Voir le chapitre sur la sécurité
* `modeSortie` : (Boolean) (par défaut json) Voir le capitre sur le mode de sortie
* `fileName` : (String) (par défaut null) Voir le capitre sur le mode de sortie
* `arrayIntput` : (Array) (par défaut vide) Il s'agit du tableau des paramètres qu'attend l'interface
* `arrayIntputOpt` : (Array) (par défaut vide) Il s'agit du tableau des paramètres optionels pour l'interface, avec leur valeur par défaut

Example :
```
//Build the interface
$params = new OdaPrepareInterface();
$params->arrayInput = array("code_user","type");
$params->arrayInputOpt = array("option" => null);
$ODA_INTERFACE = new OdaInterface($params);
```

## Mode de sortie

Les interfaces peuvent être configurer pour renvoyer différent type de contenu.

Pour paramétrer le type de sortie, soit sur l'objet interface avec l'attribut `modeSortie` soit en fournissant le paramètre `ODAFileType`.

Les différents types de sortie :
* `text` : simple texte
* `json` : format standard
* `xml` : restriction sur le format des données, un tableau
* `csv` : restriction sur le format des données, un tableau

## Fichier de sortie

Les interfaces peuvent être configurer pour renvoyer un fichier à la place d'afficher les données.

Pour paramétrer le fichier de sortie, soit sur l'objet interface avec l'attribut `fileName` soit en fournissant le paramètre `ODAFileName`.

## Les paramètres à destination de l'interface

Dans une interface tous les paramètres d'appel sont disponibles dans l'attribut sur l'interface : `inputs`

Exemple :
```
$codeUser = $ODA_INTERFACE->inputs["code_user"];
```

## Les reqêtes

Les interfaces Oda permettent une implémentation intégrer pour le requêtage SQL.

Exemple :
```
$params = new OdaPrepareReqSql();
$params->sql = "
SELECT a.`id`
FROM `table` a
WHERE 1=1
AND a.`code_user` = :code_user
;";
$params->bindsValue = [
    "code_user" => $INTERFACE->inputs["code_user"]
];
$params->typeSQL = OdaLibBd::SQL_GET_ALL;
$response = $HOW_INTERFACE->BD_ENGINE->reqODASQL($params);
```

* Si dans la configuration du côté serveur, il a été spécifié une extension, il n'est toutefois pas nécessaire de l'indiquer dans le nom des tables.

## La sortie

Pour établir ce que l'interface va afficher en retour de son appel, il faut utiliser des méthodes.

* `addDataReqSQL` : (Oda\OdaRetourReqSql) Un facilitateur pour ajouter le retour des requêtes SQL.
* `addDataObject` : (Objet) Un facilitateur pour ajouter un objet.
* `addDataStr` : (String) Pour ajouter qu'une chaine.
* `dieInError` :  (String) Pour retourner une erreur.

# Modal (Popup)

* Exemple d'implémentation
```
$.Oda.Display.Popup.open({
    "name" : "pExemple",
    "size" : "lg",
    "label" : $.Oda.I8n.get('group','entete'),
    "details" : strHtml,
    "footer" : '<button type="button" oda-label="oda-main.bt-submit" oda-submit="submit" onclick="$.Oda.App.Controller.Part.submit();" class="btn btn-primary disabled" disabled>Submit</button >',
    "callback" : function(){
        $.Oda.Scope.Gardian.add({
            id : "gEditPatient",
            listElt : ["firstName", "lastName"],
            function : function(e){
                if( ($("#firstName").data("isOk")) && ($("#lastName").data("isOk")) ){
                    $("#submit").removeClass("disabled");
                    $("#submit").removeAttr("disabled");
                }else{
                    $("#submit").addClass("disabled");
                    $("#submit").attr("disabled", true);
                }
            }
        });
    }
});
```

# Template HTML

* Dans un fichier HTML (patials, template, index.html) définir un template
```
<script id="tlpExemple" type="text/template">
    <div>
        {{variable}}
    </div>
</script>
```
* Les élements entre `{{...}}` sont des expressions avec les variables défini dans le scope du template (voir plus bas)
* Appeler la fonction de template et définir le scope
```
var strHtml = $.Oda.Display.TemplateHtml.create({
    template : "tlpExemple"
    , scope : {
        "variable": "Coucou"
    }
});
```

# Formulaire

> Cette partie concerne la partie cliente

## Widgets

### Button
```
<button type="button" oda-submit="submit" onclick="$.Oda.Controler.Auth.goIn();" class="btn btn-primary disabled" disabled><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <label oda-label="oda-main.bt-submit>"></label></button>
```

### Checkbox
```
<div class="form-group">
    <label oda-label="activity.activityModeDay">activity.activityModeDay</label>
    <div class="checkbox">
        <input type="checkbox" oda-input-checkbox="allDay">
        <label oda-label="activity.activityAllDay">
            activity.activityAllDay
        </label>
    </div>
</div>
```

### Input text
```
<div class="form-group">
    <label for="title" oda-label="activity.activityTitle">activity.activityTitle</label>
    <input required type="text" class="form-control" oda-input-text="title" oda-input-text-tips="activity.activityTitle-tips" oda-input-text-placeholder="activity.activityTitle-placeholder" oda-input-text-check="Oda.Regexs:noInjection">
</div>
```

### Input select
```
<div class="form-group">
    <label for="start" oda-label="activity.activityStart">activity.activityStart</label>
    <select class="form-control" oda-input-select="start" required>
        <option value="" oda-label="oda-main.select-default"></option>
        <option value="00:00">00:00</option>
        <option value="00:30">00:30</option>
    </select>
</div>
```

## Gardien

# Client Map

```
$
|-- Oda
     |-- version
     |-- Session
     |-- SessionDefault
     |-- Context
     |      |-- modeInterface
     |      |-- ModeExecution
     |      |        |---init
     |      |        |---scene
     |      |        |---notification
     |      |        |---message
     |      |        |---rooter
     |      |        |---app
     |      |        +---footer
     |      |-- debug
     |      |-- vendorName
     |      |-- rootPath
     |      |-- projectLabel
     |      |-- mainDiv
     |      |-- host
     |      |-- rest
     |      |-- resources
     |      |-- window
     |      |-- console
     |      +-- startDate
     |-- Regexs
     |    |-- mail
     |    |-- login
     |    |-- pass
     |    |-- firstName
     |    |-- lastName
     |    +-- noInjection
     |-- init()
     |-- Controller
     |--App
     |-- Cache
     |    |-- cache
     |    |-- config
     |    |-- clean()
     |    |-- cleanAll()
     |    |-- load({key,attrs,demande})
     |    |-- loadWithOutTtl({key,attrs})
     |    |-- remove({key,attrs})
     |    |-- save({key,attrs,datas})
     |-- Loader
     |    |-- TODO
     |-- Mobile
     |    |-- TODO
     |-- MokUp
     |    |-- TODO
     |-- Event
     |     |-- addListener({name, callback})
     |     +-- send({name, data})
     |-- Date
     |    |-- convertSecondsToTime(second)
     |    |-- getStrDateFR()
     |    |-- getStrDateTimeFrFromUs(dateUs)
     |    |-- getStrDateTime()
     |    +-- getStrDateTimeFrFromUs(dateTimeUs)
     |-- Interface
     |    |-- TODO
     |-- Display
     |      |-- jsonToStringSingleQuote(json)
     |      |-- loading(div)
     |      |-- render({id,html})
     |      |-- Menu
     |      |    |-- remove()
     |      |    |-- show()
     |      |    +-- display
     |      |-- MenuSlide
     |      |    |-- remove()
     |      |    |-- show()
     |      |    +-- display
     |      |-- Message
     |      |     |-- hide({id})
     |      |     +-- show() 
     |      |-- Notification
     |      |        |-- create(message, type, time)
     |      |        |-- danger(message)
     |      |        |-- error(message)
     |      |        |-- info(message)
     |      |        |-- load()
     |      |        |-- remove({id})
     |      |        |-- removeAll()
     |      |        |-- success(message)
     |      |        |-- warning(message)
     |      |        +-- id
     |      |-- Popup
     |      |     |-- close({name}
     |      |     |-- closeAll()
     |      |     |-- open({name, size, label, details, footer, callback, callbackParams})
     |      |     +-- iterator
     |      |-- Scene
     |      |     |-- avatar({codeUser, callback})
     |      |     +-- load()
     |      |-- Table
     |      |     +-- createDataTable({target, data, attribute, option})
     |      +-- TemplateHtml
     |              |-- create({name, scope})
     |              +-- eval({exrp, scope})
     |-- Tooling
     |    |-- TODO
     |-- I8n
     |    |-- TODO
     |-- Security
     |    |-- TODO
     +-- Worker
     |    |-- TODO
     |-- Tuto
     |    |-- TODO
     |-- Scope
     |    |-- TODO
     |-- Storage
     |    |-- TODO
     |-- Router
     |    |-- TODO
     |-- Google
     |     |-- sessionState({callback})
     |     +-- startSessionAuth(functionOk, functionKo)
     |-- Log
```