# 2CLICK GOOGLE/YOUTUBE DOCUMENTATION

Extension to install a DSGVO / GDPR compliant 2-click-solution for Google Map Iframes and YouTube Iframes in a TYPO3 installation. 

## Einführung

Die Extension “2 Click Google / YouTube” integriert eine DSGVO konforme 2-Click-Lösung für Google Maps und YouTube iframes in eine TYPO3 Installation. 

Die Extension funktioniert in den TYPO3 Versionen 9 und 10.

![Extension View](https://www.mediaconcept-ulm.de/fileadmin/website/cookie_extension/extensionview.png)


## Installation

Die Extension wird über wie gewohnt über „Erweiterungen“ installiert.

![Template view](https://www.mediaconcept-ulm.de/fileadmin/website/cookie_extension/templateview.png)

Rufen Sie nach der Installation „Template“ und „Vollständigen-Template-Datensatz bearbeiten“ auf. Wählen Sie anschließend den Reiter „enthält“ aus.

![Extension View](https://www.mediaconcept-ulm.de/fileadmin/website/cookie_extension/extensionview.png)

Wir empfehlen Ihnen die Extension an unterster Stelle in das das statische Template einzuschließen.  Sollte die TYPO3 Installation mehr als nur eine Sprache enthalten, beachten Sie die zusätzlichen Konfigurationsschritte die unter “Konfiguration Multilanguage” beschrieben werden.

## Konfiguration

Um die Konfiguration abzuschließen, wählen Sie über Liste die Rootseite aus, und klicken auf „+“ 

![List Root Pid View](https://www.mediaconcept-ulm.de/fileadmin/website/cookie_extension/listrootpidview.png)

![Tree Choose Object](https://www.mediaconcept-ulm.de/fileadmin/website/cookie_extension/treechooseobject.png)

Wählen Sie nun MC_Cookie aus.

![Create Object View](https://www.mediaconcept-ulm.de/fileadmin/website/cookie_extension/createobjectview.png)

Passen Sie hier die Texte nach Ihren Bedürfnissen an. Sollten Sie die Texte nicht anpassen haben werden Standardtexte in Deutsch und Englisch angezeigt.

![Object Create View](https://www.mediaconcept-ulm.de/fileadmin/website/cookie_extension/objectcreateview.png)

## Konfiguration Multilanguage

Verwenden Sie zusätzliche Sprachen, müssen Sie weitere Anpassungen vornehmen.

![Multilanguage View](https://www.mediaconcept-ulm.de/fileadmin/website/cookie_extension/multilanguageview.png)

Bearbeiten Sie hierzu wieder den „Vollständigen Template Datensatz“

![Setup View](https://www.mediaconcept-ulm.de/fileadmin/website/cookie_extension/setupview.png)

Passen Sie den Code des Snippets nach Ihren Bedürfnissen an:
-	Locale = XXXX.UTF-8
-	Lang=“xx“

```
[siteLanguage(locale) = en_US.UTF-8]
  config {
    htmlTag_setParams = lang="en" class="no-js"
  }
[end]
```
Passen Sie nun gegebenenfalls das Setup.typoscript an:

![Page View](https://www.mediaconcept-ulm.de/fileadmin/website/cookie_extension/pageview.png)


![Configuration multilanguage](https://www.mediaconcept-ulm.de/fileadmin/website/cookie_extension/configurationmultilanguag.png)

Wenn Sie den Eintrag  lib.rootpid = X sehen, stellen Sie sicher, das X mit der ID Ihrer Rootpage korrespondiert. 
Dieses Snippet hilft Ihnen die Konfiguration für jede Sprache anzupassen.


```
lib.rootpid = ROOTPID

TCEFORM.tx_mccookie_domain_model_cookie.pid_data_privacy_youtube.config.treeConfig.rootUid < lib.rootpid
TCEFORM.tx_mccookie_domain_model_cookie.pid_data_privacy.config.treeConfig.rootUid < lib.rootpid
```

## Iframe Konfiguration

Stellen Sie sicher, dass das attribute src innerhalb des Iframes von “scr” in “data-src” umgeschrieben wird. 

![Create Iframe](https://www.mediaconcept-ulm.de/fileadmin/website/cookie_extension/createiframe.png)

Sollten Sie diese Fehlermeldung erhalten haben Sie das src Attribut noch nicht angepasst.

![Error Message](https://www.mediaconcept-ulm.de/fileadmin/website/cookie_extension/errormss.png)

