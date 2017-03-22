---
title: Documentation
template: doc
text_lib_client: Library client
text_lib_server: Library server

---

# Execution mode

> This part concerns the client part

## Execution type

* There are several ways to use the Oda FrameWork.
   * Simple library
   * Application
   * CMS
* To configure the desired operating mode, add an argument to the FrameWork import line.
{{code:modeExecution}}

## Debug

* It is obvious that the developer can debug his work will make his life easier.
* The first tip is to use FrameWork in non-mined version when importing.
   * With this you will be able to better analyze what happens in FrameWork
{{code:importDebug}}
* It is possible to make the traces appear with `$ .Oda.log.debug` by adding to the import of FrameWork the` debug` argument
{{code:modeDebug}}

# I8n

> This part concerns the client part

> This section discusses the internationalization

* The mechanism is simple depending on your configuration you have two content files `vendor/oda/resources/i8n/i8n.json` in the framework and another in the application `i8n/i8n.json`, that of the application that outperforms the framework. In these files you can build for each desired language a torque-value tag, group by group.

## Method $.Oda.I8n.get

> This is the basic way to get the value of a tag to the current locale.

* The settings
  * `p_group`: (String) To select the group in which the method will cherger the tag value
  * `p_tag`: (String) The tag for which the value is desired
* The return
  * If the tag is found its value will be returned, otherwise the value `Not define`.


* Example call
{{code:getI8n}}

# Security

* It is important to understand that the security and human rights based on the concept of rank.
* Each row has an index, the index is used to create a hierarchical structure right.
* Lexicon
  * `api_tab_rangs` The table that contains the different ranks with their index
  * `api_tab_rang_api` The table that defines the rights for api
  * `api_tab_menu_rangs_droit` The table that defines the rights for menus

## Menu & Access to page

> This part concerns the client part

* Control access to pages is via the menu, if a page is not on the menu the user has no right to consult.
* An exception if the page uses the category (Hidden Links).
* Example in the table `api_tab_menu_rangs_droit` we can find:
{{code:tabRangsDroit}}
* This means that users who have the rank 5 (visitor by default) can visit the pages with id 1,2,3.

## Key Oda

* To secure REST calls between the client and the server, but also ensured SESSION, there is a key `keyAuthODA`.
* With this key, the server will know the user and rights.

* Authentication
  * To authenticate must be called in the following REST GET: `<server>/<vendor>/happykiller/oda/resources/api/getAuth.php`
  * The interface needs:
    * login (String): the user code
    * mdp (String): the password
  * The interface will return:
   * keyAuthODA (String):  the key to your valid session 12H
* Secure call
  * Some interface will be secure, it will then provide more clean settings interface, the key oda `keyAuthODA`.
* Sign out
  * To log out you must call the following REST GET:
`<server>/<vendor>/happykiller/oda/resources/api/deleteSession.php`
  * The interface needs:
    * key (String): The session key

## Security for interface

> This section relates to the server part

### Public mode

* All interfaces implemented the class `OdaLibInterface`. At the time of creation we can say that the interface will be public or not.
{{code:buidInterface}}
* If the interface is non-public, it will provide a valid Oda key.

### Private interface according to rank

