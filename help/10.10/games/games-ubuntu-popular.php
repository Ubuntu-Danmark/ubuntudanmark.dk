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
    <title xmlns="">Populære spil</title>
    <meta xmlns="" http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta xmlns="" name="robots" content="index,follow" />
    <link xmlns="" rel="canonical" href="http://ubuntudanmark.dk/support/" />
    <link xmlns="" rel="stylesheet" type="text/css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/style.css" />
    <link xmlns="" rel="pingback" href="http://ubuntudanmark.dk/xmlrpc.php" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Feed" href="http://ubuntudanmark.dk/feed/" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Kommentarfeed" href="http://ubuntudanmark.dk/comments/feed/" />
    <link xmlns="" rel="stylesheet" id="nivo-slider-css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/slider/nivo-slider.css?ver=2" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" media="print" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/print.css" />
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
    <link rel="prev" href="index.php" title="Spil" />
    <link rel="next" href="games-ubuntu-arcade.php" title="Arkadespil" />
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
              <h1 class="entry-title">Populære spil</h1>
              <div class="entry-content">
                <div class="sect1" title="Populære spil">
                  <p>En liste over nogle af de mest populære spil, som er tilgængelige i Ubuntu.</p>
                  <div class="sect2" title="Neverball">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="games-popular-neverball"></a>Neverball</h3>
                        </div>
                      </div>
                    </div>
                    <p><span class="application"><strong>Neverball</strong></span>, halvt puzzle og halvt actionspil, er en test af dine evner. Målet med spillet er at rulle kuglen gennem en forhindringsbane ved at vippe gulvet - og nå til målet før tiden løber ud.</p>
                    <p>Med i <span class="application"><strong>Neverball</strong></span>-pakken er også spillet <span class="application"><strong>Neverputt</strong></span>. <span class="application"><strong>Neverputt</strong></span> er et minigolfspil som kan spilles af flere spillere ved samme computer. Det er baseret på <span class="application"><strong>Neverball</strong></span>, og det er derfor i øjeblikket ikke muligt at installere <span class="application"><strong>Neverputt</strong></span> seperat.</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p><a class="ulink" href="apt:neverball" target="_top">Installér <span class="application"><strong>neverball</strong></span>-pakken</a> fra <span class="quote">“<span class="quote">Universe</span>”</span>-depotet.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Vælg <span class="guimenu">Programmer</span> → <span class="guisubmenu">Spil</span> → <span class="guisubmenu">Neverball</span> for at spille <span class="application"><strong>Neverball</strong></span>.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Vælg <span class="guimenu">Programmer</span> → <span class="guisubmenu">Spil</span> → <span class="guisubmenu">Neverputt</span> for at spille <span class="application"><strong>Neverputt</strong></span>.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Scorched3D">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="games-popular-scorched"></a>Scorched3D</h3>
                        </div>
                      </div>
                    </div>
                    <p><span class="application"><strong>Scorched3D</strong></span> er en 3D genskabning af <span class="emphasis"><em>Scorched Earth</em></span>, et spil om artilleridueller.</p>
                    <p>For at kunne spille Scorched3D kræves det, at du har installeret hardwareaccelerede 3D-drivere til dit grafikkort</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p><a class="ulink" href="apt:scorched3d" target="_top">Installér <span class="application"><strong>scorched3d</strong></span>-pakken</a> fra <span class="quote">“<span class="quote">Universe</span>”</span>-depotet.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>For at starte <span class="application"><strong>Scorched3D</strong></span>, vælg <span class="guimenu">Programmer</span> → <span class="guisubmenu">Spil</span> → <span class="guimenuitem">Scorched 3D</span>.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Chromium">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="games-popular-chromium"></a>Chromium</h3>
                        </div>
                      </div>
                    </div>
                    <p><span class="application"><strong>Chromium</strong></span> er et hurtigt, arkade-stil, oppe-fra-ned skydespil i det ydre rum. Som kaptajn på Chromium B.S.U., er dit mål at levere forsyninger til tropperne på frontlinjen. Det har en mindre flåde af robotkrigere, som du styre i relative sikkerhed fra Chromium faretøjet. Mere information om spillet kan findes på <a class="ulink" href="http://www.reptilelabour.com/software/chromium/" target="_top">Chromium hjemmesiden</a>.</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Installér <span class="application"><strong>chromium</strong></span>-pakken fra <span class="quote">“<span class="quote">Universe</span>”</span>-depotet (se <a class="ulink" href="../add-applications/" target="_top">Tilføj programmer</a>).</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Vælg <span class="guimenu">Programmer</span> → <span class="guisubmenu">Spil</span> → <span class="guisubmenu">Chromium</span> for at spille <span class="application"><strong>Chromium</strong></span>.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Frozen Bubble">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="games-popular-frozenbubble"></a>Frozen Bubble</h3>
                        </div>
                      </div>
                    </div>
                    <p><span class="application"><strong>Frozen Bubble</strong></span> er en klon af det populære <span class="emphasis"><em>Puzzle Bobble</em></span> spil. Målet med spillet er at skyde bobler i grupper af samme farve for at få dem til at sprænge. Spillet indeholder 100 enkeltspiller-baner, én tospiller-tilstand, samt musik og slående grafik. Mere information om spillet kan findes på <a class="ulink" href="http://www.frozen-bubble.org/" target="_top">Frozen Bubble hjemmesiden</a>.</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p><a class="ulink" href="apt:frozen-bubble" target="_top">Installér <span class="application"><strong>frozen-bubble</strong></span>-pakken</a> fra <span class="quote">“<span class="quote">Universe</span>”</span>-depotet.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Vælg <span class="guimenu">Programmer</span> → <span class="guisubmenu">Spil</span> → <span class="guisubmenu">Frozen Bubble</span> for at spille <span class="application"><strong>Frozen Bubble</strong></span>.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="SuperTux">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="games-popular-supertux"></a>SuperTux</h3>
                        </div>
                      </div>
                    </div>
                    <p><span class="application"><strong>SuperTux</strong></span> er et klassisk 2D hoppe og løbe siderulningsspil spil i en stil, der ligner det oprindelige spil <span class="emphasis"><em><span class="trademark">Super Mario Bros.</span>™</em></span>. Mere information om spillet kan findes på <a class="ulink" href="http://supertux.berlios.de/" target="_top">SuperTux' hjemmeside</a>.</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p><a class="ulink" href="apt:supertux" target="_top">Installér <span class="application"><strong>supertux</strong></span>-pakken</a> fra <span class="quote">“<span class="quote">Universe</span>”</span>-depotet.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Vælg <span class="guimenu">Programmer</span> → <span class="guisubmenu">Spil</span> → <span class="guisubmenu">SuperTux</span> for at spille <span class="application"><strong>SuperTux</strong></span>.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="PlanetPenguin Racer">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="games-popular-planetpenguinracer"></a>PlanetPenguin Racer</h3>
                        </div>
                      </div>
                    </div>
                    <p><span class="application"><strong>PlanetPenguin Racer</strong></span> er en forgrening oprettet fra den sidste GPL-licenserede version af <span class="emphasis"><em>Tux Racer</em></span>. Udover banerne fra det oprindelige spil indeholder <span class="application"><strong>PlanetPenguin Racer</strong></span> også yderligere baner, som er blevet udviklet af fællesskabet. Spillets mål er at glide ned af bjerget, samle fisk op på vejen, og forsøge at nå målet på den kortest mulige tid.</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p><a class="ulink" href="apt:planetpenguin-racer" target="_top">Installér <span class="application"><strong>planetpenguin-racer</strong></span>-pakken</a> fra <span class="quote">“<span class="quote">Universe</span>”</span>-depotet.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Vælg <span class="guimenu">Programmer</span> → <span class="guisubmenu">Spil</span> → <span class="guisubmenu">Planet Penguin Racer</span> for at spille <span class="application"><strong>Planet Penguin Racer</strong></span>.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Tremulous">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="games-popular-tremulous"></a>Tremulous</h3>
                        </div>
                      </div>
                    </div>
                    <p><span class="application"><strong>Tremulous</strong></span> er et frit / åben kildetekst spil som blander holdbaseret førstepersons skydespil (First Person Shooter, FPS) med elementer fra real-time strategispil (Real Time Strategy, RTS). Spilleren kan vælge mellem to unikker racer: aliens og mennesker. Målet er at eliminere modstanderholdet ved ikke alene at dræbe modstandere, men også fjerne deres mulighed for at komme igen ved at ødelægge deres startstrukturer. Mere information om spillet kan findes på <a class="ulink" href="http://tremulous.net/" target="_top">Tremulous' hjemmesiden</a>.</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p><a class="ulink" href="apt:tremulous" target="_top">Installér <span class="application"><strong>tremulous</strong></span>-pakken</a> fra <span class="quote">“<span class="quote">Universe</span>”</span>-depotet.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Vælg <span class="guimenu">Programmer</span> → <span class="guisubmenu">Spil</span> → <span class="guisubmenu">Tremulous</span> for at spille <span class="application"><strong>Tremulous</strong></span>.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Nexuiz">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="games-popular-nexuiz"></a>Nexuiz</h3>
                        </div>
                      </div>
                    </div>
                    <p><span class="application"><strong>Nexuiz</strong></span> er et 3D dødskampspil baseret på Darkplaces-motoren, som er en avanceret udgave af <span class="emphasis"><em>Quake 1</em></span>-motor, som bygget på OpenGL-teknologi. Spillet indeholder 17 baner, 15 spillefigurer, avanceret brugerflade, og en tilgængelig hoved-server giver dig mulighed for at spille mod mennesker fra hele verden. Mere information om spillet kan findes på <a class="ulink" href="http://www.alientrap.org/nexuiz/index.php" target="_top">Nexuiz hjemmesiden</a>.</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p><a class="ulink" href="apt:nexuiz" target="_top">Installér <span class="application"><strong>nexuiz</strong></span>-pakken</a> fra <span class="quote">“<span class="quote">Universe</span>”</span>-depotet.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Vælg <span class="guimenu">Programmer</span> → <span class="guisubmenu">Spil</span> → <span class="guisubmenu">Nexuiz</span> for at spille <span class="application"><strong>Nexuiz</strong></span>.</p>
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
