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
    <title xmlns="">E-post</title>
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
              <h1 class="entry-title">E-post</h1>
              <div class="entry-content">
                <div class="sect1" title="E-post">
                  <p>Hvis du har gemt dine e-post fra Windows, vil du nu nok ønske at importere dem til e-postprogrammet <span class="application"><strong>Evolution</strong></span>. De følgende instruktioner antager, at du vil importere e-post, der er gemt ved hjælp af <span class="application"><strong>Mozilla Thunderbird</strong></span>, som beskrevet i <a class="xref" href="preparing-email.html#preparing-email-import" title="Forberedning af e-post til eksport med Mozilla Thunderbird">“Forberedning af e-post til eksport med Mozilla Thunderbird”</a>:</p>
                  <div class="orderedlist">
                    <ol class="orderedlist" type="1">
                      <li class="listitem">
                        <p>Start <span class="application"><strong>Evolution</strong></span> ved at trykke på <span class="guimenu">Programmer</span> → <span class="guimenuitem">Kontor</span> → <span class="guimenuitem">Evolution E-post og Kalender</span>.</p>
                      </li>
                      <li class="listitem">
                        <p>Tryk på <span class="guimenuitem">Fil</span> → <span class="guimenuitem">Importér...</span> for at starte <span class="application"><strong>Import-vejleder til Evolution</strong></span>. Tryk derefter på <span class="guibutton"><strong>Næste</strong></span>.</p>
                      </li>
                      <li class="listitem">
                        <p>Vælg <em class="guilabel">Importer en enkelt fil</em> og tryk derefter på <span class="guibutton"><strong>Næste</strong></span>.</p>
                      </li>
                      <li class="listitem">
                        <p>Tryk på feltet ud for <em class="guilabel">Filnavn:</em>, hvorpå der står <span class="guibutton"><strong>(Ingen)</strong></span>. Find den mappe som du har gemt din e-post i og åbn den.</p>
                      </li>
                      <li class="listitem">
                        <p>Åbn mappen <code class="filename">Local Folders</code>, som findes under mappen <code class="filename">Mail</code>, og kig efter filer med navne som <code class="filename">Inbox</code>, <code class="filename">uafsendte meddelelser</code>, og <code class="filename">Sendte</code>. Hvis du ikke gemte din e-post i området <code class="filename">Lokale Folders</code>, så vælg den korrekte mappe i <code class="filename">Mail</code>. Vælg en fil og tryk på <span class="guibutton"><strong>Åbn</strong></span>. Hvis du har mange e-postbeskeder, skal du muligvis vente et stykke tid på at filen kontrolleres, før du kan fortsætte.</p>
                      </li>
                      <li class="listitem">
                        <p><em class="guilabel">Berkeley Mailbox (mbox)</em> bør være valgt ud for <em class="guilabel">Filtype</em>. Tryk på <span class="guibutton"><strong>Næste</strong></span>.</p>
                      </li>
                      <li class="listitem">
                        <p>Vælg den placering, hvor du ønsker at kopiere den gemte e-post til, ved at trykke på knappen <em class="guilabel">Destinationsmappe</em>. Som standard vil dette være mappen <code class="filename">Indbakke</code>, som er den anbefalede destination for din e-post. Tryk derefter på <span class="guibutton"><strong>Næste</strong></span>.</p>
                      </li>
                      <li class="listitem">
                        <p>Tryk på <span class="guibutton"><strong>Importér</strong></span> for at importere din e-post. Import processen kan tage et stykke tid, hvis du har en stor mængde e-post. Når importen er færdig, vil din e-post straks være til tilgængelig.</p>
                      </li>
                    </ol>
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
    <script async="true" type="text/javascript" src="/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
