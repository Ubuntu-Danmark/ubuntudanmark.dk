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
    <title>Almindelige problemer</title>
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
    <link rel="home" href="index.php" title="Visuelle effekter" />
    <link rel="up" href="index.php" title="Visuelle effekter" />
    <link rel="prev" href="compiz-configure-advanced.php" title="Aktivering af ekstra effekter" />
    <link rel="next" href="compiz-moreinfo.php" title="Yderligere information" />
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
              <h1 class="entry-title">Almindelige problemer</h1>
              <div class="entry-content">
                <div class="sect1" title="Almindelige problemer">
                  <p>Hvis du oplever problemer under brug af visuelle effekter, kan det anbefales at slå dem fra ved at åbne <span class="guimenu">System</span> → <span class="guimenuitem">Indstillinger</span> → <span class="guimenuitem">Udseende</span> → <span class="guimenuitem">Visuelle effekter</span> og vælge <em class="guilabel">Ingen</em>.</p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p>Hvis du får fejl-meddelsen <span class="quote">“<span class="quote">Visual effects could not be enabled</span>”</span>, så understøtter din grafikdriver højst sandsynligt ikke visuelle effekter.</p>
                        <p>I dette tilfælde vil du ikke være i stand til at bruge visuelle effekter med din standard grafikdriver. Dog kan det være muligt for dig at bruge en <a class="ulink" href="../hardware/jockey.php" target="_top">begrænset driver</a> i stedet.</p>
                      </li>
                      <li class="listitem">
                        <p>Hvis din computer kører langsomt, kan deaktivering af visuelle effekter forbedre ydelsen. Visuelle effekter kræver flere systemressourcer, og ældre eller mindre kraftfulde computere kan derfor nogle gange ikke håndtere den ekstra byrde.</p>
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
              <h3 class="widgettitle">Visuelle effekter</h3>
              <ul>
              <li><a href="compiz-intro.php">Hvad er visuelle effekter?</a></li>
              <li><a href="compiz-configure.php">Konfigurering af visuelle effekter</a></li>
              <li><a href="compiz-default-plugins.php">Brug af tastaturgenveje med visuelle effekter</a>
                  <ul>
                  <li><a href="compiz-default-plugins.php#application-switcher">Programskifter</a></li>
                  <li><a href="compiz-default-plugins.php#desktop-wall">Skrivebordsvæg</a></li>
                  <li><a href="compiz-default-plugins.php#enhanced-zoom-desktop">Forbedret skrivebords-zoom</a></li>
                  <li><a href="compiz-default-plugins.php#expo">Galleri</a></li>
                  <li><a href="compiz-default-plugins.php#negative">Negativ</a></li>
                  <li><a href="compiz-default-plugins.php#viewport-switcher">Visningområdeskifter</a></li>
                  </ul>
              </li>
              <li><a href="compiz-configure-advanced.php">Aktivering af ekstra effekter</a></li>
              <li><a href="compiz-problems.php">Almindelige problemer</a></li>
              <li><a href="compiz-moreinfo.php">Yderligere information</a></li>
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
