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
    <title>Brug af KDE eller Xfce i stedet for GNOME-skrivebordet</title>
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
    <link rel="home" href="index.php" title="Tilpas din computer" />
    <link rel="up" href="index.php" title="Tilpas din computer" />
    <link rel="prev" href="window-button-order.php" title="Hvordan kan jeg flytte vinduets knapper til det øverste højre hjørne?" />
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
              <h1 class="entry-title">Brug af KDE eller Xfce i stedet for GNOME-skrivebordet</h1>
              <div class="entry-content">
                <div class="sect1" title="Brug af KDE eller Xfce i stedet for GNOME-skrivebordet">
                  <p>Som standard kommer Ubuntu med GNOME-skrivebordet, som er en populær fri skrivebords-softwarepakke med fokus på brugervenlighed. Andre skrivebordsmiljøer eksisterer som giver forskellige brugeroplevelse.</p>
                  <p>Dette emne dækker hvordan du installerer og bruger et andet skrivebord end standarden GNOME - f.eks. KDE eller Xfce.</p>
                  <div class="sect2" title="Installation af et KDE-skrivebord">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="other-desktop-kde"></a>Installation af et KDE-skrivebord</h3>
                        </div>
                      </div>
                    </div>
                    <p><a class="ulink" href="http://www.kde.org/" target="_top">KDE</a> er et populært, fuldt funktionsdygtigt skrivebordsmiljø. <a class="ulink" href="http://www.kubuntu.org" target="_top">Kubuntu</a> er en version af Ubuntu som bruger KDE-skrivebordet.</p>
                    <p>For at installere og bruge KDE:</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p><a class="ulink" href="apt:kubuntu-desktop" target="_top">Installér <span class="application"><strong>kubuntu-skrivebordet</strong></span>-pakken</a>.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Klik på <span class="application"><strong>Brugerskifteren</strong></span> i øverste højre hjørne af skærmen og tryk der efter på <span class="guibutton"><strong>Log ud</strong></span> for at logge ud af Ubuntu</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Klik <span class="guimenuitem">Indstillinger</span> → <span class="guimenuitem">Vælge session...</span></p>
                        </li>
                        <li class="step" title="Trin 4">
                          <p>Vælg <em class="guilabel">KDE</em> og tryk på <span class="guibutton"><strong>Skift session</strong></span></p>
                        </li>
                        <li class="step" title="Trin 5">
                          <p>Skriv dit brugernavn og kodeord som normalt. KDE bør herefter starte.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Installation af et Xfce-skrivebord">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="other-desktop-xfce"></a>Installation af et Xfce-skrivebord</h3>
                        </div>
                      </div>
                    </div>
                    <p><a class="ulink" href="http://www.xfce.org/" target="_top">Xfce</a> er et skrivebordsmiljø, som er designet til at være hurtigt og fylde meget lidt. <a class="ulink" href="http://www.xubuntu.org" target="_top">Xubuntu</a> er en version af Ubuntu, som bruger Xfce-skrivebordet.</p>
                    <p>For at installere og bruge Xfce:</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p><a class="ulink" href="apt:xubuntu-desktop" target="_top">Installér <span class="application"><strong>xubuntu-skrivebordet</strong></span>-pakken</a>.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Klik på <span class="application"><strong>Brugerskifteren</strong></span> i øverste højre hjørne af skærmen og tryk der efter på <span class="guibutton"><strong>Log ud</strong></span> for at logge ud af Ubuntu</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Klik <span class="guimenuitem">Indstillinger</span> → <span class="guimenuitem">Vælge session...</span></p>
                        </li>
                        <li class="step" title="Trin 4">
                          <p>Vælg <em class="guilabel">Xfce</em> og tryk på <span class="guibutton"><strong>Skift session</strong></span></p>
                        </li>
                        <li class="step" title="Trin 5">
                          <p>Skriv dit brugernavn og kodeord som normalt. Xfce bør herefter starte.</p>
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
              <h3 class="widgettitle">Tilpas din computer</h3>
              <ul>
              <li><a href="window-button-order.php">Hvordan kan jeg flytte vinduets knapper til det øverste højre hjørne?</a></li>
              <li><a href="other-desktops.php">Brug af KDE eller Xfce i stedet for GNOME-skrivebordet</a>
                  <ul>
                  <li><a href="other-desktops.php#other-desktop-kde">Installér et KDE-skrivebord</a></li>
                  <li><a href="other-desktops.php#other-desktop-xfce">Installér et Xfce-skrivebord</a></li>
                  </ul>
              </li>
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
