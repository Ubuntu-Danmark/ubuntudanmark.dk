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
    <title xmlns="">Transportable musikafspillere</title>
    <meta xmlns="" http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta xmlns="" name="robots" content="index,follow" />
    <link xmlns="" rel="canonical" href="/support/" />
    <link xmlns="" rel="stylesheet" type="text/css" href="/wp-content/themes/light-wordpress-theme/style.css" />
    <link xmlns="" rel="pingback" href="/xmlrpc.php" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Feed" href="/feed/" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Kommentarfeed" href="/comments/feed/" />
    <link rel="stylesheet" type="text/css" media="print" href="/wp-content/themes/light-wordpress-theme/print.css" />
    <script async="true" xmlns="" type="text/javascript" src="/wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
    <script async="true" xmlns="" type="text/javascript" src="/wp-includes/js/comment-reply.js?ver=20090102"></script>
    <script async="true" xmlns="" type="text/javascript" src="/wp-content/plugins/google-analyticator/external-tracking.min.js?ver=6.1.1"></script>
    <link xmlns="" rel="EditURI" type="application/rsd+xml" title="RSD" href="/xmlrpc.php?rsd" />
    <link xmlns="" rel="wlwmanifest" type="application/wlwmanifest+xml" href="/wp-includes/wlwmanifest.xml" />
    <link xmlns="" rel="index" title="Ubuntu Danmark" href="/" />
    <link xmlns="" rel="prev" title="Om Ubuntu" href="/om-ubuntu/" />
    <link xmlns="" rel="next" title="Download" href="/download/" />
    <link xmlns="" rel="canonical" href="/support/" />
    <link xmlns="" rel="shortcut icon" href="/wp-content/themes/light-wordpress-theme/images/favicon.ico" type="image/x-icon" />
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
    <link rel="home" href="index.php" title="Musik, video og fotos" />
    <link rel="up" href="music.php" title="Kapitel 1. Musik" />
    <link rel="prev" href="music-burn.php" title="Kopiér til en cd" />
    <link rel="next" href="music-convert.php" title="Konvertering af musikfiler" />
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
              <h1 class="entry-title">Transportable musikafspillere</h1>
              <div class="entry-content">
                <div class="sect1" title="Transportable musikafspillere">
                  <p>Ubuntu virker med de fleste mobile lydafspillere, inklusiv iPods. Det eneste du normalt skal gøre er at slutte afspilleren til din computer og så bruge Rhythmbox til at kopiere sangene til og fra afspilleren. Afspilleren bør vise sig i <em class="guilabel">Enhedsafsnittet</em> af listen som befinder sig under <span class="guibutton"><strong>Afspilknappen</strong></span>. Se <a class="ulink" href="http://library.gnome.org/users/rhythmbox/unstable/" target="_top">Rhythmbox musikafspiller manual</a> for yderligere information.</p>
                  <div class="sect2" title="iPod">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="music-portable-ipod"></a>iPod</h3>
                        </div>
                      </div>
                    </div>
                    <p>Ubuntus standardprogram til musikhåndtering, <span class="application"><strong>Rhythmbox</strong></span> (<span class="guimenu">Programmer</span> → <span class="guimenuitem">Lyd og Video</span> → <span class="guimenuitem">Rhythmbox musikafspiller</span>), virker med iPods af første til femte generation, herunder iPod mini, iPod Photo, iPod Shuffle, iPod nano og iPod Video. Rhythmbox kan overføre musik til disse iPods og oprette afspilningslister.</p>
                    <p>Programmerne <a class="ulink" href="apt:banshee" target="_top">Banshee</a>, <a class="ulink" href="apt:amarok" target="_top">Amarok</a> og <a class="ulink" href="apt:gtkpod" target="_top">gtkpod</a> kan også overføre musik til og fra disse iPod-enheder. Disse programmer har også mulighed for at overføre billeder og videoer, kodet i iPod-kompatible formater, til og fra iPods af første til femte generation</p>
                    <p>Hverken iPod Touch eller iPhone er officielt understøttet af nogen Linux-musikhåndteringsprogrammer på dette tidspunkt.</p>
                    <p>For yderligere information om brugen af iPods og iPhones med Ubuntu kan findes i <a class="ulink" href="https://help.ubuntu.com/community/PortableDevices" target="_top">Ubuntu-fællesskabets dokumentation til bærbare enheder</a>.</p>
                  </div>
                  <div class="sect2" title="MTP-medieafspillere">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="music-portable-mtp"></a>MTP-medieafspillere</h3>
                        </div>
                      </div>
                    </div>
                    <p>En række af MP3-afspillere, som dem, der er fremstillet af Samsung bruger Media Transfer Protocol (MTP). Når disse enheder bruges i Windows med den korrekte driver, vil de ofte fremstå som en medieenhed, men kan tilgås som en USB-enhed.</p>
                    <p>Ubuntu understøtter disse enheder, men kræver to trin:</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Installér <a class="ulink" href="apt:mtpfs" target="_top"><span class="application"><strong>mtpfs</strong></span></a> og <a class="ulink" href="apt:mtp-tools" target="_top"><span class="application"><strong>mtp-tools</strong></span></a>-pakkerne.</p>
                        </li>
                        <li class="listitem">
                          <p>Åbn <span class="guimenu">Programmer</span> → <span class="guimenuitem">Lyd &amp; Video</span> → <span class="guimenuitem">Rhythmbox musikafspiller</span>.</p>
                        </li>
                        <li class="listitem">
                          <p>Klik <span class="guimenu">Redigér</span> → <span class="guimenuitem">Moduler</span></p>
                        </li>
                        <li class="listitem">
                          <p>Afkryds <em class="guilabel">Bærbar afspillere - MTP</em>-modulet.</p>
                        </li>
                        <li class="listitem">
                          <p>Klik på <span class="guibutton"><strong>Luk</strong></span>.</p>
                        </li>
                      </ol>
                    </div>
                    <p>Din enhed vil nu blive nu vist i venstre side under <em class="guilabel">Enheder</em>, når den er forbundet til computeren.</p>
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
