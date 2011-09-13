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
    <title xmlns="">Indstillinger for netværk</title>
    <meta xmlns="" http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta xmlns="" name="robots" content="index,follow" />
    <link xmlns="" rel="canonical" href="http://ubuntudanmark.dk/support/" />
    <link xmlns="" rel="stylesheet" type="text/css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/style.css" />
    <link xmlns="" rel="pingback" href="http://ubuntudanmark.dk/xmlrpc.php" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Feed" href="http://ubuntudanmark.dk/feed/" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Kommentarfeed" href="http://ubuntudanmark.dk/comments/feed/" />
    <link xmlns="" rel="stylesheet" id="nivo-slider-css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/slider/nivo-slider.css?ver=2" type="text/css" media="all" />
    <link xmlns="" rel="stylesheet" id="openid-css" href="http://ubuntudanmark.dk/wp-content/plugins/openid/f/openid.css?ver=519" type="text/css" media="all" />
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/jquery.corner.js?ver=2.08"></script>
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/slider/jquery.nivo.slider.pack.js?ver=2"></script>
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-includes/js/comment-reply.js?ver=20090102"></script>
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/plugins/google-analyticator/external-tracking.min.js?ver=6.1.1"></script>
    <link xmlns="" rel="EditURI" type="application/rsd+xml" title="RSD" href="http://ubuntudanmark.dk/xmlrpc.php?rsd" />
    <link xmlns="" rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://ubuntudanmark.dk/wp-includes/wlwmanifest.xml" />
    <link xmlns="" rel="index" title="Ubuntu Danmark" href="http://ubuntudanmark.dk/" />
    <link xmlns="" rel="prev" title="Om Ubuntu" href="http://ubuntudanmark.dk/om-ubuntu/" />
    <link xmlns="" rel="next" title="Download" href="http://ubuntudanmark.dk/download/" />
    <link xmlns="" rel="canonical" href="http://ubuntudanmark.dk/support/" />
    <link xmlns="" rel="shortcut icon" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/images/favicon.ico" type="image/x-icon" />
    <meta xmlns="" http-equiv="X-UA-Compatible" content="chrome=1" />
    <script xmlns="" type="text/javascript">
	var analyticsFileTypes = ['mp3','pdf','ogg'];
	var analyticsEventTracking = 'enabled';
