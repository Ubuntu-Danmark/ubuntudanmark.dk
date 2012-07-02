FWY<?php
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
    <title xmlns="">Windows-spil</title>
    <meta xmlns="" http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta xmlns="" name="robots" content="index,follow" />
    <link xmlns="" rel="canonical" href="http://ubuntudanmark.dk/support/" />
    <link xmlns="" rel="stylesheet" type="text/css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/style.css" />
    <link xmlns="" rel="pingback" href="http://ubuntudanmark.dk/xmlrpc.php" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Feed" href="http://ubuntudanmark.dk/feed/" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Kommentarfeed" href="http://ubuntudanmark.dk/comments/feed/" />
    <link xmlns="" rel="stylesheet" id="nivo-slider-css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/slider/nivo-slider.css?ver=2" type="text/css" media="all" />
    <script async="true" xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
    <script async="true" xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/jquery.corner.js?ver=2.08"></script>
    <script async="true" xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/slider/jquery.nivo.slider.pack.js?ver=2"></script>
    <script async="true" xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-includes/js/comment-reply.js?ver=20090102"></script>
    <script async="true" xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/plugins/google-analyticator/external-tracking.min.js?ver=6.1.1"></script>
    <link xmlns="" rel="EditURI" type="application/rsd+xml" title="RSD" href="http://ubuntudanmark.dk/xmlrpc.php?rsd" />
    <link xmlns="" rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://ubuntudanmark.dk/wp-includes/wlwmanifest.xml" />
    <link xmlns="" rel="index" title="Ubuntu Danmark" href="http://ubuntudanmark.dk/" />
    <link xmlns="" rel="prev" title="Om Ubuntu" href="http://ubuntudanmark.dk/om-ubuntu/" />
    <link xmlns="" rel="next" title="Download" href="http://ubuntudanmark.dk/download/" />
    <link xmlns="" rel="canonical" href="http://ubuntudanmark.dk/support/" />
    <link xmlns="" rel="shortcut icon" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/images/favicon.ico" type="image/x-icon" />
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
    <link rel="home" href="index.php" title="Spil" />
    <link rel="up" href="index.php" title="Spil" />
    <link rel="prev" href="games-ubuntu-strategy-sim.php" title="Strategi- og simulationsspil" />
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
              <h1 class="entry-title">Windows-spil</h1>
              <div class="entry-content">
                <div class="sect1" title="Windows-spil">
                  <p>Mange spil, som findes til Windows, kan køres i Linux ved at bruge en emulator, såsom <span class="application"><strong>Wine</strong></span> eller <span class="application"><strong>Cedega</strong></span>.</p>
                  <p>Disse emulatorer virker kun på <span class="emphasis"><em>x86</em></span> (Intel-baserede) computerere, og vil ikke fungere på <span class="emphasis"><em>AMD64</em></span> eller <span class="emphasis"><em>PowerPC</em></span> computere.</p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p>
                          <span class="strong">
                            <strong>Wine (fri)</strong>
                          </span>
                        </p>
                        <p><span class="application"><strong>Wine</strong></span> er fri software og er i stand til at køre flere populære spil, såsom <span class="application"><strong>World of Warcraft</strong></span> og <span class="application"><strong>Unreal Tournament</strong></span>. Du kan finde information om Wine på <a class="ulink" href="https://help.ubuntu.com/community/Wine" target="_top">Ubuntu-wikien</a>.</p>
                      </li>
                      <li class="listitem">
                        <p>
                          <span class="strong">
                            <strong>Cedega (kommerciel)</strong>
                          </span>
                        </p>
                        <p><span class="application"><strong>Cedega</strong></span> er baseret på Wine, men er optimeret til at køre Windows-spil. Cedega er kommerciel software, og er derfor ikke gratis, men det er i stand til at køre flere spil end Wine. For oplysninger om Cedega, se <a class="ulink" href="https://help.ubuntu.com/community/Cedega" target="_top">Ubuntus wikiside</a>.</p>
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
              <h3 class="widgettitle">Spil</h3>
              <ul>
              <li><a href="games-ubuntu-popular.php">Populære spil</a>
                  <ul>
                  <li><a href="games-ubuntu-popular.php#games-popular-neverball">Neverball</a></li>
                  <li><a href="games-ubuntu-popular.php#games-popular-scorched">Scorched3D</a></li>
                  <li><a href="games-ubuntu-popular.php#games-popular-chromium">Chromium</a></li>
                  <li><a href="games-ubuntu-popular.php#games-popular-frozenbubble">Frozen Bubble</a></li>
                  <li><a href="games-ubuntu-popular.php#games-popular-supertux">SuperTux</a></li>
                  <li><a href="games-ubuntu-popular.php#games-popular-planetpenguinracer">PlanetPenguin Racer</a></li>
                  <li><a href="games-ubuntu-popular.php#games-popular-tremulous">Tremulous</a></li>
                  <li><a href="games-ubuntu-popular.php#games-popular-nexuiz">Nexuiz</a></li>
                  </ul>
              </li>
              <li><a href="games-ubuntu-arcade.php">Arkadespil</a>
                  <ul>
                  <li><a href="games-ubuntu-arcade.php#ubuntu-arcade-classic">Klassiske arkadespil</a></li>
                  <li><a href="games-ubuntu-arcade.php#ubuntu-arcade-maze">Labyrintspil</a></li>
                  <li><a href="games-ubuntu-arcade.php#ubuntu-arcade-space">Rumspil</a></li>
                  </ul>
              </li>
              <li><a href="games-ubuntu-card.php">Kort-, tænke- og brætspil</a>
                  <ul>
                  <li><a href="games-ubuntu-card.php#ubuntu-card-card">Kortspil</a></li>
                  <li><a href="games-ubuntu-card.php#ubuntu-card-board">Brætspil</a></li>
                  <li><a href="games-ubuntu-card.php#ubuntu-card-puzzle">Tænkespil</a></li>
                  </ul>
              </li>
              <li><a href="games-ubuntu-kids.php">Børnespil</a></li>
              <li><a href="games-ubuntu-strategy-sim.php">Strategi- og simulationsspil</a></li>
              <li><a href="ar01s06.php">Windows-spil</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div id="footer">
        <div id="siteinfo"></div>
      </div>
    </div>
    <script async="true" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
