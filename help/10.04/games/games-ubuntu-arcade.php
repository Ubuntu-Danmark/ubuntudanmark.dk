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
    <title>Arkadespil</title>
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
    <link rel="prev" href="games-ubuntu-popular.php" title="Populære spil" />
    <link rel="next" href="games-ubuntu-card.php" title="Kort-, tænke- og brætspil" />
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
              <h1 class="entry-title">Arkadespil</h1>
              <div class="entry-content">
                <div class="sect1" title="Arkadespil">
                  <p>Arkadespil er oftest simple, sjove spil. Der findes en stor samling arkadespil til Ubuntu, nedenunder vises blot nogle få af dem.</p>
                  <div class="sect2" title="Klassiske arkadespil">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="ubuntu-arcade-classic"></a>Klassiske arkadespil</h3>
                        </div>
                      </div>
                    </div>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p><span class="application"><strong>KBounce</strong></span> er et spil hvor målet er at fange flere bevægende bolde i et rektangulært spillefelt ved at bygge vægge. Efterhånden som du kommer frem i spillet, kommer der flere bolde; hvor mange kan du fange?</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>KFouleggs</strong></span> kopierer det velkendte <span class="emphasis"><em>PuyoPuyo</em></span> spil fra Japan, og indeholder varianter af det velkendte spilprincip bag Tetris.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>Kolf</strong></span> er et minigolfspil set oppefra, en kort streg repræsenterer golfkøllen og retning af det ønskede skud. Spillet indeholder flere forskellige baner, en banebygger, vand, skråninger, sandgrave og sorte huller.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>KSirtet</strong></span> er en klon af <span class="emphasis"><em>Tetris</em></span> med mulighed for at spille multiplayer-dueller, såvel som dueller mod computeren.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>KSmiletris</strong></span> er endnu en klon af <span class="emphasis"><em>Tetris</em></span>, som er nem at komme i gang med.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>Robotter</strong></span> er et spil hvor målet er at undgå en hær af robotter, som forsøger at fange dig. Med hvert skridt kommer robotterne tættere på at fange dig, og du skal gøre alt hvad du kan for at undgå dem.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="sect2" title="Labyrintspil">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="ubuntu-arcade-maze"></a>Labyrintspil</h3>
                        </div>
                      </div>
                    </div>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p><span class="application"><strong>KGoldrunner</strong></span> er et handlings- og gådespil. Gå gennem labyrinten, Undgå dine fjender, saml alt guldet, og klatr op til det næste niveau.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>KSnakerace</strong></span> er et hurtigt handlingsspil, hvor du styrer en slange, som har til formål at spise den mad, der vises på banen. Jo mere du spiser, jo større vokser din slange sig. Målet er at spise så meget som muligt uden at kollidere med en anden slange eller væggen, men det bliver sværere og sværere jo mere du spiser.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>KTron</strong></span> er baseret på det populære computerspil for to spillere, såvel som den kendte film. Det er et hurtigt spil hvori begge spillere skal bevæge sig for at undgå at støde ind i vægge, modstanderen eller de veje som du eller din modstander har skabt.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>Nibbles</strong></span> er et spil hvor spilleren kontrollerer en slange, bevæger den rundt på banen og lader den spise diamanter mens den undgår væggene. <span class="application"><strong>Nibbles</strong></span> kan også spilles af flere spillere over netværk, og computeren selv kan styre op til fire orme.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="sect2" title="Rumspil">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="ubuntu-arcade-space"></a>Rumspil</h3>
                        </div>
                      </div>
                    </div>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p><span class="application"><strong>KAsteroids</strong></span> er et hurtigt arkade-skydespil hvor du kommanderer et rumskib som forsøger at overleve en passage gennem et asteroidefelt. Ødelæg asteroider ved at skyde dem indtil de deler sig i mindre og mindre stykker.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>KSpaceDuel</strong></span> er et rumspil for to spillere - dog kan den ene også styres af computeren. Hver spiller kontrollerer en satellit som flyver rundt om solen, mens den forsøger ikke at støde ind i noget og skyde på modstanderens rumskib.</p>
                        </li>
                      </ul>
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
    <script async="true" type="text/javascript" src="/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
