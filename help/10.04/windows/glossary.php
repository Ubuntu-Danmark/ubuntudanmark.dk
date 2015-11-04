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
    <title xmlns="">Liste over Windowsord</title>
    <meta xmlns="" http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta xmlns="" name="robots" content="index,follow" />
    <link xmlns="" rel="canonical" href="/support/" />
    <link xmlns="" rel="stylesheet" type="text/css" href="/wp-content/themes/light-wordpress-theme/style.css" />
    <link xmlns="" rel="pingback" href="/xmlrpc.php" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Feed" href="/feed/" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Kommentarfeed" href="/comments/feed/" />
    <link rel="stylesheet" type="text/css" media="print" href="/wp-content/themes/light-wordpress-theme/print.css" />
    <script async="true" xmlns="" type="text/javascript" src="/wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
    <script async="true" xmlns="" type="text/javascript" src="/wp-includes/js/comment-reply.js?ver=20090102"></script>
    <script async="true" xmlns="" type="text/javascript" src="/wp-content/plugins/google-analyticator/external-tracking.min.js?ver=6.1.1"></script>
    <link xmlns="" rel="EditURI" type="application/rsd+xml" title="RSD" href="/xmlrpc.php?rsd" />
    <link xmlns="" rel="wlwmanifest" type="application/wlwmanifest+xml" href="/wp-includes/wlwmanifest.xml" />
    <link xmlns="" rel="index" title="Ubuntu Danmark" href="/" />
    <link xmlns="" rel="prev" title="Om Ubuntu" href="/om-ubuntu/" />
    <link xmlns="" rel="next" title="Download" href="/download/" />
    <link xmlns="" rel="canonical" href="/support/" />
    <link xmlns="" rel="shortcut icon" href="/wp-content/themes/light-wordpress-theme/images/favicon.ico" type="image/x-icon" />
    <meta xmlns="" http-equiv="X-UA-Compatible" content="chrome=1" />
    <script async="true" xmlns="" type="text/javascript">
	var analyticsFileTypes = ['mp3','pdf','ogg'];
	var analyticsEventTracking = 'enabled';
