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
    <title xmlns="">Anskaffelse af dokumentskabeloner</title>
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
    <link rel="home" href="index.php" title="Kontor" />
    <link rel="up" href="index.php" title="Kontor" />
    <link rel="prev" href="office-finance.php" title="Finansprogrammer" />
    <link rel="next" href="sending-office-documents.php" title="Folk kan ikke åbne dokumenter, som jeg har sendt til dem" />
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
              <h1 class="entry-title">Anskaffelse af dokumentskabeloner</h1>
              <div class="entry-content">
                <div class="sect1" title="Anskaffelse af dokumentskabeloner">
                  <p>En skabelon er en præ-formateret side, hvor indholdet, titel og så videre kan redigeres uden yderligere formatering. Mange dokumenter følger en fast stil og det kan derfor være nyttigt at have en <span class="emphasis"><em>skabelon</em></span> af en bestemt type dokument. Der er mange skabeloner tilgængelige via internettet.</p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p>
                          <span class="strong">
                            <strong>
                              <span class="application">
                                <strong>OpenOffice.org</strong>
                              </span>
                            </strong>
                          </span>
                        </p>
                        <p>En samling af skabeloner er tilgængelig og kan hentes på OpenOffice.org <a class="ulink" href="http://documentation.openoffice.org/Samples_Templates/User/template/" target="_top">Prøve- og skabelonhjemmesiden</a>, og også fra <a class="ulink" href="http://ooextras.sourceforge.net/" target="_top">OOExtras-hjemmesiden</a> og <a class="ulink" href="http://www.kde-files.org/index.php?xcontentmode=630x631x632x633x634" target="_top">KDE-Filer-hjemmesiden</a>.</p>
                        <p>De fleste skabeloner lavet til <span class="trademark">Microsoft Office</span>™ burde også virke. Microsoft Office-skabeloner er tilgængelige fra mange forskellige kilder.</p>
                      </li>
                      <li class="listitem">
                        <p>
                          <span class="strong">
                            <strong>
                              <span class="application">
                                <strong>Inkscape vektorillustrator</strong>
                              </span>
                            </strong>
                          </span>
                        </p>
                        <p>Forskellige skabeloner til brug med <span class="application"><strong>Inkscape</strong></span> er tilgængelige fra <a class="ulink" href="http://www.kde-files.org/index.php?xcontentmode=644" target="_top">KDE-Filer-hjemmesiden</a></p>
                      </li>
                      <li class="listitem">
                        <p>
                          <span class="strong">
                            <strong>
                              <span class="application">
                                <strong>KOffice</strong>
                              </span>
                            </strong>
                          </span>
                        </p>
                        <p>Et lille udvalg af <span class="application"><strong>KOffice</strong></span>-skabeloner er tilgængelige fra <a class="ulink" href="http://www.kde-files.org/index.php?xcontentmode=610x611x612x613x614x615x616x617x618" target="_top">KDE-Filer-hjemmesiden</a>.</p>
                      </li>
                      <li class="listitem">
                        <p>
                          <span class="strong">
                            <strong>
                              <span class="application">
                                <strong>Scribus</strong>
                              </span>
                            </strong>
                          </span>
                        </p>
                        <p><a class="ulink" href="apt:scribus-template" target="_top">Installér pakken <span class="application"><strong>scribus-template</strong></span></a> for et udvalg af skabeloner.</p>
                        <p>Som et alternativt er der nogle skabeloner tilgængelig fra <a class="ulink" href="http://www.kde-files.org/index.php?xcontentmode=642" target="_top">KDE-Filer-hjemmesiden</a>.</p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aside main-aside" id="secondary" style="-moz-border-radius: 5px 5px 5px 5px;">
          <ul class="xoxo">
            <li class="widgetcontainer widget" id="">
              <h3 class="widgettitle">Kontor</h3>
              <ul>
              <li><a href="office-suites.php">Kontorpakker</a></li>
              <li><a href="office-oohelp.php">Få hjælp til OpenOffice</a></li>
              <li><a href="office-dtp.php">DTP og tegneprogrammer</a></li>
              <li><a href="office-finance.php">Finansprogrammer</a></li>
              <li><a href="office-document-templates.php">Anskaffelse af dokumentskabeloner</a></li>
              <li><a href="sending-office-documents.php">Folk kan ikke åbne dokumenter, som jeg har sendt til dem</a></li>
              <li><a href="create-pdfs.php">Hvordan kan jeg oprette kopier af mine dokumenter i PDF-format?</a></li>
              <li><a href="finding-clipart.php">Finde billedudklip (clipart) til brug i dokumenter</a></li>
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
