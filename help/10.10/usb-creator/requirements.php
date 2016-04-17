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
    <title>Krav</title>
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
    <link rel="home" href="index.php" title="Opret en USB-opstartsdisk" />
    <link rel="up" href="index.php" title="Opret en USB-opstartsdisk" />
    <link rel="prev" href="introduction.php" title="Introduktion" />
    <link rel="next" href="making-a-live-usb.php" title="Opret en live-USB" />
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
              <h1 class="entry-title">Krav</h1>
              <div class="entry-content">
                <div class="sect1" title="Krav">
                  <p><span class="application"><strong>Opret en USB-opstartsdisk</strong></span> kræver følgende: </p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p>Ubuntu 8.10 eller nyere</p>
                      </li>
                      <li class="listitem">
                        <p>USB-disk, 1 GB eller større</p>
                      </li>
                      <li class="listitem">
                        <p>Aftryk af den almindelige Ubuntu-skrivebordsudgave</p>
                      </li>
                    </ul>
                  </div>
                  <p><span class="application"><strong>Opret en USB-opstartsdisk</strong></span> kører i øjeblikket kun på Ubuntu 8.10-systemer eller nyere. Hvis du ikke har adgang til et Ubuntu-system, kan du oprette en live-USB fra et system, der kan starte op fra en Ubuntu-live-cd. Du kan også installere Ubuntu i et virtualiseringsprogram som VirtualBox og oprette en live-USB med en virtuel Ubuntu-installation.</p>
                  <p>USB-drevets kapacitet bør som minimum være stort nok til at rumme indholdet af det hentede Ubuntu-aftryk og eventuelle øvrige oplysninger, du planlægger at gemme. Som minimimum anbefales et USB-drev på 1 GB, dog foreslås 2 GB.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aside main-aside" id="secondary" style="-moz-border-radius: 5px 5px 5px 5px;">
          <ul class="xoxo">
            <li class="widgetcontainer widget" id="">
              <h3 class="widgettitle">Opret en USB-opstartsdisk</h3>
              <ul>
              <li><a href="introduction.php">Introduktion</a></li>
              <li><a href="requirements.php">Krav</a></li>
              <li><a href="making-a-live-usb.php">Opret en live-USB</a>
                  <ul>
                  <li><a href="making-a-live-usb.php#download-the-ubuntu-image">Hent Ubuntu-aftrykket</a></li>
                  <li><a href="making-a-live-usb.php#ubuntu-system">Ubuntu-system</a></li>
                  <li><a href="making-a-live-usb.php#non-ubuntu-system">Ikke-Ubuntu-system</a></li>
                  </ul>
              </li>
              <li><a href="booting-from-the-live-usb.php">Opstart fra live-USB</a></li>
              <li><a href="troubleshooting.php">Fejlfinding</a></li>
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
