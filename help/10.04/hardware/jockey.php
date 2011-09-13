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
    <title xmlns="">Proprietære drivere</title>
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
    <link rel="prev" href="index.php" title="Arbejde med hardware-enheder" />
    <link rel="next" href="disks.php" title="Diske og partitioner" />
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
              <h1 class="entry-title">Proprietære drivere</h1>
              <div class="entry-content">
                <div class="sect1" title="Proprietære drivere">
                  <p>Nogle enheder, der er tilsluttet din computer, kan have brug for, at der bliver installeret proprietære drivere, for at de virker korrekt.</p>
                  <div class="sect2" title="Hvorfor er nogle drivere proprietære?">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="jockey-whyproprietary"></a>Hvorfor er nogle drivere proprietære?</h3>
                        </div>
                      </div>
                    </div>
                    <p>
                      <span class="emphasis">
                        <em>Proprietære drivere er drivere til din hardware, som ikke er frit tilgængelige eller med åben kildekode.</em>
                      </span>
                    </p>
                    <p>De fleste enheder (hardware), som er tilsluttet din computer, bør virke korrekt i Ubuntu. Disse enheder har med stor sandsynlighed <span class="emphasis"><em>frie</em></span> drivere, hvilket betyder, at driverne kan tilpasses af Ubuntu-udviklerne, og problemer med dem blive løst.</p>
                    <p>Nogen hardware har ikke har frie drivere, som regel fordi hardwareproducenten ikke har frigivet oplysninger om deres hardware, som gør det muligt  at lave sådan en driver. Disse enheder kan have begrænset funktionalitet eller virker måske slet ikke.</p>
                    <p>Hvis en <span class="emphasis"><em>begrænset driver</em></span> er tilgængelig til en bestemt enhed, kan du installere den for at få din enhed til at fungere korrekt eller for at tilføje nye funktioner. For eksempel kan du med visse grafikkort få mulighed for at bruge mere avancerede <a class="ulink" href="../desktop-effects/" target="_top">visuelle effekter</a>, hvis du installerer en proprietær drivere.</p>
                    <p>Nogle computere har ingen enheder, som kan bruge proprietære drivere. Dette kan skyldes, at alle enheder er fuldt understøttede af frie drivere, eller at der ikke er nogen proprietære drivere tilgængelige til enheden endnu.</p>
                    <div class="caution" title="Pas på" style="margin-left: 0.5in; margin-right: 0.5in;">
                      <table border="0" summary="Caution">
                        <tr>
                          <td rowspan="2" align="center" valign="top" width="25">
                            <img alt="[Pas på]" src="../libs/admon/caution.png" />
                          </td>
                          <th align="left"></th>
                        </tr>
                        <tr>
                          <td align="left" valign="top">
                            <p>Proprietære drivere bliver ofte vedligeholdt af hardwareproducenten, og de kan derfor ikke ændres af Ubuntus udviklere, hvis der er et problem.</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="sect2" title="Aktivering af en proprietær driver">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="jockey-enable"></a>Aktivering af en proprietær driver</h3>
                        </div>
                      </div>
                    </div>
                    <p>Gør sådan for bruge en proprietær driver til en enhed:</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Klik på <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Hardwaredrivere</span>.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Find den driver, som du ønsker at aktivere og læs beskrivelsen.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Klik på <span class="guibutton"><strong>Aktivér</strong></span> for at aktivere driveren. Du bliver måske bedt om at indtaste din adgangskode.</p>
                        </li>
                        <li class="step" title="Trin 4">
                          <p>Den proprietære driver skal i nogle tilfælde hentes og installeres.</p>
                        </li>
                        <li class="step" title="Trin 5">
                          <p>Du skal muligvis genstarte computeren for at færdiggøre aktiveringen af driveren.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                  <div class="sect2" title="Deaktivering af en proprietær driver">
                    <div class="titlepage">
                      <div>
                        <div>
                          <h3 class="title"><a id="jockey-disable"></a>Deaktivering af en proprietær driver</h3>
                        </div>
                      </div>
                    </div>
                    <p>Hvis en proprietær driver skaber problemer, eller du blot ønsker at slå den fra, følg fremgangsmåden nedenfor:</p>
                    <div class="procedure">
                      <ol class="procedure" type="1">
                        <li class="step" title="Trin 1">
                          <p>Klik på <span class="guimenu">System</span> → <span class="guimenuitem">Administration</span> → <span class="guimenuitem">Hardwaredrivere</span>.</p>
                        </li>
                        <li class="step" title="Trin 2">
                          <p>Find den driver, som du ønsker at deaktivere og læs beskrivelsen.</p>
                        </li>
                        <li class="step" title="Trin 3">
                          <p>Klik på <span class="guibutton"><strong>Fjern</strong></span> for at deaktivere driveren og efterfølgende bruge en fri driver, hvis en sådan er tilgængelig. Du bliver måske bedt om at indtaste din adgangskode.</p>
                        </li>
                        <li class="step" title="Trin 4">
                          <p>Du skal muligvis genstarte computeren for at færdiggøre deaktiveringen af driveren.</p>
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
