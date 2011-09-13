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
    <title xmlns="">Kapitel 2. At installere software</title>
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
    <link rel="home" href="index.php" title="Ubuntu Softwarecenter" />
    <link rel="up" href="index.php" title="Ubuntu Softwarecenter" />
    <link rel="prev" href="introduction.php" title="Kapitel 1. Hvad er Ubuntu Softwarecenter?" />
    <link rel="next" href="launching.php" title="Kapitel 3. At bruge et program når det er installeret" />
    <link rel="copyright" href="legalnotice.php" title="Retslig note" />
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
              <h1 class="entry-title">Kapitel 2. At installere software</h1>
              <div class="entry-content">
                <div class="chapter" title="Kapitel 2. At installere software">
                  <p>For at installere noget med Ubuntu Softwarecenter, skal du have administratorrettigheder og en fungerende internetforbindelse. (Hvis du selv har installeret Ubuntu på denne computer, har du automatisk administratorrettigheder).</p>
                  <div class="orderedlist">
                    <ol class="orderedlist" type="1">
                      <li class="listitem">
                        <p>Find det du ønsker at installere, under sektionen <em class="guilabel">Hent software</em>. Hvis du allerede kender dets navn, kan du prøve at skrive navnet i søgefeltet. Eller prøve at søge efter typen af program du ønsker (f.eks. “regneark”). Ellers så gennemse listen af afdelinger.</p>
                      </li>
                      <li class="listitem">
                        <p>Vælge emnet på listen, og tryk på <em class="guilabel">Mere info</em>.</p>
                      </li>
                      <li class="listitem">
                        <p>Vælge <em class="guilabel">Installér</em>. Det kan være nødvendigt at du indtaster din Ubuntu-adgangskode før installationen kan begynde.</p>
                      </li>
                    </ol>
                  </div>
                  <p>Hvor lang tid en installation tager, afhænger af hvor stor den er, og hastigheden på din computer og internetforbindelse.</p>
                  <p>Når skærmen skifter til at sige “installeret”, er softwaren klar til brug.</p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p>
                          <a class="xref" href="launching.php" title="Kapitel 3. At bruge et program når det er installeret">At bruge et program når det er installeret</a>
                        </p>
                      </li>
                      <li class="listitem">
                        <p>
                          <a class="xref" href="missing.php" title="Kapitel 10. Hvad hvis et program jeg ønsker ikke er tilgængeligt?">Hvad hvis et program jeg ønsker ikke er tilgængeligt?</a>
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
    <script type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
