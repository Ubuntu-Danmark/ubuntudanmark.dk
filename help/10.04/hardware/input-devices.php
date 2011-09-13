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
    <title xmlns="">Mus og tastaturer</title>
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
    <link rel="home" href="index.php" title="Arbejde med hardware-enheder" />
    <link rel="up" href="index.php" title="Arbejde med hardware-enheder" />
    <link rel="prev" href="pm-suspending.php" title="Sæt din computer i hvile eller dvale" />
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
              <h1 class="entry-title">Mus og tastaturer</h1>
              <div class="entry-content">
                <div class="sect1" title="Mus og tastaturer">
                  <p>Dette afsnit giver instruktioner om brug og konfiguration af mus, tastaturer og andre inputenheder, så de bliver mere behagelige for dig at bruge.</p>
                  <div class="sect2" title="Mus og andre pegeenheder">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="input-mice"></a>Mus og andre pegeenheder</h3>
                        </div>
                      </div>
                    </div>
                    <p>Du kan ændre flere forskellige valgmuligheder for din mus, som f.eks. hvor hurtigt markøren bevæger sig, og hvordan klik bliver fortolket af computeren.</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>
                                <a class="ulink" href="http://library.gnome.org/users/user-guide/2.30/mouse-skills.html" target="_top">Musefærdigheder</a>
                              </strong>
                            </span>
                          </p>
                          <p>Information om grundlæggende musefærdigheder som f.eks. at pege, klikke og trække.</p>
                        </li>
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>
                                <a class="ulink" href="http://library.gnome.org/users/user-guide/2.30/prefs-mouse.html" target="_top">Museindstillinger</a>
                              </strong>
                            </span>
                          </p>
                          <p>Instruktioner om hvordan man ændrer forskellige muserelaterede indstillinger, som f.eks. om musen er venstrehåndet, og hvor hurtigt musemarkøren bevæger sig.</p>
                        </li>
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>
                                <a class="ulink" href="http://library.gnome.org/users/gnome-access-guide/2.30/#dtconfig-1" target="_top">Tilgængelighed - konfiguration af musen</a>
                              </strong>
                            </span>
                          </p>
                          <p>Information om at ændre museindstillinger til brugere af hjælpeteknologier.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="sect2" title="Tastaturer">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="input-keyboard"></a>Tastaturer</h3>
                        </div>
                      </div>
                    </div>
                    <p>Der er mange forskellige valgmuligheder relateret til dit tastatur, som du kan ændre, såsom tastatursproget og tastaturgenveje.</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>
                                <a class="ulink" href="http://library.gnome.org/users/user-guide/2.30/prefs-keyboard.html" target="_top">Grundlæggende tastaturfærdigheder</a>
                              </strong>
                            </span>
                          </p>
                          <p>Information om grundlæggende brug af tastaturet.</p>
                        </li>
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>
                                <a class="ulink" href="http://library.gnome.org/users/user-guide/2.30/prefs-keyboard.html" target="_top">Tastaturindstillinger</a>
                              </strong>
                            </span>
                          </p>
                          <p>Ændr tastaturrelaterede indstillinger, såsom tastaturets layout.</p>
                        </li>
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>
                                <a class="ulink" href="http://library.gnome.org/users/gswitchit/2.30/gswitchit-applet-switching.html" target="_top">Tastaturindikator</a>
                              </strong>
                            </span>
                          </p>
                          <p>Tastaturindikator-manualen, som gør det muligt for dig at skifte mellem forskellige tastaturlayout.</p>
                        </li>
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>
                                <a class="ulink" href="http://library.gnome.org/users/gnome-access-guide/2.30/#dtconfig-0" target="_top">Tilgængelighed - konfiguration af musen og tastaturet</a>
                              </strong>
                            </span>
                          </p>
                          <p>Information om konfiguration af musen og tastaturet til brugere af hjælpeteknologier.</p>
                        </li>
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>
                                <a class="ulink" href="http://library.gnome.org/users/gnome-access-guide/2.30/#keynav-0" target="_top">Brug af tastaturet til at navigere rundt på skrivebordet</a>
                              </strong>
                            </span>
                          </p>
                          <p>En guide til at navigere rundt på skrivebordet kun ved brug af et tastatur.</p>
                        </li>
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>
                                <a class="ulink" href="http://library.gnome.org/users/accessx-status/2.30/" target="_top">Tastaturtilgængeligheds-overvågning</a>
                              </strong>
                            </span>
                          </p>
                          <p>Manualen til tastaturtilgængeligheds-overvågning, som viser status for enhver tastaturtilgængeligheds-funktion, der er slået til.</p>
                        </li>
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>
                                <a class="ulink" href="http://library.gnome.org/users/char-palette/2.30/charpick-usage.html" target="_top">Brug af tegnpaletten</a>
                              </strong>
                            </span>
                          </p>
                          <p>Brug tegnpaletten til at indsætte bogstaver og symboler, som ikke findes på dit tastatur.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="sect2" title="Museplader og tegneplader">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="input-touchpads"></a>Museplader og tegneplader</h3>
                        </div>
                      </div>
                    </div>
                    <p>Du kan bruge en museplade eller en tegneplade til at flytte en musemarkør.</p>
                    <div class="itemizedlist">
                      <ul class="itemizedlist" type="disc">
                        <li class="listitem">
                          <p>
                            <span class="strong">
                              <strong>
                                <a class="ulink" href="../hardware/laptops.php" target="_top">Museplader</a>
                              </strong>
                            </span>
                          </p>
                          <p>Information om ændring af indstillingerne for en bærbar computers museplade.</p>
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
              <h3 class="widgettitle">Arbejde med hardware-enheder</h3>
              <ul>
              <li><a href="jockey.php">Proprietære drivere</a>
                  <ul>
                  <li><a href="jockey.php#jockey-whyproprietary">Hvorfor er nogle drivere proprietære?</a></li>
                  <li><a href="jockey.php#jockey-enable">Aktivering af en proprietær driver</a></li>
                  <li><a href="jockey.php#jockey-disable">Deaktivering af en proprietær driver</a></li>
                  </ul>
              </li>
              <li><a href="disks.php">Diske og partitioner</a>
                  <ul>
                  <li><a href="disks.php#checking-usage">Undersøg hvor meget diskplads der er tilgængelig</a></li>
                  <li><a href="disks.php#free-disk-space">Hvordan kan jeg frigøre noget diskplads?</a></li>
                  <li><a href="disks.php#partitioning-device">Partitionering af en enhed</a></li>
                  <li><a href="disks.php#partition-formatting">Formatering af en partition</a></li>
                  <li><a href="disks.php#to-format-meaning">Hvad er formatering?</a></li>
                  <li><a href="disks.php#what-is-filesystem">Hvad er et filsystem?</a></li>
                  <li><a href="disks.php#partition-meaning">Hvad er en partition?</a></li>
                  <li><a href="disks.php#mount-and-umount">Montering og afmontering af enheder</a></li>
              <li><a href="laptops.php">Bærbare computere</a>
                  <ul>
                  <li><a href="laptops.php#laptops-pm">Strømstyringsindstillinger</a></li>
                  <li><a href="laptops.php#laptops-touchpads">Museplader</a></li>
                  <li><a href="laptops.php#laptops-testing-reports">Find testrapporter for bærbare computere</a></li>
                  </ul>
              </li>
              <li><a href="pm-suspending.php">Sæt din computer i hvile eller dvale</a>
                  <ul>
                  <li><a href="pm-suspending.php#pm-suspend-hibernate-fails">Min computer går ikke korrekt i hvile eller dvale</a></li>
                  <li><a href="pm-suspending.php#pm-hibernate-pattern">Hvorfor får jeg et underligt mønster på skærmen, når jeg sætter computeren i dvale?</a></li>
                  </ul>
              </li>
              <li><a href="input-devices.php">Mus og tastaturer</a>
                  <ul>
                  <li><a href="input-devices.php#input-mice">Mus og andre pegeenheder</a></li>
                  <li><a href="input-devices.php#input-keyboard">Tastaturer</a></li>
                  <li><a href="input-devices.php#input-touchpads">Museplader og tegneplader</a></li>
                  </ul>
              </li>
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
