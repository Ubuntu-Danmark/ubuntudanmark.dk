<?php
//Include wordpress files
$wp_blog_header_path = '';
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/'.'wp-blog-header.php'))
{
    $wp_blog_header_path = $_SERVER['DOCUMENT_ROOT'].'/'.'wp-blog-header.php';
}
    else if(file_exists($_SERVER['DOCUMENT_ROOT'].'/'.'wp-blog-header.php'))
{
    $wp_blog_header_path = $_SERVER['DOCUMENT_ROOT'].'/'.'wp-blog-header.php';
}

if($wp_blog_header_path != '') {
    //Include Wordpress
    include($wp_blog_header_path);
    header("HTTP/1.0 200 OK");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="da-DK" xml:lang="da-DK">
  <head>
    <title>Del filer og mapper med andre computere</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="theme-color" content="#dd4814" />
    <meta name="robots" content="index,follow" />
    <link rel="canonical" href="/support/" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/light-wordpress-theme/style.css" />
    <link rel="pingback" href="/xmlrpc.php" />
    <link rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Feed" href="/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Kommentarfeed" href="/comments/feed/" />
    <link rel="stylesheet" type="text/css" media="print" href="/wp-content/themes/light-wordpress-theme/print.css" />
    <script async="true" type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script async="true" type="text/javascript" src="/wp-includes/js/comment-reply.js?ver=20090102"></script>
    <script async="true" type="text/javascript" src="/wp-content/plugins/google-analyticator/external-tracking.min.js?ver=6.1.1"></script>
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="/wp-includes/wlwmanifest.xml" />
    <link rel="index" title="Ubuntu Danmark" href="/" />
    <link rel="prev" title="Om Ubuntu" href="/om-ubuntu/" />
    <link rel="next" title="Download" href="/download/" />
    <link rel="canonical" href="/support/" />
    <link rel="shortcut icon" href="/wp-content/themes/light-wordpress-theme/images/favicon.ico" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <script async="true" type="text/javascript">
	var analyticsFileTypes = ['mp3','pdf','ogg'];
	var analyticsEventTracking = 'enabled';
</script>
    <script async="true" type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-3824272-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
    <link rel="home" href="index.php" title="Internet og netværk" />
    <link rel="up" href="networking.php" title="Kapitel 8. Hjemmenetværk" />
    <link rel="prev" href="networking-browsenetcomps.php" title="Se andre computere på netværket" />
    <link rel="next" href="web-apps.php" title="Kapitel 9. Internetprogrammer" />
  </head>
  <body class="single single-post">
    <div id="wrapper" class="hfeed">
      <div id="header">
        <div id="branding">
          <div id="blog-title">
            <span>
              <a href="/" title="Ubuntu Danmark" rel="home">Ubuntu Danmark</a>
            </span>
          </div>
          <div id="blog-description">Danske brugere</div>
        </div>
        <div id="access">
          <div id="loco-header-menu">
            <ul id="primary-header-menu"><?php
            ob_start();
            dynamic_sidebar('primary-header-menu');
            $primary_header_menu = ob_get_clean();
            $primary_header_menu = str_replace(' menu-item-635', ' menu-item-635 current-menu-item', $primary_header_menu);
            $primary_header_menu = str_replace(' menu-item-637', ' menu-item-637 current-menu-item', $primary_header_menu);
            echo($primary_header_menu);
            ?></ul>
          </div>
        </div>
      </div>
      <div id="secondary-header">
        <div id="secondary-access">
          <div id="loco-search-form">
            <form id="searchform" method="get" action="/help/10.04/search.php">
              <div>
                <input id="s" name="s" type="text" value="" size="32" tabindex="1" />
                <input id="searchsubmit" name="searchsubmit" type="submit" value="Søg" tabindex="2" />
              </div>
            </form>
          </div>
          <div id="loco-sub-header-menu"></div>
        </div>
      </div>
      <div id="main">
        <div id="container">
          <div id="content">
            <div class="page type-page hentry" style="-moz-border-radius: 5px 5px 5px 5px;">
              <h1 class="entry-title">Del filer og mapper med andre computere</h1>
              <div class="entry-content">
                <div class="sect1" title="Del filer og mapper med andre computere">
                  <p>Du kan dele filer og mapper med andre på dit netværk igennem <span class="application"><strong>Ubuntu One</strong></span>, <span class="application"><strong>Personlig fildeling</strong></span> eller <span class="application"><strong>Nautilus</strong></span>.</p>
                  <div class="sect2" title="Deling af filer med Ubuntu One">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="networking-shares-ubuntuone"></a>Deling af filer med Ubuntu One</h3>
                        </div>
                      </div>
                    </div>
                    <p>Mange folk bruger i dag flere computere. De har muligvis både en stationær computer på deres kontor samt en bærbar til at rejse med eller blot til at tage med på café. At sikre sig at alle dine filer er tilgængelig lige meget hvor du er kan være en temmelig svær opgave. Det samme kunne siges om kompleksiteten i at holde din Evolution adressebog, Tomboy notater, eller Firefox bogmærker synkroniseret.</p>
                    <p>Det er her <span class="application"><strong>Ubuntu One</strong></span> hjælper - den holder dit digitale liv synkroniseret. Alle dine dokumenter, musik, bogmærker, kontaktpersoner og noter bliver synkroniseret på tværs af alle dine computere. Tilmed bliver det hele gemt i din personlige online sky, så du kan bruge en webbrowser på en hvilken som helst computer til at få adgang til alle dine filer via </p>
                    <p><span class="application"><strong>Ubuntu One</strong></span> giver alle Ubuntu brugere 2 GB gratis lagerplads .Yderligere lagerplads og kontakt synkronisering med mobiltelefoner kan fås for et månedligt gebyr. Sæt <span class="application"><strong>Ubuntu One</strong></span> op og brug din computer som du normalt ville. <span class="application"><strong>Ubuntu One</strong></span> ordner resten selv.</p>
                    <div class="sect3" title="Opsætning af Ubuntu One">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="ubuntuone-configuring"></a>Opsætning af Ubuntu One</h4>
                          </div>
                        </div>
                      </div>
                      <p>For at starte <span class="application"><strong>Ubuntu One</strong></span>, åbn det gennem <span class="guimenu">System</span> → <span class="guimenuitem">Indstillinger</span> → <span class="guimenuitem">Ubuntu One</span>. Hvis det er første gang du køre programmet, vil <span class="application"><strong>Ubuntu One</strong></span> tilføje din computer til din <span class="application"><strong>Ubuntu One</strong></span>-konto.</p>
                      <p><span class="application"><strong>Ubuntu One</strong></span> bruger Ubuntu Single Sign On (SSO) tjenesten til bruger konti. Hvis du ikke har en Ubuntu SSO-konto, vil du blive guidet gennem hele processen. Når du er færdig, vil du have en Ubuntu SSO-konto, et gratis Ubuntu One abonnement og din computer vil blive sat op til synkronisering.</p>
                    </div>
                    <div class="sect3" title="Konfigurer Ubuntu One">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="ubuntuone-preferences"></a>Konfigurer Ubuntu One</h4>
                          </div>
                        </div>
                      </div>
                      <p><span class="application"><strong>Ubuntu One-indstillinger</strong></span> viser hvor meget af din lagerplads du bruger i øjeblikket og fungere samtidig som et håndteringsværtøj for din konto. Du kan altid gå til den via <span class="guimenu">System</span> → <span class="guimenuitem">Indstillinger</span> → <span class="guimenuitem">Ubuntu One</span>.</p>
                      <p>Fanen <em class="guilabel">Konto</em> viser dine konto oplysninger så som navn og e-mail-adresse og giver links til yderligere kontohåndtering og teknisk support.</p>
                      <p>Fanen <em class="guilabel">Enheder</em> indeholder en liste af alle enheder der er tilføjet til at synkronisere med din konto. Enheder kan enten være en computere eller en mobiltelefon. For den computer du benytter i øjeblikket, vil du kunne justere hvor meget af din båndbredde der bliver brugt til at synkronisere og forbinde eller genetablere forbindelsen til <span class="application"><strong>Ubuntu One</strong></span>. Du kan også fjerne computere og mobiltelefoner fra din <span class="application"><strong>Ubuntu One</strong></span>-konto.</p>
                      <p>Fanen <em class="guilabel">Tjenester</em> er hvor du håndtere hvilket <span class="application"><strong>Ubuntu One</strong></span>-funktionaliteter der synkroniseres med dit lager i skyen og andre computere. Du kan aktivere eller deaktivere synkronisering af filer, købt musik, kontakter, og bogmærker.</p>
                    </div>
                    <div class="sect3" title="Yderligere information">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="ubuntuone-moreinfo"></a>Yderligere information</h4>
                          </div>
                        </div>
                      </div>
                      <p>For yderligere infomation om Ubuntu One, dets servicer, og kilder til teknisk hjælp, besøg <a class="ulink" href="http://one.ubuntu.com/" target="_top">Ubuntu One hjemmesiden</a>.</p>
                      <p>Du kan også følge <a class="ulink" href="http://one.ubuntu.com/blog" target="_top">Ubuntu One blogen</a> for nyheder om de seneste funktioner.</p>
                    </div>
                  </div>
                  <div class="sect2" title="Deling af mapper via programmet Delte mapper">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="networking-shares-sharesadmin"></a>Deling af mapper via programmet Delte mapper</h3>
                        </div>
                      </div>
                    </div>
                    <p>Sådan deles mapper ved hjælp af <span class="application"><strong>Delte mapper</strong></span> programmet:</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Tryk <span class="guimenu">Programmer</span> → <span class="guimenuitem">Tilbehør</span> → <span class="guimenuitem">Terminal</span> for at åbne en Terminal.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Skriv <span class="command"><strong>shares-admin</strong></span>og tryk <span class="keycap"><strong>Enter</strong></span> for at åbne <span class="application"><strong>Delte mapper</strong></span>.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Du vil muligvis modtage følgende besked: <em class="guilabel">Delingstjenester er ikke installeret</em>. Hvis dette sker, skal du sikre dig at de to afkrydsningsfelter i tekstboksen er markeret, og trykke <span class="guibutton"><strong>Installér tjeneste</strong></span>. Understøttelse for delingstjeneste vil derefter blive hentet og installeret, hvilket kan tage et stykke tid.</p>
                        </li>
                        <li class="step" title="Trin 4">
                          <p>Tryk på knappen <span class="guibutton"><strong><img src="../libs/img/dialog-password.png" /></strong></span> og indtast din adgangskode i feltet <em class="guilabel">Adgangskode:</em>.</p>
                        </li>
                        <li class="step" title="Trin 5">
                          <p>Tryk på knappen <span class="guibutton"><strong>Godkend</strong></span>.</p>
                        </li>
                        <li class="step" title="Trin 6">
                          <p>Vælg fanen <em class="guilabel">Delte mapper</em> og tryk på <span class="guibutton"><strong>Tilføj</strong></span>.</p>
                        </li>
                        <li class="step" title="Trin 7">
                          <p>Vælg placeringen af den mappe du ønsker at dele, ved at ændre indstillingen <em class="guilabel">Sti</em>.</p>
                        </li>
                        <li class="step" title="Trin 8">
                          <p>Vælg <em class="guilabel">Windows-netværk (SMB)</em> fra indstillingen <em class="guilabel">Del med</em>.</p>
                        </li>
                        <li class="step" title="Trin 9">
                          <p>Indtast et navn og en kommentar til den delte mappe.</p>
                        </li>
                        <li class="step" title="Trin 10">
                          <p>Hvis du ønsker at folk der tilgår den delte mappe skal kunne tilføje, ændre og fjerne filer i mappen, skal du fjerne markeringen <em class="guilabel">Skrivebeskyttet</em>. Hvis du lader <em class="guilabel">Skrivebeskyttet</em> være afkrydset, vil folk kun kunne se filerne i mappen.</p>
                        </li>
                        <li class="step" title="Trin 11">
                          <p>Tryk <span class="guibutton"><strong>Del</strong></span> for at gøre den delte mappe tilgængelig. Andre folk på samme netværk (LAN) som dig burde nu kunne få adgang til mappen.</p>
                        </li>
                      </ol>
                    </div>
                    <p>Se <a class="ulink" href="http://library.gnome.org/users/shares-admin/2.30/" target="_top">manualen for administrationsværktøjet Delte mapper</a> for yderligere oplysninger om håndtering af netværksdeling.</p>
                  </div>
                  <div class="sect2" title="Deling af mapper via Nautilus">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="networking-shares-nautilus"></a>Deling af mapper via Nautilus</h3>
                        </div>
                      </div>
                    </div>
                    <p>Sådan deles mapper ved hjælp af <span class="application"><strong>Nautilus</strong></span>:</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Tryk <span class="guimenu">Steder</span> → <span class="guimenuitem">Maskine</span> for at åbne et <span class="application"><strong>filhåndterings</strong></span>-vindue.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Højreklik på den mappe du ønsker at dele, og vælg <span class="guimenuitem">Indstillinger for deling</span> fra genvejsmenuen.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Vælg <em class="guilabel">Del denne mappe</em> i vinduet <em class="guilabel">Mappedeling</em>. Du kan ændre feltet <em class="guilabel">Delenavn</em> hvis du ønsker at bruge et andet delenavn.</p>
                        </li>
                        <li class="step" title="Trin 4">
                          <p>Du vil muligvis modtage følgende besked: <em class="guilabel">Delingstjenester er ikke installeret</em>. Hvis dette sker, skal du sikre dig at de to afkrydsningsfelter i tekstboksen er markeret, og trykke <span class="guibutton"><strong>Installér tjeneste</strong></span>. Understøttelse for delingstjeneste vil derefter blive hentet og installeret, hvilket kan tage et stykke tid.</p>
                        </li>
                        <li class="step" title="Trin 5">
                          <p>Vælg <em class="guilabel">Tillad at andre kan skrive og slette filer i denne mappe</em> hvis du ønsker at tillade andre at tilføje, ændre og fjerne filer i denne mappe. Hvis du lader dette felt være umarkeret, vil andre mennesker kun kunne se filer i denne mappe. Du kan også udfylde feltet <em class="guilabel">Kommentar</em>.</p>
                        </li>
                        <li class="step" title="Trin 6">
                          <p>Vælg <em class="guilabel">Gæsteadgang (for folk uden en brugerkonto)</em> hvis du ønsker at give gæstebrugere adgang til dine filer.</p>
                        </li>
                        <li class="step" title="Trin 7">
                          <p>Tryk <span class="guibutton"><strong>Opret deling</strong></span> for at gøre den delte mappe tilgængelig.</p>
                        </li>
                        <li class="step" title="Trin 8">
                          <p>Du vil muligvis få en besked om at det er nødvendigt for Nautilus at tilføje nogle rettigheder til mappen for at kunne dele den. Hvis dette sker, skal du trykke på <span class="guibutton"><strong>Tilføj rettighederne automatisk</strong></span>.</p>
                        </li>
                        <li class="step" title="Trin 9">
                          <p>Personer på det samme netværk (LAN) som dig, bør nu kunne få adgang til mappen.</p>
                        </li>
                      </ol>
                    </div>
                    <div class="note" title="Bemærk" style="margin-left: 0.5in; margin-right: 0.5in;">
                      <table border="0" summary="Note">
                        <tr>
                          <td rowspan="2" align="center" valign="top" width="25">
                            <img alt="[Bemærk]" src="../libs/admon/note.png" />
                          </td>
                          <th align="left"></th>
                        </tr>
                        <tr>
                          <td align="left" valign="top">
                            <p>Du vil muligvis få en besked, der siger <em class="guilabel">You do not have permission to create a usershare</em>. Hvis dette sker, skal du kontakte systemadministratoren eller konfigurere <span class="application"><strong>Tjenesten mappedeling (Samba)</strong></span>.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <p>Se <a class="ulink" href="http://library.gnome.org/users/shares-admin/2.30/" target="_top">manualen for administrationsværktøjet Delte mapper</a> for yderligere oplysninger om håndtering af netværksdeling.</p>
                  </div>
                  <div class="sect2" title="Tilgå delte mapper via Windows">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="networking-shares-windows"></a>Tilgå delte mapper via Windows</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvis du ønsker at få adgang til en delt mappe placeret på en Ubuntu-computer ved hjælp af computere der kører Windows, kan du udføre nogle ekstra trin:</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Tryk <span class="guimenu">Programmer</span> → <span class="guimenuitem">Tilbehør</span> → <span class="guimenuitem">Terminal</span> for at åbne en Terminal.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Skriv <span class="command"><strong>sudo smbpasswd -a brugernavn</strong></span>, erstat <span class="quote">“<span class="quote">brugernavn</span>”</span> med dit eget brugernavn. Tryk <span class="keycap"><strong>Enter</strong></span> for at køre kommandoen.</p>
                          <div class="note" title="Bemærk" style="margin-left: 0.5in; margin-right: 0.5in;">
                            <table border="0" summary="Note">
                              <tr>
                                <td rowspan="2" align="center" valign="top" width="25">
                                  <img alt="[Bemærk]" src="../libs/admon/note.png" />
                                </td>
                                <th align="left"></th>
                              </tr>
                              <tr>
                                <td align="left" valign="top">
                                  <p>Du kan finde ud af hvad dit brugernavn er ved at skrive <span class="command"><strong>whoami</strong></span> i terminalen og derefter trykke <span class="keycap"><strong>Enter</strong></span>.</p>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Indtast din adgangskode når der står <span class="quote">“<span class="quote">[sudo] password for brugernavn:</span>”</span> og tryk <span class="keycap"><strong>Enter</strong></span> igen.</p>
                        </li>
                        <li class="step" title="Trin 4">
                          <p>Når du får beskeden <span class="quote">“<span class="quote">New SMB password:</span>”</span>, skal du indtaste den adgangskode, du gerne vil bruge til at få adgang til den delte mappe. Tryk derefter på <span class="keycap"><strong>Enter</strong></span>. Du kan lade adgangskoden være tom - dette vil give alle adgang til den delte mappe.</p>
                        </li>
                        <li class="step" title="Trin 5">
                          <p>Når du får beskeden <span class="quote">“<span class="quote">Retype new SMB password:</span>”</span>, skal du indtaste den adgangskode, du lige har indtastet, og derefter trykke på <span class="keycap"><strong>Enter</strong></span>.</p>
                        </li>
                        <li class="step" title="Trin 6">
                          <p>Du skulle nu være i stand til at oprette forbindelse til den delte mapper på Ubuntu-computeren.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Problemer med at forbinde til delte mapper i Windows">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="networking-shares-troubleshooting"></a>Problemer med at forbinde til delte mapper i Windows</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvis du ikke er i stand til at oprette forbindelse til en delt mappe ved hjælp af Windows, kan du prøve at bruge <span class="emphasis"><em>IP-adressen</em></span> fra Ubuntu-computeren i stedet for dens <span class="emphasis"><em>værtsnavn</em></span> for at få adgang til delingen:</p>
                    <p></p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Tryk <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Netværksværktøjer</span> og vælg fanen <em class="guilabel">Enheder</em>.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Vælg navnet på din netværksforbindelse fra listen <em class="guilabel">Netværksenhed</em> (f.eks. <span class="quote">“<span class="quote">eth0</span>”</span>). Hvis du har flere netværksforbindelser, skal du muligvis forsøge dette flere gange.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Notér nummeret i kolonnen <em class="guilabel">IP-adresse</em>. Det skal bestå af fire tal adskilt af punktummer (f.eks. <span class="quote">“<span class="quote">192.168.2.10</span>”</span>)</p>
                        </li>
                        <li class="step" title="Trin 4">
                          <p>Vælg <span class="guimenuitem">Start</span> → <span class="guimenuitem">Kør</span> på Windows-computeren og skriv <strong class="userinput"><code>\\ip-adresse</code></strong> i tekstfeltet, idet <span class="quote">“<span class="quote">ip-adresse</span>”</span> erstattes med IP-adressen på Ubuntu computeren</p>
                        </li>
                        <li class="step" title="Trin 5">
                          <p>Tryk <span class="guibutton"><strong>OK</strong></span> for at oprette forbindelse til den delte mappe.</p>
                        </li>
                      </ol>
                    </div>
                    <div class="tip" title="Vink" style="margin-left: 0.5in; margin-right: 0.5in;">
                      <table border="0" summary="Tip">
                        <tr>
                          <td rowspan="2" align="center" valign="top" width="25">
                            <img alt="[Vink]" src="../libs/admon/tip.png" />
                          </td>
                          <th align="left"></th>
                        </tr>
                        <tr>
                          <td align="left" valign="top">
                            <p>Tjenesten til deling af mapper i Ubuntu, der understøtter deling af mapper med Windows computere, hedder <span class="application"><strong>Samba</strong></span>. Selve baggrundsprogrammet, eller dæmonen, hedder <span class="application"><strong>smbd</strong></span>.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <p>Hvis du stadig ikke kan få adgang til den delte mappe, skal du kontrollere at mappedelingstjenesten kører på Ubuntu-computeren. Kør dette i en terminal:</p>
                    <pre class="screen">
<span class="command"><strong>service smbd status</strong></span>
</pre>
                    <p>Du bør se en udskrift i stil med den følgende:</p>
                    <pre class="screen">
smbd start/running, process 123
</pre>
                    <p>Hvis tjenesten er stoppet, vil du få følgende:</p>
                    <pre class="screen">smbd stop/waiting</pre>
                    <p>Hvis det viser sig at tjenesten er stoppet, så prøv at starte den:</p>
                    <pre class="screen">
<span class="command"><strong>sudo service smbd start</strong></span>
</pre>
                    <p>Mere information kan findes på <a class="ulink" href="https://help.ubuntu.com/community/SettingUpSamba" target="_top">Ubuntu-fællesskabents hjælpesider</a>.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aside main-aside" id="secondary" style="-moz-border-radius: 5px 5px 5px 5px;">
          <ul class="xoxo">
            <li class="widgetcontainer widget" id="">
              <h3 class="widgettitle">Internet og netværk</h3>
              <ul>
                <li><a href="networkmanager.php">1. Opret forbindelse til internettet eller et netværk</a></li>
                <li><a href="connecting.php">2. Måder at forbinde på</a>
                  <ul>
                  <li><a href="connecting-wired.php">Kablet (LAN)</a>
                      <ul>
                      <li><a href="connecting-wired.php#connecting-wired-manual">Manuel indtastning af din netværksopsætning</a></li>
                      </ul>
                  </li>
                  <li><a href="connecting-wireless.php">Trådløs</a></li>
                  <li><a href="connecting-mobile.php">Mobilt bredbånd</a></li>
                  <li><a href="connecting-vpn.php">Virtuelle private netværk</a>
                      <ul>
                        <li><a href="connecting-vpn.php#connecting-vpn-cicso">Cisco VPN</a></li>
                        <li><a href="connecting-vpn.php#connecting-vpn-pptp">PPTP VPN</a></li>
                        <li><a href="connecting-vpn.php#connecting-vpn-openvpn">OpenVPN</a></li>
                        <li><a href="connecting-vpn.php#connecting-vpn-config">Konfigurationsfiler</a></li>
                      </ul>
                  </li>
                  <li><a href="connecting-dsl.php">DSL</a></li>
                  </ul>
                </li>
                <li><a href="disconnecting.php">3. Frakobling</a></li>
                <li><a href="information.php">4. Information om din forbindelse</a></li>
                <li><a href="troubleshooting.php">5. Fejlfinding</a>
                  <ul>
                  <li><a href="troubleshooting-lan.php">Fejlfinding for kablet netopkobling</a>
                      <ul>
                      <li><a href="troubleshooting-lan.php#network-troubleshooting-ifconfig">Få information om den aktuelle netopkobling</a></li>
                      <li><a href="troubleshooting-lan.php#network-troubleshooting-ping">Kontrollér om en netopkobling virker korekt</a></li>
                      </ul>
                  </li>
                  <li><a href="troubleshooting-wireless.php">Fejlfinding af trådløs netopkobling</a>
                      <ul><li><a href="troubleshooting-wireless.php#troubleshooting-wireless-disabled">Kontroller, at enheden er tændt</a></li>
                      <li><a href="troubleshooting-wireless.php#troubleshooting-wireless-device">Kontroller genkendelse af enheder</a></li>
                      <li><a href="troubleshooting-wireless.php#troubleshooting-wireless-ndiswrapper">Brug af Windows-drivere til trådløse enheder</a></li>
                      <li><a href="troubleshooting-wireless.php#troubleshooting-wireless-connection">Kontrollér for forbindelse til ruteren</a></li>
                      <li><a href="troubleshooting-wireless.php#troubleshooting-wireless-ip">Kontrollér IP-tildeling</a></li>
                      <li><a href="troubleshooting-wireless.php#troubleshooting-wireless-dns">Kontrollér DNS</a></li>
                      <li><a href="troubleshooting-wireless.php#troubleshooting-wireless-ipv6">IPV6 understøttes ikke</a></li></ul></li>
                  <li><a href="troubleshooting-mobile.php">Fejlfinding for mobil bredbånd</a></li>
                  <li><a href="troubleshooting-keyring.php">Hvorfor spørger Gnome Nøglering om min adgangskode hver gang jeg logger ind?</a></li>
                  </ul>
                </li>
                <li><a href="modem.php">6. Modemmer</a>
                  <ul>
                  <li><a href="modem-identify.php">Identificer dit modem</a></li>
                  <li><a href="modem-connect.php">Opkobling med et modem</a></li>
                  </ul>
                </li>
                <li><a href="connecttoserver.php">7. Forbind til en server</a>
                  <ul>
                  <li><a href="connecttoserver-ftp.php">FTP</a></li>
                  <li><a href="connecttoserver-ssh.php">SSH</a></li>
                  <li><a href="connecttoserver-windowsshare.php">Windows-deling</a></li>
                  <li><a href="connecttoserver-webdav.php">WebDAV (HTTP)</a></li>
                  <li><a href="connecttoserver-custom.php">Tilpasset</a></li>
                  </ul>
                </li>
                <li><a href="networking.php">8. Hjemmenetværk</a>
                  <ul>
                  <li><a href="networking-browsenetcomps.php">Se andre computere på netværket</a></li>
                  <li><a href="networking-shares.php">Del filer og mapper med andre computere</a>
                    <ul>
                    <li><a href="networking-shares.php#networking-shares-sharesadmin">Deling af mapper via programmet Delte mapper</a></li>
                    <li><a href="networking-shares.php#networking-shares-nautilus">Deling af mapper via Nautilus</a></li>
                    <li><a href="networking-shares.php#networking-shares-windows">Tilgå delte mapper via Windows</a></li>
                    <li><a href="networking-shares.php#networking-shares-troubleshooting">Problemer med at forbinde til delte mapper i Windows</a></li>
                    </ul>
                  </li>
                  </ul>
                </li>
                <li><a href="web-apps.php">9. Internetprogrammer</a>
                  <ul>
                  <li><a href="web-browsing.php">På nettet med Firefox</a>
                      <ul>
                      <li><a href="web-browsing.php#web-browsing-addons">Hent tilføjelser til din Firefox</a></li>
                      <li><a href="web-browsing.php#web-browsing-fontsize">Ændr skrifttypens standardstørrelse</a></li>
                      </ul>
                  </li>
                  <li><a href="email.php">Send og modtag e-post</a>
                      <ul>
                      <li><a href="email.php#email-evolution-spam">Filtrering af spam</a></li>
                      <li><a href="email.php#email-alternative">Alternative e-post-programmer</a></li>
                      </ul>
                  </li>
                  <li><a href="internet-instant-messaging.php">Chat</a>
                      <ul>
                      <li><a href="internet-instant-messaging.php#internet-instant-messaging-empathy">Empathy chat</a></li>
                      <li><a href="internet-instant-messaging.php#internet-instant-messaging-ekiga">Ekiga softwaretelefon</a></li>
                      <li><a href="internet-instant-messaging.php#internet-instant-messaging-irc">IRC chat</a></li>
                      <li><a href="internet-instant-messaging.php#internet-instant-messaging-irchelp">Få hjælp via IRC chat</a></li>
                      </ul>
                  </li>
                  <li><a href="internet-otherapps.php">Andre internetprogrammer</a>
                      <ul>
                      <li><a href="internet-otherapps.php#internet-otherapps-p2p">Peer-to-peer netværk</a></li>
                      <li><a href="internet-otherapps.php#internet-otherapps-newsreaders">Nyhedslæsere</a></li>
                      </ul>
                  </li>
                  <li><a href="web-design.php">Design web-sider</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div id="footer">
        <div id="siteinfo"></div>
      </div>
    </div>
    <script async="true" type="text/javascript" src="/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
