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
    <title xmlns="">Hvordan kan jeg afspille mine videoer?</title>
    <meta xmlns="" http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta xmlns="" name="robots" content="index,follow" />
    <link xmlns="" rel="canonical" href="http://ubuntudanmark.dk/support/" />
    <link xmlns="" rel="stylesheet" type="text/css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/style.css" />
    <link xmlns="" rel="pingback" href="http://ubuntudanmark.dk/xmlrpc.php" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Feed" href="http://ubuntudanmark.dk/feed/" />
    <link xmlns="" rel="alternate" type="application/rss+xml" title="Ubuntu Danmark » Kommentarfeed" href="http://ubuntudanmark.dk/comments/feed/" />
    <link xmlns="" rel="stylesheet" id="nivo-slider-css" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/slider/nivo-slider.css?ver=2" type="text/css" media="all" />
    <link xmlns="" rel="stylesheet" id="openid-css" href="http://ubuntudanmark.dk/wp-content/plugins/openid/f/openid.css?ver=519" type="text/css" media="all" />
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/jquery.corner.js?ver=2.08"></script>
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/slider/jquery.nivo.slider.pack.js?ver=2"></script>
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-includes/js/comment-reply.js?ver=20090102"></script>
    <script xmlns="" type="text/javascript" src="http://ubuntudanmark.dk/wp-content/plugins/google-analyticator/external-tracking.min.js?ver=6.1.1"></script>
    <link xmlns="" rel="EditURI" type="application/rsd+xml" title="RSD" href="http://ubuntudanmark.dk/xmlrpc.php?rsd" />
    <link xmlns="" rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://ubuntudanmark.dk/wp-includes/wlwmanifest.xml" />
    <link xmlns="" rel="index" title="Ubuntu Danmark" href="http://ubuntudanmark.dk/" />
    <link xmlns="" rel="prev" title="Om Ubuntu" href="http://ubuntudanmark.dk/om-ubuntu/" />
    <link xmlns="" rel="next" title="Download" href="http://ubuntudanmark.dk/download/" />
    <link xmlns="" rel="canonical" href="http://ubuntudanmark.dk/support/" />
    <link xmlns="" rel="shortcut icon" href="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/images/favicon.ico" type="image/x-icon" />
    <meta xmlns="" http-equiv="X-UA-Compatible" content="chrome=1" />
    <script xmlns="" type="text/javascript">
	var analyticsFileTypes = ['mp3','pdf','ogg'];
	var analyticsEventTracking = 'enabled';
