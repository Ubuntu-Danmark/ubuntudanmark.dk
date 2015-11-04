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
    <title xmlns="">Bogmærker fra netbrowser</title>
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
              <h1 class="entry-title">Bogmærker fra netbrowser</h1>
              <div class="entry-content">
                <div class="sect1" title="Bogmærker fra netbrowser">
                  <p>Du har sandsynligvis mange bogmærkede hjemmesider i din internetbrowser. Dette afsnit hjælper dig med at oprette en sikkerhedskopi af dem.</p>
                  <div class="sect2" title="Internet Explorer">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-bookmarks-ie"></a>Internet Explorer</h3>
                        </div>
                      </div>
                    </div>
                    <div class="sect3" title="Internet Explorer 6">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="preparing-bookmarks-ie-6"></a>Internet Explorer 6</h4>
                          </div>
                        </div>
                      </div>
                      <p>For at oprette sikkerhedskopi af <span class="application"><strong>Microsoft Internet Explorer 6</strong></span> netbrowser:</p>
                      <div class="orderedlist">
                        <ol class="orderedlist" type="1">
                          <li class="listitem">
                            <p>Start <span class="application"><strong>Internet Explorer</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Tryk på <span class="guimenuitem">Filer</span> → <span class="guimenuitem">Importer og eksporter...</span>.</p>
                          </li>
                          <li class="listitem">
                            <p><span class="application"><strong>Guiden Importer/Eksporter</strong></span> starter. Tryk <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg <em class="guilabel">Eksporter Favoritter</em> og tryk <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg mappen hvorfra du ønsker at eksportere dine favoritter. Valg af mappen <em class="guilabel">Foretrukne</em> vil eksportere dem alle. Tryk <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg <em class="guilabel">Eksporter til en fil eller adresse</em> og vælg et filnavn. Tryk på <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p><em class="guilabel">Fuldfører guiden Importer/eksporter</em> vises. Tryk <span class="guibutton"><strong>Udfør</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Dine bogmærker vil være gemt med det filnavn du tidligere angav.</p>
                          </li>
                        </ol>
                      </div>
                    </div>
                    <div class="sect3" title="Internet Explorer 7">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="preparing-bookmarks-ie-7"></a>Internet Explorer 7</h4>
                          </div>
                        </div>
                      </div>
                      <p>For at oprette sikkerhedskopi af <span class="application"><strong>Microsoft Internet Explorer 7</strong></span> netbrowser:</p>
                      <div class="orderedlist">
                        <ol class="orderedlist" type="1">
                          <li class="listitem">
                            <p>Start <span class="application"><strong>Internet Explorer</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Tryk på <span class="guimenuitem">Favoritter</span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Klik på pilen ved siden af knappen <span class="guibutton"><strong>Føj til Favoritter...</strong></span>. Klik derefter på Importer og eksporter.</p>
                          </li>
                          <li class="listitem">
                            <p><span class="application"><strong>Guiden Importer/Eksporter</strong></span> starter. Tryk <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg <em class="guilabel">Eksporter Favoritter</em> og tryk <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg mappen hvorfra du ønsker at eksportere dine favoritter. Valg af mappen <em class="guilabel">Foretrukne</em> vil eksportere dem alle. Tryk <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg <em class="guilabel">Eksporter til en fil eller adresse</em> og vælg et filnavn. Tryk på <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p><em class="guilabel">Hvor vil du eksportere dine farvoritter til?</em> vil vises. Tryk på <span class="guibutton"><strong>Eksporter</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Dine bogmærker vil være gemt med det filnavn du tidligere angav.</p>
                          </li>
                        </ol>
                      </div>
                    </div>
                    <div class="sect3" title="Internet Explorer 8">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="preparing-bookmarks-ie-8"></a>Internet Explorer 8</h4>
                          </div>
                        </div>
                      </div>
                      <p>For at oprette sikkerhedskopi af <span class="application"><strong>Microsoft Internet Explorer 8</strong></span> netbrowser:</p>
                      <div class="orderedlist">
                        <ol class="orderedlist" type="1">
                          <li class="listitem">
                            <p>Start <span class="application"><strong>Internet Explorer</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Tryk på knappen  <span class="guibutton"><strong>Favoritter</strong></span> button.</p>
                          </li>
                          <li class="listitem">
                            <p>Klik på pilen ved siden af knappen <span class="guibutton"><strong>Føj til Favoritter...</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg <em class="guilabel">Importer og eksporter...</em></p>
                          </li>
                          <li class="listitem">
                            <p><span class="application"><strong>Guiden Importer/Eksporter</strong></span> starter.</p>
                          </li>
                          <li class="listitem">
                            <p>Select <em class="guilabel">Export to a file</em> and press <span class="guibutton"><strong>Next</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg <em class="guilabel">Eksporter til en fil</em> og tryk på <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg mappen hvorfra du ønsker at eksportere dine favoritter. Valg af mappen <em class="guilabel">Foretrukne</em> vil eksportere dem alle. Tryk <span class="guibutton"><strong>Næste</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Click <span class="guibutton"><strong>Browse...</strong></span> to select a file name and location to save the exported favorites to. Press <span class="guibutton"><strong>Export</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Tryk på <span class="guibutton"><strong>Udfør</strong></span>.</p>
                          </li>
                          <li class="listitem">
                            <p>Dine bogmærker vil være gemt med det filnavn du tidligere angav.</p>
                          </li>
                        </ol>
                      </div>
                    </div>
                  </div>
                  <div class="sect2" title="Mozilla Firefox">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-bookmarks-firefox"></a>Mozilla Firefox</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvordan du laver en sikkerhedskopi af din <span class="application"><strong>Firefox</strong></span> netbrowser:</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Start <span class="application"><strong>Mozilla Firefox</strong></span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk på <span class="guimenuitem">Bogmærker</span> → <span class="guimenuitem">Arranger bogmærker...</span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk <span class="guimenuitem">Funktioner</span> → <span class="guimenuitem">Eksporter HTML...</span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Vælg et filnavn. Tryk på <span class="guibutton"><strong>Gem</strong></span>.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Opera">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="preparing-bookmarks-opera"></a>Opera</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvordan du laver en sikkerhedskopi af din <span class="application"><strong>Opera</strong></span> webbrowser:</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Start <span class="application"><strong>Opera</strong></span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk på <span class="guimenuitem">Filer</span> → <span class="guimenuitem">Importer og eksporter</span> → <span class="guimenuitem">Eksporter bogmærker som HTML...</span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Tryk på <span class="guimenuitem">Filer</span> → <span class="guimenuitem">Exporter...</span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Vælg et filnavn. Tryk på <span class="guibutton"><strong>Gem</strong></span>.</p>
                        </li>
                      </ol>
                    </div>
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
