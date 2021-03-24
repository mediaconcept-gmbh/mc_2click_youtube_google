const dataPrivacyURL = "/datenschutz"; // THIS DATA I NEED THAT THE USER PUT THE INFORMATION OR SOME WAY TO DOING AUTO

const URLGOOGLEMAPS = "www.google.com/maps";
const URLYOUTUBE = "www.youtube.com/embed"; // In the case that is youtube without cookies why dont need

// Adding diferent language message
// It´s obligatory to put the language attr in the HTML

const language = $("html").attr('lang');

const messageLanguage = [];
// Message in German
messageLanguage["de"] = [];

messageLanguage["de"]["google"] = [];

messageLanguage["de"]["google"]["text"] = "Klicken Sie zur Ansicht der Inhalte auf den Link „Aktivieren“. Wir weisen darauf hin, dass nach der Aktivierung Daten an Google übermittelt werden.";
messageLanguage["de"]["google"]["moreInformation"] = [];
messageLanguage["de"]["google"]["moreInformation"]["text"] = "Mehr Informationen";
messageLanguage["de"]["google"]["moreInformation"]["url"] = dataPrivacyURL;
messageLanguage["de"]["google"]["button"] = "Aktivieren";

messageLanguage["de"]["youtube"] = [];

messageLanguage["de"]["youtube"]["text"] = "Klicken Sie zur Ansicht der Inhalte auf den Link „Aktivieren“. Wir weisen darauf hin, dass nach der Aktivierung Daten an Youtube übermittelt werden.";
messageLanguage["de"]["youtube"]["moreInformation"] = [];
messageLanguage["de"]["youtube"]["moreInformation"]["text"] = "Mehr Informationen";
messageLanguage["de"]["youtube"]["moreInformation"]["url"] = dataPrivacyURL;
messageLanguage["de"]["youtube"]["button"] = "Aktivieren";


// Message in English
messageLanguage["en"] = [];

messageLanguage["en"]["google"] = [];

messageLanguage["en"]["google"]["text"] = "Click the „Activate“ link to view the content. We point out that after activation, data will be transmitted to Google.";
messageLanguage["en"]["google"]["moreInformation"] = [];
messageLanguage["en"]["google"]["moreInformation"]["text"] = "More Information";
messageLanguage["en"]["google"]["moreInformation"]["url"] = dataPrivacyURL;
messageLanguage["en"]["google"]["button"] = "Activate";


messageLanguage["en"]["youtube"] = [];

messageLanguage["en"]["youtube"]["text"] = "Click the „Activate“ link to view the content. We point out that after activation, data will be transmitted to Youtube.";
messageLanguage["en"]["youtube"]["moreInformation"] = [];
messageLanguage["en"]["youtube"]["moreInformation"]["text"] = "More Information";
messageLanguage["en"]["youtube"]["moreInformation"]["url"] = dataPrivacyURL;
messageLanguage["en"]["youtube"]["button"] = "Activate";


// If you need to add a new Language only copy and paste

$(document).ready(function () {
  /** I read the cookies for google map or youtube. **/

  // We need to create the div embed-container to the iframe of google or youtube
  $("iframe").each(function (index, element) {
    // We get the src ( url ) to know if is youtube or google maps
    var src = $(element).data("src");

    // We need to check if is google or youtube
    if (typeof src !== 'undefined') {
      if (src.includes(URLGOOGLEMAPS)) {
        addDiv(element);
      } else if (src.includes(URLYOUTUBE)) {
        addDiv(element);
      } else {
        var errorIframe = element.outerHTML;
        errorIframe = errorIframe.replace("src=", "data-src=");
        console.error("Please change the attr src, for data-src. Thank you! :) Copy this code for yours: ", errorIframe);

        errorIframe = "Please change the attr src, for data-src. Thank you! :) Copy this code for yours: " + errorIframe.toString();

        // We create the text and the button
        var cc_message = "<p class='cc_message error'>" + escapeHtml(errorIframe) + "</p>";
        var mapInfo = "<p class='mapinfo'></p>";

        // We add to the iframe
        var divGeneral = "<div class='embed-container'>" + mapInfo + "</div>";
        var parent = $(element).parent();
        $(parent).append(divGeneral);
        $(parent).find(".mapinfo").html(cc_message);
        $(element).remove();
      }
    }
  });

  var origin = window.location.href;   // ALL URL

  // Trying to get all the information from AJAX

  $.post(origin + "?cookiedata=1&lang=" + language, function (data) {
    // We need to check if the customer was seting some text or we going to use the default


    for (var key in data) {

      if (typeof messageLanguage[language] === "undefined") {
        messageLanguage[language] = [];
      }

      if (typeof messageLanguage[language][key] === "undefined") {
        messageLanguage[language][key] = [];
      }

      if (typeof messageLanguage[language][key]["moreInformation"] === "undefined") {
        messageLanguage[language][key]["moreInformation"] = [];
      }


      if (data[key].message !== "" && typeof data[key].message !== 'undefined' && data[key].message != null) {
        messageLanguage[language][key]["text"] = data[key].message;
      }

      if (data[key].textMoreInformation !== "" && typeof data[key].textMoreInformation !== 'undefined' && data[key].textMoreInformation != null) {
        messageLanguage[language][key]["moreInformation"]["text"] = data[key].textMoreInformation;
      }

      if (data[key].pidDataPrivacy !== "" && typeof data[key].pidDataPrivacy !== 'undefined' && data[key].pidDataPrivacy != null && data[key].pidDataPrivacy != 0) {
        messageLanguage[language][key]["moreInformation"]["url"] = data[key].pidDataPrivacy;
      }

      if (data[key].buttonMessage !== "" && typeof data[key].buttonMessage !== 'undefined' && data[key].buttonMessage != null) {
        messageLanguage[language][key]["button"] = data[key].buttonMessage;
      }
    }

    checkCookie();

    $("a.cc_btn.cc_btn_accept_all").click(function () {

      // In puting the code here because when I call the function I DONT KNOW WHY BUT DONT CALL.

      var iframe = $(this).parents(".embed-container").find("iframe");

      // frist we need to know if is google or youtube to create the cookie and after activate all the google maps
      var srcIframe = $(iframe).data("src");

      var option = "";

      if (srcIframe.includes(URLGOOGLEMAPS)) {
        option = "google";
        Cookies.set('mc_cookie_map', 'yes', {expires: 7});
      } else if (srcIframe.includes(URLYOUTUBE)) {
        option = "youtube";
        Cookies.set('mc_cookie_youtube', 'yes', {expires: 7});
      }


      // We create the cookie

      $("iframe").each(function (index, element) {
        // We get the src ( url ) to know if is youtube or google maps
        var src = $(element).data("src");
        var parent = $(element).parents(".embed-container");
        if (typeof src !== 'undefined') {
          // We need to check if is google or youtube
          if (option === "google" && src.includes(URLGOOGLEMAPS)) {
            $(element).attr("src", $(element).data("src"));
            $(parent).addClass("active");
          } else if (option === "youtube" && src.includes(URLYOUTUBE)) {
            $(element).attr("src", $(element).data("src"));
            $(parent).addClass("active");
          }
        }
      });

    });


  });
});