</script>
    <script xmlns="" type="text/javascript">
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
    <link rel="up" href="video.php" title="Kapitel 2. Film, dvd'er og videoer" />
    <link rel="prev" href="video-dvd.php" title="Afspilning af dvd'er" />
    <link rel="next" href="video-realplayer.php" title="Installering og opsætning af RealPlayer" />
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
              <h1 class="entry-title">Hvordan kan jeg afspille mine videoer?</h1>
              <div class="entry-content">
                <div class="sect1" title="Hvordan kan jeg afspille mine videoer?">
                  <p>Nogle videoformater, såsom Flash, QuickTime, og Windows Media Video, er omfattet af ophavsret, så understøttelse af dem kan ikke inkluderes i Ubuntu som standard. Du skal installere yderligere software for at kunne afspille video i de formater.</p>
                  <p>For at kunne afspille de mest almindelige proprietære formater i Totem-filmafspiller eller Firefox-webbrowseren, <a class="ulink" href="apt:ubuntu-restricted-extras" target="_top">installér ubuntu-restricted-extras-pakken</a> (se <a class="ulink" href="../add-applications/restricted-software.php" target="_top">Begrænset Software</a> for mere information).</p>
                  <div class="sect2" title="Videofiler">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="video-playback-file"></a>Videofiler</h3>
                        </div>
                      </div>
                    </div>
                    <p>
        <span class="emphasis"><em>(for eksempel QuickTime, Windows Media)</em></span>
        </p>
                    <p>Hvis du forsøger at afspille en videofil, der ikke er understøttet, vil du blive spurgt om du ønsker at <em class="guilabel">søge efter en egnet kodning</em>. Klik <span class="guibutton"><strong>Søg</strong></span> og vælg derefter, når vinduet <em class="guilabel">Installer multimediekodning</em> kommer frem, en af de viste kodninger på listen og klik <span class="guibutton"><strong>Installer</strong></span>.</p>
                    <p>Hvis du bliver spurgt om <em class="guilabel">bekræft installation af begrænset software</em>, så har den kodning som kræves for at afspille din video måske nogle <a class="ulink" href="../add-applications/#restricted-software" target="_top">juridiske begrænsninger</a>, som du bør kende til. Hvis du er af den opfattelse, at begrænsningerne ikke er gældende for dig, så tryk <span class="guibutton"><strong>Bekræft</strong></span> for at fortsætte med installationen.</p>
                    <p>Når installationen er færdig, bør videoen begynde sin afspilning. Hvis ikke, så prøv at lukke videoen ned og starte den op igen.</p>
                  </div>
                  <div class="sect2" title="Flashvideoer">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="video-playback-flash"></a>Flashvideoer</h3>
                        </div>
                      </div>
                    </div>
                    <p>
        <span class="emphasis"><em>(for eksempel Youtube, iPlayer)</em></span>
        </p>
                    <p>Når du første gang forsøger at afspille en Flash-video i Firefox webbrowser, vil en bjælke øverst i vinduet oplyse, at <em class="guilabel">Yderligere plugins er påkrævet for at vise alle former for media på denne side</em>. Tryk på knappen <span class="guibutton"><strong>Installer manglende plugins...</strong></span> og følg instruktionerne på skærmen for at installere en Flash-afspiller.</p>
                    <p>Du vil blive tilbudt flere afspillere. <em class="guilabel">Adobe Flash Player</em> er det officielle udvidelsesmodul, som burde tilbyde den bedste understøttelse af video. Desværre er det propritær software og kan som sådan ikke understøttes direkte af Ubuntu. Swfdec- og Gnashafspillerne er ikke propritære og understøttes derfor. Du vil måske også opdage, at de er mere stabile (giver færre problemer) end den officielle afspiller.</p>
                  </div>
                  <div class="sect2" title="Streaming af video">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="video-playback-streaming"></a>Streaming af video</h3>
                        </div>
                      </div>
                    </div>
                    <p>
        <span class="emphasis"><em>(for eksempel RealVideo)</em></span>
        </p>
                    <p>Den bedste måde at afspille videoer i formatet RealVideo er at installere den officielle RealPlayer software. Se <a class="link" href="video-realplayer.php" title="Installering og opsætning af RealPlayer"> Installering og konfigurering af RealPlayer</a> for fuldstændige instruktioner.</p>
                    <p>Understøttelse af andre typer af streamingvideo kan tilføjes ved at følge instruktionerne for <a class="link" href="video-playback.php#video-playback-file" title="Videofiler">videofiler</a> eller <a class="link" href="video-playback.php#video-playback-flash" title="Flashvideoer">Flashvideoer</a>. Hvis du har problemer med at vise en videostrøm i din webbrowser, højreklik på videoen og vælg <em class="guilabel">Åbn med "Filmafspiller"</em> hvis den mulighed er tilgængelig.</p>
                  </div>
                  <div class="sect2" title="Videoer som ellers ikke er understøttet">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="video-playback-unsupported"></a>Videoer som ellers ikke er understøttet</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvis ingen af de andre instruktioner i dette afsnit virker med en specifik video, så forsøg med en anden medieafspiller. <a class="ulink" href="apt:vlc" target="_top">VLC</a> og <a class="ulink" href="apt:mplayer" target="_top">MPlayer</a> understøtter et stort antal formater; det anbefales at du forsøger med et af disse programmer.</p>
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
                  <li><a href="music-download.php">Hent musik på internettet</a>
                      <ul>
                      <li><a href="music-download.php#music-jamendo">Jamendo butikken</a></li>
                      <li><a href="music-download.php#music-magnatune">Magnatune-butik</a></li>
                      <li><a href="music-download.php#music-ubuntuone">Ubuntu Ones musikbutik</a></li>
                      </ul>
                  </li>
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
    <script type="text/javascript" src="http://ubuntudanmark.dk/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