</script>
    <script xmlns="" type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-3824272-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
  </head>
  <body class="single single-post">
    <div id="wrapper" class="hfeed">
      <div id="header">
        <div id="branding">
          <div id="blog-title">
            <span>
              <a href="http://ubuntudanmark.dk/" title="Ubuntu Danmark" rel="home">Ubuntu Danmark</a>
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
              <h1 class="entry-title">Indstillinger for netværk</h1>
              <div class="entry-content">
                <div class="sect1" title="Indstillinger for netværk">
                  <p>Selv om Ubuntu normalt er i stand til automatisk opdage indstillingerne for dit netværk, er det klogt at gøre et notat af relevante netværksinstillinger, i tilfælde af det netværk du forsøger at oprette forbindelse til, ikke kan håndteres automatisk.</p>
                  <div class="sect2" title="Hjemmenetværk">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-settings-network-home"></a>Hjemmenetværk</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvis du har et hjemmenetværk, måske forbundet via en router eller switch, er der et par indstillinger, som du måske brug for at oprette forbindelse til netværket. Mens de fleste netværk vil være i stand til at tildele korrekte indstillinger til Ubuntu automatisk, er der dog enkelte undtagelser.</p>
                    <p>Følg instruktionerne nedenfor for at få fat i en kopi af de netværksindstillinger som du kan få brug for:</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Tryk på <span class="guimenuitem">Start</span> → <span class="guimenuitem">Alle programmer</span> → <span class="guisubmenu">Tilbehør</span> → <span class="guimenuitem">Kommandoprompt</span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Et sort vindue ved navn <span class="application"><strong>Kommandoprompt</strong></span> vises. Skriv </p>
                          <pre class="screen">ipconfig /all</pre>
                          <p> i vinduet og tryk på <span class="keycap"><strong>Enter</strong></span>. Dette vil vise en række netværksindstillingerne for hver af de netværksenheder, du har installeret. Du kan have en eller flere netværksenheder.</p>
                        </li>
                        <li class="listitem">
                          <p>Skriv nu: </p>
                          <pre class="screen">ipconfig /all &gt; C:\netværksindstillinger.txt</pre>
                          <p> og trykke derefter på <span class="keycap"><strong>Enter</strong></span>. Dette vil gemme de indstillinger, du lige har set i filen <code class="filename">C:\netværksindstillinger.txt</code>.</p>
                        </li>
                        <li class="listitem">
                          <p>Find og åbn <code class="filename">C:\netværksindstillinger</code> i et tekstbehandlingsprogram, f.eks <span class="application"><strong>Notesblok</strong></span>. Udskriv en kopi af filen, hvis muligt.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Windows-netværk">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-settings-network-windows"></a>Windows-netværk</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvis du tilslutter til et Windows netværk, så kan du får brug for yderligere informationer for at blive i stand til at se dokumenter placeret på delte netværksdrev. Hvis du tilslutter til et netværk som administreres af en anden person, så anmod personen om den relevante information for tilslutning til netværket. Hvis ikke, så sørg for at du har adgang til informationerne som vises nedenfor:</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>Domæne eller navn på arbejdsgruppe</p>
                        </li>
                        <li class="listitem">
                          <p>Dit brugernavn og adgangskode på netværket</p>
                        </li>
                        <li class="listitem">
                          <p>Active Directory master IP-adresse (hvis anvendelig)</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="sect2" title="Trådløse netværk">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-settings-network-wireless"></a>Trådløse netværk</h3>
                        </div>
                      </div>
                    </div>
                    <p>Der er adskillige vigtige stykker af information som du bør have i hånden, hvis du ønsker at etablere forbindelse til et trådløst netværk. Disse vises i listen nedenfor:</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>Netværksnavn (SSID)</p>
                        </li>
                        <li class="listitem">
                          <p>WEP-krypteringsnøgle eller WPA-passkey</p>
                        </li>
                      </ul>
                    </div>
                    <p>Der er talrige måder at finde frem til denne information. Hvis dit trådløse netværk tildeles gennem en <span class="emphasis"><em>trådløs router</em></span>, så bør du være i stand til at finde denne information fra siderne om konfiguration af routeren. Rådfør dig med routerens manual for mere information om hvor den relevante information findes.</p>
                  </div>
                  <div class="sect2" title="VPN'er">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-settings-network-vpn"></a>VPN'er</h3>
                        </div>
                      </div>
                    </div>
                    <p><span class="emphasis"><em>Virtuelt Privat Netværk</em></span> er en form for netværk, som giver dig mulighed for at oprette forbindelse til et eksternt privat netværk ved hjælp af et offentligt netværk, såsom internettet. Der er mange forskellige typer af VPN, som har forskellige grader af understøttelse under Ubuntu. Hvis du skal oprette forbindelse til et VPN, identificere først hvilken type VPN, som du forbinder til. Hvis VPN'et støttes af Ubuntu, er det muligt at et dokument vil være tilgængeligt, fra VPN-udbyderens hjemmeside, som kan hjælpe dig med at oprette forbindelse til netværket.</p>
                    <p>Sørg for at du har alle VPN-forbindelsesinformationer som du mener du får brug for.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aside main-aside" id="secondary" style="-moz-border-radius: 5px 5px 5px 5px;">
          <ul class="xoxo">
            <li class="widgetcontainer widget" id="">
              <h3 class="widgettitle">Ubuntu - Linux for mennesker!</h3>
              <ul>
                <li><a href="preparing.php">1. Forberedelse til skiftet</a><ul>
                    <li><a href="preparing-converting-file-types.php">Konvertering af ikke-understøttede filtyper</a><ul>
                      <li><a href="preparing-converting-file-types.php#preparing-converting-audio">Konvertering af ikke-understøttede lydformater</a></li>
                      <li><a href="preparing-converting-file-types.php#preparing-converting-video">Konvertering af ikke understøttede videoformater</a></li>
                      <li><a href="preparing-converting-file-types.php#preparing-converting-office">Konvertering af ikke-understøttede kontordokumentformater</a></li>
                      <li><a href="preparing-converting-file-types.php#preparing-converting-specific">Konvertering fra programspecifikke formater</a></li></ul></li>
                    <li><a href="preparing-settings-internet.php">Indstillinger for internetforbindelse</a><ul>
                      <li><a href="preparing-settings-internet.php#preparing-settings-internet-dialup">Opkaldsinternetforbindelse</a></li>
                      <li><a href="preparing-settings-internet.php#preparing-settings-internet-broadband">Bredbåndsinternetforbindelse</a></li>
                      <li><a href="preparing-settings-internet.php#preparing-settings-internet-proxy">Indstillinger til proxyserver</a></li></ul></li>
                    <li><a href="preparing-settings-network.php">Indstillinger for netværk</a><ul>
                      <li><a href="preparing-settings-network.php#preparing-settings-network-home">Hjemmenetværk</a></li>
                      <li><a href="preparing-settings-network.php#preparing-settings-network-windows">Windows-netværk</a></li>
                      <li><a href="preparing-settings-network.php#preparing-settings-network-wireless">Trådløse netværk</a></li>
                      <li><a href="preparing-settings-network.php#preparing-settings-network-vpn">VPN'er</a></li></ul></li>
                    <li><a href="preparing-settings-im.php">Chatindstillinger</a></li>
                    <li><a href="preparing-bookmarks.php">Bogmærker fra netbrowser</a><ul>
                      <li><a href="preparing-bookmarks.php#preparing-bookmarks-ie">Internet Explorer</a></li>
                      <li><a href="preparing-bookmarks.php#preparing-bookmarks-firefox">Mozilla Firefox</a></li>
                      <li><a href="preparing-bookmarks.php#preparing-bookmarks-opera">Opera</a></li></ul></li>
                    <li><a href="preparing-email.php">E-post og kontoindstillinger</a><ul>
                      <li><a href="preparing-email.php#preparing-email-msoe">Microsoft Outlook Express</a></li>
                      <li><a href="preparing-email.php#preparing-email-msoutlook">Microsoft Office Outlook</a></li>
                      <li><a href="preparing-email.php#preparing-email-import">Forberedning af e-post til eksport med Mozilla Thunderbird</a></li>
                      <li><a href="preparing-email.php#preparing-email-thunderbird">Eksport af e-post-beskeder fra Mozilla Thunderbird</a></li></ul></li>
                    <li><a href="preparing-storage.php">Flyt dine data på sikker vis</a><ul>
                      <li><a href="preparing-storage.php#preparing-storage-direct">Direkte overførsel</a></li>
                      <li><a href="preparing-storage.php#preparing-storage-cddvd">Cd- eller dvd-disk</a></li>
                      <li><a href="preparing-storage.php#preparing-storage-removable">Ekstern harddisk eller andre flytbare drev</a></li>
                      <li><a href="preparing-storage.php#preparing-storage-network">Netværksdeling</a></li>
                      <li><a href="preparing-storage.php#preparing-storage-partition">Sekundære harddiskpartition</a></li></ul></li>
                <li><a href="md.php">2. Overførsel af dine data til Ubuntu</a><ul>
                  <li><a href="md-files.php">Filer</a><ul>
                    <li><a href="md-files.php#md-files-photos">Import af fotos</a></li>
                    <li><a href="md-files.php#md-files-music">Import af musik</a></li></ul></li>
                  <li><a href="md-emails.php">E-post</a></li>
                  <li><a href="md-contacts.php">Kontakter-/Adressebog</a></li>
                  <li><a href="md-calendar.php">Kalender</a></li>
                  <li><a href="md-bookmarks.php">Browser-bogmærker/foretrukne</a></li></ul></li>
                <li><a href="glossary.php">Liste over Windowsord</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div id="footer">
        <div id="siteinfo"></div>
      </div>
    </div>
    <script type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
