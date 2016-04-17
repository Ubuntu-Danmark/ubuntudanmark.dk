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
    <title>Kapitel 2. At installere software</title>
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
                          <a class="xref" href="missing.php" title="Kapitel 9. Hvad hvis et program jeg ønsker ikke er tilgængeligt?">Hvad hvis et program jeg ønsker ikke er tilgængeligt?</a>
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
                <li><a href="launching.php">3. Using a program once it’s installed</a></li>
                <li><a href="removing.php">4. At fjerne software</a></li>
                <li><a href="metapackages.php">5. Hvorfor beder den mig om at fjerne flere programmer på en gang?</a></li>
                <li><a href="canonical-maintained.php">6. What is “Canonical-maintained”?</a></li>
                <li><a href="canonical-partners.php">7. What is “Canonical Partners”?</a></li>
                <li><a href="why-free.php">8. Hvor for er alle programmerne gratis?</a></li>
                <li><a href="missing.php">9. What if a program I want isn’t available?</a></li>
                <li><a href="bugs.php">10. What if a program doesn’t work?</a></li>
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
