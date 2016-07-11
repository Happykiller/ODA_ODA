---
title: Librairie cliente (Javascript)
template: lib_client

---

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
     |         |- coords
     |         |   |- latitude
     |         |   |- longitude
     |         |   |- altitude
     |         |   |- accuracy
     |         |   |- altitudeAccuracy
     |         |   |- heading
     |         |   +- speed
     |         |- timestamp
     |         +- statut
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
     |    +-- getStrDateTimeFrFromUs(dateTimeUs)
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