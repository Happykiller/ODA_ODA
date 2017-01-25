---
title: Librairie cliente (Javascript)
template: lib_client

---

# Carte de la librairie client
<pre>
$
|-- <a href='#' onclick='getUrlForFunction("$.Oda =");'>Oda</a>
    |-- <a href='#' onclick='getUrlForFunction("version:");'>version</a>
    |-- <a href='#' onclick='getUrlForFunction("Session:");'>Session</a>
    |-- <a href='#' onclick='getUrlForFunction("SessionDefault:");'>SessionDefault</a>
    |-- Context
    |    |-- modeInterface
    |    |-- ModeExecution
    |    |    |---init
    |    |    |---scene
    |    |    |---notification
    |    |    |---message
    |    |    |---rooter
    |    |    |---app
    |    |    +---footer
    |    |-- debug
    |    |-- vendorName
    |    |-- rootPath|
    |    |-- projectLabel
    |    |-- mainDiv
    |    |-- host
    |    |-- rest
    |    |-- resources
    |    |-- window
    |    |-- console
    |    +-- startDate
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
    |    +-- save({key,attrs,datas})
    |-- Loader
    |    |-- Status
    |    |-- iterator
    |    |-- buffer
    |    |-- eltAlreadyLoad
    |    |-- load(params)
    |    |-- loading(params)
    |    |-- loadingGrp(params)
    |    +-- loadingElt(params)
    |-- Mobile
    |    |-- funcReturnGPSPosition
    |    |-- funcReturnCaptureImg
    |    |-- networkState
    |    |-- positionGps
    |    |    |- coords
    |    |    |    |- latitude
    |    |    |    |- longitude
    |    |    |    |- altitude
    |    |    |    |- accuracy
    |    |    |    |- altitudeAccuracy
    |    |    |    |- heading
    |    |    |    +- speed
    |    |    |- timestamp
    |    |    +- statut
    |    |-- pictureSource
    |    |-- destinationType
    |    |-- onMobile
    |    |-- onMobileTest
    |    |-- onSuccessGPSPosition(position)
    |    |-- onErrorGPSPosition(error)
    |    |-- onPhotoSuccess(imageData)
    |    |-- onPhotoURISuccess(imageURI)
    |    |-- onPhotoFail(message)
    |    |-- initModuleMobile()
    |    |-- getConnectionString(networkState)
    |    |-- testConnection()
    |    |-- getGpsPosition(onReturn)
    |    |-- getGpsPositionString(position)
    |    |-- getPhotoFromCamera(retourCapture)
    |    +-- getPhotoFromLibrary(retourCapture)
    |-- MokUp
    |    |-- mokup
    |    +-- get(params)
    |-- Event
    |     |-- addListener({name, callback})
    |     +-- send({name, data})
    |-- Date
    |    |-- convertSecondsToTime(second)
    |    |-- getStrDateFR()
    |    |-- getStrDateTimeFrFromUs(dateUs)
    |    |-- getStrDateTime()
    |    |-- getStrDateTimeFrFromUs(dateTimeUs)
    |    +-- dateFormat(date, format)
    |-- Interface
    |    |-- call(params)
    |    |-- callRest(url, tabSetting, tabInput)
    |    |-- Methode
    |    |    |- ajax(params)
    |    |    |- mokup(params)
    |    |    |- cache(params)
    |    |    +- offline(params)
    |    |-- getParameter(params)
    |    |-- getRangs(params)
    |    |-- addStat(params)
    |    |-- sendMail(params)
    |    +-- traceLog(params)
    |-- Display
    |    |-- Polyfill
    |    |    |-- <a href='#' onclick='getUrlForFunction("createHtmlElement:");'>createHtmlElement(params)</a>
    |    |    +-- <a href='#' onclick='getUrlForFunction("extendHtmlElement:");'>extendHtmlElement(params)</a>
    |    |-- jsonToStringSingleQuote(json)
    |    |-- loading(div)
    |    |-- render({id,html})
    |    |-- Menu
    |    |    |-- remove()
    |    |    |-- show()
    |    |    +-- display
    |    |-- MenuSlide
    |    |    |-- remove()
    |    |    |-- show()
    |    |    +-- display
    |    |-- Message
    |    |    |-- hide({id})
    |    |    +-- show() 
    |    |-- Notification
    |    |    |-- create(message, type, time)
    |    |    |-- danger(message)
    |    |    |-- error(message)
    |    |    |-- info(message)
    |    |    |-- load()
    |    |    |-- remove({id})
    |    |    |-- removeAll()
    |    |    |-- success(message)
    |    |    |-- warning(message)
    |    |    +-- id
    |    |-- Popup
    |    |    |-- close({name}
    |    |    |-- closeAll()
    |    |    |-- open({name, size, label, details, footer, callback, callbackParams})
    |    |    +-- iterator
    |    |-- Scene
    |    |    |-- avatar({codeUser, callback})
    |    |    +-- load()
    |    |-- Table
    |    |    +-- <a href='#' onclick='getUrlForFunction("\"createDataTable\":");'>createDataTable({target, data, attribute, option})</a>
    |    +-- TemplateHtml
    |         |-- create({name, scope})
    |         +-- eval({exrp, scope})
    |-- Tooling
    |    |-- timerDebounce
    |    |-- timerThrottle
    |    |-- lastThrottle
    |    |-- checkParams(params, def)
    |    |-- urlDownloadFromServerResources(params)
    |    |-- timeout(func, time, arg)
    |    |-- arrondir(value, precision)
    |    |-- clone(params)
    |    |-- deepEqual(elt1, elt2)
    |    |-- debounce(callback, delay)
    |    |-- decodeHtml(html)
    |    |-- findBetweenWords(params)
    |    |-- replaceAll(params)
    |    |-- clearSlashes(params)
    |    |-- getLangBrowser(params)
    |    |-- getListValeurPourAttribut(params)
    |    |-- isInArray(params)
    |    |-- isUndefined(params)
    |    |-- getMilise(params)
    |    |-- getParameterGet(params)
    |    |-- getParamsLibrary(params)
    |    |-- objectSize(params)
    |    |-- objDataTableFromJsonArray(params)
    |    |-- order(params)
    |    |-- orderInter(params)
    |    |-- pad2(params)
    |    |-- postResources(params)
    |    |-- throttle(params)
    |    |-- detectBrower(params)
    |    |-- isOdaConpatible(params)
    |    |-- merge(params)
    |    +-- filter(params)
    |-- I8n
    |    |-- datas
    |    |-- get(group, tag, options)
    |    |-- getByString(tag)
    |    +-- getByGroupName(groupName)
    |-- Security
    |    |-- auth(params)
    |    |-- loadRight()
    |    +-- logout()
    +-- Worker
    |    |-- lib()
    |    |-- message(cmd, parameter)
    |    |-- initWorker(nameWorker, dataInit, functionCore, fonctionRetour)
    |    +-- terminateWorker(worker)
    |-- Tuto
    |    |-- enable
    |    |-- currentElt
    |    |-- listElt
    |    |-- start()
    |    |-- readed()
    |    +-- show()
    |-- Scope
    |    |-- transform(params)
    |    |-- init(params)
    |    |-- checkInputText(params)
    |    |-- checkInputSelect(params)
    |    +-- Gardian
    |         |-- inventory
    |         |-- add(params)
    |         |-- remove(params)
    |         |-- removeAll(params)
    |         +-- findByElt(params)
    |-- Storage
    |    |-- version
    |    |-- ttl_default
    |    |-- storageKey
    |    |-- isStorageAvaible()
    |    |-- set(key, value, ttl)
    |    |-- get(key, default)
    |    |-- setTtl(key, ttl)
    |    |-- getTtl(key)
    |    |-- remove(key)
    |    |-- reset()
    |    +-- getIndex(filtre)
    |-- Router
    |    |-- current
    |    |-- routes
    |    |-- routerExit
    |    |-- routesAllowed
    |    |-- routeDependencies
    |    |-- routesAllowedDefault
    |    |-- MiddleWares
    |    |-- navigateTo(request)
    |    |-- addRoute(name, routeDef)
    |    |-- addMiddleWare(name, middleWareDef)
    |    |-- addDependencies(name, dependenciesLoad)
    |    |-- loadPartial(params)
    |    |-- startRooter()
    |    +-- routerGo(params)
    |-- Google
    |    |-- sessionState({callback})
    |    +-- startSessionAuth(functionOk, functionKo)
    |-- Log
         |-- info(msg)
         |-- trace(msg)
         |-- debug(msg)
         |-- error(msg)
         +-- warning(msg)
</pre>