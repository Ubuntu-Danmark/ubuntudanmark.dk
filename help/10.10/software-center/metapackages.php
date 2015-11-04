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
    <title xmlns="">Kapitel 5. Hvorfor beder den mig om at fjerne flere programmer på en gang?</title>
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
    <link rel="home" href="index.php" title="Ubuntu Softwarecenter" />
    <link rel="up" href="index.php" title="Ubuntu Softwarecenter" />
    <link rel="prev" href="removing.php" title="Kapitel 4. At fjerne software" />
    <link rel="next" href="canonical-maintained.php" title="Kapitel 6. Hvad er “Canonical-vedligeholdt”?" />
    <link rel="copyright" href="legalnotice.php" title="Retslig note" />
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
            $primary_header_menu = str_replace(' menu-item-636', ' menu-item-636 current-menu-item', $primary_header_menu);
            echo($primary_header_menu);
            ?></ul>
          </div>
        </div>
      </div>
      <div id="secondary-header">
        <div id="secondary-access">
          <div id="loco-search-form">
            <form id="searchform" method="get" action="/help/10.10/search.php">
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
              <h1 class="entry-title">Kapitel 5. Hvorfor beder den mig om at fjerne flere programmer på en gang?</h1>
              <div class="entry-content">
                <div class="chapter" title="Kapitel 5. Hvorfor beder den mig om at fjerne flere programmer på en gang?">
                  <p>Nogen gange hvis du forsøger at fjerne en pakke vil Ubuntu Softwarecenter advare dig om at andre pakker også vil blive fjernet. Der er to hovedårsager til at det sker.</p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p>Hvis du fjerne et program, vil alle udvidelser til dette program normalt også blive fjernet.</p>
                      </li>
                      <li class="listitem">
                        <p>Flere programmer bliver nogle gange udbudt som en enkelt pakke. Hvis ethvert af dem er installeret, vil de alle være installeret. Og hvis ethvert af dem fjernes, vil de alle blive fjernet. Ubuntu Softwarecenter kan ikke fjerne dem enkeltvis, fordi den ikke har instruktioner for hvordan de skal separeres.</p>
                      </li>
                    </ul>
                  </div>
                  <p>Du kan bruge <em class="guilabel">Hovedmenu</em>-indstillingerne til at skjule uønskede emner uden af fjerne dem fra computeren. I Ubuntu, kan du finde <em class="guilabel">Hovedmenu</em> under <menuchoice><guimenu>System</span> → <span class="guisubmenu">Indstillinger</span>. På Ubuntu Netbook Edition, er den under <span class="guimenu">Værktøjer</span> → <span class="guisubmenu">Indstillinger</span>.</p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p>
                          <a class="ulink" href="ghelp:user-guide?menu-editor" target="_top">Customizing the menu bar</a>
                        </p>
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
              <h3 class="widgettitle">Ubuntu Softwarecenter</h3>
              <ul>
                <li><a href="introduction.php">1. Hvad er Ubuntu Softwarecenter?</a></li>
                <li><a href="installing.php">2. At installere software</a></li>
                <li><a href="launching.php">3. At bruge et program når det er installeret</a></li>
                <li><a href="removing.php">4. At fjerne software</a></li>
                <li><a href="metapackages.php">5. Hvorfor beder den mig om at fjerne flere programmer på en gang?</a></li>
                <li><a href="canonical-maintained.php">6. Hvad er “Canonical-vedligeholdt”?</a></li>
                <li><a href="canonical-partners.php">7. Hvad er “Canonical Partners”?</a></li>
                <li><a href="commercial.php">8. Skal jeg betale noget?</a></li>
                <li><a href="commercial-reinstalling.php">9. Hvad hvis jeg betaler for software og mister det?</a></li>
                <li><a href="missing.php">10. Hvad hvis et program jeg ønsker ikke er tilgængeligt?</a></li>
                <li><a href="bugs.php">11. Hvad hvis et program ikke virker?</a></li>
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
