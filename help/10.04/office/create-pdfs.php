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
    <title xmlns="">Hvordan kan jeg oprette kopier af mine dokumenter i PDF-format?</title>
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
    <link rel="home" href="index.php" title="Kontor" />
    <link rel="up" href="index.php" title="Kontor" />
    <link rel="prev" href="sending-office-documents.php" title="Folk kan ikke åbne dokumenter, som jeg har sendt til dem" />
    <link rel="next" href="finding-clipart.php" title="Finde billedudklip (clipart) til brug i dokumenter" />
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
              <h1 class="entry-title">Hvordan kan jeg oprette kopier af mine dokumenter i PDF-format?</h1>
              <div class="entry-content">
                <div class="sect1" title="Hvordan kan jeg oprette kopier af mine dokumenter i PDF-format?">
                  <p>PDF-formatet bruges ofte til at distribuere dokumenter til andre mennesker, og kan åbnes på langt de fleste computere. PDF-filer kan ikke redigeres, så dit dokument er beskyttet mod ændringer.</p>
                  <p>For at gemme en kopi af et dokument som en PDF-fil:</p>
                  <div class="procedure">
                    <ol class="procedure" type="1">
                      <li class="step" title="Trin 1">
                        <p>Åben dit dokument og tryk <span class="guibutton"><strong>Udskriv</strong></span> (normalt er det under <span class="guimenu">Fil</span> → <span class="guimenuitem">Udskriv</span>).</p>
                      </li>
                      <li class="step" title="Trin 2">
                        <p>Vælg den printer fra listen der har navnet <em class="guilabel">Udskriv til fil</em>, under fanen <em class="guilabel">Generelt</em>.</p>
                      </li>
                      <li class="step" title="Trin 3">
                        <p>Der bør være flere valgmuligheder under listen over printere. Vælg <em class="guilabel">PDF</em> som <em class="guilabel">Udskriftsformat</em> og vælge et filnavn og en placering for PDF-filen.</p>
                      </li>
                      <li class="step" title="Trin 4">
                        <p>Tryk på <span class="guibutton"><strong>Udskriv</strong></span>. En PDF-fil vil blive oprettet på den placering, du har angivet.</p>
                      </li>
                    </ol>
                  </div>
                  <p>Proceduren ovenfor vil virke i næsten alle programmer i Ubuntu, men i OpenOffice er proceduren anderledes:</p>
                  <div class="procedure">
                    <ol class="procedure" type="1">
                      <li class="step" title="Trin 1">
                        <p>Åbn dit dokument i OpenOffice og tryk på <span class="guimenuitem">Filer</span> → <span class="guimenuitem">Eksporter som PDF</span>.</p>
                      </li>
                      <li class="step" title="Trin 2">
                        <p>I det vindue, der vises, skal du trykke på <span class="guibutton"><strong>Export</strong></span>.</p>
                      </li>
                      <li class="step" title="Trin 3">
                        <p>Vælg et filnavn og en placering for at gemme PDF-filen, og tryk på <span class="guibutton"><strong>Gem</strong></span>.</p>
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
    <script type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
