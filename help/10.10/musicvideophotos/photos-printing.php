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
    <title xmlns="">Udskriv billeder</title>
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
    <link rel="up" href="photos.php" title="Kapitel 3. Billeder og kameraer" />
    <link rel="prev" href="photos-slideshow.php" title="Se et diasshow af dine billeder" />
    <link rel="next" href="photos-sharing.php" title="Del dine billeder" />
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
              <h1 class="entry-title">Udskriv billeder</h1>
              <div class="entry-content">
                <div class="sect1" title="Udskriv billeder">
                  <p>At udskrive dine billeder er en glimrende måde at dele dem med andre på.</p>
                  <div class="orderedlist">
                    <ol class="orderedlist" type="1">
                      <li class="listitem">
                        <p>Dobbeltklik på det billede du ønsker at udskrive for at åbne det i <span class="application"><strong>gThumb - billedfremviseren</strong></span></p>
                      </li>
                      <li class="listitem">
                        <p>Tryk <span class="guimenuitem">Fil</span> → <span class="guimenuitem">Sideopsætning</span></p>
                        <div class="itemizedlist">
                          <ul class="itemizedlist" type="disc">
                            <li class="listitem">
                              <p>Under <em class="guilabel">Format for</em>, vælg den printer som du vil bruge</p>
                            </li>
                            <li class="listitem">
                              <p>Under <em class="guilabel">Papirstørrelse</em> vælges størrelsen på papiret som du udskriver på</p>
                            </li>
                            <li class="listitem">
                              <p>Under <em class="guilabel">Retning</em>, vælg papirretning for billedet</p>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="listitem">
                        <p>Tryk <span class="guibutton"><strong>Anvend</strong></span></p>
                      </li>
                      <li class="listitem">
                        <p>Tryk <span class="guimenuitem">Fil</span> → <span class="guimenuitem">Udskriv</span></p>
                      </li>
                      <li class="listitem">
                        <p>Ændr opsætning som ønsket (se nedenfor)</p>
                      </li>
                      <li class="listitem">
                        <p>Tryk <span class="guibutton"><strong>Udskriv</strong></span> for at udskrive billedet</p>
                      </li>
                    </ol>
                  </div>
                  <div class="sect2" title="Printeropsætning">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="photos-printing-settings"></a>Printeropsætning</h3>
                        </div>
                      </div>
                    </div>
                    <p>Du kan indstille din printeropsætning for det bedst mulige resultat. Alle disse indstillingsmuligheder kan findes i vinduet<span class="guimenuitem">Fil</span> → <span class="guimenuitem">Udskriv</span>.</p>
                    <p>Vær sikker på, at du vælger din printer fra listen i fanebladet <em class="guilabel">Generelt</em> for at få adgang til hele rækken af indstillingsmuligheder til din printer.</p>
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
                            <p>Forskellige printere har forskellige opsætninger. Opsætningerne nedenfor vises alene som en vejledning til hvad du måske kan ændre med din printer.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="sect3" title="Papirtype">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="photos-printing-paper"></a>Papirtype</h4>
                          </div>
                        </div>
                      </div>
                      <p>Papirtypen du bruger har stor indflydelse på kvalitetet af dine udskrevne billeder. Du bør indstille papirtypen til den type papir du bruger i din printer for at forhindre dårlige resultater. Brug af papirtypen <span class="emphasis"><em>glossy</em></span> med <span class="emphasis"><em>standard</em></span>-papir i din printer vil for eksempel normalt resultere i et dårligt resultat.</p>
                      <p>Denne indstilling kan automatisk ændre den mængde blæk som bruges, for at få de bedste resultater og for at forhindre tilsmudsning. Hvordan det håndteres afhænger af din printer.</p>
                    </div>
                    <div class="sect3" title="Udskriftskvalitet">
                      <div class="titlepage">
                        <div>
                          <div>
                            <h4 class="title"><a id="photos-printing-quality"></a>Udskriftskvalitet</h4>
                          </div>
                        </div>
                      </div>
                      <p>Udskriftskvalitet måles normalt i <span class="emphasis"><em>DPI</em></span> (punkter per tomme). En større  DPI-værdi vil normalt medføre en højere udskriftskvalitet.</p>
                      <div class="itemizedlist">
                        <ul class="itemizedlist" type="disc">
                          <li class="listitem">
                            <p>Vælg <em class="guilabel">Kladde</em> for hurtige udskrifter som ikke bruger meget blæk</p>
                          </li>
                          <li class="listitem">
                            <p>Vælg <em class="guilabel">Bedste kvalitet</em> eller <em class="guilabel">Foto</em> for kvalitetsudskrivninger. Udskrivning vil være langsommere og vil bruge mere blæk</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="sect2" title="Avanceret billedudskrivning">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="photos-printing-advanced"></a>Avanceret billedudskrivning</h3>
                        </div>
                      </div>
                    </div>
                    <p>For avanceret fotoudskrivning, <a class="ulink" href="apt:photoprint" target="_top">installér <span class="application"><strong>PhotoPrint</strong></span>-pakken</a> fra universe-softwarekilden. Når den er installeret, skal du trykke <span class="guimenu">Programmer</span> → <span class="guimenuitem">Grafik</span> → <span class="guimenuitem">PhotoPrint</span> for at starte PhotoPrint.</p>
                    <p>PhotoPrint gør det muligt for dig at finjustere din udskrivningsopsætning.</p>
                    <div class="orderedlist">
                      <ol class="orderedlist" type="1">
                        <li class="listitem">
                          <p>Under <em class="guilabel">Papirstørrelse</em> ændres papirstørrelsen til den størrelse, du ønsker at udskrive på.</p>
                        </li>
                        <li class="listitem">
                          <p>Under <em class="guilabel">Layout</em> ændres antallet af kolonner og rækker for at afspejle det antal billeder du ønsker at indsætte på en side</p>
                        </li>
                        <li class="listitem">
                          <p>For at ændre afstanden mellem fotos, ændr <em class="guilabel">Afstand</em> indstillinger ud for <em class="guilabel">Kolonner</em> og <em class="guilabel">Rækker</em> under <em class="guilabel">Layout</em></p>
                        </li>
                        <li class="listitem">
                          <p>For at tilføje et billede til siden, tryk <span class="guimenuitem">Billede</span> → <span class="guimenuitem">Tilføj billede</span> og vælg et billede</p>
                        </li>
                        <li class="listitem">
                          <p>For at ændre den avancerede printeropsætning tast <span class="guimenuitem">Fil</span> → <span class="guimenuitem">Printeropsætning</span></p>
                          <p>Du skal måske vælge den korrekte printermodel på fanebladet <em class="guilabel">Output</em></p>
                        </li>
                        <li class="listitem">
                          <p>Tryk <span class="guimenuitem">Fil</span> → <span class="guimenuitem">Udskriv</span> for at udskrive dine billeder</p>
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