* If your interface (eg <myInterface>) is declared private, and in the `api_tab_rang_api` table is reported
restrictions will apply.
* Example:
{{code:tabInterfaceRight}
* In this example it is defined that the interface which contains the word `example` (file` <server> / api / exemple.php`) allows for its private mode that (because closed open = `0`) for the lower rows or equal in index to the rank` 3` (Responsible).

# Call REST

> This part concerns the client part

* The management of the REST calls is done in the extension `$ .Oda.Interface`, all the calls to the server will be done by this extension.

## Method callRest

* The `callRest` method is the primary method for all your calls.


* Parameters
  * `p_url`: (String) This is the url of the interface (ex: `http://domaine.com/api/interface`)
  * `p_tabSetting`: (Object) the object will contain all the options for the call, it supports all the parameters of [jQuery.ajax([settings])](http://api.jquery.com/jquery.ajax/)
  * `dataType`: (String) submit data type (ex: 'json')
  * `...` : (Other standard parameters)
  * `functionRetour`: (Function (response)) the function has executed in case of a successful return, the presence of the parameter is sufficient to declare the **synchronous** or **asynchronous**
  * `odaCacheOnDemande`: (Boolean) In the case of an interface with an optionable cache
  * `p_tabInput`: (Object) The object contains all the necessary or optional data for the interface
* The return
  * If the call is synchronous the return will be of the type (object) containing the response to the call, otherwise it returns the exetention.


* Example call
{{code:callExample}}

## Interface mode

For an application it is possible to define a scenario of use of the interfaces. Four modes are available: `cache`,` ajax`, `mokup`,` offline`.

The definition of the strategy is done by the extention: `$ .Oda.Context.modeInterface`, it is necessary to choose which methods will be used and in what order.

Example:
{{code:setModeInterface}}

### Cache

* The caching mechanism is done according to the configuration contained in `cache / cache.json`.
* Each interface can be cached. To do this, you must declare an object in the list.
* The cache is managed in the local storage of the browser (limit according to browsers, less than 5mo).
* The settings:
  * `key`: (String) The interface identification string
  * `ttl`: (Integer) This is the time that the cache is valid
  * `onDemande`:  (Boolean) Optional, if set to true then the cache is used only if specified in the call. See the `odaCacheOnDemande` parameter of the callRest method.


* Example:
{{code:cacheSetExample}}

### Mock-up

* This mechanism is used to simulate an interface according to the configuration contained in `mokup/molup.json`
* Each interface can use this function, to use it it must declare an object in the list.
* Parameters:
* `interface`: (String) The interface identification string
* `value`: (Objet) This is a list to condition the data back according to the call parameters
  * `args`: (String | Objet) "default" or the object containing the parameters
  * `return`: (Objet) The object expected in response to the call


* Example:
{{code:mockupSetExample}}

### Ajax

* This is the standard call.

### Offline

* This mode allows you to return what is cached without time restraint, ie it ignores the `ttl` parameter of the cache mode.

# Interface

> This part concerns the server part

* To help an Interface Example is available in `api/Example.php`.

## Construction

* The construction of an interface is done by creating an object `Oda\OdaInterface`.
* The constructor waits for a type parameter `Oda\OdaPrepareInterface`.

* Parameters:
  * `modeDebug`: (Boolean) (False default) to true additional information will be provided at runtime.
  * `modePublic`: (Boolean) (par défaut vrai) See the chapter on safety
  * `modeSortie`: (Boolean) (par défaut json) See the chapter on output mode
  * `fileName`: (String) (par défaut null) See the chapter on output mode
  * `arrayIntput`: (Array) (par défaut vide) This is the table of parameters that the interface expects
  * `arrayIntputOpt`: (Array) (par défaut vide) This is the table of optional parameters for the interface, with their default value


* Example:
{{code:buildInerface}}

## Output mode

* Interfaces can be configured to send different types of content.
* To set the output type either on the interface object with the `output mode` attribute or by supplying the` ODAFileType` parameter.
* Different types of output:
  * `Text`: simple text
  * `Json`: standard format
  * `Xml`: restriction on data format, array
  * `Csv`: restriction on the format of the data, a table

## Output file

* Interfaces can be configured to return a file instead of displaying the data.
* To set the output file either on the interface object with the `fileName` attribute or by supplying the` ODAFileName` parameter.

## Parameters to the interface

* In an interface all call parameters are available in the attribute on the interface: `inputs`


* Example:
{{code:getInput}}

## The requests

* Oda interfaces allow an embedded implementation for SQL querying.


* Example:
{{code:reqInterface}}


* If an extension has been specified in the server-side configuration, it is not necessary to specify it in the table names.

## The output

* To establish what the interface will display in return for its call, methods must be used.
  * `addDataReqSQL`: (Oda\OdaRetourReqSql) A facilitator to add the return of SQL queries.
  * `addDataObject`: (Objet) A facilitator to add an object.
  * `addDataStr`: (String) To add a string.
  * `dieInError`:  (String) To return an error.

# Modal (Popup)

* Example of implementation
{{code:implModal}}

# Template HTML

* In an HTML file (patials, template, index.html) define a template
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
* Example:
{{code:gardian}}

# Table

> This part concerns the client part

* The method for implementing a given table with (sort, pagination, filter) is `$ .Oda.Display.Table.createDataTable`
* The available parameters are
  * `Target`: for the id of the container
  * `Attribute`: json with` value` and `header` required,` withFilter`, `align`,` size` are optional
  * `Option`: used to inject parameters of the` DataTables` library as `aaSorting`
  * `Data`: for formatting data
{{code:tableData}}

* Implementation example:
{{code:table}}

# Web component
* It is possible to declare web components

## New web component
* This is to create a new html tag


* Example utilisation:
{{code:htmlNewWebConponant}}


* Example implementation:
{{code:jsNewWebConponant}}

## Enriching an existing component
* This is to create a new attribute for an html tag


* Example utilisation:
{{code:htmlEditWebConponant}}


* Example implementation:
{{code:jsEditWebConponant}}