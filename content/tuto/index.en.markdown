---
title: Tutorials
template: tuto

---

# Installation

> !Warning! : It is good to know that the Oda framework can be used in several ways

* As a simple method library
* As a framework with minimal initiatization (i8n, notification, welcome message)
* As a framework with an application initiatization (as before + elements specific to the application its i8n, its configuration, its styles, management routes and its class)
* As a framework with an initiatization application completely supported by Oda (as before + setting up the scene, menu, theme)

> This tutorial aims to help you create an application from scratch.

## Scenario use as a simple library

* Create a bower.json file at the root of your project with content: {{code:bowerjson}}
* With bower start the command:
  * To install bower (Web Client Dependency Manager): [ici](http://bower.io/#install-bower)
{{code:bowerupdate}}
* Prerequisites:
  * Oda client is an extension of jQuery so it is necessary to import it too 
{{code:bowerlinkJquery}}
* The library is ready to be used
  * In the header of your source html: 
{{code:bowerlinkOda}}
* Scope usable
  * Oda client being contextless, only static methods will be usable, typically as `$.Oda.Tooling`


* Example: $.Oda.Tooling.getLangBrowser();

## Customer deployment scenario with minimal initialization, application, application fully supported by Oda

* Create a `bower.json` file at the root of your project with content: 
{{code:bowerjson}}
* With bower start the command:
  * To install bower (Web Client Dependency Manager): [ici](http://bower.io/#install-bower) 
{{code:bowerupdate}}
* To help create the project, Oda makes available Gulp scripts, so it will be necessary to install NodeJs.
  * To install Node Js (run javascript on the machine, and dependency manager): [here] (https://nodejs.org/en/)
* Import necessary dependencies to the deployment scripts
  * Go to `<bower_components> / Oda / deploy /`
  * Run command to install all dependencies {{code:npmUpdate}}
* Deployment script to be executed according to your needs

{{code:npmDeployMini}}

Or

{{code:npmDeployApp}}

Or 

{{code:npmDeployFull}}

* In the cases app and full edit the configuration file `config / config.js`

## Server Deployment Scenario

* In the root of your server project (maybe / server / on the same environment as the client)
1. We will need to compose (dependency management for PHP)
  * To install composer: [here] (https://getcomposer.org/)
* Create a `composer.json` file 
{{code:composerJson}}
* Run the command to update the PHP dependencies with Oda 
{{code:composerUpdate}}
* Go to the `<vendor> / happykiller / oda / deploy /` folder and run the command 
{{code:phpInstall}}
* Edit the configuration file `<vendor>/include/config.php`

# Ajouter une route

> This tutorial aims to create a new route.

* In the application
{{code:addRoute}}
* Add *manually* the **right** `$.Oda.Router.routesAllowed` 
{{code:routesAllowed}}
* Management of rights $.Oda.Security.loadRight()
  * Add menu to table `api_tab_menu` 
{{code:addRouteMenu}}
  * The list of default categories: 
{{code:listMenuCate}}
* Add the menu id in the table `menu_rangs_droit` For the desired rank 
{{code:addRouteMenuRight}}
  * The list of default rank: 
{{code:listRank}}

# Add tooltips

![Image of Yaktocat](../content/img/tuto.gif)

> This tutorial aims to create visual aid to guide users

* Declare the content of your tooltips
  * Add div with the `oda-tutorial-content` tag in the desired parts 
{{code:tutoContent}}  
* Decide where to hang
  * Add the `oda-tuto` tag in the code elements
  * id (mandatory)
  * locaction (optional): to position
  * bt-next (optional): to condition its display in the overall sequence 
{{code:tutoAdd}}