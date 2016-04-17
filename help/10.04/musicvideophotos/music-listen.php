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
    <title>Lyt</title>
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
    <link rel="home" href="index.php" title="Musik, video og fotos" />
    <link rel="up" href="music.php" title="Kapitel 1. Musik" />
    <link rel="prev" href="music.php" title="Kapitel 1. Musik" />
    <link rel="next" href="music-extract.php" title="Udtrække fra en cd" />
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
              <h1 class="entry-title">Lyt</h1>
              <div class="entry-content">
                <div class="sect1" title="Lyt">
                  <p>Du kan bruge <span class="application"><strong>Rhythmbox</strong></span> (<span class="guimenu">Programmer</span> → <span class="guimenuitem">Lyd &amp; video</span> → <span class="guimenuitem">Rhythmbox musikafspiller</span>) og <span class="application"><strong>Filmafspiller</strong></span> (<span class="guimenu">Programmer</span> → <span class="guimenuitem">Lyd &amp; video</span> → <span class="guimenuitem">Filmafspiller</span>) for at høre musik på din computer.</p>
                  <p>Lydfiler vil åbne i Filmafspiller, når der dobbeltklikkes på dem, men Rhythmbox er bedre til at håndtere store musiksamlinger.</p>
                  <p>Rhythmbox er også i stand til at afspille lyd-cd'er og håndtere MP3-afspillere. Programmet bør åbne automatisk, når du indsætter en cd.</p>
                  <p>Se <a class="ulink" href="http://library.gnome.org/users/rhythmbox/unstable/" target="_top"> Rhythmboxmanualen</a> for yderligere information.</p>
                  <div class="sect2" title="Hvordan kan jeg forhindre cd'er fra at blive afspillet, når jeg indsætter dem?">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="music-cd-autoplay"></a>Hvordan kan jeg forhindre cd'er fra at blive afspillet, når jeg indsætter dem?</h3>
                        </div>
                      </div>
                    </div>
                    <p>Rhythmbox bør automatisk begynde at afspille en cd, når du indsætter den i dit cd-drev.</p>
                    <p>For at forhindre dette i at ske, så åbn din hjemmemappe ved at klikke på <span class="guimenu">Steder</span> → <span class="guimenuitem">Hjemmemappe</span> på panelet i toppen af skærmen. Klik så på <span class="guimenuitem">Rediger</span> → <span class="guimenuitem">Indstillinger</span> → <span class="guimenuitem">Media</span> og ændr <em class="guilabel">Cd-lyd</em> indstillingen til <em class="guilabel">Gør ingenting</em>. Tryk til sidst på <span class="guibutton"><strong>Luk</strong></span>.</p>
                    <p>Se <a class="ulink" href="http://library.gnome.org/users/user-guide/2.30/nautilus-preferences.html" target="_top"> Nautilus Preferences article</a> for yderligere information.</p>
                  </div>
                  <div class="sect2" title="Sangnavne/omslag mangler/er forkerte for nogle sange">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="music-missingmetadata"></a>Sangnavne/omslag mangler/er forkerte for nogle sange</h3>
                        </div>
                      </div>
                    </div>
                    <p>Programmer til musikafspilning henter omslag og anden information om sangene på internettet. Hvis sangnavne eller omslag mangler så vær sikker på, at du er forbundet til internettet.</p>
                    <p>Nogle gange vil din musikafspiller ikke være i stand til at identificere en bestemt sang eller et album korrekt. Hvis dette er tilfældet, kan du tilføje de korrekte oplysninger manuelt ved hjælp af et mærkeværktøj såsom <a class="ulink" href="apt:cowbell" target="_top">Cowbell</a> eller <a class="ulink" href="apt:easytag-aac" target="_top">EasyTAG</a>. Nogle musikafspillere, såsom Rhythmbox og Banshee har deres eget mærkeværktøj inkluderet.</p>
                    <p><span class="strong"><strong>Hvis kun albumomslag mangler fra et album:</strong></span>
			</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Find et billede af omslaget på internettet. <a class="ulink" href="http://www.amazon.com/" target="_top">Amazon</a> og andre musikforretninger har ofte billeder af omslag; højreklik og vælg <span class="guibutton"><strong>Gem billede som</strong></span> for at gemme billedet på din computer.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Omdøb billedet til <code class="filename">cover.jpg</code> og kopier det til mappen som indeholder sangene fra albummet.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Rhythmbox og andre musikafspillere børe vise det korrekte omslag, når en sang fra albummet bliver afspillet.</p>
                        </li>
                      </ol>
                    </div>
                    <p>Rhythmbox og nogle andre musikafspillere lader dig trække et billede hen på det vindue, som viser omslaget og ændre eller tilføje et omslag for et album.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aside main-aside" id="secondary" style="-moz-border-radius: 5px 5px 5px 5px;">
          <ul class="xoxo">
            <li class="widgetcontainer widget" id="">
              <h3 class="widgettitle">Musik, video og fotos</h3>
              <ul>
              <li><a href="music.php">1. Musik</a>
                  <ul>
                  <li><a href="music-listen.php">Lyt</a>
                      <ul>
                      <li><a href="music-listen.php#music-cd-autoplay">Hvordan kan jeg forhindre cd'er fra at blive afspillet, når jeg indsætter dem?</a></li>
                      <li><a href="music-listen.php#music-missingmetadata">Sangnavne/omslag mangler/er forkerte for nogle sange</a></li>
                      </ul>
                  </li>
                  <li><a href="music-extract.php">Udtrække fra en cd</a></li>
                  <li><a href="music-burn.php">Kopiér til en cd</a></li>
                  <li><a href="music-portable.php">Transportable musikafspillere</a>
                      <ul>
                      <li><a href="music-portable.php#music-portable-ipod">iPod</a></li>
                      <li><a href="music-portable.php#music-portable-mtp">MTP-medieafspillere</a></li>
                      </ul>
                  </li>
                  <li><a href="music-convert.php">Konvertering af musikfiler</a></li>
                  <li><a href="music-podcasts.php">Podcasts og internetradio-stationer</a></li>
                  <li><a href="music-download.php">Hent musik på internettet</a></li>
                  <li><a href="music-recording.php">Optag lyd</a></li>
                  <li><a href="music-microphone.php">Min mikrofon virker ikke eller er for lav</a></li>
                  </ul>
              </li>
              <li><a href="video.php">2. Film, dvd'er og videoer</a>
                  <ul>
                  <li><a href="video-dvd.php">Afspilning af dvd'er</a></li>
                  <li><a href="video-playback.php">Hvordan kan jeg afspille mine videoer?</a>
                      <ul>
                      <li><a href="video-playback.php#video-playback-file">Videofiler</a></li>
                      <li><a href="video-playback.php#video-playback-flash">Flashvideoer</a></li>
                      <li><a href="video-playback.php#video-playback-streaming">Streaming af video</a></li>
                      <li><a href="video-playback.php#video-playback-unsupported">Videoer som ellers ikke er understøttet</a></li>
                      </ul>
                  </li>
                  <li><a href="video-realplayer.php">Installering og opsætning af RealPlayer</a></li>
                  <li><a href="video-editing.php">Optagelse og redigering af video</a></li>
                  </ul>
              </li>
              <li><a href="photos.php">3. Billeder og kameraer</a>
                  <ul>
                  <li><a href="photos-import.php">Importér fotos fra digitalkamera, harddisk eller hukommelseskort</a></li>
                  <li><a href="photos-organize.php">Organiser din billedsamling</a></li>
                  <li><a href="photos-slideshow.php">Se et diasshow af dine billeder</a>
                      <ul>
                      <li><a href="photos-slideshow.php#photos-slideshow-screensaver">Indstil et diasshow som din pauseskærm</a></li>
                      </ul>
                  </li>
                  <li><a href="photos-printing.php">Udskriv billeder</a>
                      <ul>
                      <li><a href="photos-printing.php#photos-printing-settings">Printeropsætning</a></li>
                      <li><a href="photos-printing.php#photos-printing-advanced">Avanceret billedudskrivning</a></li>
                      </ul>
                  </li>
                  <li><a href="photos-sharing.php">Del dine billeder</a></li>
                  <li><a href="photos-editing.php">Rediger og forbedr billeder</a>
                      <ul>
                      <li><a href="photos-editing.php#photos-rotating">Roter billeder</a></li>
                      <li><a href="photos-editing.php#photos-resizing">Juster størrelse på billeder</a></li>
                      </ul>
                  </li>
                  </ul>
              </li>
              <li><a href="cdburning.php">4. Brænde cd'er og dvd'er</a></li>
              <li><a href="troubleshooting.php">5. Løsninger på almindelige problemer</a></li>
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
