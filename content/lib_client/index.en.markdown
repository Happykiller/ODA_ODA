---
title: Library client (Javascript)
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