</script>
    <script async="true" xmlns="" type="text/javascript">
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
              <h1 class="entry-title">Liste over Windowsord</h1>
              <div class="entry-content">
                <div xml:lang="en" class="glossary" title="Liste over Windowsord" lang="en">
                  <dl>
                    <dt>Tilføj/fjern programmer</dt>
                    <dd>
                      <p>Brug <span class="guimenu">Programmer</span> → <span class="guimenuitem">Ubuntu Softwarecenter</span> for at installere programmer fra Ubuntu's software bibliotek, eller til at fjerne eksisterende programmer fra din computer. Brug <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Synaptic - pakkehåndtering</span> til mere avancerede opgaver.</p>
                    </dd>
                    <dt><a id="control-panel"></a>Kontrolpanel</dt>
                    <dd>
                      <p>Indstillinger der påvirker alle der bruger Ubuntu på denne computer, findes under menuen <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span>. Indstillinger, som kun påvirker dig kan tilgås fra <span class="guimenu">System</span> → <span class="guisubmenu">Indstillinger</span>.</p>
                    </dd>
                    <dt>Explorer</dt>
                    <dd>
                      <p>Start med at vælge et punkt fra menuen <span class="guimenu">Steder</span>, for at håndtere filer og mapper på din computer.</p>
                    </dd>
                    <dt>Foretrukne</dt>
                    <dd>
                      <p>Brug <span class="guimenu">Steder</span> for nem adgang til almindeligt anvendte mapper. Firefox har <span class="guimenu">Bogmærker</span>, som svarer til favoritter i Internet Explorer.</p>
                    </dd>
                    <dt>Internet Explorer</dt>
                    <dd>
                      <p>Du kan bruge <span class="application"><strong>Firefox</strong></span> til at søge på nettet og besøge hjemmesider: <span class="guimenu">Programmer</span> → <span class="guisubmenu">Internet</span> → <span class="guimenuitem">Firefox Web Browser</span>.</p>
                    </dd>
                    <dt>Log ud</dt>
                    <dd>
                      <p>Klik på <span class="application"><strong>Brugerskift</strong></span> i øverste højre hjørne af skærmen og derefter på <span class="guibutton"><strong>Log ud...</strong></span>, for at lukke alle dine programmer og efterlade computeren klar til at en anden person logge ind.</p>
                    </dd>
                    <dt>Denne computer</dt>
                    <dd>
                      <p>Tilsvarende emner til dem i vinduet <span class="quote">“<span class="quote">Denne computer</span>”</span>, findes forskellige steder i Ubuntu.</p>
                      <div class="itemizedlist">
                        <ul class="itemizedlist" type="disc">
                          <li class="listitem">
                            <p>For at se diske og lagerenheder der er tilsluttet til computeren, skal du vælge <span class="guimenu">Steder</span> → <span class="guimenuitem">Maskine</span>.</p>
                          </li>
                          <li class="listitem">
                            <p>
                              <a class="xref" href="glossary.html#control-panel" title="Kontrolpanel">Kontrolpanel</a>
                            </p>
                          </li>
                          <li class="listitem">
                            <p>
                              <a class="xref" href="glossary.html#printers-and-faxes" title="Printer og fax">Printer og fax</a>
                            </p>
                          </li>
                        </ul>
                      </div>
                    </dd>
                    <dt>Dokumenter</dt>
                    <dd>
                      <p>Inde i din hjemmemappe (<span class="guimenu">Steder</span> → <span class="guimenuitem">Hjemmemappe</span>), kan du arrangere dokumenter og andre filer, i de mapper du ønsker mapper.</p>
                    </dd>
                    <dt><a id="printers-and-faxes"></a>Printer og fax</dt>
                    <dd>
                      <p>Åbn <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Udskrivning</span> for at konfigurere printere.</p>
                      <p>Se <a class="ulink" href="../../printing/faxing.php" target="_top">Brug af fax</a> for opsætning af faxmodem.</p>
                    </dd>
                    <dt>Papirkurv</dt>
                    <dd>
                      <p><em class="guilabel">Papirkurven</em> virker stortset på samme måde som i Windows. Papirkurven er næsten altid i nederste højre hjørne af skærmen.</p>
                    </dd>
                    <dt>Standby</dt>
                    <dd>
                      <p>For at sætte din computer i en energibesparende tilstand, indtil du igen bruger den, skal du klikke på <span class="application"><strong>Brugerskifter</strong></span> i det øverste højre hjørne af skærmen, og der efter på <em class="guilabel">Hvile</em> eller <em class="guilabel">Dvale</em>. (<em class="guilabel">Dvale</em> kræver ingen strøm overhovedet, men er langsommere, og er ikke tilgængelig på visse computere.)</p>
                    </dd>
                    <dt>Startknap</dt>
                    <dd>
                      <p>De tre menuer øverst til venstre på skærmen - <span class="guimenu">Programmer</span>, <span class="guimenu">Steder</span> og <span class="guimenu">System</span> - indeholder de fleste af de samme ting som menuen Start i Windows.</p>
                    </dd>
                    <dt>Jobliste</dt>
                    <dd>
                      <p>Gennemse eller stop kørende programmer eller overvåg processor- og hukommelsesforbrug i <span class="guimenu">System</span> → <span class="guisubmenu">Administration</span> → <span class="guimenuitem">Systemovervågning</span>.</p>
                    </dd>
                    <dt>Windows Media Player</dt>
                    <dd>
                      <p>Programmer som kan afspille musik og film samt rippe musik-cd'er er tilgængelige i <span class="guimenu">Programmer</span> → <span class="guimenuitem">Lyd og video</span>.</p>
                    </dd>
                    <dt>Windows Update</dt>
                    <dd>
                      <p>Åbn <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Opdateringshåndtering</span> for at kontrollere, om der er kommet nye opdateringer til Ubuntu.</p>
                    </dd>
                  </dl>
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
    <script async="true" type="text/javascript" src="/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
