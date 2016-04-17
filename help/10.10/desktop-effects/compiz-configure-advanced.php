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
    <title>Aktivering af ekstra effekter</title>
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
    <link rel="prev" href="compiz-default-plugins.php" title="Brug af tastaturgenveje med visuelle effekter" />
    <link rel="next" href="compiz-problems.php" title="Almindelige problemer" />
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
            <form action="/" method="get" id="searchform">
              <div>
                <input type="text" tabindex="1" size="32" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" value="" name="s" id="s">
                <input type="submit" tabindex="2" value="Søg" name="searchsubmit" id="searchsubmit">
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
              <h1 class="entry-title">Aktivering af ekstra effekter</h1>
              <div class="entry-content">
                <div class="sect1" title="Aktivering af ekstra effekter">
                  <p>Foruden de visuelle effekter, der som standard er aktiverede, findes der også mange yderligere effekter. Disse spænder fra effekter, der har som mål at gøre det lettere at bruge din computer til nogle, som bare er for sjov.</p>
                  <p>Aktivér yderligere effekter:</p>
                  <div class="procedure">
                    <ol class="procedure" type="1">
                      <li class="step" title="Trin 1">
                        <p><a class="ulink" href="apt:compizconfig-settings-manager" target="_top">Installér programmet Avancerede indstillinger til skrivebordseffekter</a>.</p>
                      </li>
                      <li class="step" title="Trin 2">
                        <p>Klik <span class="guimenu">System</span> → <span class="guimenuitem">Indstillinger</span> → <span class="guimenuitem">Håndtering af CompizConfig-indstillinger</span>.</p>
                      </li>
                      <li class="step" title="Trin 3">
                        <p>Afkryds boksen ud for en effekt for at aktivere den.</p>
                      </li>
                      <li class="step" title="Trin 4">
                        <p>Klik på en effekt for at ændre dens indstillinger.</p>
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