function checkCookie() {
  // Reading the google maps cookies
  var mapsCookie = Cookies.get("mc_cookie_map");
  var haveMapsCookie = true;

  // Reading the youtube cookies
  var youtubeCookie = Cookies.get("mc_cookie_youtube");
  var haveYoutubeCookie = true;


  // We check if have the cookie of google maps

  if (typeof mapsCookie == 'undefined') {
    // We need to block all the iframe with mc_cookie_map
    haveMapsCookie = false;
  }

  if (typeof youtubeCookie == 'undefined') {
    // We need to block all the iframe with youtube
    haveYoutubeCookie = false;
  }


  // If one cookie is not set we need to do a for ( iframe )

  if (!haveMapsCookie || !haveYoutubeCookie) {
    $("iframe").each(function (index, element) {
      // We get the src ( url ) to know if is youtube or google maps
      var src = $(element).data("src");

      // We need to check if is google or youtube

      if (typeof src !== 'undefined') {
        if (src.includes(URLGOOGLEMAPS)) {
          if (!haveMapsCookie) {
            // We need to change the src attr for data-src
            // We need to add the 2 click solution
            $(element).parents(".embed-container").removeClass("active");
            addAcceptCookie(element, src, "google");

          } else {
            activateIframe(element);
          }
        } else if (src.includes(URLYOUTUBE)) {
          if (!haveYoutubeCookie) {
            // We need to add the 2 click solution
            $(element).parents(".embed-container").removeClass("active");
            addAcceptCookie(element, src, "youtube");
          } else {
            activateIframe(element);
          }
        }
      }
    });
  }
}


function addAcceptCookie(element, src, type) {
  // We need to change the src attr for data-src


  // We need to get the father to add the text
  var parentIframe = $(element).parent(".embed-container").get(0);

  // We create the text and the button
  var moreInformation = "<a class='cc_more_info' href='" + messageLanguage[language][type]["moreInformation"]["url"] + "'>" + messageLanguage[language][type]["moreInformation"]["text"] + "</a>"

  var cc_message = "<p class='cc_message'>" + messageLanguage[language][type]["text"] + " " + moreInformation + "</p>";

  var bttn = "<a class='cc_btn cc_btn_accept_all'>" + messageLanguage[language][type]["button"] + "</a>";

  var mapInfo = "<p class='mapinfo'></p>";

  // We add to the iframe
  $(parentIframe).prepend(mapInfo);
  $(parentIframe).find(".mapinfo").prepend(bttn);
  $(parentIframe).find(".mapinfo").prepend(cc_message);
}

function activateIframe(el) {

  var iframe = $(el).parents(".embed-container").find("iframe");

  // frist we need to know if is google or youtube to create the cookie and after activate all the google maps
  var srcIframe = $(iframe).data("src");

  var option = "";

  if (srcIframe.includes(URLGOOGLEMAPS)) {
    option = "google";
    createCookiemc_cookie_map();
  } else if (srcIframe.includes(URLYOUTUBE)) {
    option = "youtube";
    createCookieYoutube();
  }


  // We create the cookie

  $("iframe").each(function (index, element) {
    // We get the src ( url ) to know if is youtube or google maps
    var src = $(element).data("src");
    var parent = $(element).parents(".embed-container");

    // We need to check if is google or youtube
    if (option === "google" && src.includes(URLGOOGLEMAPS)) {
      $(element).attr("src", $(element).data("src"));
      $(parent).addClass("active");
    } else if (option === "youtube" && src.includes(URLYOUTUBE)) {
      $(element).attr("src", $(element).data("src"));
      $(parent).addClass("active");
    }
  });
  // We change the iframe data-src for src
}

function createCookiemc_cookie_map() {
  Cookies.set('mc_cookie_map', 'yes', {expires: 7, secure: true, path: '/'});
}

function createCookieYoutube() {
  Cookies.set('mc_cookie_youtube', 'yes', {expires: 7, secure: true, path: '/'});
}

function addDiv(element) {
  var divGeneral = "<div class='embed-container active'>" + element.outerHTML + "</div>";

  var parent = $(element).parent();
  $(parent).append(divGeneral);

  $(element).remove();
}

function escapeHtml(text) {
  var map = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    "'": '&#039;'
  };

  return text.replace(/[&<>"']/g, function (m) {
    return map[m];
  });
}
