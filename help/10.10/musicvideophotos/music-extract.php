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
    <title>Udtrække fra en cd</title>
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
    <link rel="prev" href="music-listen.php" title="Lyt" />
    <link rel="next" href="music-burn.php" title="Kopiér til en cd" />
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
              <h1 class="entry-title">Udtrække fra en cd</h1>
              <div class="entry-content">
                <div class="sect1" title="Udtrække fra en cd">
                  <p>Du kan udtrække musik fra en cd på computeren, så du ikke behøver at have cd'en i drevet for at spille sange fra den. Du kan derefter kopiere sangene til en digital musikafspiller, såsom en MP3-afspiller.</p>
                  <div class="note" title="Bemærk" style="margin-left: 0.5in; margin-right: 0.5in;">
                    <table border="0" summary="Note">
                      <tr>
                        <td rowspan="2" align="center" valign="top" width="25">
                          <img alt="[Bemærk]" src="../libs/admon/note.png" />
                        </td>
                        <th align="left"></th>
                      </tr>
                      <tr>
                        <td align="left" valign="top">
                          <p>Rhythmbox gemmer hentede filer i mappen Musik (<span class="guimenu">Steder</span> → <span class="guimenuitem">Musik</span>).</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="procedure">
                    <ol class="procedure" type="1">
                      <li class="step" title="Trin 1">
                        <p>Indsæt en musik-cd.</p>
                      </li>
                      <li class="step" title="Trin 2">
                        <p>Du vil blive bedt om at vælge, hvilket program der skal starte, vælg <em class="guilabel">Åbn Rhythmbox musikafspiller</em>.</p>
                      </li>
                      <li class="step" title="Trin 3">
                        <p>Klik <span class="guibutton"><strong>O.k.</strong></span>.</p>
                      </li>
                      <li class="step" title="Trin 4">
                        <p>I panelet til venstre under <em class="guilabel">Enheder</em>, skal du højreklikke på det cd-navn, du vil udtrække fra.</p>
                      </li>
                      <li class="step" title="Trin 5">
                        <p>Klik på <span class="guibutton"><strong>Kopiér til samling</strong></span>.</p>
                      </li>
                    </ol>
                  </div>
                  <p>Når der kopieres cd'er via Rhythmbox kan du ændre standardformattet. Klik <span class="guimenuitem">Rediger</span> → <span class="guimenuitem">Indstillinger</span> → <span class="guimenuitem">Musik</span> og ændr <em class="guilabel">Foretrukne format</em> til dit eget valg. I fremtiden vil alle cd'er kopieret til din computer blive kopieret i dette format.</p>
                  <div class="note" title="Bemærk" style="margin-left: 0.5in; margin-right: 0.5in;">
                    <table border="0" summary="Note">
                      <tr>
                        <td rowspan="2" align="center" valign="top" width="25">
                          <img alt="[Bemærk]" src="../libs/admon/note.png" />
                        </td>
                        <th align="left"></th>
                      </tr>
                      <tr>
                        <td align="left" valign="top">
                          <p>Hvis MP3 ikke er vist som et valg i <em class="guilabel">Foretrukne format</em>-listen, så <a class="ulink" href="apt:gstreamer0.10-plugins-ugly-multiverse" target="_top">installer <span class="application"><strong>gstreamer0.10-plugins-ugly-multiverse</strong></span>-pakken</a> og genstart Rhythmbox. Mulighed <em class="guilabel">CD-kvalitet, MP3 (.mp3-type)</em> burde nu være i <em class="guilabel">Foretrukne format</em>-listen.</p>
                        </td>
                      </tr>
                    </table>
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
    <script async="true" type="text/javascript" src="/wp-content/themes/light-wordpress-theme/js/ubuntu-loco.js?ver=0.2-light"></script>
  </body>
</html>
