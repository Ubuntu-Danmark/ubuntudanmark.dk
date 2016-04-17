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
    <title>Kort-, tænke- og brætspil</title>
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
    <link rel="prev" href="games-ubuntu-arcade.php" title="Arkadespil" />
    <link rel="next" href="games-ubuntu-kids.php" title="Børnespil" />
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
              <h1 class="entry-title">Kort-, tænke- og brætspil</h1>
              <div class="entry-content">
                <div class="sect1" title="Kort-, tænke- og brætspil">
                  <p>Kort- og tænkespil er meget populære, og Ubuntu har en stor samling af sådanne spil som du kan vælge imellem. Nedenfor vises en liste over nogle af de mest populære.</p>
                  <div class="sect2" title="Kortspil">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="ubuntu-card-card"></a>Kortspil</h3>
                        </div>
                      </div>
                    </div>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p><span class="application"><strong>Kabale</strong></span>, <span class="emphasis"><em>Aisleriot</em></span>, er en samling af diverse kortspil til en spiller, som er nemme at lære og sjove at spille.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>Blackjack</strong></span> er et blackjack-spil med kasinoregler. Målet er at have kort med en højere sum end kortgiverens kort, uden at den må overstige 21. Billedkort plus et es giver 21, Blackjack!</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>Napoleon</strong></span> (eller <span class="application"><strong>FreeCell</strong></span>) er en anden <span class="emphasis"><em>kabale</em></span>, som er meget populært på <span class="trademark">Windows</span>™-platformen.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>KPatience</strong></span> er en samling af diverse verdenskendte tålmodighedsspil. Det indeholder blandt andet <span class="emphasis"><em>Klondike</em></span>, <span class="emphasis"><em>Napoleon</em></span>, <span class="emphasis"><em>Yukon</em></span> og mange flere.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>KPoker</strong></span> følger reglerne fra det originale <span class="emphasis"><em>Poker</em></span>. Spilleren kan spille mod computeren, og vælge imellem flere forskellige sæt kort.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>Lieutnant Skat</strong></span> er et kortspil for to spillere, som følger reglerne fra det tyske spil <span class="emphasis"><em>(Offiziers)-Skat</em></span>. Spillet indeholder også en computermodstander som kan spille i stedet for en, eller begge, spillere.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="sect2" title="Brætspil">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="ubuntu-card-board"></a>Brætspil</h3>
                        </div>
                      </div>
                    </div>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p><span class="application"><strong>Atlantik</strong></span> er en spilklient til <span class="trademark">Monopoly</span>™-lignende brætspil som spilles på monopd-netværket. Det er baseret på åben kildetekst.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>Skak</strong></span> (eller <span class="application"><strong>glChess</strong></span>) er et skakspil hvor du kan spille mod computeren eller mod andre spillere. Skak finder og gør brug af kendte tredjeparts-skakmotorer til computermodstandere, og kan vise skakpladen i 2D eller 3D.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>KBackgammon</strong></span> følger reglerne fra det populære brætspil, og understøtter flere spillere og spil mod computermotorer såsom GNU bg, såvel som andre onlinespil.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>KBlackbox</strong></span> er en logisk gemmeleg, inspireret af <span class="emphasis"><em>emacs blackbox</em></span> og som spilles på et net af kasser.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>Kenolaba</strong></span> er et taktisk spil til to spillere, med samme regler som brætspillet <span class="emphasis"><em>Abalone</em></span>, hvor spillere forsøger at skubbe deres modstanders brikker ud af spillebrættet.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>KMahjongg</strong></span> er en klon af det velkendte brik-baserede tålmodighedsspil af samme navn. Dit mål er at tømme brættet ved at sætte identiske brikker sammen to og to.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>KReversi</strong></span> er et spil til to spillere, baseret på brætspillet <span class="application"><strong>Othello</strong></span> (også kendt som <span class="application"><strong>Reversi</strong></span>). I spillet får spillere størstedelen af brikkerne på spillebrættet ved at placere deres brikker taktisk for at kunne overtage deres modstanders brikker.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>KWin4</strong></span>, eller <span class="emphasis"><em>Four wins</em></span>, er et spil for to spillere, som følger reglerne fra det kendte spil <span class="trademark">Fire på stribe</span>™. Få fire brikker af samme farve på stribe for at vinde!</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>Mahjongg</strong></span> er en single-player version af det klassiske brikspil. Målet er at sætte identiske brikker sammen to og to.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>Shishen-Sho</strong></span> minder meget om <span class="emphasis"><em>Mahjongg</em></span>, og spilles ved at fjerne alle brikker fra brættet, to ad gangen, ved at finde identiske brikker.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="sect2" title="Tænkespil">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="ubuntu-card-puzzle"></a>Tænkespil</h3>
                        </div>
                      </div>
                    </div>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p><span class="application"><strong>Anagramarama</strong></span> er et ordspil i hurtigt tempo, hvor du skal finde så mange ord som muligt fra en række blandede bogstaver. Hvis du finder de længste ord, kan du komme videre til næste niveau.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>Atomix</strong></span> er et tænkespil hvor du skal sætte en række atomer sammen for at skabe bestemte molekyler. Atomerne kan dog kun flyttes af bestemte veje, hvilket gør komplekse molekyler udfordrende at opbygge. Spillet forudsætter ingen viden om kemi.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>KAtomic</strong></span> er et tænkespil meget ligesom <span class="application"><strong>Atomix</strong></span>, hvor du skal danne kemiske molekyler ud fra atomer. Dette gøres ved at flytte hvert atom i en labyrint indtil du har dannet et fuldstændigt molekyle.</p>
                        </li>
                        <li class="listitem">
                          <p><span class="application"><strong>Sudoku</strong></span> er en populært talbaseret kryds-og-tværs. Brug din logiske sans til at færdiggøre et net af tal så hver række, kolonne og store firkant indeholder tallene et til ni.</p>
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
