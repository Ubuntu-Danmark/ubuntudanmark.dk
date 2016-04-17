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
    <title>Strategi- og simulationsspil</title>
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
    <link rel="home" href="index.php" title="Spil" />
    <link rel="up" href="index.php" title="Spil" />
    <link rel="prev" href="games-ubuntu-kids.php" title="Børnespil" />
    <link rel="next" href="ar01s06.php" title="Windows-spil" />
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
              <h1 class="entry-title">Strategi- og simulationsspil</h1>
              <div class="entry-content">
                <div class="sect1" title="Strategi- og simulationsspil">
                  <p>Strategispil kræver at du bruger nøje gennemtænkt taktik til at planlægge dit næste træk, mens simulationsspil lader dig udforske og håndtere realistiske modeller af eksempelvis byer og fartøj. Strategi- og simulationsspil kan være temmelig afhængighedsskabende, og mange mennesker bruger gladeligt flere timer på deres yndlingsspil! Nedenfor vises et lille udvalg af strategi- og simulationsspil til Ubuntu.</p>
                  <div class="itemizedlist">
                    <ul class="itemizedlist" type="disc">
                      <li class="listitem">
                        <p><span class="application"><strong>KBattleship</strong></span> er en implementering af det populære spil <span class="emphasis"><em>Sænke slagskibe</em></span> hvor dit mål er at sænke din modstanders skibe ved at gætte hvor de er på et gitter. Spil mod computeren eller mod andre over internettet. "<span class="emphasis"><em>Du sank mit slagskib!</em></span>"</p>
                      </li>
                      <li class="listitem">
                        <p><span class="application"><strong>KJumpingcube</strong></span> er et taktisk spil for en eller to spillere. Spillebrættet består af firkanter, som indeholder point som kan øges. Målet er at få så mange felter som muligt, og til sidst vinde hele brættet.</p>
                      </li>
                      <li class="listitem">
                        <p><span class="application"><strong>Klickety</strong></span> er en anden udgave af spillet <span class="emphasis"><em>Clickomania</em></span>, som har regler der ligner dem fra <span class="application"><strong>Same Game</strong></span>. Målet er at rydde brættet ved at klikke på grupper for at ødelægge dem.</p>
                      </li>
                      <li class="listitem">
                        <p><span class="application"><strong>KMines</strong></span> er en klon af det klassiskel <span class="emphasis"><em>Minestryger</em></span>, hvor du skal finde skjulte miner ved logisk deduktion.</p>
                      </li>
                      <li class="listitem">
                        <p><span class="application"><strong>Kolor Lines</strong></span>, eller <span class="application"><strong>KLines</strong></span>, er KDE-versionen af det russiske spil <span class="emphasis"><em>Lines</em></span>, hvor du skal sætte fem brikker med samme farve på række for at fjerne dem fra spillebrættet.</p>
                      </li>
                      <li class="listitem">
                        <p><span class="application"><strong>Konquest</strong></span>,KDE-versionen af <span class="emphasis"><em>Gnu-Lactic Konquest</em></span>, er et strategispil for flere spillere, hvor målet er at udvide dit intergalaktiske rige over hele galaksen og knuse dine fjender.</p>
                      </li>
                      <li class="listitem">
                        <p><span class="application"><strong>KSokoban</strong></span> er et tænkespil, hvor du som vedligeholder af et varehus forsøger at skubbe kasser ind på deres rigtige pladser i et varehus.</p>
                      </li>
                      <li class="listitem">
                        <p><span class="application"><strong>KSame</strong></span>, inspireret af spillet <span class="emphasis"><em>Same Game</em></span>, er et simpelt spil hvor man spiller om at få flest point. Målet er at fjerne så mange identiske kugler der rører hinanden som muligt for at få flest point. Hurtigheden, mængden af kugler der fjernes på en gang og musens bevægelse hen over mulige kugler tages i betragtning ved udregningen af den endelige bedømmelse.</p>
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
    <script async="true" type="text/javascript" src="/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
